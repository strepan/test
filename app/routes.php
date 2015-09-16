<?php

Route::any("/", [
    "as" => "home.index",
    "uses" => "HomeController@actionIndex"
]);

Route::any('tracking/{id}', [
    'uses' => 'HomeController@actionTracking'
]);

Route::any('send', [
    'uses' => 'HomeController@actionSend'
]);

Route::any('getEmails', [
    'uses' => 'HomeController@getEmails'
]);

Route::any('templates/{template}', function($template) {
    return View::make("templates.$template");
});

Route::any('pages/{partial}', function($page) {
    return View::make("pages.$page");
});