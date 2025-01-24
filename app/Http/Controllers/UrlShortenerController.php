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

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        do {
            $newUrl = uniqid();
        } while (Url::where('shortened_url', $newUrl)->exists());

        $url = Url::create([
            'original_url' => $request->url,
            'shortened_url' => $newUrl
        ]);

        return url($newUrl);
    }

    public function redirect(string $shortened)
    {
        $result = Url::where('shortened_url', $shortened)->first();
        if(!$result){
            abort(404);
        }

        // redirect to url
        return redirect($result->original_url);
    }
}
