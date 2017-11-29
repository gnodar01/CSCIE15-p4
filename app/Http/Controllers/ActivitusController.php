<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Activity;

class ActivitusController extends Controller
{
    /**
     * GET
     *
     * Show main for for digest content
     *
     * @return main Digest view
     */
    public function index() {
        $activities = Activity::all();

        echo $activities;

        return view('activitus.index')->with([
            'activities' => $activities
        ]);
    }
}
