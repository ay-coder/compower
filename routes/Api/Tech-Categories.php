<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('tech-categories', 'APITech-CategoriesController@index')->name('tech-categories.index');
    Route::post('tech-categories/create', 'APITech-CategoriesController@create')->name('tech-categories.create');
    Route::post('tech-categories/edit', 'APITech-CategoriesController@edit')->name('tech-categories.edit');
    Route::post('tech-categories/show', 'APITech-CategoriesController@show')->name('tech-categories.show');
    Route::post('tech-categories/delete', 'APITech-CategoriesController@delete')->name('tech-categories.delete');
});
?>