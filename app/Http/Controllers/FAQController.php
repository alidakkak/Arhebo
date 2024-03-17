<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFAQRequest;
use App\Http\Requests\UpdateFAQRequest;
use App\Http\Resources\FAQResource;
use App\Models\FrequentlyAskedQuestion;

class FAQController extends Controller
{
    public function index()
    {
        $FAQ = FrequentlyAskedQuestion::all();

        return FAQResource::collection($FAQ);
    }

    public function store(StoreFAQRequest $request)
    {
        try {
            $FAQ = FrequentlyAskedQuestion::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => FAQResource::make($FAQ),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateFAQRequest $request, $Id)
    {
        try {
            $FAQ = FrequentlyAskedQuestion::find($Id);
            if (! $FAQ) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $FAQ->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => FAQResource::make($FAQ),
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
            $FAQ = FrequentlyAskedQuestion::find($Id);
            if (! $FAQ) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $FAQ->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => FAQResource::make($FAQ),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
