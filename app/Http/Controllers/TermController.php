<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use App\Http\Resources\TermResource;
use App\Models\Term;

class TermController extends Controller
{
    public function index()
    {
        $term = Term::all();

        return TermResource::collection($term);
    }

    public function store(StoreTermRequest $request)
    {
        try {
            $term = Term::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => TermResource::make($term),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateTermRequest $request, $termId)
    {
        try {
            $term = Term::find($termId);
            if (! $term) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $term->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => TermResource::make($term),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($termId)
    {
        $term = Term::find($termId);
        if (! $term) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return TermResource::make($term);
    }

    public function delete($termId)
    {
        try {
            $term = Term::find($termId);
            if (! $term) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $term->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => TermResource::make($term),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
