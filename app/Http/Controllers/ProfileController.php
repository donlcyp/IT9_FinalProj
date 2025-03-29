<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalBooksBorrowed = $user->borrowings()->count();
        $currentlyBorrowed = $user->borrowings()->whereNull('returned_at')->count();
        $overdueBooks = $user->borrowings()->whereNull('returned_at')->where('due_date', '<', now())->count();
        $finesDue = $overdueBooks * 0.50; // Example: $0.50 per overdue book

        return view('profile', compact('totalBooksBorrowed', 'currentlyBorrowed', 'overdueBooks', 'finesDue'));
    }
    
    public function show()
    {
        $user = Auth::user();
        $totalBooksBorrowed = $user->borrowings()->count();
        $currentlyBorrowed = $user->borrowings()->whereNull('returned_at')->count();
        $overdueBooks = $user->borrowings()->whereNull('returned_at')->where('due_date', '<', now())->count();
        $finesDue = $overdueBooks * 0.50; // Example: $0.50 per overdue book

        return view('profile', compact('totalBooksBorrowed', 'currentlyBorrowed', 'overdueBooks', 'finesDue'));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'contact_no' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $data = $request->only(['name', 'email', 'contact_no', 'address']);

        if ($request->hasFile('profile_picture')) {
            // Delete old picture if it exists and isn't the default
            if ($user->profile_picture && $user->profile_picture !== 'images-1-10.png') {
                Storage::delete('public/images/' . $user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('public/images');
            $data['profile_picture'] = basename($path);
        }

        $user->update($data);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
}
