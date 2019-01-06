<?php

Route::group([
    "namespace"  => "Banners",
], function () {
    /*
     * Admin Banners Controller
     */

    // Route for Ajax DataTable
    Route::get("banners/get", "AdminBannersController@getTableData")->name("banners.get-list-data");

    Route::resource("banners", "AdminBannersController");
});