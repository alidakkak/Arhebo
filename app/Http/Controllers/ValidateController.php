<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValidateRequest;
use App\Http\Requests\UpdateValidateRequest;
use App\Http\Resources\ValidateResource;
use App\Models\Validate;

class ValidateController extends Controller
{
    public function index()
    {
        $validate = Validate::all();

        return ValidateResource::collection($validate);
    }

    public function store(StoreValidateRequest $request)
    {
        try {
            $validate = Validate::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => ValidateResource::make($validate),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateValidateRequest $request, $validateId)
    {
        try {
            $validate = Validate::find($validateId);
            if (! $validate) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $validate->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => ValidateResource::make($validate),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($validateId)
    {
        try {
            $validate = Validate::find($validateId);
            if (! $validate) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $validate->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => ValidateResource::make($validate),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
