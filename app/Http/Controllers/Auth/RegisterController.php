<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Club as Club;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/clubs';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showRegistrationForm()
    {
        return view('pages.pagenotfound');
    }

    public function register(Request $request)
    {
        /*$this->validator($request->all())->validate();

        $email = $request->input('email');
        
        $club = new Club;

        $club->name = $request->input('name');
        $club->email = $email;

        $club->save();

        $club = Club::where('email','LIKE',$email)->first();
        $club_id = $club->id;

        event(new Registered($user = $this->create($request->all(),$club_id)));

        
        return redirect('/admin/clubs');*/
    }

    protected function guard()
    {
        return Auth::guard('admin');
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, $club_id)
    {
        return User::create([
            'club_id' => $club_id,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
