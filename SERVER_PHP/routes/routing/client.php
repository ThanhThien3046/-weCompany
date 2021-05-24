<?php 
use Illuminate\Support\Facades\Route;

Route::get('/404', function(){
    echo 'không tìm thấy trang';
})->name('CLIENT_404');



Route::group(['prefix' => '/','middleware' => [ 'HTML_MINIFIER']], function () { ///'READ_CACHE',
    // Route::get('/','ClientController@index')->name('HOME_PAGE');

    // Route::get('/lien-he','ClientController@contact')->name('CONTACT_PAGE');
    // Route::post('/lien-he','ClientController@mailContact')->name('MAIL_CONTACT');

    Route::post('/advisory','ClientController@mailAdvisory')->name('MAIL_ADVISORY');

    Route::get('/gioi-thieu','ClientController@aboutus')->name('ABOUTUS_PAGE');

    Route::get('/khuyen-mai','ClientController@promotion')->name('PROMOTION_PAGE');


    Route::get('/tim-kiem', 'ClientController@searchPost')->name('SEARCH_POST');
    Route::get('/tim-kiem-giao-dien', 'ClientController@searchTheme')->name('SEARCH_THEME');

    Route::get('/giao-dien-chu-de/{slug}','ClientController@tagThemeDetail')->name('TAG_THEME_VIEW');
    Route::get('/giao-dien/{slug}','ClientController@topicDetail')->name('TOPIC_VIEW');

    Route::get('/tag/{slug}','ClientController@tagDetail')->name('TAG_VIEW');
    Route::get('/topic/{slug}','ClientController@topicDetail')->name('TOPIC_VIEW');

    Route::get('/PREVIEW','ClientController@tagDetail')->name('PREVIEW');
    Route::get('/2PREVIEW','ClientController@tagDetail')->name('PREVIEW2');

    Route::get('/{slug}','ClientController@postDetail')->name('POST_VIEW');
});