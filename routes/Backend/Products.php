<?php

Route::group([
    "namespace"  => "Products",
], function () {
    /*
     * Admin Products Controller
     */

    // Route for Ajax DataTable
    Route::get("products/get", "AdminProductsController@getTableData")->name("products.get-list-data");

    Route::resource("products", "AdminProductsController");
});