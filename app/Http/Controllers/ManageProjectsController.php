<?php

namespace PMS\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PMS\User;
use PMS\Project;

class ManageProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

    	return view('admin/projects/index')->withProjects($projects);
    }

    
    public function create()
    {
        $proj_managers = DB::table('users')->join('user_infos', 'user_infos.user_id', '=', 'users.id')->where('account_type',3)->get();

        return view('admin/projects/create',['proj_managers'=> $proj_managers]);
    }

    public function store(Request $request)
    {
        $project = Project::create([
            'project_name' => $request['project_name'],
            'description' => $request['project_description'],
            'creator' => Auth::user()->id,
            'project_assigned_to' => $request['project_assigned_to'],
            'project_status' => 'ongoing'
        ]);

        return redirect('manage_project');
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
