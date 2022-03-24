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
    <link rel="stylesheet" type="text/css" href="css/static/clubs.css">
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

    <header class="clubs home-hero">
        <img src="/storage/site_assets/cover/cover-clubs.jpg" alt="Stock Photo of Castle" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <h1 class="home-hero-title rbt">CLUBS</h1>
        @if(count($zones)>0)
        <div class="bootstrap-iso">
            <div class="dropdown" id="zoneDropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">SELECT ZONE
                <span class="caret"></span></button>
                <ul class="dropdown-menu" id="zoneDropdownMenu">
                  @foreach($zones as $key=>$zone)
                    @if($key==0)
                        <li class="active"><a>Zone {{$key+1}} || {{$zone->name}}</a></li>
                    @else
                        <li><a>Zone {{$key+1}} || {{$zone->name}}</a></li>
                    @endif
                  @endforeach
                </ul>
            </div>
        </div>
        @endif
    </header>

    @if(count($zones)>0)
    <section class="clubs zones-info">
        <div class="container zones">
            @foreach($zones as $key=>$zone)
            @if($key==0)
            <div class="zone-info active" id="zone{{$key+1}}">
            @else
            <div class="zone-info" id="zone{{$key+1}}">
            @endif
                <h2 class="zone-title cmfrt">Zone {{$key+1}} || {{$zone->name}}</h2>
                <h3 class="zone-rep rbt"><span class="cmfrt">Zonal Representative : </span><br>Rtr. {{$zone->zone_rep}}</h3>
                <h3 class="zone-sec rbt"><span class="cmfrt">Zonal Secretary : </span><br>Rtr. {{$zone->zone_sec}}</h3>
                @if(count($zone->clubs)>0)
                <div class="zone-clubs rbt">
                    <h2 class="cmfrt">Clubs</h2>
                    <hr class="purple-hr">
                    <div class="zone-clubs-links">
                        @foreach($zone->clubs as $club)
                            @if($club->visibility==true)
                                <h3> <a href="/clubs/{{$club->id}}" class="zone-club-link">Rotaract Club of {{$club->name}} &nbsp;&nbsp; <i class="fas fa-chevron-right"></i></a> </h3>
                            @endif
                        @endforeach
                    </div>    
                </div>
                @endif
            </div>
            @endforeach
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