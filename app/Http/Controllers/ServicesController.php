<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
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
        try {
            $service = Services::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => ServicesResource::make($service),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateServicesRequest $request, $serviceId) {
        try {
            $service = Services::find($serviceId);
            if (! $service) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $service->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => ServicesResource::make($service),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($serviceId)
    {
        try {
            $service = Services::find($serviceId);
            if (! $service) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $service->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => ServicesResource::make($service),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
