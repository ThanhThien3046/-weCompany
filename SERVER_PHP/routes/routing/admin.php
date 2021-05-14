<?php 
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {


    Route::get('/login','AdminController@login')->name('ADMIN_LOGIN')->middleware('throttle:10,1');
    Route::post('/login','AdminController@postLogin')->name('ADMIN_POST_LOGIN')->middleware('throttle:10,1');
    Route::get('/logout','AdminController@logout')->name('ADMIN_LOGOUT');

    Route::group(['prefix' => '/', 'middleware' => 'ADMIN_LOGGED'], function () {
        Route::get('/','AdminController@index')->name('ADMIN_DASHBOARD');

        // Route::get('/{id?}','AdminController@delete')->name('ADMIN_DASHBOARD_DELETE');
        Route::delete('/contact/{id?}','AdminController@delete')->name('ADMIN_DELETE_CONTACT');

        Route::get('/contact-detail/{id?}','Admin\ContactController@index')->name('ADMIN_CONTACT_DETAIL');
        
        Route::get('/option','Admin\OptionController@index')->name('ADMIN_STORE_OPTION');
        Route::post('/option','Admin\OptionController@store')->name('ADMIN_SAVE_OPTION');

        /// component post
        Route::get('/post/{id?}','Admin\PostController@index')->name('ADMIN_STORE_POST');
        Route::post('/post/{id?}','Admin\PostController@save')->name('ADMIN_SAVE_POST');
        Route::get('/posts','Admin\PostController@load')->name('ADMIN_LOAD_POST');
        // Route::put('/post/{id?}','Admin\PostController@update')->name('ADMIN_UPDATE_POST');
        Route::delete('/post/{id?}','Admin\PostController@delete')->name('ADMIN_DELETE_POST');


        ///component detail
        

        /// component branch
        Route::get('/branch/{id?}','Admin\BranchController@index')->name('ADMIN_STORE_BRANCH');
        Route::post('/branch/{id?}','Admin\BranchController@save')->name('ADMIN_SAVE_BRANCH');
        Route::get('/branchs','Admin\BranchController@load')->name('ADMIN_LOAD_BRANCH');
        Route::delete('/branch/{id?}','Admin\BranchController@delete')->name('ADMIN_DELETE_BRANCH');


        /// component branch
        Route::get('/recruit/{id?}','Admin\RecruitController@index')->name('ADMIN_STORE_RECRUIT');
        Route::post('/recruit/{id?}','Admin\RecruitController@save')->name('ADMIN_SAVE_RECRUIT');
        Route::get('/recruits','Admin\RecruitController@load')->name('ADMIN_LOAD_RECRUIT');
        Route::delete('/recruit/{id?}','Admin\RecruitController@delete')->name('ADMIN_DELETE_RECRUIT');


        ///run sitemap
        Route::get('/sitemap','Api\IndexController@index')->name('ADMIN_GET_SITEMAP');
        Route::get('/render-sitemap','Api\IndexController@save')->name('ADMIN_STORE_SITEMAP');

    });
});






