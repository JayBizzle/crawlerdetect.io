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

Route::any('/', function () {
    $detector = new \Jaybizzle\CrawlerDetect\CrawlerDetect;

    $result = $detector->isCrawler(request()->get('q'));

	if (request()->wantsJson()) {
		return response()->json([
		    'result' => $result
		]);
	}

	return view('welcome', compact('result'));
});
