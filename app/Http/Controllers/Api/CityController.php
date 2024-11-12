<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;

class CityController extends Controller
{
    //
    public function index()
    {
        $cities = City::withCount('officeSpaces')->get();
        return CityResource::collection($cities);
    }

    public function show(City $city)
    {
        $city->load(['officeSpaces.city', 'officeSpaces.photos']);
        $city->loadCount('officeSpaces');
        return new CityResource($city);
    }
}
