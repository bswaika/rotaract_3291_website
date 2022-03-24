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
    <link rel="stylesheet" type="text/css" href="css/static/main.css">
    <link rel="stylesheet" type="text/css" href="css/static/events.css">
    <link rel="stylesheet" type="text/css" href="css/static/app-iso.css">

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
        <img src="/storage/site_assets/logo.png" alt="Rotaract District 3291 Logo" class="logo">
    </nav>

    <header class="events home-hero">
        <img src="/storage/site_assets/cover/cover-events.jpg" alt="Stock Photo of Events" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <h1 class="home-hero-title rbt">EVENTS</h1>
        <div class="bootstrap-iso dropdown-container">
            <div class="dropdown" id="eventDropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">SELECT FILTER
                <span class="caret"></span></button>
                <ul class="dropdown-menu" id="eventDropdownMenu">
                  <li class="all active"><a>All</a></li>
                  <li class="past"><a>Past</a></li>
                  <li class="upcoming"><a>Upcoming</a></li>
                  <li class="district"><a>District</a></li>
                  <li class="club"><a>Club</a></li>
                </ul>
            </div>
        </div>
    </header>

    @if(count($events)>0)
    <section class="events events-info">
        <div class="container">

            @foreach($events as $event)
            <div class="event {{strtotime($event->start_date)-strtotime('now')<0 ? 'past' : 'upcoming'}} {{$event->club_id==null ? 'district' : 'club'}}">
                <div class="event-container">
                    <img src="/storage/event_posters/{{$event->images[0]->image}}" alt="" class="event-poster">
                    <div class="event-poster-overlay"></div>
                    <div class="event-type rbt">{{$event->club_id==null ? 'District' : 'Club'}}</div>
                    @if($event->avenue!=null)
                    <div class="event-avenue rbt">{{$event->avenue}}</div>
                    @endif
                    <div class="event-title-container">
                        <h2 class="cmfrt">{{$event->name}}</h2>
                        <h3 class="cmfrt">{{$event->venue}}</h3>
                        <p class="rbt">{{date('jS F, Y',strtotime($event->start_date))}}</p>
                        @if($event->reg_amount!=null)
                        @if($event->reg_amount>0)
                        <p class="rbt">Rs. {{$event->reg_amount}}/- only</p>
                        @else
                        <p class="rbt">Free</p>
                        @endif
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
                        @if($event->visibility==true || count($event->images)>1)
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
    <section class="events events-info no-events">
        <div class="container">
            <h2 class="cmfrt">No Events To Display yet! Exciting stuff coming soon...</h2>
        </div>
    </section>
    @endif
    

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