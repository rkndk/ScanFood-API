<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Promos;

class PromoTransformer extends TransformerAbstract
{
	public function transform(Promos $promo)
	{
		return [
			'id'			=> $promo->id,
			'type_id'		=> $promo->promotype->id,
			'type_name'		=> $promo->promotype->name,
			'type_desc'		=> $promo->promotype->desc,
			'promo_value'	=> $promo->promo_value,
			'start_date'	=> "".$promo->start_date,
			'end_date'		=> "".$promo->end_date,
		];
	}
}