<?php

namespace App\Http\Controllers\Club;

use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClubPresidentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function editpresident(){
        $club = Auth::user()->club;

        return view('club.functionalities.president.editprofile', ["club"=>$club]);
    }

    public function updatepresident(Request $request){
        $club = Auth::user()->club;

        if($request->hasFile('image')){
            $filename = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/club_presidents', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $club->president->club_id = $club->id;
        $club->president->image = $fileNameToStore;
        $club->president->name = $request->input('name');
        $club->president->contact = $request->input('contact');
        $club->president->email = $request->input('email');

        $club->president->save();

        return redirect('/club/president')->with('success', 'Profile Updated');
        
    }
    
}
