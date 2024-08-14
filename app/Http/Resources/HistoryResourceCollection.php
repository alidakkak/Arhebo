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
        $totals = [
            'subtotal' => $this->collection->sum('subtotal'),
            'total_with_tax' => $this->collection->sum('total_with_tax'),
        ];

        return [
            'data' => $this->collection,
            'totals' => $totals,
        ];
    }
}
