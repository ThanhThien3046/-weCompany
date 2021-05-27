<?php

use Illuminate\Support\Facades\DB;
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
Route::get('resizes/{size}/{type}/{imagePath?}', 'ImageController@resize')
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


Route::get('/','ClientController@index')->name('HOME_PAGE');

Route::get('/history/{branch_id}/{year}','ClientController@historyDetail')->name('HISTORY_PAGE');

Route::get('/recruit', function () {
    return view('client.recruit');
})->name("RECRUIT_PAGE");

// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::get('/history','ClientController@search')->name('SEARCH_PAGE');

Route::get('/post/{id?}','ClientController@postDetail')->name('POST_DETAIL_PAGE');

Route::get('/detail/{id?}','ClientController@detail')->name('DETAIL_PAGE');
// Route::get('/detail', function () {
//     return view('detail');
// })->name("DETAIL_PAGE");

Route::get('/detail2', function () {
    return view('client.detail');
})->name("DETAIL_PAGE2");

Route::get('/news', function () {
    return view('news');
})->name("NEWS_PAGE");

Route::get('/styles',function(){
    return view('styles');
})->name("STYLES");

Route::get('/weHomes','ClientController@branchs')->name('WEHOMES_PAGE');

Route::get('/about',function(){
    return view('client.about');
})->name("ABOUT");

// Route::get('/historydetail', function () {
//     return view('historydetail');
// })->name("HISTORYDETAIL");

Route::get('/commingsoon', function () {
    return view('commingsoon');
})->name("COMMINGSOON");



Route::get('/login', function () {
    return view('login');
})->name("LOGIN");

Route::get('/contact','ClientController@contact')->name('CONTACT_PAGE');
Route::post('/contact','ClientController@mailContact')->name('MAIL_CONTACT');


Route::get('/recruit','ClientController@recruit')->name('RECRUIT');

Route::get('/policy','ClientController@policyload')->name('POLICY');

Route::get('/security','ClientController@clientinfo')->name('CLIENT_INFO');

Route::get('/mynumber','ClientController@mynumber')->name('MYNUMBER');

Route::get('/compliance','ClientController@compliance')->name('COMPLIANCE');

include_once("routing/admin.php");
include_once("routing/client.php");
