<?php

Route::group([
    "namespace"  => "Cart",
], function () {
    /*
     * Admin Cart Controller
     */

    // Route for Ajax DataTable
    Route::get("cart/get", "AdminCartController@getTableData")->name("cart.get-list-data");

    Route::resource("cart", "AdminCartController");
});