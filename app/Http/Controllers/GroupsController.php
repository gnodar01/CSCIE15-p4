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
    * /activity/{id}
    * Show info for given group
    */
    public function group($id) {
        $group = Group::find($id);

        if (!$group) {
            return redirect('/')->with('alert', 'Group not found');
        }

        return view('groups.group')->with('group', $group);
    }
}
