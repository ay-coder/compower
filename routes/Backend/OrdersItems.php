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

    Route::post("order-items/update-shipping-date", "AdminOrdersItemsController@updateShippingDate")->name("ordersitems.update-shipping-date");
});