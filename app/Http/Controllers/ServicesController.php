<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServicesRequest;
use App\Http\Resources\ServicesResource;
use App\Models\Services;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();

        return ServicesResource::collection($services);
    }

    public function store(StoreServicesRequest $request)
    {
        $request->validated($request->all());
        $services = Services::create($request->all());

        return ServicesResource::make($services);
    }
}
