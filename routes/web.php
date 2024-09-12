<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|
Route::get('/registration', function () {
    return view('registration');
})->name('registrationn');
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>'notLogin'], function(){

    Route::get('admin/login', function () {
        return view('back.auth.login');
    })->name('loginn');

    Route::post('admin/loginsert', 'App\Http\Controllers\Back\Auth\UserController@loginsert')->name('loginsertt');

    Route::get('admin/registr', function () {
        return view('back.auth.registr');
    })->name('registrr');

    Route::post('admin/reginsert', 'App\Http\Controllers\Back\Auth\UserController@reginsert')->name('reginsertt');

});


Route::group(['middleware'=>'isLogin'], function(){

    Route::get('admin/panel', 'App\Http\Controllers\Back\DashboardController@index')->name('adminDashboard');

    //Meqale's Routes
    Route::resource('admin/meqaleler', 'App\Http\Controllers\Back\ArticleController');
    Route::get('admin/silinenler', 'App\Http\Controllers\Back\ArticleController@trashed')->name('trashedArticle');
    Route::get('admin/passive/{id}', 'App\Http\Controllers\Back\ArticleController@passive')->name('passive');
    Route::get('admin/active/{id}', 'App\Http\Controllers\Back\ArticleController@active')->name('active');
    Route::get('admin/deletearticle/{id}', 'App\Http\Controllers\Back\ArticleController@delete')->name('deleteArticle');
    Route::get('admin/harddeletearticle/{id}', 'App\Http\Controllers\Back\ArticleController@hardDelete')->name('hardDeleteArticle');
    Route::get('admin/recoverarticle/{id}', 'App\Http\Controllers\Back\ArticleController@recover')->name('recoverArticle');
    //Category's Routes 
    Route::get('admin/categoriler', 'App\Http\Controllers\Back\CategoryController@index')->name('categoryIndex');
    Route::post('admin/categoriler/create', 'App\Http\Controllers\Back\CategoryController@create')->name('adminCategoryCreate');
    Route::get('admin/categoriler/passive/{id}', 'App\Http\Controllers\Back\CategoryController@passive')->name('catPassive');
    Route::get('admin/categoriler/active/{id}', 'App\Http\Controllers\Back\CategoryController@active')->name('catActive');

    Route::get('admin/categoriler/catdelete/{id}', 'App\Http\Controllers\Back\CategoryController@delete')->name('catDelete');
    Route::get('admin/categoriler/catdelete2/{id}', 'App\Http\Controllers\Back\CategoryController@delete2')->name('catDelete2');

    Route::get('admin/categoriler/edit/{id}', 'App\Http\Controllers\Back\CategoryController@edit')->name('catEdit');
    Route::post('admin/categoriler/update', 'App\Http\Controllers\Back\CategoryController@update')->name('catUpdate');
    //Page's Routes
    Route::get('admin/sehifeler', 'App\Http\Controllers\Back\PageController@index')->name('pageIndex');
    Route::get('admin/sehifeler/create', 'App\Http\Controllers\Back\PageController@create')->name('pageCreate');
    Route::post('admin/sehifeler/create', 'App\Http\Controllers\Back\PageController@post')->name('pageCreatePost');
    
    Route::get('admin/sehifeler/delete/{id}', 'App\Http\Controllers\Back\PageController@delete')->name('pagDelete');
    Route::get('admin/sehifeler/delete2/{id}', 'App\Http\Controllers\Back\PageController@delete2')->name('pagDelete2');

    Route::get('admin/sehifeler/edit/{id}', 'App\Http\Controllers\Back\PageController@edit')->name('pagEdit');
    Route::post('admin/sehifeler/update', 'App\Http\Controllers\Back\PageController@update')->name('pagUpdate');

    Route::get('admin/sehifeler/passive/{id}', 'App\Http\Controllers\Back\PageController@passive')->name('pagPassive');
    Route::get('admin/sehifeler/active/{id}', 'App\Http\Controllers\Back\PageController@active')->name('pagActive');
    //Confing's Routes
    Route::get('admin/ayarlar', 'App\Http\Controllers\Back\ConfingController@index')->name('confingIndex');
    Route::post('admin/ayarlar/update', 'App\Http\Controllers\Back\ConfingController@update')->name('confingUpdate');

    Route::get('/logout', 'App\Http\Controllers\Back\Auth\userController@logout')->name('logout');
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'App\Http\Controllers\Front\HomepageController@index')->name('homepagee');  //ana sehife ucun
Route::get('/kategori/{category}', 'App\Http\Controllers\Front\HomepageController@category')->name('kategoryy');  //yuxari sagdaki kategori cedveli ucun
Route::get('/elaqe', 'App\Http\Controllers\Front\HomepageController@contact')->name('contaCctt'); 
Route::post('/elaqe', 'App\Http\Controllers\Front\HomepageController@contactpost')->name('contactpostt'); //ferqli methodlar oldugu ucun(get,post),eyni url(elaqe) vere bilir
Route::get('/{category}/{slug}', 'App\Http\Controllers\Front\HomepageController@single')->name('single');  //ana sehifedeki postlara girmek ucun
Route::get('/{sehife}', 'App\Http\Controllers\Front\HomepageController@page')->name('pages');  // Haqqımızda, Karyera, Vizyonumuz, Misyamız ucundur

