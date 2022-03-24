<?php

namespace App\Http\Controllers;

use App\Zone;
use App\Member;
use App\Document as Document;
use App\Appointment;
use App\Club as Club;
use App\Event as Event;
use App\Message as Message;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $past_events = Event::where('club_id', null)->where('start_date','<',date('Y-m-d', strtotime("now")))->orderBy('start_date','DESC')->take(3)->get();
        $upcoming_events = Event::where('club_id', null)->where('start_date','>=',date('Y-m-d', strtotime("now")))->orderBy('start_date')->take(4)->get();
        $members = Member::where('date_of_birth',date('Y-m-d', strtotime("now")))->get();
        return view('pages.index',['past'=>$past_events,'upcoming'=>$upcoming_events, "members"=>$members]);
    }

    public function storeMessage(Request $request){
        $msg = new Message;
        if($request->filled('message')){
            $msg->name = $request->input('name');
            $msg->email = $request->input('email');
            $msg->message = $request->input('message');
        }else{
            return redirect()->back();
        }
        $msg->save();
        return redirect('/')->with('success', 'Thank You');
    }

    public function drr(){
        return view('pages.drr');
    }

    public function storeAppointment(Request $request){
        $appt = new Appointment;
        $appt->name = $request->input('name');
        $appt->contact = $request->input('contact');
        $appt->email = $request->input('email');
        $appt->date = $this->convertDate($request->input('date'));

        $appt->save();

        return redirect('/drr')->with('success', 'Thank You');
    }

    public function events(){
        $events = Event::where('status', true)->orderBy('start_date')->get();
        return view('pages.events', ["events"=>$events]);
    }

    public function event($id){
        $event = Event::find($id);

        if($event->status==false){
            return redirect('/');
        }else{
            return view('pages.event', ["event"=>$event]);
        }
    }

    public function clubs(){
        $zones = Zone::orderBy('id')->get();

        return view('pages.clubs', ["zones"=>$zones]);
    }

    public function club($id){
        $club = Club::find($id);

        if($club->visibility==false){
            return redirect('/');
        }else{
            return view('pages.club', ["club"=>$club]);
        }
    }

    public function documents(){
        $documents = Document::all();

        return view('pages.documents', ["documents"=>$documents]);
    }

    public function leaderboard(){
        $clubs = Club::orderBy('points', 'DESC')->orderBy('name')->get();
        foreach($clubs as $key=>$club){
            if($club->rank==0){
                $club->rank = $key+1;
                $club->old_rank = $club->rank;
            }else{
                $club->rank = $key+1;
            }
            $club->save();
        }
        return view('pages.leaderboard', ["clubs"=>$clubs]);
    }

    public function district(){
        return view('pages.council');
    }

    public function convertDate($date){
        $convDate = date('Y-m-d H:i', strtotime(str_replace("/", "-", $date)));
        return $convDate;
    }

}
