<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Partners;
use App\User;
use App\Waiters;

class Reviews extends Model
{
	protected $fillable = [
    	'user_id', 'partner_id', 'waiter_id', 'content', 'rating',
    ];

    public function partner()
    {
    	return $this->belongsTo('App\Partners', 'partner_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function waiter()
    {
        return $this->belongsTo('App\Waiters', 'waiter_id');
    }
}
