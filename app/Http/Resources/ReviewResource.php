<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
            'created_at'    => $this->created_at, 
            'updated_at'    => $this->updated_at, 
        ];
    }
}
