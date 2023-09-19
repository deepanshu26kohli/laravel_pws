<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Models\User::with(['roles','profile'])->get();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Models\Role::all();
        $countries = \App\Models\Country::all();
        return view('dashboard.users.create',compact('countries','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = [
               'username' => $request->username,
               'name' => $request->name,
               'email' => $request->email,
               'password' => bcrypt($request->password),
        ];
        $user = \App\Models\User::create($user);
        $filename = sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if($request->hasFile('photo'))
                $filename =  $request->file('photo')->storeAs('profiles',$filename,'public');
        else
                $filename = "profiles/dummy.jpg";
        if($user){
            $profile = new \App\Models\UserProfile(
                [
                    'user_id' => $user->id,
                    'city' => $request->city,
                    'country_id' => $request->country_id,
                    'photo' => $filename,
                    'phone' => $request->phone 
                ]);
                $user->profile()->save($profile);
                $user->roles()->attach($request->roles);
                return redirect()->route('users.index');
        }

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
