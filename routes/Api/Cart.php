<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('cart', 'APICartController@index')->name('cart.index');
    Route::post('cart/add', 'APICartController@add')->name('cart.add');
    Route::post('cart/remove', 'APICartController@removeFromCart')->name('cart.remove');
    Route::post('cart/edit', 'APICartController@edit')->name('cart.edit');
    Route::post('cart/show', 'APICartController@show')->name('cart.show');
    Route::post('cart/delete', 'APICartController@delete')->name('cart.delete');
});
?>