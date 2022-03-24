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
    
    @if(count($members)>0)
    <section class="popup">
        <i class="fas fa-times" id="popup-close"></i>
        <h1 class="cmfrt">
            Happy Birthday <i class="fas fa-birthday-cake"></i>
        </h1>
        <hr class="purple-hr left-hr">
        <p class="rbt">
          @foreach($members as $key=>$member)
            {{$key+1}}. <strong>{{$member->name}}</strong><span> from RC {{$member->club->name}}</span><br>
          @endforeach  
        </p>
    </section>
    @endif

    <header class="home-hero">
        <img src="/storage/site_assets/cover/cover-bw.jpg" alt="Stock Photo of Friendship" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <h1 class="home-hero-title rbt">TOGETHER<br><span class="cmfrt">towards</span><br>TOMORROW</h1>
        <div class="home-hero-body">
            <h2 class="home-hero-body-title cmfrt">ROTARACT 3291</h2>
            <h3 class="home-hero-body-subtitle cmfrt">Act to Inspire</h3>
            <p class="home-hero-body-text rbt">“I ask all of you to <em>Be the Inspiration</em> to help Rotary move from reaction to action to take a hard look at the environmental issues that affect health and welfare around the world and do what we can to help.”</p>
            <p class="home-hero-body-subtext cmfrt">- Rtn. Barry Raissin RI President RY 2018-19</p>
        </div>
    </header>

    <section class="home-about">
        <div class="container">
            <div class="about-section about-rotaract">
                <h2 class="about-rotaract-title cmfrt">ROTARACT</h2>
                <h3 class="about-rotaract-subtitle cmfrt">Rotary in Action</h3>
                <p class="about-rotaract-text rbt">Rotaract is a club for adults ages 18-30 that meets twice a month to exchange ideas, plan activities and projects, and socialize. While Rotary clubs serve as sponsors, Rotaract clubs decide how to organize and run their club and what projects and activities to carry out. Be part of a global community of young adults taking action for positive change, a chance to share your ideas and look at the world’s challenges in a new way.</p>
            </div>
            <hr class="purple-hr">
            <div class="about-section purpose-rotaract">
                <h2 class="purpose-rotaract-title cmfrt">PURPOSE</h2>
                <h3 class="purpose-rotaract-subtitle cmfrt">of being a Rotaractor</h3>
                <ul class="purpose-rotaract-text rbt">
                    <li>To develop professional &amp; Leadership skills</li>
                    <li>To emphasize respect for the rights of others, and to promote ethical standards &amp; dignity of all useful occupation</li>
                    <li>To provide oppurtunities for young people to address the needs &amp; concerns of our community &amp; the world we live in</li>
                    <li>To provide oppurtunities for working in cooperation with sponsoring Rotary Clubs</li>
                    <li>To motivate young people for taking up roles in Rotary</li>
                </ul>
            </div>
        </div>
        <img src="/storage/site_assets/clipped-wheel-bottom-right.png" alt="Clipped Version of the Rotary Wheel" class="home-about-img">        
    </section>

    @if(count($past)>0)
    <section class="home-past-events">
        <h2 class="past-events-title cmfrt">PAST EVENTS</h2>
        <div class="past-events-carousel">
            <i id="carousel-left" class="fas fa-chevron-left"></i>
            @foreach($past as $p)
            <div class="carousel-item">
                <figure class="carousel-figure">
                	@if(count($p->images)>1)
                    		<img src="/storage/event_images/{{$p->images[1]->image}}" alt="" class="carousel-img">
                    	@else
                    		<img src="/storage/event_posters/{{$p->images[0]->image}}" alt="" class="carousel-img">
                    	@endif
                    <figcaption class="carousel-caption">
                        <h3 class="carousel-caption-title rbt">{{$p->name}}</h3>
                        <p class="carousel-caption-date rbt">{{date('jS F, Y',strtotime($p->start_date))}}</p>
                    </figcaption>
                </figure>
            </div>
            @endforeach
            
            <i id="carousel-right" class="fas fa-chevron-right"></i>
            <div class="carousel-dots">
                @foreach($past as $p)
                    <i class="dots far fa-dot-circle"></i>
                @endforeach
            </div> 
        </div>
        <a href="/events" class="button button-solid button-secondary cmfrt past-events-link">SEE ALL</a>
    </section>
    @endif

    @if(count($upcoming)>0)
    <section class="home-upcoming-events">
        <h2 class="upcoming-events-title cmfrt">UPCOMING EVENTS</h2>
        <div class="container">
            @foreach($upcoming as $u)
            <div class="upcoming-event">
                <div class="upcoming-event-date">
                    <h1 class="rbt">{{date('d',strtotime($u->start_date))}}</h1>
                    <hr>
                    <h1 class="rbt">{{date('m',strtotime($u->start_date))}}</h1>
                    <hr>
                    <h1 class="rbt">{{date('y',strtotime($u->start_date))}}</h1>
                </div>
                <h2 class="upcoming-event-title rbt">{{$u->name}}</h2>
            </div>
            @endforeach
            
        </div>
        <a href="/events" class="button button-solid button-primary cmfrt upcoming-events-link">SEE ALL</a>
    </section>
    @endif

    <section class="home-contact-form">
        <img src="/storage/site_assets/clipped-wheel-top-left.png" alt="Clipped Version of the Rotary Wheel" class="contact-form-img">
        <h2 class="contact-form-title cmfrt">REACH OUT</h2>
        <h3 class="contact-form-subtitle cmfrt">to us</h3>
        @if(session()->has('success'))
            <p class="rbt" style="text-align:center;margin-top:1em;"><strong class="rbt" style="color:#d51968;">Thank You for reaching out!</strong> We will get back to you!<p>
        @endif
        <hr class="purple-hr"> 
        <div class="container">
            <form action="{{url('/')}}" method="POST" class="contact-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="rbt" for="name">Name</label>
                    <input class="rbt" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label class="rbt" for="email">Email</label>
                    <input class="rbt" type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label class="rbt" for="message">Message</label>
                    <textarea class="rbt" name="message" id="message"></textarea>
                </div>
                <input class="contact-form-button button button-solid button-secondary-inverted cmfrt" type="submit" value="SUBMIT" style="position:absolute; width:initial; left:0;">
            </form>
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
    @if(count($members)>0)
    <script type="text/javascript" src="/js/static/birthdays.js"></script>
    @endif

</body>
</html>