<?php

namespace PMS\Http\Controllers\Auth;

use PMS\User;
use PMS\UserInfo;
use PMS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {
        $user_info = UserInfo::all();
        $user = User::all();

        $account_type = DB::table('account_type')->get();

        $total_arr = $user->merge($user_info);
        // $total_arr = $total_arr->merge($account_type);

        // echo '<pre>';
        // echo var_dump($total_arr);
        // echo '</pre>';
        // return;
        
        return view("auth.register")->with(['data'=>$total_arr,'account_types'=>$account_type]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \PMS\User
     * @return \PMS\UserInfo
     */
    protected function create(array $data)
    {
        //insert to user_info tbl
        
        //insert to user tbl
        $user =  User::create([
            'username'      => $data['username'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'account_type'  =>   $data['account_type'],
        ]);

        $user_details = UserInfo::create([
            'user_id'       =>   $user->id,
            'first_name'    =>   $data['firstname'],
            'middle_name'   =>   $data['middlename'],
            'last_name'     =>   $data['lastname'],
            'gender'        =>   $data['gender'],
            'birthday'      =>   $data['birthday'],
        ]);


        return $user;

    }
}
