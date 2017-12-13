<?php

namespace App\Http\helpers;

use Auth;
use App\Group;

function validateByGroup($group) {
    $currentUser = Auth::user();
    $users = $group->users()->getResults();

    $access = false;

    foreach ($users as $user) {
        if ($user->id == $currentUser->id) {
            $access = true;
        }
    }

    return $access;
}

function validateByGId($gId) {
    $group = Group::find($gId);
    $currentUser = Auth::user();
    $users = $group->users()->getResults();

    $access = false;

    foreach ($users as $user) {
        if ($user->id == $currentUser->id) {
            $access = true;
        }
    }

    return $access;
}

?>