<?php
//Authentication Controller
Route::get('', 'AuthenticationController@showLoginView');
Route::get('/login', 'AuthenticationController@showLoginView');
Route::post('/login', 'AuthenticationController@loginUser');


Route::get('/logout', 'AuthenticationController@logout');

Route::get('/users', 'AuthenticationController@showUsers');


//Registration Controller
Route::get('/signup', 'RegistrationController@showSignUpView');
Route::post('/signup', 'RegistrationController@signUp');

//Profile
Route::get('/profile', 'ProfileController@showProfile');

//Feed
//Route::get('/feed', 'FeedController@showFeed');

//Post
Route::post('/post', 'PostController@createPost');

//Home
Route::get('/home', 'HomeController@showHomePage');

//Job Controllers
Route::get( '/addjob', 'ListsController@getLists');
//Route::get( '/addjob', 'JobsController@showAddJobsView');
Route::post('/addjob', 'JobsController@addJob');
Route::get( '/jobs', 'JobsController@viewJobs');
