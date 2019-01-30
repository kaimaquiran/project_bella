<?php

namespace PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use PMS\Project;
use PMS\User;
use PMS\Task;

class ManageTasksController extends Controller
{
    public function index()
    {
        $task = Task::all();

    	return view('manager/tasks/index')->withTask($task);
    }

    public function create()
    {
        $project = Project::all();
        $user = DB::table('users')->join('user_infos', 'user_infos.user_id', '=', 'users.id')->where('account_type',2)->get();

        return view('manager/tasks/create',['project' => $project,'user' => $user]);
    }

    public function store(Request $request)
    {

        $task = Task::create([
            'task_name' => $request['task_name'],
            'description' => $request['task_description'],
            'project_id' => $request['project_id'],
            'task_assigned_to' => $request['task_assigned_to'],
            'task_priority'=> $request['task_priority'],
            'task_status'=> 'New',
            'task_progress'=> 0,
        ]);

        return redirect('/manage_task');

    }
}
