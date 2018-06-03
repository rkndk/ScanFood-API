<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partners;
use App\Reviews;
use App\Transformers\ReviewTransformer;
use Auth;
use \Spatie\Fractalistic\ArraySerializer;

class ReviewController extends Controller
{
    public function listReview($partner_id)
    {
    	$partner = Partners::find($partner_id);
    	if ($partner === null) {
		   	return response()->json([
    			'error' => 'Partner Not Found',
    		], 404);
		}
    	
    	return fractal()
    		->collection($partner->reviews)
    		->transformWith(new ReviewTransformer)
    		->includeUser()
            ->serializeWith(new ArraySerializer)
    		->toArray();
    }

    public function add(Request $request, Reviews $reviews)
    {
        $this->validate($request, [
            'partner_id'    => 'required|exists:partners,id',
            'waiter_id'     => 'required|exists:waiters,id',
            'content'       => 'required',
            'rating'        => 'required',
        ]);

        $review = $reviews->create([
            'user_id'       => Auth::user()->id,
            'partner_id'    => $request->partner_id,
            'waiter_id'     => $request->waiter_id,
            'content'       => $request->content,
            'rating'        => $request->rating,
        ]);

        $response = fractal()
                ->item($review)
                ->transformWith(new ReviewTransformer)
                ->serializeWith(new ArraySerializer)
                ->toArray();

        return response()->json($response, 201);
    }
}
