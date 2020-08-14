<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Gate;

class UsersController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');

        /* if(Gate::allows('isAdmin')){
            abort(404,"No cant do");
        }
        */
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        $users=User::all();
        
        return view('users.index',compact('users'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
       if($request->avatar->getClientOriginalName()){
        $ext=$request->avatar->getClientOriginalExtension();
        $file=rand(1,9999).'.'.$ext;
        $request->avatar->storeAs('public/avatars',$file);
       }
       else
       {
           $file='';
       }
        $user-> avatar = $file;
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> role= $request->role;
        $user-> password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success','User Added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users['user']=$user;
        return view('users.profile')->with($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->avatar->getClientOriginalName()){
            $ext=$request->avatar->getClientOriginalExtension();
            $file=rand(1,9999).'.'.$ext;
            $request->avatar->storeAs('public/avatars',$file);
           }
           else
           {
               $file='';
           }
        $user-> avatar = $file;
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> role = $request->role;
        $user->save();
        return redirect()->route('users.index')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
