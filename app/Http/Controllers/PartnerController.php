<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Partners;
use App\Tables;
use App\Transformers\PartnerTransformer;
use App\Transformers\TableTransformer;
use Auth;
use \Spatie\Fractalistic\ArraySerializer;

class PartnerController extends Controller
{
    public function partners(Partners $partner)
    {
    	$partners = $partner->all();
    	
    	return fractal()
    		->collection($partners)
    		->transformWith(new PartnerTransformer)
            ->serializeWith(new ArraySerializer)
    		->toArray();
    }

    public function scan($qrcode)
    {
    	$table = Tables::where('qrcode', $qrcode)->first();
    	if ($table === null) {
		   	return response()->json([
    			'error' => 'QRCode Not Found',
    		], 404);
		}

		return fractal()
    		->item($table)
    		->transformWith(new TableTransformer)
    		->includePartner()
    		->addMeta([
    			'favorite_status' => Auth::user()->isFavorite($table->partner),
    		])
            ->serializeWith(new ArraySerializer)
    		->toArray();
    }
}
