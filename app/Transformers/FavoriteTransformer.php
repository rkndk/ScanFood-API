<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Favorites;
use App\Transformers\PartnerTransformer;

class FavoriteTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
		'partner'
	];
	
	public function transform(Favorites $favorite)
	{
		return [
			'id'			=> $favorite->id,
			'user_id'		=> $favorite->user_id,
			'partner_id'	=> $favorite->partner_id,
		];
	}

	public function includePartner(Favorites $favorite)
	{
		$partner = $favorite->partner;

		return $this->item($partner, new PartnerTransformer);
	}
}