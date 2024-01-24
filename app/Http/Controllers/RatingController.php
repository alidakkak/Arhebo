<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Http\Resources\RatingResource;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $rating = Rating::all();

        return RatingResource::collection($rating);
    }

    public function store(StoreRatingRequest $request)
    {
        $user = auth()->user();
        $request->validated($request->all());
        $existingRating = Rating::where('user_id', $user->id)->first();
        if ($existingRating) {
            $existingRating->update($request->all());

            return RatingResource::make($existingRating);
        } else {
            $rating = Rating::create(array_merge(
                $request->all(),
                ['user_id' => $user->id]
            ));

            return RatingResource::make($rating);
        }
    }

    public function delete(Rating $rating)
    {
        $rating->delete();

        return response([
            'message' => 'Deleted SuccessFully',
            RatingResource::make($rating),
        ]);
    }
}
