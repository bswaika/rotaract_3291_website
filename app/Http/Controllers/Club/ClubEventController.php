<?php

namespace App\Http\Controllers\Club;

use App\Event as Event;
use Illuminate\Http\Request;
use App\EventImage as EventImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClubEventController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $club = Auth::user()->club;
        $events = Event::where('club_id',$club->id)->orderBy('start_date','DESC')->get();

        return view('club.functionalities.events.listevents', ['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('club.functionalities.events.createevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('poster')){
            $filename = pathinfo($request->file('poster')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('poster')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('poster')->storeAs('public/event_posters', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $event = new Event;
        $event->club_id = Auth::user()->club->id;
        $event->name = $request->input('name');
        if($request->filled('avenue')){
        	$event->avenue = $request->input('avenue');
        }
        $event->venue = $request->input('venue');
        if($request->filled('description')){
            $event->description = $request->input('description');
        }else{
            return redirect()->back()->with('fail', 'Description Required'); 
        }
        $event->start_date = $this->convertDate($request->input('start'));
        $event->end_date = $this->convertDate($request->input('end'));
        $event->reg_open_date = $this->convertDate($request->input('open'));
        $event->reg_close_date = $this->convertDate($request->input('close'));
        if($request->filled('amount')){
        	$event->reg_amount = $request->input('amount');
        }
        if($request->filled('reg')){
            $event->reg_link = $request->input('reg');
        }
        if($request->filled('fb')){
            $event->fb_link = $request->input('fb');
        }
        if($request->filled('tw')){
            $event->tw_link = $request->input('tw');
        }
        if($request->filled('ins')){
            $event->ins_link = $request->input('ins');
        }
        $event->status = false;
        $event->visibility = false;

        $event->save();

        $event_poster = new EventImage;
        $event_poster->event_id = $event->id;
        $event_poster->display_type = 0;
        $event_poster->image = $fileNameToStore;

        $event_poster->save();

        return redirect('/club/events')->with('success', 'Event Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('pages.pagenotfound');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $start = date('d/m/Y', strtotime($event->start_date));
        $end = date('d/m/Y', strtotime($event->end_date));
        $open = date('d/m/Y', strtotime($event->reg_open_date));
        $close = date('d/m/Y', strtotime($event->reg_close_date));

        return view('club.functionalities.events.editevent', ["event"=>$event, "start"=>$start, "end"=>$end, "open"=>$open, "close"=>$close]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $event = Event::find($id);
        $event_poster = EventImage::where('event_id', $event->id)->where('display_type',0)->first();

        if($request->hasFile('poster')){
            $filename = pathinfo($request->file('poster')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('poster')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('poster')->storeAs('public/event_posters', $fileNameToStore);
            
            if($event_poster->image!="noimage.jpg"){
                Storage::delete('public/event_posters/'.$event_poster->image);
            }
            
        }

        $event->name = $request->input('name');
        if($request->filled('avenue')){
        	$event->avenue = $request->input('avenue');
        }
        $event->venue = $request->input('venue');
        if($request->filled('description')){
            $event->description = $request->input('description');
        }else{
            return redirect()->back()->with('fail', 'Description Required'); 
        }
        $event->start_date = $this->convertDate($request->input('start'));
        $event->end_date = $this->convertDate($request->input('end'));
        $event->reg_open_date = $this->convertDate($request->input('open'));
        $event->reg_close_date = $this->convertDate($request->input('close'));
        if($request->filled('amount')){
        	$event->reg_amount = $request->input('amount');
        }
        if($request->filled('reg')){
            $event->reg_link = $request->input('reg');
        }
        if($request->filled('fb')){
            $event->fb_link = $request->input('fb');
        }
        if($request->filled('tw')){
            $event->tw_link = $request->input('tw');
        }
        if($request->filled('ins')){
            $event->ins_link = $request->input('ins');
        }

        $event->save();

        if($request->hasFile('poster')){
            $event_poster->image = $fileNameToStore;

            $event_poster->save();
        }

        return redirect('/club/events')->with('update_success', 'Event Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::find($id);
        $event_poster = EventImage::where('event_id', $event->id)->where('display_type',0)->first();

        if($event->blog!=null){
            $event->blog->delete();
        }
        
        if($event_poster->image!="noimage.jpg"){
            Storage::delete('public/event_posters/'.$event_poster->image);
        }

        if(count($event->images)>1){
            foreach($event->images as $image){
                if($image->display_type==1){
                    Storage::delete('public/event_images/'.$image->image);
                    $image->delete();
                }
            }
        }

        $event_poster->delete();
        $event->delete();

        return redirect('/club/events')->with('delete_success', 'Event Deleted');
    }

    public function convertDate($date){
        $convDate = date('Y-m-d', strtotime(str_replace("/", "-", $date)));
        return $convDate;
    }
}
