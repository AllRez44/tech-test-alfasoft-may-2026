<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // TODO: Remove mock
        $contacts = [
            "Alisson",
            "Maria",
            "JB",
            "Rafael",
            "Mom",
        ];
        return view('home', [
            'contacts' => $contacts,
        ]);
    }
}
