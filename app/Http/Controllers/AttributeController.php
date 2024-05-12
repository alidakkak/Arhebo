<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Http\Resources\AttributeResource;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attribute = Attribute::all();

        return AttributeResource::collection($attribute);
    }

    public function store(StoreAttributeRequest $request)
    {
        try {
            $attribute = Attribute::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => AttributeResource::make($attribute),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateAttributeRequest $request, $Id)
    {
        try {
            $attribute = Attribute::find($Id);
            if (! $attribute) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $attribute->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => AttributeResource::make($attribute),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($Id)
    {
        $attribute = Attribute::find($Id);
        if (! $attribute) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return AttributeResource::make($attribute);
    }

    public function delete($Id)
    {
        try {
            $attribute = Attribute::find($Id);
            if (! $attribute) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $attribute->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => AttributeResource::make($attribute),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
