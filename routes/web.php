<?php

Route::get('/', 'LoginController@home')->name('home');
Route::get('/candidate/registration','UserRegistrationController@candidateRegistration')->name('candidateRegistration');

Route::get('/voter/registration','UserRegistrationController@voterRegistration')->name('voterRegistration');

//admin
Route::get('/admin/registration','AdminController@adminRegistration')->name('adminRegistration');
Route::get('/admin/login','AdminController@adminLogin')->name('adminLogin');
Route::get('/admin','AdminController@adminLogin')->name('adminLogin');
Route::get('/admin/registeredCandidate','AdminController@registeredCandidate')->name('registeredCandidate');
Route::get('/admin/filteredCandidate','AdminController@filteredCandidate')->name('filteredCandidate');
//applied voter
Route::get('/admin/appliedVoter','AdminController@appliedVoter')->name('appliedVoter');
Route::post('/admin/verifyVoter','AdminController@verifyVoter')->name('verifyVoter');
Route::get('/admin/disapproveVoter','AdminController@disapproveVoter')->name('disapproveVoter');
Route::post('/admin/unverifyVoter','AdminController@unverifyVoter')->name('unverifyVoter');

Route::get('/admin/createParty','AdminController@createParty')->name('createParty');
Route::get('/admin/createVoteEvent','AdminController@createVoteEvent')->name('createVoteEvent');

Route::post('/candidate/store', 'UserRegistrationController@storeCandidate')->name('storeCandidate');
Route::post('/voter/store', 'UserRegistrationController@storeVoter')->name('storeVoter');
Route::post('/admin/store', 'AdminController@storeAdmin')->name('storeAdmin');
Route::post('/admin/storeParty', 'AdminController@storeParty')->name('storeParty');
Route::post('/admin/login', 'AdminController@adminLoginPost')->name('adminLoginPost');
Route::post('/admin/candidate/approve', 'AdminController@approveCandidate')->name('approveCandidate');
Route::post('/admin/candidate/disapprove', 'AdminController@disapproveCandidate')->name('disapproveCandidate');
Route::post('/admin/storeVoteEvent', 'AdminController@storeVoteEvent')->name('storeVoteEvent');



Route::get('/login', 'LoginController@login')->name('login');
Route::post('/loginPost', 'LoginController@loginPost')->name('loginPost');


Route::get('/admin/dashboard', 'AdminController@adminDashboard')->name('adminDashboard');


//candidate
Route::group(['middleware'=>'checkCandidateCredential'], function() {
	Route::get('candidate/createEvent','DashboardController@createEvent')->name('createEvent');
	Route::get('candidate/eventList','DashboardController@eventList')->name('eventList');
	Route::post('/candidate/storeEvent', 'DashboardController@storeEvent')->name('storeEvent');
	Route::get('/candidate/candidateProfile','DashboardController@candidateProfile')->name('candidateProfile');
});

//home
Route::get('/event','HomeController@event')->name('event');
Route::get('/eventDetails','HomeController@eventDetails')->name('eventDetails');
Route::get('/eventList','DashboardController@eventList')->name('eventList');
Route::get('result','HomeController@result')->name('result');

// voter dashboard
Route::group(['middleware'=>'checkCredential'], function() {
	Route::get('/candidate/candidatesProfile','DashboardController@candidatesProfile')->name('candidatesProfile');
	Route::get('/voter/voterProfile','DashboardController@voterProfile')->name('voterProfile');
	Route::get('/voter/votePage','DashboardController@votePage')->name('votePage');
	Route::get('/voter/giveVote','DashboardController@giveVote')->name('giveVote');
});



Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::get('/voter/logout','DashboardController@logout')->name('logout');
Route::post('candidate/updateEvent','DashboardController@updateEvent')->name('updateEvent');
Route::post('candidate/deleteEvent','DashboardController@deleteEvent')->name('deleteEvent');