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
    <link rel="stylesheet" type="text/css" href="/css/static/documents.css">
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
        <img src="/storage/site_assets/cover/cover-documents.jpg" alt="Stock Photo of Documents" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <!--<img src="assets/images/rctiu_white.png" class="club-logo">-->
        <h1 class="home-hero-title rbt">DOCUMENTS</h1>
    </header>

    <section class="documents">
        <div class="container">
            <h2 class="cmfrt">From Rotaract District 3291</h2>
            <hr class="purple-hr left-hr">
            <div class="bootstrap-iso">
                <div class="card">
                    <img class="card-img-top" src="/storage/site_assets/theme.png" alt="Rotaract 3291 Documents" style="max-width:20%; margin-bottom:1.5em;">
                    <ul class="list-group list-group-flush">
                        @foreach($documents as $document)
                            <li class="list-group-item list-group-item-action">
                                <a href="/storage/documents/{{$document->document}}">{{$document->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <h2 class="cmfrt">From Rotary International</h2>
            <hr class="purple-hr left-hr">
            <div class="bootstrap-iso">
                <div class="card">
                    <img class="card-img-top" src="/storage/site_assets/rotary.png" alt="Rotary Internernational Documents" style="max-width:70%; margin-bottom:1.5em;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action">
                            <a href="https://www.rotary.org/en/document/418">Rotaract Handbook</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="https://www.rotary.org/en/document/908">Standard Rotaract Club Constitution and Bylaws</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="https://www.rotary.org/en/document/907">Rotaract Statement of Policy</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="https://www.rotary.org/en/document/910">Rotaract Club Certification Form</a>
                        </li>
                    </ul>
                </div>
            </div>
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