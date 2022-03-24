$('.popup').hide();

$(document).ready(function(){
	
	if(sessionStorage.getItem("visited") === null){
		$('.popup').show();
		$('nav,header,section,footer').addClass('blurred');
    		$('section.popup').removeClass('blurred');
    		sessionStorage.setItem("visited", true);
    		console.log(sessionStorage.getItem("visited"));
    		
    		$('#popup-close').click(function(){
        		$('nav,header,section,footer').removeClass('blurred');
        		$('.popup').hide();
    		});
	}
});