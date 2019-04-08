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
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
// Landing Page or our own website routes
Route::domain('tenant-a.dev.com')->group(function () {
    // .. your landing page routes

    Route::get('/create-tenant',function(){
        // Create Website
        $website = new Website;
        app(WebsiteRepository::class)->create($website);
        // Create Hostname
        $hostname = new Hostname;
        $hostname->fqdn = 'tenant-c.dev';
        $hostname = app(HostnameRepository::class)->create($hostname);
        // Attach website to host
        app(HostnameRepository::class)->attach($hostname, $website);
        dd('Created Tenant : ',$website->hostnames,$website->uuid);
    });
    // Route::group(['middleware' => 'auth'], function () {


    // });

});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('todos', 'TodoController');
    Route::view('passports','passport');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
