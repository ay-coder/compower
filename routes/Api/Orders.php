<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('orders', 'APIOrdersController@index')->name('orders.index');
    Route::post('orders/create', 'APIOrdersController@create')->name('orders.create');
    Route::post('orders/edit', 'APIOrdersController@edit')->name('orders.edit');
    Route::post('orders/show', 'APIOrdersController@show')->name('orders.show');
    Route::post('orders/delete', 'APIOrdersController@delete')->name('orders.delete');
});
?>