<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('techcategories', 'APITechCategoriesController@index')->name('techcategories.index');
    Route::post('techcategories/create', 'APITechCategoriesController@create')->name('techcategories.create');
    Route::post('techcategories/edit', 'APITechCategoriesController@edit')->name('techcategories.edit');
    Route::post('techcategories/show', 'APITechCategoriesController@show')->name('techcategories.show');
    Route::post('techcategories/delete', 'APITechCategoriesController@delete')->name('techcategories.delete');
});
?>