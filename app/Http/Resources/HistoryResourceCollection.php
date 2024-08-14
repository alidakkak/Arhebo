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
        $totalSubtotal = $this->collection->sum(function ($resource) {
            return $resource->subtotal;
        });

        $totalWithTax = $this->collection->sum(function ($resource) {
            return $resource->total_with_tax;
        });

        $totals = [
            'subtotal' => round($totalSubtotal, 2),
            'total_with_tax' => round($totalWithTax, 2),
        ];

        return [
            'data' => $this->collection,
            'totals' => $totals,
        ];
    }
}
