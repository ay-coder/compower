<?php

Route::group([
    "namespace"  => "TechNotes",
], function () {
    /*
     * Admin TechNotes Controller
     */

    // Route for Ajax DataTable
    Route::get("technotes/get", "AdminTechNotesController@getTableData")->name("technotes.get-list-data");

    Route::resource("technotes", "AdminTechNotesController");
});