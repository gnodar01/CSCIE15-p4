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
}
