<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNicknameRequest;
use App\Http\Requests\UpdateNicknameRequest;
use App\Http\Resources\NicknameResource;
use App\Models\Nickname;

class NicknameController extends Controller
{
    public function index()
    {
        $nickname = Nickname::all();

        return NicknameResource::collection($nickname);
    }

    public function store(StoreNicknameRequest $request)
    {
        try {
            $nickname = Nickname::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => NicknameResource::make($nickname),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateNicknameRequest $request, $nicknameId)
    {
        try {
            $nickname = Nickname::find($nicknameId);
            if (! $nickname) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $nickname->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => NicknameResource::make($nickname),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($nicknameId)
    {
        $nickname = Nickname::find($nicknameId);
        if (! $nickname) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return NicknameResource::make($nickname);
    }

    public function delete($nicknameId)
    {
        try {
            $nickname = Nickname::find($nicknameId);
            if (! $nickname) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $nickname->delete();

            return response([
                'message' => 'Deleted SuccessFully',
                'data' => NicknameResource::make($nickname),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
