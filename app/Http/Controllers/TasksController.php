<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
    * GET
    * /group/{gId}/activity/{aId}/task/{tId}
    * Show info for given task
    */
    public function task($gId, $aId, $tId) {
        $task = Task::find($tId);

        if (!$task) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Task not found');
        }

        return view('tasks.task')->with([
            'task' => $task,
            'gId' => $gId,
            'aId' => $aId
        ]);
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/task/create
    * Create a task
    */
    public function create($gId, $aId) {
        return view('tasks.create')->with([
            'gId' => $gId,
            'aId' => $aId,
            'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId.'/activity/'.$aId : url()->previous()
        ]);
    }

    /**
    * POST
    * /group/{gId}/activity/{aId}/task
    * Add new task
    */
    public function add($gId, $aId, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        // TODO: this?
        // $task->group()->associate();
        $task->activity_id = $aId;
        // TODO: Fix this
        $task->user_id = 1;
        $task->save();

        return redirect('/group/'.$gId.'/activity/'.$aId.'/task/'.$task->id)->with([
            'task' => $task,
            'gId' => $gId,
            'aId' => $aId,
            'alert' => 'Your task was added.'
        ]);
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/task/{tId}/edit
    * Edit info for given task
    */
    public function edit($gId, $aId, $tId) {
        $task = Task::find($tId);

        if (!$task) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Task not found');
        }

        return view('tasks.edit')->with([
            'task' => $task,
            'gId' => $gId,
            'aId' => $aId,
            'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId.'/activity/'.$aId : url()->previous()
        ]);
    }

    /**
    * PUT
    * /group/{gId}/activity/{aId}/task/{tId}
    * Update info for given task
    */
    public function update($gId, $aId, $tId, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $task = Task::find($tId);

        if (!$task) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Task not found');
        }

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->save();

        return redirect('/group/'.$gId.'/activity/'.$aId.'/task/'.$task->id)->with([
            'task' => $task,
            'gId' => $gId,
            'aId' => $aId,
            'alert' => 'Your changes were saved.'
        ]);
    }

    /**
    * GET
    * /group/{gId}/activity/{aId}/task/{tId}/delete
    * Confirm deletion of given task
    */
    public function confirmDelete($gId, $aId, $tId) {
        $task = Task::find($tId);

        if (!$task) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Task not found');
        }

        return view('tasks.delete')->with([
            'task' => $task,
            'gId' => $gId,
            'aId' => $aId,
            'prevUrl' => url()->previous() == url()->current() ? '/group/'.$gId.'/activity/'.$aId : url()->previous()
        ]);
    }

    /**
    * DELETE
    * /group/{gId}/activity/{aId}/task/{tId}
    * Delete a given task
    */
    public function delete($gId, $aId, $tId) {
        $task = Task::find($tId);

        if (!$task) {
            return redirect('/group/'.$gId.'/activity/'.$aId)->with('alert', 'Task not found');
        }

        $task->delete();

        return redirect('/group/'.$gId.'/activity/'.$aId.'/task/'.$task->id)->with([
            'task' => $task,
            'gId' => $gId,
            'aId' => $aId,
            'alert' => $task->name.' was deleted.'
        ]);
    }
}
