<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\Reviews;
use App\Favorites;
use App\Tables;
use App\Menus;
use App\Transactions;

class Partners extends Model
{
	//Partners table in database
	protected $guarded = [];
	protected $fillable = [
    	'name', 'address', 'phone', 'desc', 
    ];

	public function news()
	{
		return $this->hasMany('App\News', 'partner_id');
	}

	public function reviews()
	{
		return $this->hasMany('App\Reviews', 'partner_id');
	}

	public function favorites()
    {
        return $this->hasMany('App\Favorites', 'partner_id');
    }

    public function tables()
    {
        return $this->hasMany('App\Tables', 'partner_id');
    }

    public function menu()
    {
        return $this->hasMany('App\Menus', 'partner_id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transactions', 'partner_id');
    }

    public function waiters()
    {
        return $this->hasMany('App\Waiters', 'partner_id');
    }
}
