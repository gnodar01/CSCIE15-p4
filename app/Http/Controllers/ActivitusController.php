<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Activity;
use Debugbar;

class ActivitusController extends Controller
{
    /**
     * GET
     * /
     * Show all activities
     */
    public function index() {
        $activities = Activity::whereDate('date_start', '>=', date('Y-m-d'))->get();

        return view('activitus.index')->with([
            'activities' => $activities
        ]);
    }

    /**
    * GET
    * /activity/{id}
    * Show info for given activity
    */
    public function activity($id) {
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect('/')->with('alert', 'Activity not found');
        }

        return view('activitus.activity')->with('activity', $activity);
    }

    /**
    * GET
    * /activity/create
    * Create an activity
    */
    public function create() {
        return view('activitus.create');
    }

    /**
    * POST
    * /activity
    * Add new activity
    */
    public function add(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date-start' => 'required',
            'date-end' => 'required'
        ]);

        $activity = new Activity();
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->location = $request->input('location');
        $activity->date_start = $request->input('date-start');
        $activity->date_end = $request->input('date-end');
        $activity->time_start = date('H:i:s', strtotime($request->input('time-start')));
        $activity->time_end = date('H:i:s', strtotime($request->input('time-end')));
        $activity->save();

        return redirect('/activity/'.$activity->id)->with([
            'activity' => $activity,
            'alert' => 'Your activity was added.'
        ]);
    }

    /**
    * GET
    * /activity/{id}/edit
    * Edit info for given activity
    */
    public function edit($id) {
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect('/')->with('alert', 'Activity not found');
        }

        return view('activitus.edit')->with('activity', $activity);
    }

    /**
    * PUT
    * /activity/{id}
    * Update info for given activity
    */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date-start' => 'required',
            'date-end' => 'required'
        ]);

        $activity = Activity::find($id);

        if (!$activity) {
            return redirect('/')->with('alert', 'Activity not found');
        }        

        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->location = $request->input('location');
        $activity->date_start = $request->input('date-start');
        $activity->date_end = $request->input('date-end');
        $activity->time_start = date('H:i:s', strtotime($request->input('time-start')));
        $activity->time_end = date('H:i:s', strtotime($request->input('time-end')));
        $activity->save();

        return redirect('/activity/'.$id)->with([
            'activity' => $activity,
            'alert' => 'Your changes were saved.'
        ]);
    }
}
