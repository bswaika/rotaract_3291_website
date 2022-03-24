<?php

namespace App\Http\Controllers\Club;

use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClubProfileController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function editprofile(){
        $zones = Zone::all();
        $club = Auth::user()->club;

        return view('club.functionalities.profile.editprofile', ["club"=>$club, "zones"=>$zones]);
    }

    public function updateprofile(Request $request){
        $club = Auth::user()->club;

        $club->zone_id = $request->input('zone');
        if($request->hasFile('logo')){
            $filename = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('logo')->storeAs('public/club_logos', $fileNameToStore);
            $club->logo = $fileNameToStore;
        }
        
        $club->name = $request->input('name');
        $club->contact = $request->input('contact');
        $club->email = $request->input('email');
        $club->shorthand = $this->abbreviate($club->name);
        $club->established_in = $request->input('est');
        $club->parent_rotary = $request->input('parent');
        if($request->filled('meet_venue')){
            $club->meet_venue = $request->input('meet_venue');
        }
        if($request->filled('meet_time')){
            $club->meet_time = $request->input('meet_time');
        }
        if($request->filled('about')){
            $club->about = $request->input('about');
        }
        if($request->filled('website')){
            $club->website = $request->input('website');
        }
        if($request->filled('fb')){
            $club->fb_link = $request->input('fb');
        }
        if($request->filled('tw')){
            $club->tw_link = $request->input('tw');
        }
        if($request->filled('ins')){
            $club->ins_link = $request->input('ins');
        }
        $club->visibility = true;

        $club->save();

        return redirect('/club/profile')->with('success', 'Profile Updated');
        
    }

    public function abbreviate($string){
        $abbreviation = "";
        $string = ucwords($string);
        $words = explode(" ", "$string");
          foreach($words as $word){
              $abbreviation .= $word[0];
          }
       return $abbreviation; 
    }
    
}
