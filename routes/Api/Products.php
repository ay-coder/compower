<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('products', 'APIProductsController@index')->name('products.index');
    Route::post('products-filter', 'APIProductsController@filterProducts')->name('products.filter');
    Route::post('products/create', 'APIProductsController@create')->name('products.create');
    Route::post('products/edit', 'APIProductsController@edit')->name('products.edit');
    Route::post('products/show', 'APIProductsController@show')->name('products.show');
    Route::post('products/delete', 'APIProductsController@delete')->name('products.delete');
});
?>