<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UrlShortenerController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Show', [
            'user' => "ABC"
        ]);
    }
}
