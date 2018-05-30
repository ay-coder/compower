<?php

Route::group([
    "namespace"  => "Orders",
], function () {
    /*
     * Admin Orders Controller
     */

    // Route for Ajax DataTable
    Route::get("orders/get", "AdminOrdersController@getTableData")->name("orders.get-list-data");

    Route::resource("orders", "AdminOrdersController");
});