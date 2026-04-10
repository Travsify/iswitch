<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/agent', function () {
    return view('auth.agent_login');
})->name('agent.portal');

Route::get('/agent/register', function () {
    return view('auth.agent_register');
})->name('agent.register');

// Partner signup = Agent signup (same page)
Route::get('/partner/register', function () {
    return view('auth.agent_register');
})->name('partner.register');

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/god-mode', function () {
    if (request('key') !== 'iswitch_elite') {
        return redirect('/admin/login');
    }
    return view('admin.war_room');
});
