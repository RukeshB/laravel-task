<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

    public function index()
    {
        $user = User::all();
        return view('home',\compact('user'));
    }

    public function create()
    {

        return view('register');
    }

    public function store()
    {

        $user = new User();
        $user->name = request('name');
        $user->role = request('role');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        return \redirect('/user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('useredit',\compact('user'));
    }

    public function update($id)
    {
        // $userid = $request->param('id');
        //return $id;
        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->role = request('role');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        // $user = User::where('id', '=', $id)->update();
        return \redirect('/user');
    }

    public function delete($id)
    {
        User::destroy($id);
        return \redirect('/user');
    }
}
