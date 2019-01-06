<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('distributors', 'APIDistributorsController@index')->name('distributors.index');
    Route::post('distributors/create', 'APIDistributorsController@create')->name('distributors.create');
    Route::post('distributors/edit', 'APIDistributorsController@edit')->name('distributors.edit');
    Route::post('distributors/show', 'APIDistributorsController@show')->name('distributors.show');
    Route::post('distributors/delete', 'APIDistributorsController@delete')->name('distributors.delete');
});
?>