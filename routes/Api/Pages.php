<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('pages', 'APIPagesController@index')->name('pages.index');
    Route::post('pages/create', 'APIPagesController@create')->name('pages.create');
    Route::post('pages/edit', 'APIPagesController@edit')->name('pages.edit');
    Route::post('pages/show', 'APIPagesController@show')->name('pages.show');
    Route::post('pages/delete', 'APIPagesController@delete')->name('pages.delete');
});
?>