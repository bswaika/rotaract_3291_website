<?php

namespace App\Http\Controllers;

use App\Club as Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $club_id = Auth::user()->club->id;
        $club = Club::find($club_id);

        $events = $club->events;
        $event = count($events);
        
        $members = $club->members;
        $member = count($members);

        return view('club.home', ["events"=>$event, "members"=>$member, "points"=>$club->points]);
    }
}
