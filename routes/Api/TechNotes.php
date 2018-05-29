<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('technotes', 'APITechNotesController@index')->name('technotes.index');
    Route::post('technotes/create', 'APITechNotesController@create')->name('technotes.create');
    Route::post('technotes/edit', 'APITechNotesController@edit')->name('technotes.edit');
    Route::post('technotes/show', 'APITechNotesController@show')->name('technotes.show');
    Route::post('technotes/delete', 'APITechNotesController@delete')->name('technotes.delete');
});
?>