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
    <link rel="stylesheet" type="text/css" href="/css/static/event.css">     
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
        <img src="/storage/site_assets/logo.png" alt="Rotaract District 3291 Logo" class="logo">
    </nav>

    <header class="club home-hero">
        <img src="/storage/event_posters/{{$event->images[0]->image}}" alt="Stock Photo of Friendship" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <h1 class="home-hero-title rbt">{{$event->name}}</h1>
        <div class="home-hero-container event-venue-date">
            <h2 class="event-text cmfrt">{{$event->venue}}</h2>
            <p class="event-text cmfrt">{{date('jS F, Y', strtotime($event->start_date))}}</p>
        </div>
        
    </header>

    <section class="about-club">
        <div class="container">
            @if($event->blog!=null)
            <h2 class="cmfrt">{{$event->blog->title}}</h2>
            <p class="rbt">published on {{date('jS F, Y', strtotime($event->blog->created_at))}}</p>
            <hr class="purple-hr left-hr">
            <div class="about-about-club rbt">
                {!!$event->blog->body!!}
            </div>
            <hr class="purple-hr left-hr">
            @endif
            @if(count($event->images)>1)
            <h2 class="cmfrt">Images</h3>
            <div class="bootstrap-iso event-images-display">
                <div class="row">
                    @foreach($event->images as $image)
                        @if($image->display_type==1)
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/storage/event_images/{{$image->image}}" alt="Event Image" style="width:100%; height:20vh; object-fit:cover;">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
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