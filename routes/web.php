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
Route::get('/activity/create', 'ActivitusController@create');
Route::post('/activity', 'ActivitusController@add');

// Edit activity
Route::get('/activity/{id}/edit', 'ActivitusController@edit');
Route::put('/activity/{id}', 'ActivitusController@update');

// Delete activity
Route::get('/activity/{id}/delete', 'ActivitusController@confirmDelete');
Route::delete('/activity/{id}', 'ActivitusController@delete');

// View all upcoming activities
Route::get('/activity', 'ActivitusController@index');

// View all activities
Route::get('/activity/archive', 'ActivitusController@archive');

// View activity
Route::get('/activity/{id}', 'ActivitusController@activity');

// View all activities
Route::get('/', 'ActivitusController@index');
