<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use App\President;
use App\Secretary;
use App\Club as Club;
use Illuminate\Http\Request;
use App\Mail\RegisterClubMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class AdminHomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function listclub(){
        $clubs = Club::all();
        $users = \App\User::all();

        return view('functionalities.clubs.listclubs', ["users"=>$users, "clubs"=>$clubs]);
    }

    public function createclub(){
        return view('functionalities.clubs.createclub');
    }

    public function storeclub(Request $request)
    {
        //
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $email = $request->input('email');

        $club = new Club;

        $club->name = $request->input('name');
        $club->email = $email;

        $club->save();

        $president = new President;
        $president->club_id = $club->id;
        $president->save();

        $secretary = new Secretary;
        $secretary->club_id = $club->id;
        $secretary->save();

        //$club = Club::where('email','LIKE',$email)->first();
        //$club_id = $club->id;

        $user = new \App\User;

        $user->club_id = $club->id;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();
        //event(new Registered($user));

        $data['receiver'] = $club->name;
        $email = $email;
        $data['subject'] = "Welcome || Account Credentials || Rotaract 3291";
        $data['email'] = $request->input('email');
        $data['pwd'] = $request->input('password');

        Mail::to($email)->send(new RegisterClubMail($data));


        return redirect('/admin/clubs')->with('success', 'Club Added');
    }

    public function listadmin(){
        $admins = Admin::all();

        return view('functionalities.admins.listadmins', ["admins"=>$admins]);
    }

    public function createadmin(){
        return view('functionalities.admins.createadmin');
    }

    public function storeadmin(Request $request)
    {
        //
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = new Admin;

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));

        $admin->save();

        //$club = Club::where('email','LIKE',$email)->first();
        //$club_id = $club->id;
        //event(new Registered($user));


        return redirect('/admin/admins')->with('success', 'Club Added');
    }
}
