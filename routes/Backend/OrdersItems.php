<?php

Route::group([
    "namespace"  => "OrdersItems",
], function () {
    /*
     * Admin OrdersItems Controller
     */

    // Route for Ajax DataTable
    Route::get("ordersitems/get", "AdminOrdersItemsController@getTableData")->name("ordersitems.get-list-data");

    Route::resource("ordersitems", "AdminOrdersItemsController");
});