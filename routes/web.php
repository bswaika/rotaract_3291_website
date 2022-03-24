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

Route::get('/', 'PagesController@index');
Route::post('/', 'PagesController@storeMessage');

Route::get('/drr', 'PagesController@drr');
Route::post('/drr', 'PagesController@storeAppointment');

Route::get('/events', 'PagesController@events');
Route::get('/events/{id}', 'PagesController@event');

Route::get('/clubs', 'PagesController@clubs');
Route::get('/clubs/{id}', 'PagesController@club');

Route::get('/documents','PagesController@documents');

Route::get('/leaderboard','PagesController@leaderboard');

Route::get('/district','PagesController@district');

Route::get('/pujo', 'PujoController@showform');
Route::post('/pujo', 'PujoController@registerparticipant');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/clubs', 'Admin\AdminHomeController@listclub');
  Route::get('/clubs/create', 'Admin\AdminHomeController@createclub');
  Route::post('/clubs', 'Admin\AdminHomeController@storeclub');

  Route::get('/admins', 'Admin\AdminHomeController@listadmin');
  Route::get('/admins/create', 'Admin\AdminHomeController@createadmin');
  Route::post('/admins', 'Admin\AdminHomeController@storeadmin');

  Route::resource('/zones', 'Admin\AdminZoneController');
  
  Route::resource('/members', 'Admin\AdminMemberController');
  
  Route::resource('/events', 'Admin\AdminEventController');

  Route::get('/event/images', 'Admin\AdminEventImageController@listimage');
  Route::post('/event/images/{id}', 'Admin\AdminEventImageController@storeimage');
  Route::get('/event/images/{id}', 'Admin\AdminEventImageController@showimage');
  Route::get('/event/images/{id}/delete', 'Admin\AdminEventImageController@destroyimage');
  
  Route::resource('/event/blogs', 'Admin\AdminEventBlogController');

  Route::get('/event/approvals', 'Admin\AdminEventApprovalController@listapprovals');
  Route::post('/event/{id}/approve', 'Admin\AdminEventApprovalController@approve');
  Route::post('/event/{id}/unapprove', 'Admin\AdminEventApprovalController@unapprove');
  
  Route::get('/messages', 'Admin\AdminMessageController@listmessage');
  Route::get('/messages/{id}/reply', 'Admin\AdminMessageController@createreply');
  Route::post('/messages/{id}', 'Admin\AdminMessageController@reply');

  Route::get('/documents', 'Admin\AdminDocumentController@listdocument');
  Route::post('/documents', 'Admin\AdminDocumentController@storedocument');
  Route::delete('/documents/{id}', 'Admin\AdminDocumentController@destroydocument');

  Route::get('/appointments', 'Admin\AdminAppointmentController@listappointment');
  Route::get('/appointments/{id}/approve', 'Admin\AdminAppointmentController@showapproval');
  Route::post('/appointments/{id}/approve', 'Admin\AdminAppointmentController@approve');

  Route::get('/leaderboard', 'Admin\AdminLeaderBoardController@list');
  Route::post('/leaderboard/{id}', 'Admin\AdminLeaderBoardController@update');
  
  Route::get('/pujo', 'Admin\AdminPujoController@list');
  Route::post('/pujo/{id}/validate', 'Admin\AdminPujoController@validatereg');
  Route::get('/pujo/export', 'Admin\AdminPujoController@exportdata');
  
});

Route::group(['prefix'=>'club'], function(){
  Route::get('/profile', 'Club\ClubProfileController@editprofile');
  Route::post('/profile', 'Club\ClubProfileController@updateprofile');

  Route::get('/president', 'Club\ClubPresidentController@editpresident');
  Route::post('/president', 'Club\ClubPresidentController@updatepresident');

  Route::get('/secretary', 'Club\ClubSecretaryController@editsecretary');
  Route::post('/secretary', 'Club\ClubSecretaryController@updatesecretary');
  
  Route::resource('/members', 'Club\ClubMemberController');
  
  Route::resource('/events', 'Club\ClubEventController');

  Route::get('/event/images', 'Club\ClubEventImageController@listimage');
  Route::post('/event/images/{id}', 'Club\ClubEventImageController@storeimage');
  Route::get('/event/images/{id}', 'Club\ClubEventImageController@showimage');
  Route::get('/event/images/{id}/delete', 'Club\ClubEventImageController@destroyimage');
  
  Route::resource('/event/blogs', 'Club\ClubEventBlogController');
});