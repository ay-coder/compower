<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('distributorcountries', 'APIDistributorCountriesController@index')->name('distributorcountries.index');
    Route::post('distributorcountries/create', 'APIDistributorCountriesController@create')->name('distributorcountries.create');
    Route::post('distributorcountries/edit', 'APIDistributorCountriesController@edit')->name('distributorcountries.edit');
    Route::post('distributorcountries/show', 'APIDistributorCountriesController@show')->name('distributorcountries.show');
    Route::post('distributorcountries/delete', 'APIDistributorCountriesController@delete')->name('distributorcountries.delete');
});
?>