<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

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

        return view('roles.role')->with([
            'role' => $role,
            'gId' => $gId,
            'aId' => $aId
        ]);
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/role/create
    * Create a role
    */
    public function create($gId, $aId) {
        return view('roles.create')->with([
            'gId' => $gId,
            'aId' => $aId
        ]);
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

        $role = new Role();
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        // TODO: this?
        // $role->group()->associate();
        $role->activity_id = $aId;
        // TODO: Fix this
        $role->user_id = 1;
        $role->save();

        return redirect('/group/'.$gId.'/activity/'.$aId.'/role/'.$role->id)->with([
            'role' => $role,
            'gId' => $gId,
            'aId' => $aId,
            'alert' => 'Your role was added.'
        ]);
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

        return view('roles.edit')->with([
            'role' => $role,
            'gId' => $gId,
            'aId' => $aId
        ]);
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

        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        return redirect('/group/'.$gId.'/activity/'.$aId.'/role/'.$role->id)->with([
            'role' => $role,
            'gId' => $gId,
            'aId' => $aId,
            'alert' => 'Your changes were saved.'
        ]);
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

        return view('roles.delete')->with([
            'role' => $role,
            'gId' => $gId,
            'aId' => $aId,
            'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId.'/activity/'.$aId.'/role/'.$tId : url()->previous()
        ]);
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

        $role->delete();

        return redirect('/group/'.$gId.'/activity/'.$aId.'/role/'.$role->id)->with([
            'role' => $role,
            'gId' => $gId,
            'aId' => $aId,
            'alert' => $role->name.' was deleted.'
        ]);
    }
}
