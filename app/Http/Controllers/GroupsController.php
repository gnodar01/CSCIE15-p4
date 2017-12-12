<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupsController extends Controller
{
    /**
     * GET
     * /
     * /group
     * Show all groups
     */
    public function index() {
        $groups = Group::all();

        return view('groups.index')->with([
            'groups' => $groups
        ]);
    }

    /**
    * GET
    * /group/{id}
    * Show info for given group
    */
    public function group($id) {
        $group = Group::find($id);

        if (!$group) {
            return redirect('/')->with('alert', 'Group not found');
        }

        return view('groups.group')->with('group', $group);
    }

    /**
    * GET
    * /group/create
    * Create a group
    */
    public function create() {
        return view('groups.create');
    }

    /**
    * POST
    * /group
    * Add new group
    */
    public function add(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $group = new Group();
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->save();

        return redirect('/group/'.$group->id)->with([
            'group' => $group,
            'alert' => 'Your group was created.'
        ]);
    }

    /**
    * GET
    * /group/{id}/edit
    * Edit info for given group
    */
    public function edit($id) {
        $group = Group::find($id);

        if (!$group) {
            return redirect('/')->with('alert', 'Group not found');
        }

        return view('groups.edit')->with('group', $group);
    }

    /**
    * PUT
    * /group/{id}
    * Update info for given group
    */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $group = Group::find($id);

        if (!$group) {
            return redirect('/')->with('alert', 'Group not found');
        }        

        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->save();

        return redirect('/group/'.$id)->with([
            'gorup' => $group,
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
