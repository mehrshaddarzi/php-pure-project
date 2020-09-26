<?php

// Use this namespace Route
use Steampixel\Route;

// Start Route List
Route::add('/', function () {
});

// Login
Route::add('/login', function () {
    var_dump(\App\User\Meta::update_user_meta(1, 'off', 30));
    exit;



    \App\Template::render('login', array(

    ));
});

// Run the router
Route::run('/');