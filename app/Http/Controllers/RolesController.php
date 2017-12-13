<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Group;
use App\Http\helpers;

class RolesController extends Controller
{
    /**
    * GET
    * /group/{gId}/activity/{aId}/role/{tId}
    * Show info for given role
    */
    public function role($gId, $aId, $tId) {
        $role = Role::find($tId);

        if (!$role) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Role not found');
        }

        $access = helpers\validateByGId($gId);

        if ($access) {
            return view('roles.role')->with([
                'role' => $role,
                'gId' => $gId,
                'aId' => $aId
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/role/create
    * Create a role
    */
    public function create($gId, $aId) {
        $group = Group::find($gId);

        $access = helpers\validateByGId($gId);

        if ($access) {
            $users = $group->users()->getResults();
            return view('roles.create')->with([
                'users' => $users,
                'gId' => $gId,
                'aId' => $aId,
                'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId.'/activity/'.$aId : url()->previous()
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * POST
    * /group/{gId}/activity/{aId}/role
    * Add new role
    */
    public function add($gId, $aId, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $access = helpers\validateByGId($gId);

        if ($access) {
            $role = new Role();
            $role->name = $request->input('name');
            $role->description = $request->input('description');
            $role->activity_id = $aId;
            $task->user_id = $request->input('owner');;
            $role->save();

            return redirect('/group/'.$gId.'/activity/'.$aId.'/role/'.$role->id)->with([
                'role' => $role,
                'gId' => $gId,
                'aId' => $aId,
                'alert' => 'Your role was added.'
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/role/{tId}/edit
    * Edit info for given role
    */
    public function edit($gId, $aId, $tId) {
        $role = Role::find($tId);

        if (!$role) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Role not found');
        }

        $access = helpers\validateByGId($gId);

        if ($access) {
            return view('roles.edit')->with([
                'role' => $role,
                'gId' => $gId,
                'aId' => $aId,
                'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId.'/activity/'.$aId : url()->previous()
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * PUT
    * /group/{gId}/activity/{aId}/role/{tId}
    * Update info for given role
    */
    public function update($gId, $aId, $tId, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $role = Role::find($tId);

        if (!$role) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Role not found');
        }

        $access = helpers\validateByGId($gId);

        if ($access) {
            $role->name = $request->input('name');
            $role->description = $request->input('description');
            $role->save();

            return redirect('/group/'.$gId.'/activity/'.$aId.'/role/'.$role->id)->with([
                'role' => $role,
                'gId' => $gId,
                'aId' => $aId,
                'alert' => 'Your changes were saved.'
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/role/{tId}/delete
    * Confirm deletion of given role
    */
    public function confirmDelete($gId, $aId, $tId) {
        $role = Role::find($tId);

        if (!$role) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Role not found');
        }

        $access = helpers\validateByGId($gId);

        if ($access) {
            return view('roles.delete')->with([
                'role' => $role,
                'gId' => $gId,
                'aId' => $aId,
                'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId.'/activity/'.$aId : url()->previous()
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }

    /**
    * DELETE
    * /group/{gId}/activity/{aId}/role/{tId}
    * Delete a given role
    */
    public function delete($gId, $aId, $tId) {
        $role = Role::find($tId);

        if (!$role) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Role not found');
        }

        $access = helpers\validateByGId($gId);

        if ($access) {
            $role->delete();

            return redirect('/group/'.$gId.'/activity/'.$aId.'/role/'.$role->id)->with([
                'role' => $role,
                'gId' => $gId,
                'aId' => $aId,
                'alert' => $role->name.' was deleted.'
            ]);
        } else {
            return redirect('/group/')->with('alert', 'You must be a member of the group to do this');
        }
    }
}
