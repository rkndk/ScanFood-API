<?php

use Illuminate\Http\Request;


/**
 * Auth
 **/
//register
//param {nama, email, password}
Route::post('auth/register', 'AuthController@register');

//login
//param {email, password}
Route::post('auth/login', 'AuthController@login');

/**
 * Tanpa Login 
 **/
//ambil list berita
Route::get('news', 'NewsController@listNews');

//ambil list partner
Route::get('partners', 'PartnerController@partners');

/**
 * Harus Login 
 **/
//ambil list semua partner yang telah difavorit
Route::get('favorites', 'FavoriteController@listFavorite')->middleware('auth:api');

//favorit/unfavorit suatu partner
//param {partner_id}
Route::post('favorite', 'FavoriteController@favorite')->middleware('auth:api');

//ambil status favorit suatu partner
//param {partner_id}
Route::get('favorite/{partner_id}', 'FavoriteController@status')->middleware('auth:api');

//ambil informasi setelah scan qrcode meja
//param {qrcode}
Route::get('scan/{qrcode}', 'PartnerController@scan')->middleware('auth:api');

//ambil list menu suatu partner
//param {partner_id}
Route::get('menu/{partner_id}', 'MenuController@listMenu')->middleware('auth:api');

//ambil list review suatu partner
//param {partner_id}
Route::get('review/{partner_id}', 'ReviewController@listReview')->middleware('auth:api');

//buat review suatu partner
//param {partner_id, waiter_id, content, rating}
Route::post('review', 'ReviewController@add')->middleware('auth:api');

//buat order suatu partner
//param {table_id, items:[{menu_id, quantity, desc}]}
Route::post('order', 'TransactionController@order')->middleware('auth:api');

//ambil list order suatu partner
//param {transaction_id}
Route::get('order/{transaction_id}', 'TransactionController@listOrder')->middleware('auth:api');

//ubah finished status dan isi harga total
//param {transaction_id}
Route::post('payorder/{transaction_id}', 'TransactionController@pay')->middleware('auth:api');