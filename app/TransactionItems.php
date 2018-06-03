<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transactions;
use App\Menus;

class TransactionItems extends Model
{
    protected $fillable = [
    	'transaction_id', 'menu_id', 'quantity', 'desc'
    ];

    public function transaction()
    {
    	return $this->belongsTo('App\Transactions', 'transaction_id');
    }

    public function menu()
    {
    	return $this->belongsTo('App\Menus', 'menu_id');
    }
}
