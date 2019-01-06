<?php

Route::group([
    "namespace"  => "Pages",
], function () {
    /*
     * Admin Pages Controller
     */

    // Route for Ajax DataTable
    Route::get("pages/get", "AdminPagesController@getTableData")->name("pages.get-list-data");

    Route::resource("pages", "AdminPagesController");
});