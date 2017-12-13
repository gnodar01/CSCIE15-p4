<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\Http\helpers;

class GroupsController extends Controller
{
    /**
     * GET
     * /
     * /group
     * Show all groups
     */
    public function index(Request $request) {
        // $user = $request->user();
        $user = Auth::user();

        if ($user) {
            $userId = $user->id;
            $groups = $user->groups()->getResults();

            $groupsNot = Group::whereDoesntHave('users', function($q) use ($userId) {
                $q->where('user_id', $userId);
            })->get();
        } else {
            $groups = [];
            $groupsNot = Group::all();
        }

        return view('groups.index')->with([
            'groups' => $groups,
            'groupsNot' => $groupsNot
        ]);
    }

    /**
    * GET
    * /group/{id}
    * Show info for given group
    */
    public function group($id, Request $request, $archive=false) {
        $group = Group::find($id);
        $users = $group->users()->getResults();

        if (!$group) {
            return redirect('/group')->with('alert', 'Group not found');
        }

        if (!$archive) {
            // only upcoming activities
            $activities = $group->upcomingActivities()->getResults();
        } else {
            // all activities, including expired
            $activities = $group->activities()->getResults();
        }

        $access = helpers\validateByGroup($group);

        if ($access) {
            return view('groups.group')->with([
                'group' => $group,
                'activities' => $activities,
                'users' => $users,
                'path' => $request->path()
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * GET
    * /group/{id}/archive
    * Show info for given group with expired activities
    */
    public function archive($id, Request $request) {
        return $this->group($id, $request, true);
    }

    /**
    * GET
    * /group/create
    * Create a group
    */
    public function create() {
        return view('groups.create')->with([
            'prevUrl' => url()->previous() == url()->current() ? '/group' : url()->previous()
        ]);
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

        $user = Auth::user();
        $group = new Group();
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->save();
        $group->users()->save($user);

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

        $access = helpers\validateByGroup($group);

        if ($access) {
            return view('groups.edit')->with([
                'group' => $group,
                'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId : url()->previous()
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
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

        $access = helpers\validateByGroup($group);

        if ($access) {
            $group->name = $request->input('name');
            $group->description = $request->input('description');
            $group->save();

            return redirect('/group/'.$id)->with([
                'gorup' => $group,
                'alert' => 'Your changes were saved.'
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * GET
    * /group/{id}/delete
    * Confirm deletion of given group
    */
    public function confirmDelete($id) {
        $group = Group::find($id);

        if (!$group) {
            return redirect('/')->with('alert', 'Group not found');
        }

        $access = helpers\validateByGroup($group);

        if ($access) {
            return view('groups.delete')->with([
                'group' => $group,
                'prevUrl' => url()->previous() == url()->current() ? '/group/'.$id : url()->previous()
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * DELETE
    * /group/{id}
    * Delete a given group
    */
    public function delete($id) {
        $group = Group::find($id);

        if (!$group) {
            return redirect('/')->with('alert', 'Group not found');
        }

        $access = helpers\validateByGroup($group);

        if ($access) {
            $group->users()->detach();
            // $group->activities()->delete();
            $group->delete();

            return redirect('/group')->with([
                'alert' => $group->name.' was deleted.'
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
     * GET
     * /group/{id}/join
     * Confirmation to join group
     */
    public function confirmJoin($id) {
        $user = Auth::user();
        $group = Group::find($id);

        return view('groups.join')->with([
            'group' => $group,
            'user' => $user,
            'prevUrl' => url()->previous() == url()->current() ? '/group/'.$id : url()->previous()
        ]);

    }

    /**
     * PUT
     * /group/{id}/join
     * Join group
     */
    public function join($id) {
        $user = Auth::user();
        $group = Group::find($id);

        if (!$user) {
            return redirect('/login')->with([
                'alert' => 'You need to login to do this'
            ]);
        } else {
            $group->users()->save($user);

            return redirect('/group')->with([
                'alert' => 'You have joined '.$group->name
            ]);
        }
    }

    /**
     * GET
     * /group/{id}/leave
     * Confirmation to leave group
     */
    public function confirmLeave($id) {
        $user = Auth::user();
        $group = Group::find($id);

        $access = helpers\validateByGroup($group);

        if ($access) {
            return view('groups.leave')->with([
                'group' => $group,
                'user' => $user,
                'prevUrl' => url()->previous() == url()->current() ? '/group/'.$id : url()->previous()
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
     * PUT
     * /group/{id}/leave
     * Leave group
     */
    public function leave($id) {
        $user = Auth::user();
        $group = Group::find($id);

        if (!$user) {
            return redirect('/login')->with([
                'alert' => 'You need to login to do this'
            ]);
        }

        $access = helpers\validateByGroup($group);

        if ($access) {
            $user->groups()->detach($id);

            return redirect('/group')->with([
                'alert' => 'You have left '.$group->name
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }

    }
}
