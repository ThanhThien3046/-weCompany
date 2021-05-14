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

});