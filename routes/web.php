<?php

// ADMIN Routes
Route::middleware(['auth', 'admin'])->namespace('Admin')->prefix('admin')->group(function(){

    // Dashboard
    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

    // Images
    Route::post('/images/delete/{id}', ['as' => 'images.delete', 'uses' => "ImagesController@delete"]);

    // EventImages
    Route::post('/event_images/delete/{id}', ['as' => 'event_images.delete', 'uses' => "EventImagesController@delete"]);

    // Events
    Route::get('/events', ['as' => 'events.index', 'uses' => 'EventsController@index']);
    Route::get('/events/create', ['as' => 'events.create', 'uses' => 'EventsController@create']);
    Route::post('/events', ['as' => 'events.store', 'uses' => 'EventsController@store']);
    Route::get('/events/edit/{id}', ['as' => 'events.edit', 'uses' => 'EventsController@edit']);
    Route::post('/events/{id}', ['as' => 'events.update', 'uses' => 'EventsController@update']);
    Route::post('/events/delete/{id}', ['as' => 'events.delete', 'uses' => 'EventsController@delete']);

    // EventCategories
    Route::get('/event_categories', ['as' => 'event_categories.index', 'uses' => 'EventCategoriesController@index']);
    Route::get('/event_categories/create', ['as' => 'event_categories.create', 'uses' => 'EventCategoriesController@create']);
    Route::post('/event_categories', ['as' => 'event_categories.store', 'uses' => 'EventCategoriesController@store']);
    Route::get('/event_categories/edit/{id}', ['as' => 'event_categories.edit', 'uses' => 'EventCategoriesController@edit']);
    Route::post('/event_categories/{id}', ['as' => 'event_categories.update', 'uses' => 'EventCategoriesController@update']);
    Route::post('/event_categories/delete/{id}', ['as' => 'event_categories.delete', 'uses' => 'EventCategoriesController@delete']);

    // Users
    Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
    Route::post('/users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::post('/users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);
    Route::get('/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
    Route::post('/users', ['as' => 'users.store', 'uses' => 'UsersController@store']);

    // Workplaces
    Route::get('/workplaces', ['as' => 'workplaces.index', 'uses' => 'WorkplacesController@index']);
    Route::get('/workplaces/create', ['as' => 'workplaces.create', 'uses' => 'WorkplacesController@create']);
    Route::post('/workplaces', ['as' => 'workplaces.store', 'uses' => 'WorkplacesController@store']);
    Route::get('/workplaces/edit/{id}', ['as' => 'workplaces.edit', 'uses' => 'WorkplacesController@edit']);
    Route::post('/workplaces/{id}', ['as' => 'workplaces.update', 'uses' => 'WorkplacesController@update']);
    Route::post('/workplaces/delete/{id}', ['as' => 'workplaces.delete', 'uses' => 'WorkplacesController@delete']);

    // Files
    Route::get('/files', ['as' => 'files.index', 'uses' => 'FilesController@index']);
    Route::get('/files/create', ['as' => 'files.create', 'uses' => 'FilesController@create']);
    Route::post('/files', ['as' => 'files.store', 'uses' => 'FilesController@store']);
    Route::get('/files/edit/{id}', ['as' => 'files.edit', 'uses' => 'FilesController@edit']);
    Route::post('/files/{id}', ['as' => 'files.update', 'uses' => 'FilesController@update']);
    Route::post('/files/delete/{id}', ['as' => 'files.delete', 'uses' => 'FilesController@delete']);

});


// AUTH Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


// FRONTEND Routes
Route::get('/', function () { return redirect('/sk'); });

Route::get("/file/download/{id}", ['as' => 'download-file', 'uses' => 'PagesController@download_file']);

Route::group(['prefix' => '{language}'], function () {
    // Pages
    Route::get("/", ['as' => "web.home", 'uses' => 'PagesController@index']);
    Route::get("/kontakt", ['as' => "web.contact", 'uses' => 'PagesController@contact']);
    Route::post("/kontakt", ['as' => "web.contact.post", 'uses' => 'PagesController@email']);
    Route::get("/calendar", ['as' => "web.calendar", 'uses' => 'PagesController@calendar']);

    // Events
    Route::get("/udalosti", ['as' => "web.events", 'uses' => 'EventsController@index']);
    Route::get("/udalosti/{slug}", ['as' => "web.event" , 'uses' => 'EventsController@show']);

    Route::middleware(['auth', 'user'])->namespace('User')->prefix('user')->group(function() {
        Route::get("/student", ['as' => "web.student", 'uses' => 'PagesController@student']);
        Route::get("/pracovnik", ['as' => "web.pracovnik", 'uses' => 'PagesController@pracovnik']);
    });
});
