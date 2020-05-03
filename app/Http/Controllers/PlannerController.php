<?php

namespace App\Http\Controllers;

use App\Flight;
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
        $wishes = Flight::all();
        return view('pages.wishlist', ['wishes' => $wishes]);
    }

    public function travel() {
        return view('pages.travel');
    }

    public function travelResults(Request $request) {
        $start = $request->country1;
        $end = $request->country2;
        $city1 = $request->city1;
        $city2 = $request->city2;

        // Find in maps
        // Location 1 START
        $maps_url = 'http://restcountries.eu/rest/v2/name/' . urlencode($start);

        $maps_json = file_get_contents($maps_url);
        $maps_array = json_decode($maps_json, true);

        $country = $maps_array['0']['alpha2Code'];
        $currency = $maps_array['0']['currencies']['0']['code'];
        $locale = $maps_array['0']['languages']['0']['iso639_1'] . '-' . $country;

        // Location 2 START
        $maps_url2 = 'http://restcountries.eu/rest/v2/name/' . urlencode($end);

        $maps_json2 = file_get_contents($maps_url2);
        $maps_array2 = json_decode($maps_json2, true);

        $country2 = $maps_array2['0']['alpha2Code'];
        $currency2 = $maps_array2['0']['currencies']['0']['code'];
        $locale2 = $maps_array2['0']['languages']['0']['iso639_1'] . '-' . $country2;

        // Skyscanner Places
        // City START 1
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/autosuggest/v1.0/".$country."/".$currency."/".$locale."/?query=" . urlencode($city1),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
                "x-rapidapi-key: 1fbe8d596amshc5c40117d7291b0p1dea4fjsn7a9967db3de0"
            ),
        ));
        
        $response = curl_exec($curl);
        $place1 = json_decode($response, true);
        $err = curl_error($curl);
        
        curl_close($curl);

        // CITY 2 START
        $curl2 = curl_init();

        curl_setopt_array($curl2, array(
            CURLOPT_URL => "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/autosuggest/v1.0/".$country2."/".$currency2."/".$locale2."/?query=" . urlencode($city2),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
                "x-rapidapi-key: 1fbe8d596amshc5c40117d7291b0p1dea4fjsn7a9967db3de0"
            ),
        ));
        
        $response2 = curl_exec($curl2);
        $place2 = json_decode($response2, true);
        $err2 = curl_error($curl2);
        
        curl_close($curl2);
        
        if ($err || $err2) {
            return redirect()->back();
        } else {
            // Store in db
            $insert = [
                'start' => "$city1 $start",
                'end' => "$city2 $end",
                'country' => $country,
                'currency' => $currency,
                'locale' => $locale,
                'destinationplace' => $place2['Places']['0']['PlaceId'],
                'originplace' => $place1['Places']['0']['PlaceId'],
                'outboundpartialdate' => NULL // covid ends
            ];

            $insertId = Flight::insertGetId($insert);
        }

        if ($insertId) {
            return redirect()->route('wishlist');
        } else {
            redirect()->back();
        }
    }
}
