<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutAppRequest;
use App\Http\Requests\UpdateAboutAppRequest;
use App\Http\Resources\AboutAppResource;
use App\Models\AboutApp;

class AboutAppController extends Controller
{
    public function index()
    {
        $about = AboutApp::all();

        return AboutAppResource::collection($about);
    }

    public function store(StoreAboutAppRequest $request)
    {
        try {
            $about = AboutApp::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => AboutAppResource::make($about),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateAboutAppRequest $request, $Id)
    {
        try {
            $about = AboutApp::find($Id);
            if (! $about) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $about->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => AboutAppResource::make($about),
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
        $about = AboutApp::find($Id);
        if (! $about) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return AboutAppResource::make($about);
    }

    public function delete($Id)
    {
        try {
            $about = AboutApp::find($Id);
            if (! $about) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $about->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => AboutAppResource::make($about),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
