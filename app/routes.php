<?php

Route::any('/', ['as' => 'root', 'uses' => 'HomeController@index']);
Route::any('/zakoupeno', ['as' => 'zakoupeno', 'uses' => 'HomeController@uspesneZakoupeno']);

Route::get('/email/navstevnik', function () {
    return View::make('emails.navstevnik');
});

Route::get('/email/nahradnik', function () {
    return View::make('emails.nahradnik');
});