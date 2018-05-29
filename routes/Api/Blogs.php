<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('blogs', 'APIBlogsController@index')->name('blogs.index');
    Route::post('blogs/create', 'APIBlogsController@create')->name('blogs.create');
    Route::post('blogs/edit', 'APIBlogsController@edit')->name('blogs.edit');
    Route::post('blogs/show', 'APIBlogsController@show')->name('blogs.show');
    Route::post('blogs/delete', 'APIBlogsController@delete')->name('blogs.delete');
});
?>