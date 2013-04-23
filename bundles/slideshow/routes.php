<?php

use Laravel\Redirect;
use Laravel\View;

Route::filter('auth', function () {
    if (Auth::guest()) {
        return Redirect::to_action('slideshow::home.login');
    }
});

Route::group(array('before' => 'auth'), function() {
    Route::get('(:bundle)/home/setup', 'slideshow::home@setup');
    Route::post('(:bundle)/home/setup', 'slideshow::home@setup_post');
    Route::get('(:bundle)/home', 'slideshow::home@index');
});

// custom routes
Route::controller(array('slideshow::home'));