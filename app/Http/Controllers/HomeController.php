<?php

namespace App\Http\Controllers;

use App\Models\Text;

class HomeController extends Controller
{
    public function index()
    {
    $texts = Text::with(['category', 'author'])
        ->where('is_blocked', false)
        ->latest()
        ->paginate(5);

    return view('index', compact('texts'));
    }
}