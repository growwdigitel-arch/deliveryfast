<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


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
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Admin routes
require __DIR__.'/admin.php';

if (\Illuminate\Support\Facades\Schema::hasTable('translations') && check_module('localization')) {
    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ], function(){
            
        // home
        Route::get('/', 'HomeController@index')->name('home');

        // Footer Pages
        Route::get('/about-us', function() { return view('theme.simple_page', ['title' => 'About Us']); })->name('page.about');
        Route::get('/careers', function() { return view('theme.simple_page', ['title' => 'Careers']); })->name('page.careers');
        Route::get('/press', function() { return view('theme.simple_page', ['title' => 'Press']); })->name('page.press');
        Route::get('/news', function() { return view('theme.simple_page', ['title' => 'News']); })->name('page.news');
        Route::get('/help-center', function() { return view('theme.simple_page', ['title' => 'Help Center']); })->name('page.help');
        Route::get('/integration-api', function() { return view('theme.simple_page', ['title' => 'Integration API']); })->name('page.api');
        Route::get('/partners', function() { return view('theme.simple_page', ['title' => 'Partners']); })->name('page.partners');
        Route::get('/sitemap', function() { return view('theme.simple_page', ['title' => 'Sitemap']); })->name('page.sitemap');

        // Contact Submission
        Route::post('/contact-submit', function() { 
            return redirect()->route('contact.success'); 
        })->name('contact.submit')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
        
        Route::get('/contact-success', function() { 
            return view('theme.contact_success'); 
        })->name('contact.success');

        if(env('DEMO_MODE') == 'On'){
            Route::get('/theme', 'HomeController@index')->name('theme.demo.home');
        }

        Route::get('/link-storage', function () {
            Artisan::call('storage:link');
        });
    });
    Route::mediaLibrary();
}else{
    // home
    Route::get('/', 'HomeController@index')->name('home');

    if(env('DEMO_MODE') == 'On'){
        Route::get('/theme', 'HomeController@index')->name('theme.demo.home');
    }

    Route::get('/link-storage', function () {
        Artisan::call('storage:link');
    });
    Route::mediaLibrary();
}

