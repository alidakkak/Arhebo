<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HistoryResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        {
            // تحويل كل عنصر في المجموعة إلى مصفوفة
            $data = $this->collection->map(function ($resource) use ($request) {
                return $resource->toArray($request);
            });

            // حساب المجموع الكلي لـ subtotal و total_with_tax
            $totalSubtotal = $data->sum('subtotal');
            $totalWithTax = $data->sum('total_with_tax');

            $totals = [
                'subtotal' => round($totalSubtotal, 2),
                'total_with_tax' => round($totalWithTax, 2),
            ];

            return [
                'data' => $data,
                'totals' => $totals,
            ];
        }
        }
}
