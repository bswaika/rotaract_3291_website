@extends('club.layouts.app')

@section('content')
    <div class="container">
        <div class="welcome-message">
            <h3>Welcome, <span>{{Auth::user()->club->name}}</span>!</h3>
        </div>
        <div class="welcome-display">
            <div class="circle members">
                <h3 class="circle-heading">{{$members}}</h3>
                <p class="circle-text">Members</p>
            </div>
            <div class="circle events">
                <h3 class="circle-heading">{{$events}}</h3>
                <p class="circle-text">Events</p>
            </div>
            <div class="rectangle points">
                <h3 class="rectangle-heading">{{$points!=null ? $points : 0}}</h3>
                <p class="rectangle-text">Points</p>
            </div>
        </div>
        <hr class="purple-hr">
        <div class="functionalities">
            <a href="/club/profile" class="dashboard-link">
                <div class="dashboard-button"><p>EDIT CLUB PROFILE</p></div>
            </a>
            <a href="/club/president" class="dashboard-link">
                <div class="dashboard-button"><p>EDIT PRESIDENT</p></div>
            </a>
            <a href="/club/secretary" class="dashboard-link">
                <div class="dashboard-button"><p>EDIT SECRETARY</p></div>
            </a>
            <a href="/club/members" class="dashboard-link">
                <div class="dashboard-button"><p>MEMBERS</p></div>
            </a>
            <a href="/club/events" class="dashboard-link">
                <div class="dashboard-button"><p>EVENTS</p></div>
            </a>
            <a href="/club/event/blogs" class="dashboard-link">
                <div class="dashboard-button"><p>EVENT BLOGS</p></div>
            </a>
            <a href="/club/event/images" class="dashboard-link">
                <div class="dashboard-button"><p>EVENT IMAGES</p></div>
            </a>
        </div>
    </div>
@endsection
