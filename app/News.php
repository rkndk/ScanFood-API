<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Partners;

class News extends Model
{
    protected $fillable = [
    	'partner_id', 'content',
    ];

    public function scopeLatestFirst($query)
    {
    	return $query->orderBy('created_at', 'DESC');
    }

    public function partner()
    {
    	return $this->belongsTo('App\Partners', 'partner_id');
    }
}
