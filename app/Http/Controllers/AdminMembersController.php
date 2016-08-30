<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Purifier;
use Auth;
use Input;
use File;
use Hash;
use App\User;
use App\Role;

class AdminMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        //If search query present
        if(Input::has('q')){
            $search = Input::get('q');
            $members = User::where('first_name', 'LIKE', '%'.$search.'%')
                ->orWhere('last_name', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%')
                ->paginate(15);
        }
        else{
            $members = User::paginate(15);
        }

        return view('admin.users.index', compact('user', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        
        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('first_name', 'last_name', 'age', 'email', 'password');
        
        $user = new User();
        
        $validator = $user->validate($data);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $user = User::Create(array(
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'age' => $data['age'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password'])
                    ));

        $role_user = 'student';
        if($data['age'] < 17)
            $role_user = 'junior_student';
        //Get role name
        $role = Role::where('name', $role_user)->first();
        //If exists attach role to user
        if(@$role)
            $user->roles()->attach($role->id);

        return redirect()->route('admin.users')->with('success', 'User Created');
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
        $user = Auth::user();

        $profile = User::find($id);

        return view('admin.users.show', compact('user', 'profile'));
    }


    public function edit($id)
    {
        //
        $user = Auth::user();

        $profile = User::find($id);

        return view('admin.users.create', compact('user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit($id)
    {
        $user = Auth::user();

        $profile = User::find($id);
        
        $data = Input::all();
        
        $data = array_map(function($input){
              return Purifier::clean($input);
            },$data);

        $profile->first_name = $data['first_name'];
        $profile->last_name = $data['last_name'];
        $profile->email = $data['email'];
        $profile->age = $data['age'];
        $profile->password = Hash::make($data['password']);
        $profile->save();

        return redirect()->route('books')->with('success', 'User Updated');
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
        $user = Auth::user();   

        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'User Deleted');
    }
}
