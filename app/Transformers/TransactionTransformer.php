<?php

namespace App\Transformers;

use Carbon\Carbon;
use App\Transactions;
use League\Fractal\TransformerAbstract;
use App\Transformers\TransactionItemTransformer;

class TransactionTransformer extends TransformerAbstract
{	
	protected $availableIncludes = [
		'items'
	];

	public function transform(Transactions $transactions)
	{
		setlocale(LC_TIME, 'Indonesia');
		Carbon::setLocale('id');

		$created_at = Carbon::createFromFormat('Y-m-d H:i:s', $transactions->created_at, 'Asia/Jakarta');

		return [
			'id'			=> $transactions->id,
			'user_id'		=> $transactions->user_id,
			'partner_id'	=> $transactions->partner_id,
			'waiter_id'		=> $transactions->waiter_id,
			'table_id'		=> $transactions->table_id,
			'finished'		=> $transactions->finished ? true : false,
			'total_price'	=> $transactions->total_price,
			'date'			=> "".$created_at->formatLocalized('%d %B %Y %H:%M:%S'),
		];
	}

	public function includeItems(Transactions $transactions)
	{
		$items = $transactions->items;

		return $this->collection($items, new TransactionItemTransformer);
	}
}