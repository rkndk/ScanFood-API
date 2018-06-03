<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use User;
//use Partners;

class Favorites extends Model
{
	protected $fillable = [
    	'user_id', 'partner_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function partner()
    {
    	return $this->belongsTo('App\Partners', 'partner_id');
    }
}
