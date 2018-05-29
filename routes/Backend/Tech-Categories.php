<?php

Route::group([
    "namespace"  => "Tech-Categories",
], function () {
    /*
     * Admin Tech-Categories Controller
     */

    // Route for Ajax DataTable
    Route::get("tech-categories/get", "AdminTech-CategoriesController@getTableData")->name("tech-categories.get-list-data");

    Route::resource("tech-categories", "AdminTech-CategoriesController");
});