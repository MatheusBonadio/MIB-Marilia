var slideIndex = 1;
var timer;
var disable = false;
var touchMove = 0,
  touchStart = 0;
var dots = $('.dots');
var slides = $('.slide_img');

if (dots.length > 1) {
  // window.onload = function(){
  //   var touch = document.getElementsByClassName("slideshow")[0];
  //   touch.addEventListener("touchstart",function(e){
  //     touchStart = e.changedTouches[0].clientX;
  //   });
  //   touch.addEventListener("touchmove",function(e){
  //     touchMove = e.changedTouches[0].pageX;
  //   });
  //   touch.addEventListener("touchend",function(){
  //     if((touchMove-90) > touchStart)
  //       plusSlides(-1);
  //     else if((touchMove+90) < touchStart)
  //       plusSlides(1);
  //     touchMove = 0;
  //   });
  // }
  function plusSlides(n) {
    if (!slides.length)
      window.clearInterval(timer);
    else
      showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    if (slideIndex != n)
      showSlides(slideIndex = n);
  }

  function reset(toggle) {
    var slide_play = $('.slide_play');
    var line = $('.line');

    window.clearInterval(timer);
    if (toggle) {
      timer = window.setInterval('plusSlides(1)', 5000);
      disable = false;
      slide_play.eq(0).css('opacity', '1');
      slide_play.eq(1).css('opacity', '.6');
      line.removeClass("pause");
      line.removeClass("animation_line");
      line.outerWidth();
      line.addClass("animation_line");
    } else {
      disable = true;
      slide_play.eq(0).css('opacity', '.6');
      slide_play.eq(1).css('opacity', '1');
      line.addClass('pause');
    }
  }

  function showSlides(n) {
    var button = $('.slide_button');
    var line = $('.line');

    reset(true);
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (var i = 0; i < dots.length; i++)
      dots.eq(i).removeClass('active_dots');
    dots.eq(slideIndex - 1).addClass('active_dots');

    for (var i = 0; i < slides.length; i++)
      slides.eq(i).removeClass('slide_fade');
    slides.eq(slideIndex - 1).addClass('slide_fade');

    // for (var i = 0; i < button.length; i++)
    //   button.eq(i).removeClass('content_fade');
    // button.eq(slideIndex-1).addClass('content_fade');
  }

  showSlides(slideIndex);

} else {
  $('.slide_img').addClass('slide_fade');
  $('.container_dots').css('display', 'none');
  $('.arrow').css('display', 'none');
}