<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RolesController extends Controller
{
    /**
    * GET
    * /group/{gId}/activity/{aId}/task/{tId}
    * Show info for given task
    */
    public function activity($gId, $aId, $tId) {
        $task = Activity::find($tId);

        if (!$task) {
            return redirect('/group/'.$gId.'/activity/'.$aid)->with('alert', 'Role not found');
        }

        return view('tasks.task')->with([
            'task' => $task
            'gId' => $gId,
            'aId' => $aId
        ]);
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/task/create
    * Create a task
    */
    public function create($gId) {
        return view('tasks.create')->with([
            'gId' => $gId,
            'aId' => $aId
        ]);
    }

    /**
    * POST
    * /group/{gId}/activity/{aId}/task
    * Add new task
    */
    // public function add($gId, Request $request) {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'description' => 'required',
    //         'location' => 'required',
    //         'date-start' => 'required',
    //         'date-end' => 'required'
    //     ]);

    //     $activity = new Activity();
    //     $activity->name = $request->input('name');
    //     $activity->description = $request->input('description');
    //     $activity->location = $request->input('location');
    //     $activity->date_start = $request->input('date-start');
    //     $activity->date_end = $request->input('date-end');
    //     $activity->time_start = date('H:i:s', strtotime($request->input('time-start')));
    //     $activity->time_end = date('H:i:s', strtotime($request->input('time-end')));
    //     // TODO: this?
    //     // $activity->group()->associate($group);
    //     $activity->group_id = $gId;
    //     $activity->save();

    //     return redirect('/group/'.$gId.'/activity/'.$activity->id)->with([
    //         'activity' => $activity,
    //         'alert' => 'Your activity was added.'
    //     ]);
    // }

    /**
    * GET
    * /group/{gId}/activity/{aId}/task/{tId}/edit
    * Edit info for given task
    */
    // public function edit($gId, $aId) {
    //     $activity = Activity::find($aId);

    //     if (!$activity) {
    //         return redirect('/group/'.$gId)->with('alert', 'Activity not found');
    //     }

    //     return view('activities.edit')->with([
    //         'activity' => $activity,
    //         'gId' => $gId
    //     ]);
    // }

    /**
    * PUT
    * /group/{gId}/activity/{aId}/task/{tId}
    * Update info for given task
    */
    // public function update($gId, $aId, Request $request) {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'description' => 'required',
    //         'location' => 'required',
    //         'date-start' => 'required',
    //         'date-end' => 'required'
    //     ]);

    //     $activity = Activity::find($aId);

    //     if (!$activity) {
    //         return redirect('/group/'.$gId)->with('alert', 'Activity not found');
    //     }        

    //     $activity->name = $request->input('name');
    //     $activity->description = $request->input('description');
    //     $activity->location = $request->input('location');
    //     $activity->date_start = $request->input('date-start');
    //     $activity->date_end = $request->input('date-end');
    //     $activity->time_start = date('H:i:s', strtotime($request->input('time-start')));
    //     $activity->time_end = date('H:i:s', strtotime($request->input('time-end')));
    //     $activity->save();

    //     return redirect('/group/'.$gId.'/activity/'.$aId)->with([
    //         'activity' => $activity,
    //         'alert' => 'Your changes were saved.'
    //     ]);
    // }

    /**
    * GET
    * /group/{gId}/activity/{aId}/task/{tId}/delete
    * Confirm deletion of given task
    */
    // public function confirmDelete($gId, $aId) {
    //     $activity = Activity::find($aId);

    //     if (!$activity) {
    //         return redirect('/group/'.$gId)->with('alert', 'Activity not found');
    //     }

    //     return view('activities.delete')->with([
    //         'activity' => $activity,
    //         'prevUrl' => url()->previous() == url()->current() ? 'group/'.$gId.'/activity' : url()->previous(),
    //         'gId' => $gId
    //     ]);
    // }

    /**
    * DELETE
    * /group/{gId}/activity/{aId}/task/{tId}
    * Delete a given task
    */
    // public function delete($gId, $aId) {
    //     $activity = Activity::find($aId);

    //     if (!$activity) {
    //         return redirect('/group/'.$gId)->with('alert', 'Activity not found');
    //     }

    //     $activity->delete();

    //     return redirect('/group/'.$gId.'/activity/'.$aId)->with([
    //         'alert' => $activity->name.' was deleted.'
    //     ]);
    // }
}
