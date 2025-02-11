<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //// In your controller
public function index()
{
    $colors = [
        "rgb(255, 0, 0)",
        "rgb(220, 20, 60)",
        "rgb(178, 34, 34)",
        "rgb(139, 0, 0)"
    ];

    return view('welcome', compact('colors'));
}
}
