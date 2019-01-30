<?php

namespace PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use Session;

use PMS\User;

class ManageUsersController extends Controller
{
    public function index()
    {
    	$users = DB::table('users')
                ->join('user_infos', 'user_infos.user_id', '=', 'users.id')
                ->join('account_type','account_type.id','=','users.account_type')
                ->select('*')
                ->get();

    	return view('admin/users/index')->withUsers($users);
    }

    public function create()
    {

    }

    public function edit()
    {

    }




    //add
    public function store()
    {

    }


    //update
    public function update($id)
    {

    }

   	//delete 
    public function destroy($id)
    {
    	
    }


}
