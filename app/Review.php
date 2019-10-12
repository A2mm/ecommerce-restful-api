<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['product_id' ,'customer', 'review', 'star'];

    public function Product()
    {
    	return $this->belongsTo(Product::class);
    }
}
