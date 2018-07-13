<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::any('category', 'APICategoryController@index')->name('category.index');
    Route::post('category-filter', 'APICategoryController@filterCategories')->name('category.filter');
    Route::post('category/create', 'APICategoryController@create')->name('category.create');
    Route::post('category/edit', 'APICategoryController@edit')->name('category.edit');
    Route::post('category/show', 'APICategoryController@show')->name('category.show');
    Route::post('category/delete', 'APICategoryController@delete')->name('category.delete');
});
?>