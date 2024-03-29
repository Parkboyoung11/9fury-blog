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

use App\Models\Media;

Route::get('/', 'HomeController@index')->name('blog');
Route::view('/about', 'frontend.about')->name('about');
//Route::view('/projects', 'frontend.projects.view')->name('projects');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::post('/contact', 'ContactController@contact')->name('contact')->middleware('throttle:5,1');
Route::get('post/{id}', 'PostController@show')->name('post.show');
Route::post('post/{id}/comment', 'PostController@comment')->name('post.comment')->middleware('throttle:10,1');
Route::get('unsubscribe/{code}', 'PostsController@show')->name('unsubscribe')->middleware('signed');

Route::group(['prefix' => 'projects'], function () {
    Route::group(['namespace' => 'Projects'], function () {
        Route::view('/', 'frontend.projects.view')->name('projects');
        Route::get('/lightnovel/{name}', 'LightNovelController@overview')->name('lightnovel.overview');
        Route::get('/manga/{name}', 'MangaController@overview')->name('manga.overview');
    });
});

Route::group(['prefix' => 'youtube'], function () {
    Route::group(['namespace' => 'Youtube'], function () {
        Route::view('/', 'frontend.youtube.view')->name('youtube');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function () {
        Route::get('/', 'DashBoardController')->name('admin.dashboard');
        Route::resource('categories', 'CategoriesController')->names('admin.categories');
        Route::resource('posts', 'PostsController')->names('admin.posts');
        Route::get('posts/{id}/publish', 'PostsController@changeState')->name('admin.posts.publish');
        Route::get('posts/{id}/unpublish', 'PostsController@changeState')->name('admin.posts.unpublish');

        Route::resource('media', 'MediaController')->names('admin.media');
        Route::get('media/{id}/download', 'MediaController@download')->name('admin.media.download');
        Route::get('upload/images', 'MediaController@getUploadImages')->name('admin.media.list');

        Route::get('settings', 'SettingsController@edit')->name('admin.settings');
        Route::put('settings', 'SettingsController@update')->name('admin.settings');

    });
});




