<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'installedVersion' => collect(json_decode(file_get_contents('../vendor/composer/installed.json')))->where('name', 'jaybizzle/crawler-detect')->first()->version,
    ]);
});

Route::get('/test', function () {
    dd(request()->ip());
});
