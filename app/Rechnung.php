<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rechnung extends Model
{
    protected $table = 'rechnungs';
    protected $fillable = [
    	'id', 'driver_id', 'priceNet', 'priveGross', 'date', 'paid', 'doc', 'company'
    ];

    public function company($company) {
    	$this->company = Company::find($company);
    }

    public function driver() {
    	$this->driver = Driver::find($this->driver_id);
    }
}
