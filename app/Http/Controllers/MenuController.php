<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\Partners;
use App\Promos;
use App\Transformers\MenuTransformer;
use \Spatie\Fractalistic\ArraySerializer;

class MenuController extends Controller
{
    public function listMenu($partner_id)
    {
    	$partner = Partners::find($partner_id);
    	if ($partner === null) {
		   	return response()->json([
    			'error' => 'Partner Not Found',
    		], 404);
		}

        $menu = $partner->menu->where('available', 1);
    	
    	return fractal()
    		->collection($menu)
    		->transformWith(new MenuTransformer)
            ->serializeWith(new ArraySerializer)
    		->toArray();
    }
}
