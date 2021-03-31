<?php 
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');

    //Route::any('/ckfinder/examples/{example?}', '\CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    //    ->name('ckfinder_examples');

    Route::get('/login','AdminController@login')->name('ADMIN_LOGIN')->middleware('throttle:10,1');
    Route::post('/login','AdminController@postLogin')->name('ADMIN_POST_LOGIN')->middleware('throttle:10,1');
    Route::get('/logout','AdminController@logout')->name('ADMIN_LOGOUT');

    Route::group(['prefix' => '/', 'middleware' => 'ADMIN_LOGGED'], function () {
        Route::get('/','AdminController@index')->name('ADMIN_DASHBOARD');
        
        Route::get('/option','Admin\OptionController@index')->name('ADMIN_STORE_OPTION');
        Route::post('/option','Admin\OptionController@store')->name('ADMIN_SAVE_OPTION');

        /// component theme
        Route::get('/theme/{id?}','Admin\ThemeController@index')->name('ADMIN_STORE_THEME');
        Route::post('/theme/{id?}','Admin\ThemeController@save')->name('ADMIN_SAVE_THEME');
        Route::get('/themes','Admin\ThemeController@load')->name('ADMIN_LOAD_THEME');
        Route::put('/theme/{id?}','Admin\ThemeController@update')->name('ADMIN_UPDATE_THEME');
        Route::delete('/theme/{id?}','Admin\ThemeController@delete')->name('ADMIN_DELETE_THEME');

        /// component tag theme
        Route::get('/tag-theme/{id?}','Admin\TagThemeController@index')->name('ADMIN_STORE_TAG_THEME');
        Route::post('/tag-theme/{id?}','Admin\TagThemeController@save')->name('ADMIN_SAVE_TAG_THEME');
        Route::get('/tag-themes','Admin\TagThemeController@load')->name('ADMIN_LOAD_TAG_THEME');
        Route::delete('/tag-theme/{id?}','Admin\TagThemeController@delete')->name('ADMIN_DELETE_TAG_THEME');

        /// component post
        Route::get('/post/{id?}','Admin\PostController@index')->name('ADMIN_STORE_POST');
        Route::post('/post/{id?}','Admin\PostController@save')->name('ADMIN_SAVE_POST');
        Route::get('/posts','Admin\PostController@load')->name('ADMIN_LOAD_POST');
        // Route::put('/post/{id?}','Admin\PostController@update')->name('ADMIN_UPDATE_POST');
        Route::delete('/post/{id?}','Admin\PostController@delete')->name('ADMIN_DELETE_POST');

        /// component tag
        Route::get('/tag/{id?}','Admin\TagController@index')->name('ADMIN_STORE_TAG');
        Route::post('/tag/{id?}','Admin\TagController@save')->name('ADMIN_SAVE_TAG');
        Route::get('/tags','Admin\TagController@load')->name('ADMIN_LOAD_TAG');
        Route::delete('/tag/{id?}','Admin\TagController@delete')->name('ADMIN_DELETE_TAG');

        /// component topic
        Route::get('/topic/{id?}','Admin\TopicController@index')->name('ADMIN_STORE_TOPIC');
        Route::post('/topic/{id?}','Admin\TopicController@save')->name('ADMIN_SAVE_TOPIC');
        Route::get('/topics','Admin\TopicController@load')->name('ADMIN_LOAD_TOPIC');
        Route::delete('/topic/{id?}','Admin\TopicController@delete')->name('ADMIN_DELETE_TOPIC');

        /// component tag theme
        Route::get('/tag-theme/{id?}','Admin\TagThemeController@index')->name('ADMIN_STORE_TAG_THEME');
        Route::post('/tag-theme/{id?}','Admin\TagThemeController@save')->name('ADMIN_SAVE_TAG_THEME');
        Route::get('/tags-theme','Admin\TagThemeController@load')->name('ADMIN_LOAD_TAG_THEME');
        Route::delete('/tag-theme/{id?}','Admin\TagThemeController@delete')->name('ADMIN_DELETE_TAG_THEME');

        /// component rating
        Route::get('/rating/{id?}','Admin\RatingController@index')->name('ADMIN_STORE_RATING');
        Route::post('/rating/{id?}','Admin\RatingController@save')->name('ADMIN_SAVE_RATING');
        Route::get('/ratings','Admin\RatingController@load')->name('ADMIN_LOAD_RATING');
        Route::delete('/rating/{id?}','Admin\RatingController@delete')->name('ADMIN_DELETE_RATING');

        /// component users
        Route::get('/user/{id?}','Admin\UserController@index')->name('ADMIN_STORE_USER');
        Route::post('/user/{id?}','Admin\UserController@save')->name('ADMIN_SAVE_USER');
        Route::get('/users','Admin\UserController@load')->name('ADMIN_LOAD_USER');
        Route::delete('/user/{id?}','Admin\UserController@delete')->name('ADMIN_DELETE_USER');

        Route::get('/slug/{slug?}','AdminController@slug')->name('ADMIN_GET_SLUG');

        ///run sitemap
        Route::get('/sitemap','Api\IndexController@index')->name('ADMIN_GET_SITEMAP');
        Route::get('/render-sitemap','Api\IndexController@save')->name('ADMIN_STORE_SITEMAP');

        ///router check request all
        Route::get('/request','Admin\RequestController@index')->name('ADMIN_GET_REQUEST');
        Route::get('/request/{id}','Admin\RequestController@detail')->name('ADMIN_SHOW_REQUEST');
        Route::delete('/request/{id?}','Admin\RequestController@delete')->name('ADMIN_DELETE_REQUEST');
    });
});






