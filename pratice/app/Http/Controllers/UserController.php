<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

    // public function validatio($request)
    // {
    //     $valied = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    public function index()
    {
        $user = User::all();
        return view('index',\compact('user'));
    }

    public function create()
    {

        return view('register');
    }

    public function store(Request $request)
    {

        $valied = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = request('name');
        $user->role = request('role');
        $user->email = request('email');
        $user->password = Hash::make(request('password')) ;
        $user->save();
        return \redirect('/user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('useredit',\compact('user'));
    }

    public function update(Request $request, $id)
    {
        // $userid = $request->param('id');
        //return $id;
        $valied = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->role = request('role');
        $user->email = request('email');
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
