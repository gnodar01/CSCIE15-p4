<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

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
        return view('activitus.index');
    }
}
