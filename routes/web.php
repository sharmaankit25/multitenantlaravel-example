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

Route::get('/users',function(){
    return App\Models\User::all();
});





use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
// Landing Page or our own website routes
Route::domain('tenant-a.dev.com')->group(function () {
    // .. your landing page routes

    // Create Website
    Route::get('/create-website',function(){
        $website = new Website;
        app(WebsiteRepository::class)->create($website);
        dd($website->uuid);
    });
});



