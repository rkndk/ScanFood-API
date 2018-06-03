<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Partners;
use App\Transactions;

class Tables extends Model
{
    protected $fillable = [
    	'partner_id', 'number', 'qrcode', 'available',
    ];

    public function partner()
    {
    	return $this->belongsTo('App\Partners', 'partner_id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transactions', 'table_id');
    }
}
