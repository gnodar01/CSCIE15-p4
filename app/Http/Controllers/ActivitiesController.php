<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Activity;
use Debugbar;

class ActivitiesController extends Controller
{
    /**
     * GET
     * /
     * /activity
     * Show all activities
     */
    public function index(Request $request) {
        $activities = Activity::whereDate('date_start', '>=', date('Y-m-d'))->get();

        return view('activities.index')->with([
            'activities' => $activities,
            'path' => $request->path()
        ]);
    }

    /**
     * GET
     * /activity/{id}/archive
     * Show all activities, including expired ones, for given group
     */
    public function archive(Request $request) {
        $activities = Activity::all();

        return view('activities.index')->with([
            'activities' => $activities,
            'path' => $request->path()
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

        return view('activities.activity')->with('activity', $activity);
    }

    /**
    * GET
    * /activity/create
    * Create an activity
    */
    public function create() {
        return view('activities.create');
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

        return view('activities.edit')->with('activity', $activity);
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

    /**
    * GET
    * /activity/{id}/delete
    * Confirm deletion of given activity
    */
    public function confirmDelete($id) {
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect('/')->with('alert', 'Activity not found');
        }

        return view('activities.delete')->with([
            'activity' => $activity,
            'prevUrl' => url()->previous() == url()->current() ? '/activity' : url()->previous()
        ]);
    }

    /**
    * DELETE
    * /activity/{id}
    * Delete a given activity
    */
    public function delete($id) {
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect('/')->with('alert', 'Activity not found');
        }

        $activity->delete();

        return redirect('/activity')->with([
            'alert' => $activity->name.' was deleted.'
        ]);
    }
}
