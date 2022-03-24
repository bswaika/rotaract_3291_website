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
    <link rel="stylesheet" type="text/css" href="/css/static/drr.css">
    <link rel="stylesheet" type="text/css" href="/css/static/app-iso.css">

    <link rel='stylesheet' href='/css/extra/vendors/fullcalendar/fullcalendar.css' />


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

    <header class="drr home-hero">
        <img src="/storage/site_assets/cover/cover-drr.jpg" alt="Photo of DRR's Installation" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <h1 class="home-hero-title rbt">DRR's CALENDAR</h1>
    </header>

    <div class="container">
        <section class="display-calendar rbt">
            <div id="drr-calendar">
                
            </div>
        </section>
        <section class="display-form">
            <div class="bootstrap-iso">
                <h3 class="cmfrt">Book an Appointment</h3>
                @if(session()->has('success'))
                    <p class="rbt" style="text-align:center;margin-top:1em;"><strong class="rbt" style="color:#d51968;">Thank You!</strong> You will receive an Email upon Appointment Confirmation!<p>
                @endif
                <hr class="purple-hr">
                <form class="" method="POST" action="{{url('/drr')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label" for="name">Name:</label>
                        <div class="">
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="contact">Contact:</label>
                        <div class=""> 
                        <input type="text" class="form-control" id="contact" placeholder="Enter Your Contact" name="contact" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="email">Email:</label>
                        <div class=""> 
                            <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="dob">Preferred Date and Time (DD/MM/YYYY hh:mm in 24-hour format):</label>
                        <div class="">
                            <input type="text" class="datepicker form-control" id="date" placeholder="Subject to Availability" name="date" required>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <footer class="footer">
        <h3 class="social-callout cmfrt">Follow us on Social Media</h3>
        <div class="container">
            <div class="social-link-div"><a href="https://www.facebook.com/rotaractdistrict3291" target="_blank"><img src="storage/site_assets/social/fb.png" alt="Our Facebook Link" class="social-link-img"></a></div>
            <div class="social-link-div"><a href="https://www.twitter.com/rotaract3291" target="_blank"><img src="storage/site_assets/social/tw.png" alt="Our Twitter Link" class="social-link-img"></a></div>
            <div class="social-link-div"><a href="https://www.youtube.com/channel/UCkRUqEDtd3b6acISbXBXutQ" target="_blank"><img src="storage/site_assets/social/yt.png" alt="Our YouTube Link" class="social-link-img"></a></div>
        </div>
        <hr>
        <p class="rbt">&copy; All Rights Reserved.<br>Rotaract District 3291. RY 2018-19.</p>
    </footer>

    <!-- JS -->
    <script type="text/javascript" src="/css/extra/vendors/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="/js/static/main.js"></script>
    <script src='/css/extra/vendors/fullcalendar/lib/jquery.min.js'></script>
    <script src='/css/extra/vendors/fullcalendar/lib/moment.min.js'></script>
    <script src='/css/extra/vendors/fullcalendar/fullcalendar.js'></script>
    <script src='/css/extra/vendors/fullcalendar/gcal.js'></script>
    <script src="/js/static/drr-calendar.js"></script>    

</body>
</html>