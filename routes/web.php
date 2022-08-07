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

// Route for front
Route::get('/', 'HomeController@index')->name('home');

//Route for front views increment
Route::post('update-views', 'HomeController@updateViews')->name('update.views');


Route::prefix('/admin')->namespace('Admin')->as('admin.')->group(function(){
    // return 'dfds';
    //all the admin route we are going to add here :-
    Route::match(['get','post'],'/','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('settings','AdminController@settings');
        Route::get('logout','AdminController@logout');
        Route::post('check-current-pwd','AdminController@chkCurrentPassword');
        Route::post('update-current-pwd','AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

        // banner 
        Route::get('banner', 'BannerController@Banner')->name('banner');
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannerController@addEditBanner')->name('add.edit.banner');
        Route::get('delete-banner-image/{id?}', 'BannerController@deleteBannerImage')->name('delete.banner.image');
        Route::get('delete-banner/{id?}', 'BannerController@deleteBanner')->name('delete.banner');

        // uploadvideo 
        Route::get('upload-video', 'UploadvideoController@Uploadvideo')->name('uploadvideo');
        Route::match(['get', 'post'], 'add-edit-upload-video/{id?}', 'UploadvideoController@addEditUploadvideo')->name('add.edit.uploadvideo');
        Route::get('delete-video/{id?}', 'UploadvideoController@Deletevideo')->name('delete.video');
        Route::get('delete-uploadvideo/{id?}', 'UploadvideoController@deleteUploadvideo')->name('delete.uploadvideo');

        
        // playlist 
        Route::get('playlist', 'PlaylistController@Playlist')->name('playlist');
        Route::match(['get', 'post'], 'add-edit-playlist/{id?}', 'PlaylistController@addEditPlaylist')->name('add.edit.playlist');
        Route::get('delete-playlist/{id?}', 'PlaylistController@deletePlaylist')->name('delete.playlist');

        // teamslider 
        Route::get('teamslider', 'TeamsliderController@Teamslider')->name('teamslider');
        Route::match(['get', 'post'], 'add-edit-teamslider/{id?}', 'TeamsliderController@addEditTeamslider')->name('add.edit.teamslider');
        Route::get('delete-teamslider/{id?}', 'TeamsliderController@deleteTeamslider')->name('delete.teamslider');

        // team 
        Route::get('team', 'TeamController@Team')->name('team');
        Route::match(['get', 'post'], 'add-edit-team/{id?}', 'TeamController@addEditTeam')->name('add.edit.team');
        Route::get('delete-team/{id?}', 'TeamController@deleteTeam')->name('delete.team');

        // pbanner 
        Route::get('playlist-banner', 'PbannerController@Pbanner')->name('pbanner');
        Route::match(['get', 'post'], 'add-edit-playlist-banner/{id?}', 'PbannerController@addEditPbanner')->name('add.edit.pbanner');
        Route::get('delete-playlist-banner/{id?}', 'PbannerController@deletePbanner')->name('delete.pbanner');

        Route::get('get-daily-visit-count', 'ChartsController@ajaxReport')->name('ajax.report');
        
    });
});


