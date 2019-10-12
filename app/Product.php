<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'details', 'price', 'discount', 'stock']; 

    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }
}
