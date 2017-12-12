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

// Create activity
Route::get('/activity/create', 'ActivitiesController@create');
Route::post('/activity', 'ActivitiesController@add');

// Edit activity
Route::get('/activity/{id}/edit', 'ActivitiesController@edit');
Route::put('/activity/{id}', 'ActivitiesController@update');

// Delete activity
Route::get('/activity/{id}/delete', 'ActivitiesController@confirmDelete');
Route::delete('/activity/{id}', 'ActivitiesController@delete');

// View all upcoming activities
Route::get('/activity', 'ActivitiesController@index');

// View all activities
Route::get('/activity/archive', 'ActivitiesController@archive');

// View activity
Route::get('/activity/{id}', 'ActivitiesController@activity');

// View all activities
Route::get('/', 'ActivitiesController@index');
