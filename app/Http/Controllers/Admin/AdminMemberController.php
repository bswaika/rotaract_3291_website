<?php

namespace App\Http\Controllers\Admin;

use App\Club as Club;
use App\Member as Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminMemberController extends Controller
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

        $members = Member::all();

        return view('functionalities.members.listmembers', ['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $clubs = Club::all();

        return view('functionalities.members.createmember', ['clubs'=>$clubs]);
        
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

        $member = new Member;

        $member->club_id = $request->input('club');
        $member->name = $request->input('name');
        $member->contact = $request->input('contact');
        $member->email = $request->input('email');
        if($request->filled('bg')){
        	$member->bg = $request->input('bg');
        }
        $member->date_of_birth = $this->convertDate($request->input('dob'));

        $member->save();

        return redirect('/admin/members')->with('success', 'Member Added');
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
        $member = Member::find($id);
        $clubs = Club::all(); 
        
        $date = date('d/m/Y', strtotime($member->date_of_birth));

        return view('functionalities.members.editmember', ["clubs"=>$clubs, "member"=>$member, "date"=>$date]);
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
        $member = Member::find($id);
        $member->club_id = $request->input('club');
        $member->name = $request->input('name');
        $member->contact = $request->input('contact');
        $member->email = $request->input('email');
        if($request->filled('bg')){
        	$member->bg = $request->input('bg');
        }
        $member->date_of_birth = $this->convertDate($request->input('dob'));

        $member->save();

        return redirect('/admin/members')->with('update_success', 'Member Added');
        
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

        $member = Member::find($id);

        $member->delete();

        return redirect('/admin/members')->with('delete_success', 'Member Added');
        
    }

    public function convertDate($date){
        $convDate = date('Y-m-d', strtotime(str_replace("/", "-", $date)));
        return $convDate;
    }
}
