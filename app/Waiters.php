<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiters extends Model
{
    protected $fillable = [
    	'partner_id', 'name', 'photo',
    ];
}
