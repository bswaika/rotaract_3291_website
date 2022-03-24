<?php

namespace App\Http\Controllers\Admin;

use App\Event as Event;
use App\EventBlog as EventBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminEventBlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::where('visibility', true)->orderBy('start_date')->get();

        return view('functionalities.eventblogs.listblogs', ["events"=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $events = Event::where('visibility', false)->where('start_date','<',date('Y-m-d', strtotime("now")))->get();

        return view('functionalities.eventblogs.createblog', ["events"=>$events]);
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
        $event_blog = new EventBlog;
        $event_id = $request->input('event');
        $event = Event::where('id',$event_id)->first();
        $event_blog->event_id = $event_id;
        $event_blog->title = $request->input('title');
        if($request->filled('body')){
            $event_blog->body = $request->input('body');
        }else{
            return redirect()->back()->with('fail', 'Description Required');
        }
        $event->visibility = true;

        $event_blog->save();
        $event->save();

        return redirect('/admin/event/blogs')->with('success', 'Blog Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $event_blog = EventBlog::find($id);

        return view('functionalities.eventblogs.editblog', ["event_blog"=>$event_blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $event_blog = EventBlog::find($id);
        $event_blog->title = $request->input('title');
        if($request->filled('body')){
            $event_blog->body = $request->input('body');
        }else{
            return redirect()->back()->with('fail', 'Description Required');
        }
        $event_blog->save();
        
        return redirect('/admin/event/blogs')->with('update_success', 'Blog Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event_blog = EventBlog::find($id);
        $event_blog->event->visibility = false;
        $event_blog->event->save();
        $event_blog->delete();

        return redirect('/admin/event/blogs')->with('delete_success', 'Blog Deleted');
    }
}
