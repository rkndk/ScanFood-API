<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Promotype;

class Promos extends Model
{
    protected $fillable = [
    	'promotype_id', 'promo_value', 'start_date', 'end_date',
    ];

    public function promotype()
    {
    	return $this->belongsTo('App\Promotype', 'promotype_id');
    }
}
