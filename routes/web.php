<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login',[
        'title' => 'Login',
        'region'=> 'Semarang'
    ]);
});

Route::get('/login', function () {
    return view('Login',[
        'title' => 'Login',
        'region'=> 'Semarang'
    ]);
});



