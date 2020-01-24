<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Location;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'dob'=> ['required'],
            'gender'=>['required'],
            'location_id'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([

            'name' => $data['name'],
            'dob'=>$data['dob'],
            'location_id'=>$data['location'],
            'gender'=>$data['gender'],
            'role' => 'user',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

     public function showRegistrationForm()
    {
       // $location = new Location();
        $location = Location::all();
        //dd($location);
        return view('auth.register',compact('location'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user= new User;

        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            // $thumbnails = Image::make($file->getRealPath())->resize(100, 100);
            // $thumbnails= Image::make($file->resize(100, 100));
            $extension = $file->getClientOriginalExtension(); //get image extension
            $filename = time().'.'.$extension;
            $file->move('uploads/image/avater/',$filename);
            //$thumbnails->move('uploads/image/avater/thumb/',$filename);
            // $thumbnails->save(public_path('uploads/image/avater/thumb' .$filename));
            $user->image = 'uploads/image/avater/'.$filename;
        }

        //dd($request);

        $user->name = request('name');
        $user->dob = request('dob');
        $user->gender = request('gender');
        $user->loctaion_id = request('location_id');
        $user->role = 'user';
        $user->email = request('email');
        $user->password= Hash::make(\request('password'));
        $user->save();

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
