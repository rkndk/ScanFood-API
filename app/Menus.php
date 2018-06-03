<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Partners;
use App\Categories;
use App\Promos;

class Menus extends Model
{
	protected $table = 'menus';
    protected $fillable = [
    	'partner_id', 'category_id', 'promo_id', 'name', 'price', 'photo1', 'photo2', 'photo3', 'available',
    ];

    public function partner()
    {
    	return $this->belongsTo('App\Partners', 'partner_id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Categories', 'category_id');
    }

    public function promo()
    {
    	return $this->belongsTo('App\Promos', 'promo_id');
    }
}
