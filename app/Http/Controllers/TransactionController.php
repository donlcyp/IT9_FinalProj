<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // Fetch the authenticated user's transactions
        $transactions = Auth::user()->transactions ?? collect([]); // Fallback to an empty collection if no transactions

        // Pass the $transactions variable to the view
        return view('transaction', compact('transactions'));
    }
}