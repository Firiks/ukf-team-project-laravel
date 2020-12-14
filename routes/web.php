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

    // Faculties
    Route::get('/faculties', ['as' => 'faculties.index', 'uses' => 'FacultiesController@index']);
    Route::get('/faculties/create', ['as' => 'faculties.create', 'uses' => 'FacultiesController@create']);
    Route::post('/faculties', ['as' => 'faculties.store', 'uses' => 'FacultiesController@store']);
    Route::get('/faculties/edit/{id}', ['as' => 'faculties.edit', 'uses' => 'FacultiesController@edit']);
    Route::post('/faculties/{id}', ['as' => 'faculties.update', 'uses' => 'FacultiesController@update']);
    Route::post('/faculties/delete/{id}', ['as' => 'faculties.delete', 'uses' => 'FacultiesController@delete']);

    // Rooms
    Route::get('/rooms', ['as' => 'rooms.index', 'uses' => 'RoomsController@index']);
    Route::get('/rooms/create', ['as' => 'rooms.create', 'uses' => 'RoomsController@create']);
    Route::post('/rooms', ['as' => 'rooms.store', 'uses' => 'RoomsController@store']);
    Route::get('/rooms/edit/{id}', ['as' => 'rooms.edit', 'uses' => 'RoomsController@edit']);
    Route::post('/rooms/{id}', ['as' => 'rooms.update', 'uses' => 'RoomsController@update']);
    Route::post('/rooms/delete/{id}', ['as' => 'rooms.delete', 'uses' => 'RoomsController@delete']);

    // Files
    Route::get('/files', ['as' => 'files.index', 'uses' => 'FilesController@index']);
    Route::get('/files/create', ['as' => 'files.create', 'uses' => 'FilesController@create']);
    Route::post('/files', ['as' => 'files.store', 'uses' => 'FilesController@store']);
    Route::get('/files/edit/{id}', ['as' => 'files.edit', 'uses' => 'FilesController@edit']);
    Route::post('/files/{id}', ['as' => 'files.update', 'uses' => 'FilesController@update']);
    Route::post('/files/delete/{id}', ['as' => 'files.delete', 'uses' => 'FilesController@delete']);

});

// AUTH Routes
Route::post('/login', ['as' => "login.post", "uses" => 'Auth\LoginController@login']);
Route::get('/logout', ['as' => "logout", 'uses' => 'Auth\LoginController@logout']);
Route::post('/register', ['as' => "register.post", 'uses' => 'Auth\RegisterController@register']);

// FRONTEND Routes
Route::get('/', function () { return redirect('/sk'); });

Route::get("/file/download/{id}", ['as' => 'download-file', 'uses' => 'PagesController@download_file']);

Route::group(['prefix' => '{language}'], function () {

    // AUTH Routes
    Route::get('/login', ['as' => "login", 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::get('/register', ['as' => "register", 'uses' => 'Auth\RegisterController@showRegistrationForm']);

    // Pages
    Route::get("/", ['as' => "web.home", 'uses' => 'PagesController@index']);
    Route::get("/kontakt", ['as' => "web.contact", 'uses' => 'PagesController@contact']);
    Route::post("/kontakt", ['as' => "web.contact.post", 'uses' => 'PagesController@email']);
    Route::get("/calendar", ['as' => "web.calendar", 'uses' => 'PagesController@calendar']);

    // Events
    Route::get("/udalosti", ['as' => "web.events", 'uses' => 'EventsController@index']);
    Route::get("/udalosti/{slug}", ['as' => "web.event" , 'uses' => 'EventsController@show']);
    Route::post("/udalosti/attend", ['as' => "web.attend", 'uses' => 'EventsController@attend']);

    // Users Dashboards

    // Student
    Route::middleware(['auth', 'student'])->namespace('Student')->prefix('student')->group(function() {
        Route::get("/", ['as' => "web.student", 'uses' => 'StudentController@index']);
        Route::get("/udalosti", ['as' => "student.events", 'uses' => 'StudentController@studentEvents']);
        Route::get("/udalosti/create", ['as' => "student.events.create", 'uses' => 'StudentController@studentEventCreate']);
        Route::post('/udalosti', ['as' => 'student.events.store', 'uses' => 'StudentController@studentEventStore']);
        Route::get('/udalosti/edit/{id}', ['as' => 'student.event.edit', 'uses' => 'StudentController@studentEventEdit']);
        Route::post('/udalosti/update/{id}', ['as' => 'student.event.update', 'uses' => 'StudentController@studentEventUpdate']);
        Route::post('/udalosti/delete/{id}', ['as' => 'student.event.delete', 'uses' => 'StudentController@studentEventDelete']);
        Route::get("/pracoviska", ['as' => "student.workplaces", 'uses' => 'StudentController@studentWorkplaces']);
        Route::get('/pracoviska/request/{id}', ['as' => 'student.workplaces.request', 'uses' => 'StudentController@studentWorkplacesRequest']);
        Route::post('/pracoviska/store', ['as' => 'student.workplaces.request.store', 'uses' => 'StudentController@workplace_store']);
        Route::get('/nastavenia', ['as' => 'student.settings', 'uses' => 'StudentController@settings']);
        Route::post('/update', ['as' => 'student.update', 'uses' => 'StudentController@update']);
    });

    // Pracovnik
    Route::middleware(['auth', 'pracovnik'])->namespace('Pracovnik')->prefix('pracovnik')->group(function() {
        Route::get("/", ['as' => "web.pracovnik", 'uses' => 'PracovnikController@index']);
        Route::get("/udalosti", ['as' => "pracovnik.events", 'uses' => 'PracovnikController@pracovnikEvents']);
        Route::get("/udalosti/create", ['as' => "pracovnik.events.create", 'uses' => 'PracovnikController@pracovnikEventCreate']);
        Route::post('/udalosti', ['as' => 'pracovnik.events.store', 'uses' => 'PracovnikController@pracovnikEventStore']);
        Route::get('/udalosti/edit/{id}', ['as' => 'pracovnik.event.edit', 'uses' => 'PracovnikController@pracovnikEventEdit']);
        Route::post('/udalosti/update/{id}', ['as' => 'pracovnik.event.update', 'uses' => 'PracovnikController@pracovnikEventUpdate']);
        Route::post('/udalosti/update/{id}', ['as' => 'pracovnik.event.delete', 'uses' => 'PracovnikController@pracovnikEventDelete']);
        Route::get("/pracoviska", ['as' => "pracovnik.workplaces", 'uses' => 'PracovnikController@pracovnikWorkplaces']);
        Route::get('/pracoviska/request/{id}', ['as' => 'pracovnik.workplaces.request', 'uses' => 'PracovnikController@pracovnikWorkplacesRequest']);
        Route::post('/pracoviska/store', ['as' => 'pracovnik.workplaces.request.store', 'uses' => 'PracovnikController@workplace_store']);
        Route::get('/nastavenia', ['as' => 'pracovnik.settings', 'uses' => 'PracovnikController@settings']);
        Route::post('/update', ['as' => 'pracovnik.update', 'uses' => 'PracovnikController@update']);
    });
});
