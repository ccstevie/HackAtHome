<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $start;

        $maps_json = file_get_contents($maps_url);

    }
}
