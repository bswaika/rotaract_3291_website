<?php

namespace App\Http\Controllers\Club;

use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClubSecretaryController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function editsecretary(){
        $club = Auth::user()->club;

        return view('club.functionalities.secretary.editprofile', ["club"=>$club]);
    }

    public function updatesecretary(Request $request){
        $club = Auth::user()->club;

        if($request->hasFile('image')){
            $filename = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/club_secretaries', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $club->secretary->image = $fileNameToStore;
        $club->secretary->name = $request->input('name');
        $club->secretary->contact = $request->input('contact');
        $club->secretary->email = $request->input('email');

        $club->secretary->save();

        return redirect('/club/secretary')->with('success', 'Profile Updated');
        
    }
    
}
