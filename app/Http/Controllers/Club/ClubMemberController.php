<?php

namespace App\Http\Controllers\Club;

use App\Club as Club;
use App\Member as Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClubMemberController extends Controller
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
        $members = $club->members;

        return view('club.functionalities.members.listmembers', ['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('club.functionalities.members.createmember');
        
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

        $club = Auth::user()->club;

        $member = new Member;

        $member->club_id = $club->id;
        $member->name = $request->input('name');
        $member->contact = $request->input('contact');
        $member->email = $request->input('email');
        if($request->filled('bg')){
        	$member->bg = $request->input('bg');
        }
        $member->date_of_birth = $this->convertDate($request->input('dob'));

        $member->save();

        return redirect('/club/members')->with('success', 'Member Added');
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
        
        $date = date('d/m/Y', strtotime($member->date_of_birth));

        return view('club.functionalities.members.editmember', ["member"=>$member, "date"=>$date]);
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
        $member->name = $request->input('name');
        $member->contact = $request->input('contact');
        $member->email = $request->input('email');
        if($request->filled('bg')){
        	$member->bg = $request->input('bg');
        }
        $member->date_of_birth = $this->convertDate($request->input('dob'));

        $member->save();

        return redirect('/club/members')->with('update_success', 'Member Added');
        
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

        return redirect('/club/members')->with('delete_success', 'Member Added');
        
    }

    public function convertDate($date){
        $convDate = date('Y-m-d', strtotime(str_replace("/", "-", $date)));
        return $convDate;
    }
}
