<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function districts(Request $request)
    {
        return District::where('id', 'LIKE', '3275%')->get();
    }

    public function villages(Request $request, $districts_id)
    {

        return Village::where('district_id', $districts_id)->get();
    }
}
