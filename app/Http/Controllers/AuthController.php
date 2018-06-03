<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Auth;
use \Spatie\Fractalistic\ArraySerializer;

class AuthController extends Controller
{
    public function register(Request $request, User $user)
    {
    	$this->validate($request, [
    		'name'            => 'required',
    		'email'		      => 'required | email | unique:users',
            'password'        => 'required | min:6',
    		'address'         => 'required',
            'photo'           => 'required | mimes:jpeg,jpg,png',
    	]);

        $imageName = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('images/user/'), $imageName);

    	$user = $user->create([
    		'name'			=> $request->name,
    		'email'			=> $request->email,
    		'api_token'		=> bcrypt("".$request->email.$request->password),
            'password'      => bcrypt($request->password),
            'address'       => $request->address,
            'photo'         => $imageName,
    	]);

    	$response = fractal()
    		->item($user)
    		->transformWith(new UserTransformer)
    		->addMeta([
    			'token' => $user->api_token,
    		])
            ->serializeWith(new ArraySerializer)
    		->toArray();

    	return response()->json($response, 201);
    }

    public function login(Request $request, User $user)
    {
    	if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    		return response()->json(['error' => 'Your credential is wrong'], 401);
    	}

    	$user = $user->find(Auth::user()->id);

    	return fractal()
    		->item($user)
    		->transformWith(new UserTransformer)
    		->addMeta([
    			'token' => $user->api_token,
    		])
            ->serializeWith(new ArraySerializer)
    		->toArray();
    }
}
