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
    <link rel="stylesheet" type="text/css" href="/css/static/leaderboard.css">
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
        <img src="/storage/site_assets/logo.png" alt="Rotaract 3291 Logo" class="logo">
    </nav>

    <header class="events home-hero">
        <img src="/storage/site_assets/cover/cover-leaderboard.jpg" alt="Stock Photo of Race" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <!--<img src="assets/images/rctiu_white.png" class="club-logo">-->
        <h1 class="home-hero-title rbt">LEADERBOARD</h1>
    </header>

    <section class="documents">
        <div class="container">
            <hr class="purple-hr left-hr">
            @if(count($clubs)>0)
            <div class="bootstrap-iso">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white"> 
                            <tr> 
                                <th>Rank</th> 
                                <th>Name</th> 
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clubs as $key=>$club)
                                <tr scope="row">
                                    <td> {{$club->rank}} {!!$club->rank<$club->old_rank ? '<span class="promoted">(+'.($club->old_rank - $club->rank).')</span>' : ($club->rank>$club->old_rank ? '<span class="demoted">('.($club->old_rank - $club->rank).')</span>' : '')!!}</td>
                                    @if($club->rank<4)
                                    <td> RC {{$club->name}} 
                                        @if($club->rank==1)
                                        <i class="fas fa-trophy" style="color:#d51968;"></i>
                                        @elseif($club->rank==2)
                                        <i class="fas fa-trophy" style="color:#d5196860;"></i>
                                        @elseif($club->rank==3)
                                        <i class="fas fa-trophy" style="color:#262626;"></i>
                                        @endif
                                    </td>
                                    @else
                                    <td> RC {{$club->name}} </td>
                                    @endif
                                    <td> {{$club->points}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
            @else
                <div class="no-leaderboard">
                    <h2 class="cmfrt">Leaderboard will be live soon...</h2>
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