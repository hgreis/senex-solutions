<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';
    protected $fillable = [
    	'startDatum', 'startName', 'startStrasse', 'startOrt', 'startLand', 'startBemerkung', 'zielDatum', 'zielName', 'zielStrasse', 'zielOrt', 'zielLand', 'zielBemerkung', 'preisFahrer', 'preisKunde', 'fahrer', 'kunde', 'kundeBemerkung', 'bill_id', 
    ];
    /**
    * get the driver for this mission
    */
    public function driver() {
    	return $this->belongsTo('App\Driver', 'fahrer', 'name');
    }
    /**
    * get a customer for this mission
    */
    public function customer() {
    	return $this->belongsTo('App\Customer', 'kunde', 'name');
    }
    public function bill_id() {
        return $this->belongsTo('App\Mission', 'bill_id');
    }

    // public function setStartDatumAtribute($date) {
    //     $this->attributes['startDatum'] = Carbon::createFromFormat('Y-m-d', $date);
    // }
}
