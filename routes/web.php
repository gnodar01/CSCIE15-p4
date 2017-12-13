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

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});

/* Roles
 *
 */

// Delete role
Route::get('/group/{gId}/activity/{aId}/role/{tId}/delete', [
    'middleware' => 'auth',
    'uses' => 'RolesController@confirmDelete'
]);
Route::delete('/group/{gId}/activity/{aId}/role/{tId}', [
    'middleware' => 'auth',
    'uses' => 'RolesController@delete'
]);

// Edit role
Route::get('/group/{gId}/activity/{aId}/role/{tId}/edit', [
    'middleware' => 'auth',
    'uses' => 'RolesController@edit'
]);
Route::put('/group/{gId}/activity/{aId}/role/{tId}', [
    'middleware' => 'auth',
    'uses' => 'RolesController@update'
]);

// Create role
Route::get('/group/{gId}/activity/{aId}/role/create', [
    'middleware' => 'auth',
    'uses' => 'RolesController@create'
]);
Route::post('/group/{gId}/activity/{aId}/role', [
    'middleware' => 'auth',
    'uses' => 'RolesController@add'
]);

// View role
Route::get('/group/{gId}/activity/{aId}/role/{tId}', [
    'middleware' => 'auth',
    'uses' => 'RolesController@role'
]);

/* Tasks
 *
 */

// Delete task
Route::get('/group/{gId}/activity/{aId}/task/{tId}/delete', [
    'middleware' => 'auth',
    'uses' => 'TasksController@confirmDelete'
]);
Route::delete('/group/{gId}/activity/{aId}/task/{tId}', [
    'middleware' => 'auth',
    'uses' => 'TasksController@delete'
]);

// Edit task
Route::get('/group/{gId}/activity/{aId}/task/{tId}/edit', [
    'middleware' => 'auth',
    'uses' => 'TasksController@edit'
]);
Route::put('/group/{gId}/activity/{aId}/task/{tId}', [
    'middleware' => 'auth',
    'uses' => 'TasksController@update'
]);

// Create task
Route::get('/group/{gId}/activity/{aId}/task/create', [
    'middleware' => 'auth',
    'uses' => 'TasksController@create'
]);
Route::post('/group/{gId}/activity/{aId}/task', [
    'middleware' => 'auth',
    'uses' => 'TasksController@add'
]);

// View task
Route::get('/group/{gId}/activity/{aId}/task/{tId}', [
    'middleware' => 'auth',
    'uses' => 'TasksController@task'
]);

/*
 * Activities
 */

// Delete activity
Route::get('/group/{gId}/activity/{aId}/delete', [
    'middleware' => 'auth',
    'uses' => 'ActivitiesController@confirmDelete'
]);
Route::delete('/group/{gId}/activity/{aId}', [
    'middleware' => 'auth',
    'uses' => 'ActivitiesController@delete'
]);

// Edit activity
Route::get('/group/{gId}/activity/{aId}/edit', [
    'middleware' => 'auth',
    'uses' => 'ActivitiesController@edit'
]);
Route::put('/group/{gId}/activity/{aId}', [
    'middleware' => 'auth',
    'uses' => 'ActivitiesController@update'
]);

// Create activity
Route::get('/group/{gId}/activity/create', [
    'middleware' => 'auth',
    'uses' => 'ActivitiesController@create'
]);
Route::post('/group/{gId}/activity', [
    'middleware' => 'auth',
    'uses' => 'ActivitiesController@add'
]);

// View activity
Route::get('/group/{gId}/activity/{aId}', [
    'middleware' => 'auth',
    'uses' => 'ActivitiesController@activity'
]);

/*
 * GROUPS
 */

// Delete group
Route::get('/group/{id}/delete', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@confirmDelete'
]);
Route::delete('/group/{id}', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@delete'
]);

// Edit group
Route::get('/group/{id}/edit', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@edit'
]);
Route::put('/group/{id}', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@update'
]);

// Create group
Route::get('/group/create', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@create'
]);
Route::post('/group', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@add'
]);

// View group with expired activities
Route::get('/group/{id}/archive', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@archive'
]);

// View group
Route::get('/group/{id}', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@group'
]);

// View all groups
Route::get('/group', [
    'middleware' => 'auth',
    'uses' => 'GroupsController@index'
]);

/*
 * Index
 */

// View all groups
Route::get('/', 'GroupsController@index');

Auth::routes();
