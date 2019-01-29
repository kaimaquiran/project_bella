<?php

namespace PMS\Http\Controllers;

use Illuminate\Http\Request;
use PMS\User;
use PMS\Project;

class ManageProjectsController extends Controller
{
    public function index()
    {
    	return view('admin/projects/index');
    }
}
