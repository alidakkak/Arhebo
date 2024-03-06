<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProhibitedThingRequest;
use App\Http\Requests\UpdateProhibitedThingRequest;
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
        try {
            $prohibitedThing = ProhibitedThing::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => ProhibitedThingResource::make($prohibitedThing),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateProhibitedThingRequest $request, $prohibitedThingId)
    {
        try {
            $prohibitedThing = ProhibitedThing::find($prohibitedThingId);
            if (! $prohibitedThing) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $prohibitedThing->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => ProhibitedThingResource::make($prohibitedThing),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($prohibitedThingId)
    {
        try {
            $prohibitedThing = ProhibitedThing::find($prohibitedThingId);
            if (! $prohibitedThing) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $prohibitedThing->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => ProhibitedThingResource::make($prohibitedThing),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
