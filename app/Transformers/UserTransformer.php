<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		$photo = "";
		if($user->photo != null && $user->photo != ''){
			$photo = "http://scanfood.rkndika.com/public/images/user/" . $user->photo;
		}

		return [
			'id'			=> $user->id,
			'name'			=> $user->name,
			'email'			=> $user->email,
			'address'		=> "".$user->address,
			'date_of_birth'	=> "".$user->date_of_birth,
			'photo'			=> "".$photo,
			'registered'	=> $user->created_at->diffForHumans(),
		];
	}
}