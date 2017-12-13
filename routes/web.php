<?php

// debug info for database
Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

/*
 * Activities
 */

// Delete activity
Route::get('/group/{gId}/activity/{id}/delete', 'ActivitiesController@confirmDelete');
Route::delete('/group/{gId}/activity/{id}', 'ActivitiesController@delete');

// Edit activity
Route::get('/group/{gId}/activity/{id}/edit', 'ActivitiesController@edit');
Route::put('/group/{gId}/activity/{id}', 'ActivitiesController@update');

// Create activity
Route::get('/group/{gId}/activity/create', 'ActivitiesController@create');
Route::post('/group/{gId}/activity', 'ActivitiesController@add');

// View all activities, including expired
// Route::get('/activity/archive', 'ActivitiesController@archive');

// View activity
Route::get('/group/{gId}/activity/{aId}', 'ActivitiesController@activity');

// View all upcoming activities
// Route::get('/activity', 'ActivitiesController@index');

/*
 * GROUPS
 */

// Delete group
Route::get('/group/{id}/delete', 'GroupsController@confirmDelete');
Route::delete('/group/{id}', 'GroupsController@delete');

// Edit group
Route::get('/group/{id}/edit', 'GroupsController@edit');
Route::put('/group/{id}', 'GroupsController@update');

// Create group
Route::get('/group/create', 'GroupsController@create');
Route::post('/group', 'GroupsController@add');

// View group with expired activities
Route::get('/group/{id}/archive', 'GroupsController@archive');

// View group
Route::get('/group/{id}', 'GroupsController@group');

// View all groups
Route::get('/group', 'GroupsController@index');

/*
 * Index
 */

// View all groups
Route::get('/', 'GroupsController@index');
