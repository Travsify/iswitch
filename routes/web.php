<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/god-mode', function () {
    if (request('key') !== 'iswitch_elite') {
        return redirect('/');
    }
    return view('admin.war_room');
});
