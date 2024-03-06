<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrivacyPolicyRequest;
use App\Http\Requests\UpdatePrivacyPolicyRequest;
use App\Http\Resources\PrivacyPolicyResource;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $privacy = PrivacyPolicy::all();

        return PrivacyPolicyResource::collection($privacy);
    }

    public function store(StorePrivacyPolicyRequest $request)
    {
        try {
            $privacyPolicy = PrivacyPolicy::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => PrivacyPolicyResource::make($privacyPolicy),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function update(UpdatePrivacyPolicyRequest $request, $Id)
    {
        try {
            $privacyPolicy = PrivacyPolicy::find($Id);
            if (! $privacyPolicy) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $privacyPolicy->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => PrivacyPolicyResource::make($privacyPolicy),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function delete($Id)
    {
        try {
            $privacyPolicy = PrivacyPolicy::find($Id);
            if (! $privacyPolicy) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $privacyPolicy->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => PrivacyPolicyResource::make($privacyPolicy),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
