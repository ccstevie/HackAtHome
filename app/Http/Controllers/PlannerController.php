<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlannerController extends Controller
{
    public function index() {
        return view('pages.categories');
    }

    public function search() {
        return view('pages.search');
    }

    public function wishList() {
        return view('pages.wishlist');
    }

    public function travel() {
        return view('pages.travel');
    }

    public function travelResults(Request $request) {
        $start = $request->start;
        $end = $request->end;

        // Store in db
        // Find in maps
        $maps_url = 'http://restcountries.eu/rest/v2/name/' . urlencode($start);

        $maps_json = file_get_contents($maps_url);
        $maps_array = json_decode($maps_json, true);

        $country = $maps_array['0']['alpha2Code'];
        $currency = $maps_array['0']['currencies']['0']['code'];
        $locale = $maps_array['0']['languages']['0']['iso639_1'] . '-' . $country;

        Log::debug($locale);
        return redirect()->route('wishlist');
    }
}
