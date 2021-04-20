<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function getGeoByName(Request $request)
    {
        $query = $request->search_string;
        try {
            $response = Http::get("https://maps.googleapis.com/maps/api/place/textsearch/json", [
                'input' => $query,
                'inputtype' => 'textquery',
                'fields' => 'photos,formatted_address,name,rating,opening_hours,geometry',
                'key' => config('api_keys.google_map_backend'),
            ]);
            return $response->json();
        } catch (Exception $e) {
            return $e->message();
        }
    }
}