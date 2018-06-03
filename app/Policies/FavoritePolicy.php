<?php

namespace App\Policies;

use App\User;
use App\Favorites;
use Illuminate\Auth\Access\HandlesAuthorization;

class FavoritePolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Favorites $favorites)
    {
        return $user->ownsFavorite($favorites);
    }
}
