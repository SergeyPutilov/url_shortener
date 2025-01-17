<?php

namespace App\Http\Controllers;

use App\Models\Url;
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

    public function create(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $newUrl = uniqid();
        $url = Url::create([
            'original_url' => $request->url,
            'shortened_url' => $newUrl
        ]);

        return $url;
    }
}
