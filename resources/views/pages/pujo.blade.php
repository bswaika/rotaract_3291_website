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
    <link rel="stylesheet" type="text/css" href="css/static/pujo.css">
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
        <img src="/storage/site_assets/pujo/dgm.jpeg" alt="Stock Photo of Durga Idol" class="home-hero-img">
        <div class="home-hero-overlay"></div>
        <img src="/storage/site_assets/pujo/opt_3.png" alt="" id="pujo-hero">
    </header>

    

    <section class="pujo-form-section">
        <div class="container">
            
            <h2 class="cmfrt">Registration Closed!</h2>
            <p class="info rbt">We are glad to see the participation from your side. At the same time, we sadly announce that we have reached our capacity for registrations. We will see you at the Parikrama!<br>Thank You!</p>
            <hr class="purple-hr">
            <!--
            <div class="bootstrap-iso">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        <strong>Thank You!</strong> You have been Registered! <br>Kindly make your payment now to complete your registration!
                    </div>
                @endif
                <form class="" method="POST" action="{{url('/pujo')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label" for="name">Name:</label>
                        <div class="">
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="club">Club Name:</label>
                        <div class="">
                        <input type="text" class="form-control" id="club" placeholder="Enter Your Club Name" name="club" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="zone">Zone:</label>
                        <div class="">
                            <select class="form-control" id="zone" name="zone" required>
                                <option value="" selected disabled>Select Zone</option>
                                <option value="0" >N/A</option>
                                <option value="1" >Zone-1</option>
                                <option value="2" >Zone-2</option>
                                <option value="3" >Zone-3</option>
                                <option value="4" >Zone-4</option>
                                <option value="5" >Zone-5</option>
                                <option value="6" >Zone-6</option>
                                <option value="7" >Zone-7</option>
                                <option value="8" >Zone-8</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="contact">Contact:</label>
                        <div class="input-group">
                                <span class="input-group-addon">+91</span> 
                        <input type="text" class="form-control" id="contact" placeholder="Enter Your Contact" name="contact" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="food">Food Preference:</label>
                        <div class="">
                            <select class="form-control" id="food" name="food" required>
                                <option value="" selected disabled>Select Food Preference</option>
                                <option value="v" >Veg</option>
                                <option value="nv" >Non-Veg</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="pay">Payment Option:</label>
                        <p class="info info-red rbt"><strong>Registration Amount : Rs. 500/-</strong><br>Kindly make your payments via the respective applications of your choice of payment option to the numbers mentioned. <br>Once your payment has been made, we will send you a confirmation message stating that your registration has been confirmed. Since the validation process is manual, it might take upto 6 hours for your confirmation message to arrive. Kindly wait for the same.</p>
                        <div class="">
                            <select class="form-control" id="pay" name="pay" required>
                                <option value="" selected disabled>Select Payment Option</option>
                                <option value="p" >Paytm @ 9804311242</option>
                                <option value="t" >Tez @ 9804311242</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                -->
            </div>
        </div>
    </section>
    

    <footer class="footer">
        <hr>
        <p class="rbt">&copy; All Rights Reserved.<br>Rotaract District 3291. RY 2018-19.</p>
    </footer>

    <!-- JS -->
    <script type="text/javascript" src="/css/extra/vendors/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="/js/static/main.js"></script>

</body>
</html>