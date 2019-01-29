<?php

namespace PMS\Http\Controllers;

use Illuminate\Http\Request;
use PMS\User;

class ManageUsersController extends Controller
{
    public function index()
    {
    	return view('admin/users/index');
    }
}
