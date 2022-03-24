<?php

namespace App\Http\Controllers\Admin;

use App\Club;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLeaderBoardController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function list(){
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
        return view('functionalities.leaderboard.listleaderboard', ["clubs"=>$clubs]);
    }

    public function update(Request $request, $id){
        $club = Club::find($id);
        $club->points = $club->points + $request->input('points');
        $club->save();

        $clubs = Club::orderBy('points', 'DESC')->orderBy('name')->get();
        foreach($clubs as $key=>$club){
            if($club->rank==0){
                $club->rank = $key+1;
                $club->old_rank = $club->rank;
            }else{
                $club->old_rank = $club->rank;
                $club->rank = $key+1;
            }
            $club->save();
        }

        return redirect('/admin/leaderboard')->with('success', 'Points Updated');
    }
}
