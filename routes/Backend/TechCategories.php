<?php

Route::group([
    "namespace"  => "TechCategories",
], function () {
    /*
     * Admin TechCategories Controller
     */

    // Route for Ajax DataTable
    Route::get("techcategories/get", "AdminTechCategoriesController@getTableData")->name("techcategories.get-list-data");

    Route::resource("techcategories", "AdminTechCategoriesController");
});