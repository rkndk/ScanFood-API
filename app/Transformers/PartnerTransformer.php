<?php

namespace App\Transformers;

use App\Partners;
use League\Fractal\TransformerAbstract;

class PartnerTransformer extends TransformerAbstract
{
	public function transform(Partners $partner)
	{
		$rating = floatval($partner->reviews()->avg('rating'));

		$photo = "";
		if($partner->photo != null && $partner->photo != ''){
			$photo = url('/') . "/public/images/partner/" . $partner->photo;
		}

		$cover ="";
		if($partner->cover != null && $partner->cover != ''){
			$cover = url('/') . "/public/images/partner/" . $partner->cover;
		}

		$open_time = "";
		if($partner->open_time != null && $partner->open_time != ''){
			$open_time = "" . date("g:i A", strtotime($partner->open_time));
		}

		$close_time = "";
		if($partner->close_time != null && $partner->close_time != ''){
			$close_time = "" . date("g:i A", strtotime($partner->close_time));
		}

		return [
			'id'			=> $partner->id,
			'name'			=> $partner->name,
			'email'			=> $partner->email,
			'address'		=> $partner->address,
			'phone'			=> $partner->phone,
			'desc'			=> $partner->desc,
			'latitude'		=> $partner->latitude,
			'longitude'		=> $partner->longitude,
			'open_time'		=> $open_time,
			'close_time'	=> $close_time,
			'photo'			=> $photo,
			'cover'			=> $cover,
			'rating'		=> $rating,
		];
	}
}