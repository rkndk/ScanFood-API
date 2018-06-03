<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menus;

class Categories extends Model
{
    protected $fillable = [
    	'name', 'desc',
    ];

    public function menu()
    {
        return $this->hasMany('App\Menus', 'category_id');
    }
}
