<?php

namespace PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth;
use Session;

use PMS\User;
use PMS\UserInfo;

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

        $account_type = DB::table('account_type')->get();

        return view('admin/users/create')->with(['account_types' => $account_type]);
    }

    public function edit()
    {

    }



    //add
    public function store(Request $request)
    {
        //insert to user_info tbl
        
        //insert to user tbl
        $user =  User::create([
            'username'      => $request['username'],
            'email'         => $request['email'],
            'password'      => Hash::make($request['password']),
            'account_type'  =>   $request['account_type'],
        ]);

        $user_details = UserInfo::create([
            'user_id'       =>   $user->id,
            'first_name'    =>   $request['firstname'],
            'middle_name'   =>   $request['middlename'],
            'last_name'     =>   $request['lastname'],
            'gender'        =>   $request['gender'],
            'birthday'      =>   $request['birthday'],
        ]);


        return redirect('/manage_user');
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
