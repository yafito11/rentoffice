<?php

namespace App\Http\Controllers\Api;

use App\Models\OfficeSpace;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OfficeSpaceResource;

class OfficeSpaceController extends Controller
{
    //
    public function index()
    {
        $officeSpaces = OfficeSpace::with('city')->get();
        return OfficeSpaceResource::collection($officeSpaces);
    }

    public function show(OfficeSpace $officeSpace)
    {
        $city->load(['city','photos','benefits']);
        return new OfficeSpaceResource($officeSpace);
    }
}
