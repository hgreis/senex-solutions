<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'credits';
    protected $fillable = [
		'date', 'priceNet', 'priceGross', 'credit_paid', 'company', 'number',
	];

	public function credit ()	{
		return $this->hasMany('App\Mission', 'credit', 'number');
	}

	public function getNumber()	{
		return 7777;
	}
}
