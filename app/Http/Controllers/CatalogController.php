<?php

namespace App\Http\Controllers;

class CatalogController extends Controller {
    public function index() {
        return view('catalogs'); // Create this view as needed
    }
}