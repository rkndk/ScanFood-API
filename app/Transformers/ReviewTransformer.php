<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Reviews;
use Carbon\Carbon;
use App\Transformers\UserTransformer;

class ReviewTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
		'user'
	];

	public function transform(Reviews $reviews)
	{
		setlocale(LC_TIME, 'Indonesia');
		Carbon::setLocale('id');

		$week_ago = Carbon::today('Asia/Jakarta')->subDays(7);
		$created_at = Carbon::createFromFormat('Y-m-d H:i:s', $reviews->created_at, 'Asia/Jakarta');

		if($created_at->gte($week_ago)){
			$created_at = $created_at->diffForHumans();
		}
		else{
			$created_at = $created_at->formatLocalized('%d %B %Y');
		}

		return [
			'id'			=> $reviews->id,
			'user_id'		=> $reviews->user_id,
			'partner_id'	=> $reviews->partner_id,
			'waiter_id'		=> $reviews->waiter_id,
			'content'		=> "".$reviews->content,
			'rating'		=> $reviews->rating,
			'created_at'	=> "".$created_at,
		];
	}

	public function includeUser(Reviews $reviews)
	{
		$user = $reviews->user;

		return $this->item($user, new UserTransformer);
	}
}