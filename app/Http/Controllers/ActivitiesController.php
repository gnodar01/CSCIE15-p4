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
    * group/{gId}/activity/{aId}
    * Show info for given activity
    */
    public function activity($gId, $aId) {
        $activity = Activity::find($aId);

        if (!$activity) {
            return redirect('/group/'.$gId)->with('alert', 'Activity not found');
        }

        $tasks = $activity->tasks()->with('user')->getResults();
        $roles = $activity->roles()->with('user')->getResults();

        return view('activities.activity')->with([
            'activity' => $activity,
            'tasks' => $tasks,
            'roles' => $roles,
            'gId' => $gId
        ]);
    }

    /**
    * GET
    * group/{gId}/activity/create
    * Create an activity
    */
    public function create($gId) {
        return view('activities.create')->with('gId', $gId);
    }

    /**
    * POST
    * group/{gId}/activity
    * Add new activity
    */
    public function add($gId, Request $request) {
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
        // TODO: this?
        // $activity->group()->associate($group);
        $activity->group_id = $gId;
        $activity->save();

        return redirect('/group/'.$gId.'/activity/'.$activity->id)->with([
            'activity' => $activity,
            'alert' => 'Your activity was added.'
        ]);
    }

    /**
    * GET
    * group/{gId}/activity/{aId}/edit
    * Edit info for given activity
    */
    public function edit($gId, $aId) {
        $activity = Activity::find($aId);

        if (!$activity) {
            return redirect('/group/'.$gId)->with('alert', 'Activity not found');
        }

        return view('activities.edit')->with([
            'activity' => $activity,
            'gId' => $gId
        ]);
    }

    /**
    * PUT
    * group/{gId}/activity/{aId}
    * Update info for given activity
    */
    public function update($gId, $aId, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date-start' => 'required',
            'date-end' => 'required'
        ]);

        $activity = Activity::find($aId);

        if (!$activity) {
            return redirect('/group/'.$gId)->with('alert', 'Activity not found');
        }        

        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->location = $request->input('location');
        $activity->date_start = $request->input('date-start');
        $activity->date_end = $request->input('date-end');
        $activity->time_start = date('H:i:s', strtotime($request->input('time-start')));
        $activity->time_end = date('H:i:s', strtotime($request->input('time-end')));
        $activity->save();

        return redirect('/group/'.$gId.'/activity/'.$aId)->with([
            'activity' => $activity,
            'alert' => 'Your changes were saved.'
        ]);
    }

    /**
    * GET
    * group/{gId}/activity/{aId}/delete
    * Confirm deletion of given activity
    */
    public function confirmDelete($gId, $aId) {
        $activity = Activity::find($aId);

        if (!$activity) {
            return redirect('/group/'.$gId)->with('alert', 'Activity not found');
        }

        return view('activities.delete')->with([
            'activity' => $activity,
            'prevUrl' => url()->previous() == url()->current() ? 'group/'.$gId.'/activity' : url()->previous(),
            'gId' => $gId
        ]);
    }

    /**
    * DELETE
    * group/{gId}/activity/{aId}
    * Delete a given activity
    */
    public function delete($gId, $aId) {
        $activity = Activity::find($aId);

        if (!$activity) {
            return redirect('/group/'.$gId)->with('alert', 'Activity not found');
        }

        $activity->delete();

        return redirect('/group/'.$gId.'/activity/'.$aId)->with([
            'alert' => $activity->name.' was deleted.'
        ]);
    }
}
