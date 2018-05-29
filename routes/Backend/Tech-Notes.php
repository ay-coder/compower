<?php

Route::group([
    "namespace"  => "Tech-Notes",
], function () {
    /*
     * Admin Tech-Notes Controller
     */

    // Route for Ajax DataTable
    Route::get("tech-notes/get", "AdminTech-NotesController@getTableData")->name("tech-notes.get-list-data");

    Route::resource("tech-notes", "AdminTech-NotesController");
});