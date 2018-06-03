<?php

namespace App\Transformers;

use App\Tables;
use App\Transformers\PartnerTransformer;
use League\Fractal\TransformerAbstract;

class TableTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
		'partner'
	];
	
	public function transform(Tables $tables)
	{
		return [
			'id'			=> $tables->id,
			'partner_id'	=> $tables->partner_id,
			'number'		=> $tables->number,
			'qrcode'		=> $tables->qrcode,
			'available'		=> $tables->available,
		];
	}

	public function includePartner(Tables $tables)
	{
		$partner = $tables->partner;

		return $this->item($partner, new PartnerTransformer);
	}
}