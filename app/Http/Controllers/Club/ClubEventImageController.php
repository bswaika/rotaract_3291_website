<?php

namespace App\Http\Controllers\Club;

use App\Event as Event;
use Illuminate\Http\Request;
use App\EventImage as EventImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClubEventImageController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function listimage(){
        $club = Auth::user()->club;
        $events = Event::where('club_id',$club->id)->orderBy('start_date')->get();
        return view('club.functionalities.eventimages.listimages', ["events"=>$events]);
    }

    public function storeimage(Request $request, $id){

        $event = Event::find($id);
        if($request->hasFile('image')){
            $filename = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/event_images', $fileNameToStore);

            $event_poster = new EventImage;
            $event_poster->event_id = $event->id;
            $event_poster->display_type = 1;
            $event_poster->image = $fileNameToStore;

            $event_poster->save();

            return redirect('/club/event/images')->with('success', 'Image Added');
        }

        return redirect('/club/event/images')->with('delete_success', 'Image Added');

    }

    public function showimage($id){
        $event = Event::find($id);
        
        return view('club.functionalities.eventimages.showimages', ["event"=>$event]);
    }

    public function destroyimage($id){
        $event_image = EventImage::find($id);

        Storage::delete('public/event_images/'.$event_image->image);

        $event_image->delete();
        
        return redirect(url('/club/event/images/'.$event_image->event->id))->with('delete_success', 'Image Deleted');
    }
}
