<?php

namespace App\Http\Controllers\Admin;

use App\Zone as Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminZoneController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        //

        $zones = Zone::all();

        return view('functionalities.zones.listzones', ['zones'=>$zones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('functionalities.zones.createzone');
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
        $zone = new Zone;

        $zone->name = $request->input('name');
        $zone->zone_rep = $request->input('rep');
        $zone->zone_sec = $request->input('sec');

        $zone->save();

        return redirect('/admin/zones')->with('success', 'Zone Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $zone = Zone::find($id);

        return view('functionalities.zones.editzone', ["zone"=>$zone]);
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
        $zone = Zone::find($id);

        $zone->name = $request->input('name');
        $zone->zone_rep = $request->input('rep');
        $zone->zone_sec = $request->input('sec');

        $zone->save();

        return redirect('/admin/zones')->with('update_success', 'Zone Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('pages.pagenotfound');
    }
}
