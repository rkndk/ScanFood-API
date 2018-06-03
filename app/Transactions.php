<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Partners;
use App\Tables;
use App\Waiters;
use App\TransactionItems;

class Transactions extends Model
{
    protected $fillable = [
    	'user_id', 'partner_id', 'waiter_id', 'table_id', 'finished', 'total_price', 'created_at',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function partner()
    {
    	return $this->belongsTo('App\Partners', 'partner_id');
    }

    public function tables()
    {
    	return $this->belongsTo('App\Tables', 'table_id');
    }

    public function waiter()
    {
        return $this->belongsTo('App\Waiters', 'waiter_id');
    }

    public function items()
    {
        return $this->hasMany('App\TransactionItems', 'transaction_id');
    }
}
