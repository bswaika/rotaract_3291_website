<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,700|Roboto:300,400,700" rel="stylesheet">

    <!-- HOVER CSS STYLES -->
    <link href="/css/extra/vendors/hover-master/css/hover.css" rel="stylesheet" type="text/css" media="all">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/static/main.css">
    <link rel="stylesheet" type="text/css" href="/css/static/events.css">
    <link rel="stylesheet" type="text/css" href="/css/static/club.css">    
    <link rel="stylesheet" type="text/css" href="/css/static/app-iso.css">

    <title>Rotaract 3291</title>
</head>
<body>

    <div id="navbar-menu-div" class="navbar-menu">
        <ul class="navbar-menu-list">
            <li class="navbar-menu-item"><i id="menu-slide-in" class="fas fa-chevron-left"></i></li>
            <li class="navbar-menu-item hvr-sweep-to-right"><a href="/" class="rbt">Home</a></li>
            <li class="navbar-menu-item hvr-sweep-to-right"><a href="/clubs" class="rbt">Clubs</a></li>
            <li class="navbar-menu-item hvr-sweep-to-right"><a href="/events" class="rbt">Events</a></li>
            <li class="navbar-menu-item hvr-sweep-to-right"><a href="/district" class="rbt">District Council</a></li>
            <li class="navbar-menu-item hvr-sweep-to-right"><a href="/drr" class="rbt">DRR's Calendar</a></li>
            <li class="navbar-menu-item hvr-sweep-to-right"><a href="/leaderboard" class="rbt">LeaderBoard</a></li>
            <li class="navbar-menu-item hvr-sweep-to-right"><a href="/documents" class="rbt">Documents</a></li>
        </ul>
        <img src="/storage/site_assets/clipped-wheel-bottom-right.png" alt="Clipped Version of the Rotary Wheel" class="navbar-menu-img">        
    </div>

    <nav class="navbar">
        <div class="navbar-icon-helper"><i id="menu-slide-out" class="fas fa-bars"></i></div>
        @if($club->logo!=null) 
            <img src="/storage/club_logos/{{$club->logo}}" alt="{{$club->name}} Logo" class="logo">
        @else
            <img src="/storage/site_assets/logo.png" alt="Rotaract District 3291 Logo" class="logo">
        @endif
    </nav>

    <header class="club home-hero">
        <img src="/storage/site_assets/cover/cover-clubs.jpg" alt="Stock Photo of Friendship" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <!--<img src="assets/images/rctiu_white.png" class="club-logo">-->
        <h1 class="home-hero-title rbt"><span>ROTARACT CLUB OF </span>{{strtoupper($club->name)}}</h1>
        <div class="club-menu cmfrt">
            <ul>
                <li class="active hvr-underline-from-left" id="about">About</li>
                <li class="hvr-underline-from-left" id="events">Events</li>
                <li class="hvr-underline-from-left" id="members">Members</li>
            </ul>
        </div>
    </header>

    <section class="about-club">
        <div class="container">
            <h2 class="cmfrt">Year of Establishment</h2>
            <p class="rbt">{{$club->established_in}}</p>
            <hr class="purple-hr left-hr">
            <h2 class="cmfrt">Parent Rotary</h2>
            <p class="rbt">{{$club->parent_rotary}}</p>
            <hr class="purple-hr left-hr">
            @if($club->meet_venue!=null)
            <h2 class="cmfrt">Meeting Venue</h2>
            <p class="rbt">{{$club->meet_venue}}</p>
            <hr class="purple-hr left-hr">
            @endif
            @if($club->meet_time!=null)
            <h2 class="cmfrt">Meeting Day and Time</h2>
            <p class="rbt">{{$club->meet_time}}</p>
            <hr class="purple-hr left-hr">
            @endif
            @if($club->about!=null)
            <div class="about-about-club rbt">
                {!!$club->about!!}
            </div>
            <hr class="purple-hr left-hr">
            @endif
            @if($club->president->name!=null && $club->secretary!=null)
            <div class="about-club-board">
                @if($club->president->name!=null)
                <div class="about-president">
                    <h2 class="cmfrt">Club President</h2>
                    <img src="/storage/club_presidents/{{$club->president->image}}" alt="" class="board-img">
                    <p class="rbt board-name">Name : <span>{{$club->president->name}}</span></p>
                    <p class="rbt board-email">Email : <span>{{$club->president->email}}</span></p>
                </div>
                @endif
                @if($club->secretary->name!=null)
                <hr class="purple-hr left-hr">
                <div class="about-secretary">
                    <h2 class="cmfrt">Club Secretary</h2>
                    <img src="/storage/club_secretaries/{{$club->secretary->image}}" alt="" class="board-img">
                    <p class="rbt board-name">Name : <span>{{$club->secretary->name}}</span></p>
                    <p class="rbt board-email">Email : <span>{{$club->secretary->email}}</span></p>
                </div>
                @endif
            </div>
            <hr class="purple-hr left-hr">
            @endif
            <h2 class="cmfrt">Club Email</h2>
            <p class="rbt">{{$club->email}}</p>
            <hr class="purple-hr left-hr">
            @if($club->fb_link!=null || $club->tw_link!=null || $club->ins_link!=null || $club->website!=null)
            <h2 class="cmfrt">Follow the club</h3>
            <div class="club footer">
                @if($club->website!=null)
                    <div class="social-link-div"><a href="{{$club->website}}" target="_blank"><img src="/storage/site_assets/social/web.png" alt="Our Website Link" class="social-link-img"></a></div>
                @endif
                @if($club->fb_link!=null)
                    <div class="social-link-div"><a href="{{$club->fb_link}}" target="_blank"><img src="/storage/site_assets/social/fb.png" alt="Our Facebook Link" class="social-link-img"></a></div>
                @endif
                @if($club->tw_link!=null)
                    <div class="social-link-div"><a href="{{$club->tw_link}}" target="_blank"><img src="/storage/site_assets/social/tw.png" alt="Our Twitter Link" class="social-link-img"></a></div>
                @endif
                @if($club->ins_link!=null)
                    <div class="social-link-div"><a href="{{$club->ins_link}}" target="_blank"><img src="/storage/site_assets/social/ins.png" alt="Our Instagram Link" class="social-link-img"></a></div>
                @endif
            </div>
            @endif

        </div>
    </section>

    @if(count($club->events)>0)
    <section class="events events-info events-club">
        <div class="container">

            @foreach($club->events as $event)
            <div class="event {{strtotime($event->start_date)-strtotime('now')<0 ? 'past' : 'upcoming'}} {{$event->club_id==null ? 'district' : 'club'}}">
                <div class="event-container">
                    <img src="/storage/event_posters/{{$event->images[0]->image}}" alt="" class="event-poster">
                    <div class="event-poster-overlay"></div>
                    <div class="event-type rbt">{{$event->club_id==null ? 'District' : 'Club'}}</div>
                    <div class="event-title-container">
                        <h2 class="cmfrt">{{$event->name}}</h2>
                        <h3 class="cmfrt">{{$event->venue}}</h3>
                        <p class="rbt">{{date('jS F, Y',strtotime($event->start_date))}}</p>
                        @if($event->reg_amount>0)
                        <p class="rbt">Rs. {{$event->reg_amount}}/- only</p>
                        @else
                        <p class="rbt">Free</p>
                        @endif
                        @if(strtotime($event->start_date)-strtotime('now')>0)
                            <p class="rbt reg {{strtotime($event->reg_close_date)-strtotime('now')>0 ? strtotime($event->reg_open_date)-strtotime('now')>0 ? 'reg-opens' : 'reg-open' : 'reg-closed'}}">{{strtotime($event->reg_close_date)-strtotime('now')>0 ? strtotime($event->reg_open_date)-strtotime('now')>0 ? 'Registration Opens Soon' : 'Registration Open' : 'Registration Closed'}}</p>
                        @endif
                        @if($event->description!=null)
                            <div class="event-body-toggler cmfrt">Show More</div>
                        @endif
                    </div>
                    <div class="event-body-container">
                        <div class="rbt description">{!!$event->description!!}</div>
                        @if($event->visibility==true||count($event->images)>1)
                            <div class="bootstrap-iso"><a href="/events/{{$event->id}}" class="btn btn-primary">Check out More</a></div>
                        @elseif(strtotime($event->reg_close_date)-strtotime('now')>0 && strtotime($event->reg_open_date)-strtotime('now')<0 && $event->reg_link!=null)
                            <div class="bootstrap-iso"><a href="{{$event->reg_link}}" target="_blank" class="btn btn-primary">Register Now</a></div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
    </section>
    @else
    <section class="events events-info events-club no-events">
        <div class="container">
            <h2 class="cmfrt">No Events To Display yet! Exciting stuff coming soon...</h2>
        </div>
    </section>
    @endif

    <section class="members-club">
        <div class="container">
            @if(count($club->members)>0)
            <div class="bootstrap-iso">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white"> 
                            <tr> 
                                <th>#</th> 
                                <th>Name</th>  
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($club->members as $key=>$member)
                                <tr scope="row">
                                    <td> {{$key+1}} </td>
                                    <td> Rtr. {{$member->name}} </td>
                                    <td> {{$member->email}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
            @else
                <div class="no-members">
                        <h2 class="cmfrt">No Members To Display yet! Member Details coming soon...</h2>
                </div>
            @endif
        </div>
    </section>
    
    

    <footer class="footer">
        <h3 class="social-callout cmfrt">Follow us on Social Media</h3>
        <div class="container">
            <div class="social-link-div"><a href="https://www.facebook.com/rotaractdistrict3291" target="_blank"><img src="/storage/site_assets/social/fb.png" alt="Our Facebook Link" class="social-link-img"></a></div>
            <div class="social-link-div"><a href="https://www.twitter.com/rotaract3291" target="_blank"><img src="/storage/site_assets/social/tw.png" alt="Our Twitter Link" class="social-link-img"></a></div>
            <div class="social-link-div"><a href="https://www.youtube.com/channel/UCkRUqEDtd3b6acISbXBXutQ" target="_blank"><img src="/storage/site_assets/social/yt.png" alt="Our YouTube Link" class="social-link-img"></a></div>
        </div>
        <hr>
        <p class="rbt">&copy; All Rights Reserved.<br>Rotaract District 3291. RY 2018-19.</p>
    </footer>

    <!-- JS -->
    <script type="text/javascript" src="/css/extra/vendors/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="/js/static/main.js"></script>

</body>
</html>