<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'listings';
    protected $fillable = [
    	'company', 'customer', 'date', 'priceNet', 'priceGross', 
    ];
}
