
/* Slide Show */
$(document).ready(function() {
	$('#slideShowItems div').hide().css({position:'absolute',width:'760px'});

var currentSlide = -1;
var prevSlide = null;
var slides = $('#slideShowItems div');
var interval = null;
var FADE_SPEED = 500;
var DELAY_SPEED = 10000;

var html = '<ul id="slideShowCount">'

for (var i = slides.length - 1;i >= 0 ; i--){
	html += '<li id="slide'+ i+'" class="slide"><span>'+(i+1)+'</span></li>' ;
}

html += '</ul>';
$('#slideShow').after(html);

for (var i = slides.length - 1;i >= 0 ; i--){
	$('#slide'+i).bind("click",{index:i},function(event){
		currentSlide = event.data.index;
		gotoSlide(event.data.index);
	});
};

if (slides.length <= 1){
	$('.slide').hide();
}

nextSlide();

function nextSlide (){

	if (currentSlide >= slides.length -1){
		currentSlide = 0;
	}else{
		currentSlide++
	}

	gotoSlide(currentSlide);

}

function gotoSlide(slideNum){

	if (slideNum != prevSlide){

		if (prevSlide != null){
			$(slides[prevSlide]).stop().hide();
			$('#slide'+prevSlide).removeClass('selectedTab');
		}

		$('#slide'+currentSlide).addClass('selectedTab');


		$('#slide'+slideNum).addClass('selectedTab');
		$('#slide'+prevSlide).removeClass('selectedTab');

		$(slides[slideNum]).stop().slideDown(FADE_SPEED,function(){
			$(this).css({opacity:1});
			if(jQuery.browser.msie){
				this.style.removeAttribute('filter');
			}
		});

		prevSlide = currentSlide;

		if (interval != null){
			clearInterval(interval);
		}
		interval = setInterval(nextSlide, DELAY_SPEED);
	}

}
});

