<?php

namespace PMS\Http\Controllers;

use Illuminate\Http\Request;

class ManageTasksController extends Controller
{
    public function index()
    {
    	return view('manager/tasks/index');
    }
}
