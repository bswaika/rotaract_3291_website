$(document).ready(function(){
    
    //MENU SLIDE OUT

    $('#menu-slide-out').click(function(){
        if($('.navbar').hasClass('navbar-fixed'))
            $('.navbar').removeClass('navbar-fixed');
        $('#navbar-menu-div').addClass('active');
        $('header,section,footer').addClass('blurred');
    });

    //MENU SLIDE IN

    $('#menu-slide-in').click(function(){
        $('#navbar-menu-div').removeClass('active');
        $('header,section,footer').removeClass('blurred');
    });

    //CHANGE ABSOLUTE NAVBAR TO FIXED NAVBAR

    $(window).scroll(function () {
        //if you hard code, then use console.log
        //to determine when you want the navbar to stick.  
        //console.log($(window).scrollTop())
      if ($(window).scrollTop() > 10) {
        if($('#navbar-menu-div').hasClass('active')==false)
            $('.navbar').addClass('navbar-fixed');
      }
      if ($(window).scrollTop() < 10) {
        if($('#navbar-menu-div').hasClass('active')==false)
            $('.navbar').removeClass('navbar-fixed');
      }
    });

    //CUSTOM CAROUSEL

    function dotToggler(element){
        if(element.classList.contains('fas')){
            element.classList.remove('fas');
            element.classList.add('far');
        }else if(element.classList.contains('far')){
            element.classList.remove('far');
            element.classList.add('fas');
        }
    }

    let slides = $('.carousel-item');
    let dots = $('.dots');
    let current = 0;
    
    
    

    $('#carousel-left').click(function(){
        $('.carousel-item.active').css({
            "animation-name":"leftClickFadeOut",
            "-webkit-animation-name":"leftClickFadeOut"
        });
        setTimeout(function(){
            slides[current].classList.remove('active');
            dotToggler(dots[current]);
            if(current === 0){
                current = slides.length;
            }
            slides[current-1].classList.add('active');
            $('.carousel-item.active').css({
                "animation-name":"leftClickFadeIn",
                "-webkit-animation-name":"leftClickFadeIn"
            });
            dotToggler(dots[current-1]);
            current--;
        }, 350);
        
    });

    $('#carousel-right').click(function(){
        $('.carousel-item.active').css({
            "animation-name":"rightClickFadeOut",
            "-webkit-animation-name":"rightClickFadeOut"
        });
        setTimeout(function(){
            slides[current].classList.remove('active');
            dotToggler(dots[current]);
            if(current === slides.length - 1){
                current = -1;
            }
            slides[current+1].classList.add('active');
            $('.carousel-item.active').css({
                "animation-name":"rightClickFadeIn",
                "-webkit-animation-name":"rightClickFadeIn"
            });
            dotToggler(dots[current+1]);
            current++;
        },350);
        
    });

    // BOOTSTRAP DROPDOWN TOGGLE

    $('#zoneDropdown .dropdown-toggle').click(function(){
        $('#zoneDropdownMenu').toggle();
    });

    $('#eventDropdown .dropdown-toggle').click(function(){
        $('#eventDropdownMenu').toggle();
    });

    // ZONE TOGGLER

    let zones = $('.clubs .dropdown li');
    let zone_divs = $('.clubs .zone-info');

    function zone_reset(){
        for(let j=0; j<zones.length; j++){
            if(zones[j].classList.contains('active'))
                zones[j].classList.remove('active');
        }
        for(let i=0; i<zone_divs.length; i++){
            if(zone_divs[i].classList.contains('active'))
                zone_divs[i].classList.remove('active');
        }
    }

    $('.clubs .dropdown li').click(function(){
        zone_reset();
        $(this).addClass('active');
        for(let j=0; j<zones.length; j++){
            if(zones[j].classList.contains('active'))
                zone_divs[j].classList.add('active');
        }
        $('#zoneDropdownMenu').toggle();
    });

    // EVENT TOGGLER

    let events = $('.event');
    let filters = $('.events .dropdown li')

    function event_reset(){
        for(let j=0; j<filters.length; j++){
            if(filters[j].classList.contains('active'))
                filters[j].classList.remove('active');
        }
        for(let i=0; i<events.length; i++){
            if(events[i].classList.contains('inactive'))
                events[i].classList.remove('inactive');
            events[i].classList.add('inactive');
        }
    }

    $('.events .dropdown li').click(function(){
        event_reset();
        $(this).addClass('active');
        if($(this).hasClass('all')){
            for(let i=0; i<events.length; i++){
                if(events[i].classList.contains('inactive'))
                    events[i].classList.remove('inactive');
            }
        }else if($(this).hasClass('past')){
            for(let i=0; i<events.length; i++){
                if(events[i].classList.contains('past'))
                    events[i].classList.remove('inactive');
            }
        }else if($(this).hasClass('upcoming')){
            for(let i=0; i<events.length; i++){
                if(events[i].classList.contains('upcoming'))
                    events[i].classList.remove('inactive');
            }
        }else if($(this).hasClass('district')){
            for(let i=0; i<events.length; i++){
                if(events[i].classList.contains('district'))
                    events[i].classList.remove('inactive');
            }
        }else if($(this).hasClass('club')){
            for(let i=0; i<events.length; i++){
                if(events[i].classList.contains('club'))
                    events[i].classList.remove('inactive');
            }
        }
        $('#eventDropdownMenu').toggle();
    });

    // EVENT BODY TOGGLER
    $('.event-body-container .description').hide();

    $('.event-body-toggler').click(function(){
        $(this).toggleClass('active');
        if($(this).hasClass('active'))
            $(this).text('Show Less');
        else
            $(this).text('Show More');
        $(this).parent().parent().find('.event-body-container .description').toggle();
    })

    // CLUB PAGE TOGGLING

    $('section.events-club, section.members-club').hide();

    $('.club-menu li#about').click(function(){
        $('.club-menu li').removeClass('active');
        $('section.about-club').show();
        $('section.events-club, section.members-club').hide();
        $('.club-menu li#about').addClass('active');
    });

    $('.club-menu li#events').click(function(){
        $('.club-menu li').removeClass('active');
        $('section.events-club').show();
        $('section.about-club, section.members-club').hide();
        $('.club-menu li#events').addClass('active');
    });

    $('.club-menu li#members').click(function(){
        $('.club-menu li').removeClass('active');
        $('section.members-club').show();
        $('section.events-club, section.about-club').hide();
        $('.club-menu li#members').addClass('active');
    });
    
    
    slides[0].classList.add('active');
    dots[0].classList.remove('far');
    dots[0].classList.add('fas');
});

