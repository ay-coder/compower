<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('about-us', 'FrontendController@aboutUs')->name('about-us');
Route::get('contact-us', 'FrontendController@contactUs')->name('contact-us');
Route::get('tech-notes', 'FrontendController@techNotes')->name('tech-notes');
Route::get('compliance-testing', 'FrontendController@complianceTesting')->name('compliance-testing');
Route::get('careers', 'FrontendController@career')->name('careers');
Route::get('distributors', 'FrontendController@distributor')->name('distributors');
Route::get('repair-service-request', 'FrontendController@repairServiceRequest')->name('repair-service-request');
Route::get('call-service-request', 'FrontendController@callServiceRequest')->name('call-service-request');

Route::get('get-a-quote', 'FrontendController@getQuote')->name('get-a-quote');
Route::get('quote-request', 'FrontendController@quoteRequest')->name('quote-request');

Route::get('product-categories', 'FrontendController@showAllCategories')->name('show-all-category');

Route::get('category/{slug}', 'FrontendController@showCategoryProducts')->name('show-category-products');

Route::get('product/{slug}', 'FrontendController@showProduct')->name('show-product');

Route::get('blog', 'FrontendController@blog')->name('blog');

Route::get('my-orders', 'FrontendController@myOrders')->name('my-orders');
Route::get('my-wishlist', 'FrontendController@myWishlist')->name('my-wishlist');
Route::get('my-cart', 'FrontendController@myCart')->name('my-cart');

Route::post('remove-cart-product', 'FrontendController@removeCartProduct')->name('remove-cart-product');

Route::post('update-cart-product', 'FrontendController@updateCartProduct')->name('update-cart-product');


Route::post('add-cart-product', 'FrontendController@addProductToCart')->name('add-cart-product');





Route::get('macros', 'FrontendController@macros')->name('macros');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
