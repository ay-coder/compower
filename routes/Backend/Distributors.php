<?php

Route::group([
    "namespace"  => "Distributors",
], function () {
    /*
     * Admin Distributors Controller
     */

    // Route for Ajax DataTable
    Route::get("distributors/get", "AdminDistributorsController@getTableData")->name("distributors.get-list-data");

    Route::resource("distributors", "AdminDistributorsController");
});