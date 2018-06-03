<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorites;
use App\Transformers\FavoriteTransformer;
use Auth;
use App\Partners;
use \Spatie\Fractalistic\ArraySerializer;

class FavoriteController extends Controller
{
    public function listFavorite(Favorites $favorite)
    {
    	$favorites = $favorite->where('user_id', Auth::user()->id)->get();
    	
    	return fractal()
    		->collection($favorites)
    		->transformWith(new FavoriteTransformer)
    		->includePartner()
            ->serializeWith(new ArraySerializer)
    		->toArray();
    }

    public function favorite(Request $request, Favorites $favorites)
    {
        //validasi partner benar-benar ada
    	$this->validate($request, [
    		'partner_id' => 'required|exists:partners,id',
    	]);

        $favorite = Auth::user()->favorites()->where('partner_id', $request->partner_id)->first();

        //favorite partner
        if($favorite === null){
            
            $favorite = $favorites->create([
                'user_id'       => Auth::user()->id,
                'partner_id'    => $request->partner_id,
            ]);

            $response = fractal()
                ->item($favorite)
                ->transformWith(new FavoriteTransformer)
                ->serializeWith(new ArraySerializer)
                ->toArray();

            $response_code = 201;
        }
        //unfavorite partner
        else{
            $favorite->delete();
            $response = [
                'message' => 'Unfavorited',
            ];
            $response_code = 200;
        }

    	return response()->json($response, $response_code);
    }

    public function status(Favorites $favorite, $partner_id)
    {
        $partner = Partners::find($partner_id);

        if ($partner === null) {
            return response()->json([
                'error' => 'Partner Not Found',
            ], 404);
        }

        $status = Auth::user()->isFavorite($partner);

        return response()->json([
            'status' => $status,
        ]);
    }
}
