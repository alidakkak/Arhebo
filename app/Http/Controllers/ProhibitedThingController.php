<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProhibitedThingRequest;
use App\Http\Resources\ProhibitedThingResource;
use App\Models\ProhibitedThing;

class ProhibitedThingController extends Controller
{
    public function index()
    {
        $prohibitedThing = ProhibitedThing::all();

        return ProhibitedThingResource::collection($prohibitedThing);
    }

    public function store(StoreProhibitedThingRequest $request)
    {
        $prohibitedThing = ProhibitedThing::create($request->all());

        return ProhibitedThingResource::make($prohibitedThing);
    }
}
