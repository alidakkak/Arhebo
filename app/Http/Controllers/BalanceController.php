<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBalanceRequest;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function store(StoreBalanceRequest $request)
    {
        try {
            $balance = Balance::create([
                'balance' => $request->balance,
                'history' => $request->balance,
                'user_id' => $request->user_id,
            ]);

            return response()->json([
                'message' => 'Created SuccessFully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
