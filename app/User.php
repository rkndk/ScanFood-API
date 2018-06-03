<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Reviews;
use App\Favorites;
use App\Transactions;
use App\Partners;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token', 'address', 'photo', 'date_of_birth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviews()
    {
        return $this->hasMany('App\Reviews', 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorites', 'user_id');
    }

    public function ownsFavorite(Favorites $favorites)
    {
        return auth()->id() == $favorites->user->id;
    }

    public function isFavorite(Partners $partners)
    {
        $favorite = Favorites::where('user_id', auth()->id())->where('partner_id', $partners->id)->first();
        if ($favorite === null) {
            return false;
        }
        else{
            return true;
        }
    }

    public function transactions()
    {
        return $this->hasMany('App\Transactions', 'user_id');
    }
}
