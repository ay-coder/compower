<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('ordersitems', 'APIOrdersItemsController@index')->name('ordersitems.index');
    Route::post('ordersitems/create', 'APIOrdersItemsController@create')->name('ordersitems.create');
    Route::post('ordersitems/edit', 'APIOrdersItemsController@edit')->name('ordersitems.edit');
    Route::post('ordersitems/show', 'APIOrdersItemsController@show')->name('ordersitems.show');
    Route::post('ordersitems/delete', 'APIOrdersItemsController@delete')->name('ordersitems.delete');
});
?>