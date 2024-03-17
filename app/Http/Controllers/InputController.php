<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInputRequest;
use App\Http\Requests\UpdateInputRequest;
use App\Http\Resources\InputResource;
use App\Models\Input;

class InputController extends Controller
{
    public function index()
    {
        $inputs = Input::all();

        return InputResource::collection($inputs);
    }

    public function store(StoreInputRequest $request)
    {
        try {
            $inputs = Input::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => InputResource::make($inputs),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateInputRequest $request, $inputId)
    {
        try {
            $inputs = Input::find($inputId);
            if (! $inputs) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $inputs->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => InputResource::make($inputs),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($inputId)
    {
        try {
            $inputs = Input::find($inputId);
            if (! $inputs) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $inputs->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => InputResource::make($inputs),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
