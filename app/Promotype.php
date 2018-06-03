<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Promos;

class Promotype extends Model
{
	protected $table = 'promotype';
    protected $fillable = [
    	'name', 'desc',
    ];

    public function promo()
    {
        return $this->hasMany('App\Promos', 'promotype_id');
    }
}
