<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at' , 'DESC')->paginate(25);
        return view('admin.users.index' , compact('users'));
    }

    // change user role
    public function changeRole($id)
    {
       $user = User::findOrFail($id);
       if($user->role === 1){
           $user->role = 0;
           $user->save();
       }else if($user->role === 0 ){
           $user->role = 1;
           $user->save();
       }
       return redirect()->back()->with('success' , 'User Role Changed Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|boolean' ,
            'avatar' => 'image|mimes:png,jpg,jpeg',
        ]);

        $avatar = '';
        if($request->hasFile('avatar')){
            $avatar = UploadImage($request->avatar , 'uploads/users');
        }else{
            $avatar = 'uploads/users/avatar.png';
        }

        User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => hash::make('password') ,
            'role' => $request->role,
            'avatar' => $avatar ,
        ]);

        Session::flash('success' , 'User Registed Successfully');
        return redirect()->back();
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
        return view('admin.users.edit')->with('user' , User::findOrFail($id));
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
        $this->validate($request , [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|boolean' ,
            'avatar' => 'image|mimes:png,jpg,jpeg',
        ]);

        $user = User::findOrFail($id);

        $avatar = '';
        if($request->hasFile('avatar')){
            $avatar = UploadImage($request->avatar , 'uploads/users');
            $user->avatar = $avatar;
            $user->save();
        }

        if(!empty($request->password)){
            $this->validate($request , ['password' => 'string|min:6|confirmed',]);
            $user->password = Hash::make($request->password);
            $user->save();
        }

        //dd(array_except($request->all() , ['_method' ,'_token' , 'password']));
        $user->fill(array_except($request->all() , ['_method' , '_token' ,'avatar' , 'password']))->save();

        return redirect()->route('users.index')->with('success' , 'User Information Changed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(file_exists($user->avatar) && $user->avatar != 'uploads/users/avatar.png'){
            unlink($user->avatar);
        }
        $user->destroy($id);
        $user->save();
        return redirect()->back()->with('success' , 'User Deleted Successfully');
    }
}
