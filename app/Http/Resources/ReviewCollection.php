<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReviewCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_id'    => $this->product_id,
            'customer'      => $this->customer,
            'review'        => $this->review,
            'star'          => $this->star,
            'links'         => [
                'view' => route('review.view', [$this->product_id, $this->id]),
            ],
        ];
    }
}
