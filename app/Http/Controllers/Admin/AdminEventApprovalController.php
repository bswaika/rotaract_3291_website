<?php

namespace App\Http\Controllers\Admin;

use App\Event as Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminEventApprovalController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function listapprovals(){
        $events = Event::orderBy('start_date', 'DESC')->get();

        return view('functionalities.eventapprovals.listapprovals', ["events"=>$events]);
    }

    public function approve(Request $request, $id){
        $event = Event::find($id);
        $event->status = true;
        $event->save();

        return redirect('/admin/event/approvals')->with('success', 'Event Approved');
    }

    public function unapprove(Request $request, $id){
        $event = Event::find($id);
        $event->status = false;
        $event->save();

        return redirect('/admin/event/approvals')->with('delete_success', 'Event Unapproved');
    }
    
}
