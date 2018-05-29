<?php

Route::group([
    "namespace"  => "Blogs",
], function () {
    /*
     * Admin Blogs Controller
     */

    // Route for Ajax DataTable
    Route::get("blogs/get", "AdminBlogsController@getTableData")->name("blogs.get-list-data");

    Route::resource("blogs", "AdminBlogsController");
});