<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SsParticipant as Ss;

class PujoController extends Controller
{
    //

    public function showform(){
        return view('pages.pujo');
    }

    public function registerparticipant(Request $request){
        $ss = new Ss;
        $ss->name = $request->input('name');
        $ss->club = $request->input('club');
        $ss->zone = $request->input('zone');
        $ss->contact = $request->input('contact');
        $ss->food = $request->input('food');
        $ss->pay = $request->input('pay');

        $ss->save();

        return redirect('/pujo')->with('success', 'Thank You');
    }

}
