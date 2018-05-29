<?php
Route::group(['namespace' => 'Api'], function()
{
    Route::get('tech-notes', 'APITech-NotesController@index')->name('tech-notes.index');
    Route::post('tech-notes/create', 'APITech-NotesController@create')->name('tech-notes.create');
    Route::post('tech-notes/edit', 'APITech-NotesController@edit')->name('tech-notes.edit');
    Route::post('tech-notes/show', 'APITech-NotesController@show')->name('tech-notes.show');
    Route::post('tech-notes/delete', 'APITech-NotesController@delete')->name('tech-notes.delete');
});
?>