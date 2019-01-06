<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('banners', 'APIBannersController@index')->name('banners.index');
    Route::post('banners/create', 'APIBannersController@create')->name('banners.create');
    Route::post('banners/edit', 'APIBannersController@edit')->name('banners.edit');
    Route::post('banners/show', 'APIBannersController@show')->name('banners.show');
    Route::post('banners/delete', 'APIBannersController@delete')->name('banners.delete');
});
?>