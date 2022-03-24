<?php

use App\Member as Member;
use App\Event as Event;
use App\Zone as Zone;
use App\Club as Club;

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    $clubs = Club::all();
    $club_count = count($clubs);

    $zones = Zone::all();
    $zone_count = count($zones);

    $events = Event::all();
    $event_count = count($events);

    $members = Member::all();
    $member_count = count($members);

    return view('admin.home', ['clubs'=>$club_count, 'zones'=>$zone_count, 'members'=>$member_count, 'events'=>$event_count]);
})->name('home');

