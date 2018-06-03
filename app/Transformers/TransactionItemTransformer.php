<?php

namespace App\Transformers;

use App\TransactionItems;
use League\Fractal\TransformerAbstract;

class TransactionItemTransformer extends TransformerAbstract
{	
	public function transform(TransactionItems $transactionItems)
	{
		return [
			'id'				=> $transactionItems->id,
			'transaction_id'	=> $transactionItems->transaction_id,
			'menu_id'			=> $transactionItems->menu_id,

			'menu_name'			=> $transactionItems->menu->name,

			'quantity'			=> $transactionItems->quantity,
			'desc'				=> $transactionItems->desc,
			'created_at'		=> "".$transactionItems->created_at,
		];
	}
}