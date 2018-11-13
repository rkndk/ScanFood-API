<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Menus;
use App\Promos;
use App\Transformers\PromoTransformer;
use \Spatie\Fractalistic\ArraySerializer;

class MenuTransformer extends TransformerAbstract
{
	
	public function transform(Menus $menus)
	{
		$promo_price = null;
		$promo_desc = "";
		$promo_time = "";

		$now = date('Y-m-d H:i:s');
		$promo = Promos::where('id', $menus->promo_id)->where('start_date', '<=', $now)->where('end_date', '>=', $now)->first();

		if($promo != null){
			/*$promo = fractal()
	    		->item($promo)
	    		->transformWith(new PromoTransformer)
	    		->serializeWith(new ArraySerializer)
	    		->toArray();*/

	    	switch ($promo->promotype->id) {
	    		case 1:
	    			//promo berdasarkan discount persen
	    			$promo_price = $menus->price - ($promo->promo_value / 100 * $menus->price);
	    			$promo_desc = "Discount " . $promo->promo_value . "%";
	    			$promo_time = "Promo sampai " . date('g:i A d/m/Y', strtotime($promo->end_date));
	    			break;

	    		case 2:
	    			//promo berdasarkan discount harga
	    			$promo_price = $menus->price - $promo->promo_value;
	    			$promo_desc = "Discount Rp. " . number_format($promo->promo_value);
	    			$promo_time = "Promo sampai " . date('g:i A d/m/Y', strtotime($promo->end_date));
	    			break;
	    	}
		}


		$menu_path = url('/') . "/public/images/menu/";
		$photo1 = "";
		$photo2 = "";
		$photo3 = "";
		if($menus->photo1 != null && $menus->photo1 != ''){
			$photo1 = $menu_path . $menus->photo1;
		}
		if($menus->photo2 != null && $menus->photo2 != ''){
			$photo2 = $menu_path . $menus->photo2;
		}
		if($menus->photo3 != null && $menus->photo3 != ''){
			$photo3 = $menu_path . $menus->photo3;
		}

		return [
			'id'			=> $menus->id,
			'partner_id'	=> $menus->partner_id,
			'cat_id'		=> $menus->category->id,
			'cat_name'		=> $menus->category->name,
			'cat_desc'		=> $menus->category->desc,
			'name'			=> $menus->name,
			'price'			=> $menus->price,
			'promo_price'	=> $promo_price,
			'promo_desc'	=> $promo_desc,
			'promo_time'	=> $promo_time,
			'photo1'		=> $photo1,
			'photo2'		=> $photo2,
			'photo3'		=> $photo3,
		];
	}
}