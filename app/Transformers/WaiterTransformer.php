<?php

namespace App\Transformers;

use App\Waiters;
use League\Fractal\TransformerAbstract;

class WaiterTransformer extends TransformerAbstract
{	
	public function transform(Waiters $waiters)
	{
		return [
			'id'			=> $waiters->id,
			'partner_id'	=> $waiters->partner_id,
			'name'			=> $waiters->name,
			'photo'			=> $waiters->photo,
		];
	}
}