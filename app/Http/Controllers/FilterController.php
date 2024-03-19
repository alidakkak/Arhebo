<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilterRequest;
use App\Http\Requests\UpdateFilterRequest;
use App\Http\Resources\FilterResource;
use App\Models\Filter;

class FilterController extends Controller
{
    public function index()
    {
        $filter = Filter::all();

        return FilterResource::collection($filter);
    }

    public function store(StoreFilterRequest $request)
    {
        try {
            $filter = Filter::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => FilterResource::make($filter),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateFilterRequest $request, $filterId)
    {
        try {
            $filter = Filter::find($filterId);
            if (! $filter) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $filter->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => FilterResource::make($filter),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($filterId)
    {
        try {
            $filter = Filter::find($filterId);
            if (! $filter) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $filter->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => FilterResource::make($filter),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getFilterByCategory($categoryId)
    {
        $filter = Filter::where('category_id', $categoryId)->get();

        return FilterResource::collection($filter);

    }
}
