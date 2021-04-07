<?php


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
Route::get('resizes/{size}/{type}/{imagePath}', 'ImageController@resize')
->where('imagePath', '(.*)')
->name('IMAGE_RESIZE');

Route::get('compress/{quality}/{imagePath}', 'ImageController@encode')
->where('imagePath', '(.*)')
->name('IMAGE_COMPRESS');

Route::get('resize-compress/{size}/{type}/{quality}/{ext}/{imagePath}', 'ImageController@resize_compress')
->where('imagePath', '(.*)')
->name('IMAGE_RESIZE_COMPRESS');



// Route::get('compress/{quality}/{imagePath}', 'ImageController@encode')
// ->where(['quality' => '[0-9]+', 'imagePath', '(.*)'])
// ->name('IMAGE_COMPRESS');

// Route::group(['middleware' => [ 'AUTH_CKFINDER']], function () {
    
    
// });


Route::get('/', function () {
    return view('client.home');
})->name("HOME_PAGE");

// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::get('/search', function () {
    return view('search');
})->name("SEARCH_PAGE");

Route::get('/detail', function () {
    return view('detail');
})->name("DETAIL_PAGE");

Route::get('/detail2', function () {
    return view('client.detail');
})->name("DETAIL_PAGE2");

Route::get('/news', function () {
    return view('news');
})->name("NEWS_PAGE");

Route::get('/styles',function(){
    return view('styles');
})->name("STYLES");

Route::get('/weHomes',function(){
    return view('client.weHomes');
})->name("WEHOMES_PAGE");

Route::get('/about',function(){
    return view('client.about');
})->name("ABOUT");


include_once("routing/admin.php");
include_once("routing/client.php");
