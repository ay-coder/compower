<?php

Route::group([
    "namespace"  => "DistributorCountries",
], function () {
    /*
     * Admin DistributorCountries Controller
     */

    // Route for Ajax DataTable
    Route::get("distributorcountries/get", "AdminDistributorCountriesController@getTableData")->name("distributorcountries.get-list-data");

    Route::resource("distributorcountries", "AdminDistributorCountriesController");
});