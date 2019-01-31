<?php

namespace PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PMS\Task;

use PMS\User;


class EmployeeController extends Controller
{
    public function index()
    {

    }


    public function update($id, Task $task)
    {
    	$task = Task::find($id)->update([
    		'task_progress'=>request()->has('completed')
    	]);

    	return back();
    }
}
