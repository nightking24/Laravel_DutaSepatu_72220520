<?php

Route::group(['middleware' => ['guest']], function () {
    Route::get("/", "PageController@login")->name('login');
    Route::post("/login", "AuthController@ceklogin");
});

Route::group(['middleware' => ['auth']], function () {
Route::get("/user","PageController@formedituser");
Route::post("/updateuser", "PageController@updateuser");
Route::get("/logout", "AuthController@ceklogout");
Route::get("/home", "PageController@home");
Route::get("/sepatu", "PageController@sepatu");
Route::get("/sepatu/add-form", "PageController@formaddsepatu");
Route::get("/keranjang", "PageController@keranjang");
Route::get("/tentang", "PageController@tentang");
Route::post("/save", "PageController@savesepatu");
Route::get("/sepatu/edit-form/{id}", "PageController@formeditsepatu");
Route::put("/update/{id}", "PageController@updatesepatu");
Route::get("/delete/{id}", "PageController@deletesepatu");
});