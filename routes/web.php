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
    return view('welcome');
});

Route::post('/q', function () {
    $detector = new \Jaybizzle\CrawlerDetect\CrawlerDetect;

    // Check the user agent of the current 'visitor'
	if ($detector->isCrawler(request()->get('q'))) {
		return response()->json([
		    'result' => true
		]);
	}

	return response()->json([
	    'result' => false
	]);
});
