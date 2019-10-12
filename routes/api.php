<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* start products section */

Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::post('products', 'ProductController@store');
Route::put('products/{id}', 'ProductController@update');
Route::delete('products/{id}', 'ProductController@destroy');

/* end products section */


/* start product review section */

Route::get('/product/{product}/reviews', 'ProductController@product_reviews')->name('reviews.index');
Route::get('/product/{product}/review/{review}', 'ReviewController@view_specific_review')->name('review.view');
Route::post('/product/{product}/create/reviews', 'ReviewController@create_reviews');
Route::put('/product/update/review/{review}', 'ReviewController@update_specific_review');
Route::delete('/product/delete/review/{review}', 'ReviewController@delete_specific_review');

/* end product review section */
