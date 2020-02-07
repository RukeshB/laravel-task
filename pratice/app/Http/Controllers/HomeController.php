<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Location;
use App\Role;
use App\Permission;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('welcome');
        $user = User::all();
        return view('welcome',\compact('user'));
    }

    public function all()
    {
        $user = User::all();
        $authUser = Auth::user();

        if($authUser->can('viewAny',$authUser)){
            return view('home',\compact('user'));
        }
        else{
            return 'restricted';
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        $location = Location::all();
        $role = Role::all();
        $authUser = Auth::user();
        if($authUser->can('update',$authUser)){
            return view('useredit',\compact('user','location','role'));
        }
        else{
            return 'restricted';
        }
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
        return \redirect('/home');
    }

    public function role(Request $request, $id, $role)
    {
        $user = User::findOrFail($id);

        if($role == 'admin')
        {
            $user->role = 'user';
        }

        elseif($role == 'user')
        {
            $user->role = 'admin';
        }
        $user->save();
        // $user = User::where('id', '=', $id)->update();
        return \redirect()->route('home.list');
    }

    public function delete($id)
    {
        dd($id);
        $authUser = Auth::user();
        if($authUser->can('delete',$authUser)){



            User::destroy($id);
            return \redirect('/home');
        }
        else{
            return 'restricted';
        }
    }


    public function setting()
    {
        return view('setting');
    }

    public function change(Request $request)
    {

        $valied = $request->validate([

            'password_new' => ['required', 'max:255'],
            'password_confirm' => ['same:password_new'],
        ]);

        if(Hash::check(request('password_old'), Auth::user()->password) )
        {
            if(request('password_old')!=request('password_new'))
            {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make(request('password_new'));
                $user->save();
                return redirect('/home');
            }
            else{
                return redirect()->route('setting')->with('message', 'old and new password is same');
            }
        }
        else{
            return redirect()->route('setting')->with('message', 'Invalid Old password');
        }
    }

    public function showPermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('permissions',compact('roles','permissions'));
    }

    public function setPermissions(Request $request){

        $r = $request->role;
        $role = Role::find($r);
        $role->permission()->sync($request->permissions);
        dd($request);

        return 'check db';
    }
}
