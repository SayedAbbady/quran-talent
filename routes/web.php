<?php

use App\Models\countries;
use Illuminate\Support\Facades\Route;

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

// auth route
Auth::routes();
// end auth route


// get data to user side
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/contact-us', 'HomeController@contactUs')->name('contact-us');

Route::get('/pricing', 'HomeController@userPlan')->name('userPlan');

Route::get('/book/{id?}', 'HomeController@book')->name('book');



Route::get('/programs', function() {
  $country = countries::all();
  return view('user.programs.our-courses',
  [
      "country"   => $country
  ]);

})->name('programs');

// End get data to user side


// Ajax forms controllers
Route::post('/store', 'HomeController@bookTrial')->name('trialbooking');
// End Ajax forms controllers