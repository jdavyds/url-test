<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'original_url' => 'required|url'
        ], [
            'original_url.required' => 'The URL field is required.',
            'original_url.url' => 'Please provide a valid URL.'
        ]);

        $existing = Url::where('original_url', $request->original_url)->first();
        if ($existing) {
            return response()->json(['short_url' => $existing->short_url]);
        }

        $shortUrl = substr(md5(time()), 0, 6);

        $url = Url::create([
            'original_url' => $request->original_url,
            'short_url' => $shortUrl
        ]);

        return response()->json(['short_url' => $url->short_url, "long_url" => $url->original_url]);
    }

    public function redirect($shortUrl) {
        $url = Url::where('short_url', $shortUrl)->firstOrFail();
        return redirect($url->original_url);
    }
}
