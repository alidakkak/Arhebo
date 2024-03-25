<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Http\Resources\OffersResource;
use App\Models\Offer;

class OffersController extends Controller
{
    public function index()
    {
        $offer = Offer::all();

        return OffersResource::collection($offer);
    }

    public function store(StoreOfferRequest $request)
    {
        try {
            $offer = Offer::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => OffersResource::make($offer),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateOfferRequest $request, $offerId)
    {
        try {
            $offer = Offer::find($offerId);
            if (! $offer) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $offer->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => OffersResource::make($offer),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($offerId)
    {
        $offer = Offer::find($offerId);
        if (! $offer) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return OffersResource::make($offer);
    }

    public function delete($offerId)
    {
        try {
            $offer = Offer::find($offerId);
            if (! $offer) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $offer->delete();

            return response([
                'message' => 'Deleted SuccessFully',
                'data' => OffersResource::make($offer),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
