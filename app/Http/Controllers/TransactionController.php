<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use App\TransactionItems;
use Auth;
use App\Tables;
use App\Partners;
use Carbon\Carbon;
use App\Transformers\TransactionTransformer;
use \Spatie\Fractalistic\ArraySerializer;

class TransactionController extends Controller
{
    public function order(Request $request, Transactions $transactions, TransactionItems $items)
    {
        setlocale(LC_TIME, 'Indonesia');
        Carbon::setLocale('id');

        $this->validate($request, [
            'table_id'  => 'required|exists:tables,id',
            'items'		=> 'required',
        ]);


        $partner_id = Tables::find($request->table_id)->partner_id;
        $partner = Partners::find($partner_id);
        $waiters = $partner->waiters;

        //cek tersedia waiter
        if($waiters === null  || $waiters->count() == 0){
            return response()->json([
                'error' => 'Waiter Not Found',
            ], 404);
        }



        //cek masih ada transaksi yang belum selesai
        $transaction = $transactions->where('user_id', Auth::user()->id)
        							->where('table_id', $request->table_id)
        							->where('finished', false)
        							->first();

        //jika transaksi belum pernah dibuat
        if($transaction === null){
        	$transaction = $transactions->create([
	            'user_id'		=> Auth::user()->id,
	            'partner_id'    => Tables::find($request->table_id)->partner_id,
	            'table_id'     	=> $request->table_id,
	            'finished'      => false,
	        ]);

            //menentukan waiter yang menangani
            $transaction_today = Transactions::where('partner_id', $partner_id)->where('created_at', '>=', Carbon::today())->get()->count();

            $index_waiter = $transaction_today % $waiters->count();

            $transaction->waiter_id = $waiters[$index_waiter]->id;
            $transaction->save();

        }

        foreach ($request->items as $item) {
	    	$items->create([
	            'transaction_id'	=> $transaction->id,
	            'menu_id'    		=> $item['menu_id'],
	            'quantity'			=> $item['quantity'],
                'desc'              => $item['desc'],
	        ]);
	    }

	    $items = $transaction->items;

	    $response = fractal()
	            ->item($transaction)
	            ->transformWith(new TransactionTransformer)
	            ->includeItems()
                ->serializeWith(new ArraySerializer)
	            ->toArray();

	    return response()->json($response, 201);
    }

    public function listOrder(Transactions $transactions, $transaction_id)
    {
        $transaction = $transactions->find($transaction_id);

        //jika transaksi belum pernah dibuat
        if($transaction === null){
        	return response()->json([
    			'error' => 'Transaction Not Found',
    		], 404);
        }

	    $items = $transaction->items;

	    return fractal()
	            ->item($transaction)
	            ->transformWith(new TransactionTransformer)
	            ->includeItems()
                ->serializeWith(new ArraySerializer)
	            ->toArray();
    }

    public function pay(Transactions $transactions, $transaction_id)
    {
        $transaction = $transactions->find($transaction_id);

        //jika transaksi belum pernah dibuat
        if($transaction === null){
        	return response()->json([
    			'error' => 'Transaction Not Found',
    		], 404);
        }

        $total_price = 0;
        foreach ($transaction->items as $item) {
	    	$total_price += $item->menu->price * $item->quantity;
	    }

        $transaction->total_price = $total_price;
        $transaction->finished = true;
        $transaction->save();

	    $items = $transaction->items;

	    return fractal()
	            ->item($transaction)
	            ->transformWith(new TransactionTransformer)
	            ->includeItems()
                ->serializeWith(new ArraySerializer)
	            ->toArray();
    }
}
