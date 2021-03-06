<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hash;
use App\User;
use App\Role;
use Purifier;
use Auth;

class UserController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function login(Request $request)
    {   
        return view('forms.login');
    }

    public function auth(Request $request)
    {
        $data = $request->all();

        $data = array_map(function($input){
              return Purifier::clean($input);
            },$data);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // Authentication passed...
            return redirect()->intended('/user/dashboard');
        }
        else
            return redirect()->route('auth.login')->with('danger', 'Invalid User');
    }

    public function signup(Request $request)
    {
        return view('forms.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->only('first_name', 'last_name', 'age', 'email', 'password');
        
        $user = new User();
        
        //validate user data   
        $validator = $user->validate($data);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        //Create user
        $user = User::Create(array(
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'age' => $data['age'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password'])
                    ));

        //Update user role
        $role_user = 'student';
        //If age less than 17 change role to junior student
        if($data['age'] < 17)
            $role_user = 'junior_student';
        //Get role name
        $role = Role::where('name', $role_user)->first();
        //If exists attach role to user
        if(@$role)
            $user->roles()->attach($role->id);

        return redirect()->route('books')->with('success', 'Registered');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
