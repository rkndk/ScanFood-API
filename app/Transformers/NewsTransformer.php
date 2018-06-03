<?php

namespace App\Transformers;

use Carbon\Carbon;
use App\News;
use App\Transformers\PartnerTransformer;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
		'partner'
	];

	public function transform(News $news)
	{
		setlocale(LC_TIME, 'Indonesia');
		Carbon::setLocale('id');

		$week_ago = Carbon::today('Asia/Jakarta')->subDays(7);
		$created_at = Carbon::createFromFormat('Y-m-d H:i:s', $news->created_at, 'Asia/Jakarta');

		if($created_at->gte($week_ago)){
			$created_at = $created_at->diffForHumans();
		}
		else{
			$created_at = $created_at->formatLocalized('%d %B %Y');
		}


		return [
			'id'			=> $news->id,
			'partner_id'	=> $news->partner_id,
			'content'		=> $news->content,
			'created_at'	=> "".$created_at,
		];
	}

	public function includePartner(News $news)
	{
		$partner = $news->partner;

		return $this->item($partner, new PartnerTransformer);
	}
}