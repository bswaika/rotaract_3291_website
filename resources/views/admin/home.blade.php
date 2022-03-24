@extends('admin.layout.auth')

@section('content')
    <div class="container">
        <div class="welcome-message">
            <h3>Welcome, <span>{{Auth::guard('admin')->user()->name}}</span>!</h3>
        </div>
        <div class="welcome-display">
            <div class="circle zones">
                <h3 class="circle-heading">{{$zones}}</h3>
                <p class="circle-text">Zones</p>
            </div>
            <div class="circle clubs">
                <h3 class="circle-heading">{{$clubs}}</h3>
                <p class="circle-text">Clubs</p>
            </div>
            <div class="circle events">
                <h3 class="circle-heading">{{$members}}</h3>
                <p class="circle-text">Members</p>
            </div>
            <div class="circle members">
                <h3 class="circle-heading">{{$events}}</h3>
                <p class="circle-text">Events</p>
            </div>
        </div>
        <hr class="purple-hr">
        <div class="functionalities">
            <a href="/admin/pujo" class="dashboard-link">
                <div class="dashboard-button"><p>SHAROD SWIKRITI</p></div>
            </a>
            @if(Auth::guard('admin')->user()->type==0)
                <a href="/admin/admins" class="dashboard-link">
                    <div class="dashboard-button"><p>ADMINS</p></div>
                </a>
            @endif
            @if(Auth::guard('admin')->user()->type==2 || Auth::guard('admin')->user()->type==0)
                <a href="/admin/appointments" class="dashboard-link">
                    <div class="dashboard-button"><p>APPOINTMENTS</p></div>
                </a>
            @endif
            <a href="/admin/zones" class="dashboard-link">
                <div class="dashboard-button"><p>ZONES</p></div>
            </a>
            <a href="/admin/clubs" class="dashboard-link">
                <div class="dashboard-button"><p>REGISTER CLUBS</p></div>
            </a>
            <a href="/admin/members" class="dashboard-link">
                <div class="dashboard-button"><p>MEMBERS</p></div>
            </a>
            <a href="/admin/events" class="dashboard-link">
                <div class="dashboard-button"><p>EVENTS</p></div>
            </a>
            <a href="/admin/event/approvals" class="dashboard-link">
                <div class="dashboard-button"><p>EVENT APPROVALS</p></div>
            </a>
            <a href="/admin/event/blogs" class="dashboard-link">
                <div class="dashboard-button"><p>EVENT BLOGS</p></div>
            </a>
            <a href="/admin/event/images" class="dashboard-link">
                <div class="dashboard-button"><p>EVENT IMAGES</p></div>
            </a>
            <a href="/admin/leaderboard" class="dashboard-link">
                <div class="dashboard-button"><p>LEADERBOARD</p></div>
            </a>
            <a href="/admin/messages" class="dashboard-link">
                <div class="dashboard-button"><p>MESSAGES</p></div>
            </a>
            <a href="/admin/documents" class="dashboard-link">
                <div class="dashboard-button"><p>DOCUMENTS</p></div>
            </a>
        </div>
    </div>
@endsection
