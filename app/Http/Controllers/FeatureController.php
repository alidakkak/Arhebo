<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Support\Facades\DB;

class FeatureController extends Controller
{
    public function index()
    {
        $feature = Feature::all();

        return FeatureResource::collection($feature);
    }

    public function store(StoreFeatureRequest $request)
    {
        DB::beginTransaction();
        try {
            $feature = Feature::create($request->all());
            if ($request->has('package_ids')) {
                $feature->packages()->sync($request->package_ids);
            }
            DB::commit();

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => FeatureResource::make($feature),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateFeatureRequest $request, $featureId)
    {
        try {
            $feature = Feature::find($featureId);
            if (! $feature) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $feature->update($request->all());
            $feature->packages()->sync($request->package_ids);

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => FeatureResource::make($feature),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($featureId)
    {
        $feature = Feature::find($featureId);
        if (! $feature) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return FeatureResource::make($feature);
    }

    public function delete($featureId)
    {
        try {
            $feature = Feature::find($featureId);
            if (! $feature) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $feature->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => FeatureResource::make($feature),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function switchFeature($featureId)
    {
        $feature = Feature::find($featureId);
        if (! $feature) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $feature->update([
            'is_active' => ! boolval($feature->is_active),
        ]);

        return response()->json(['message' => 'SuccessFully']);
    }
}
