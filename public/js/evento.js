function countDown(){
  countDownDate--;
  var dia = Math.floor(countDownDate / 86400);
  var hor = Math.floor((countDownDate % 86400) / 3600);
  var min = Math.floor((countDownDate % 3600) / 60);
  var seg = Math.floor(countDownDate % 60);

  if(dia<10 && dia.toString().length<2){ dia = '0'+dia}
	if(hor<10 && hor.toString().length<2){ hor = '0'+hor}
	if(min<10 && min.toString().length<2){ min = '0'+min}
	if(seg<10 && seg.toString().length<2){ seg = '0'+seg}
	$('#dia').html(dia);
	$('#hor').html(hor);
	$('#min').html(min);
	$('#seg').html(seg);

  if(countDownDate <= 0) {
    clearInterval(contador);
    console.log("Contador finalizado");
  }
}

function initMap(){
  var local = {lat: -22.181920, lng: -49.960683};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 18,
    center: local,
    scrollwheel: false,
    streetViewControl: false,
    mapTypeControl: false,
    fullscreenControl: false,
    styles: [{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]}]
  });
  var marker = new google.maps.Marker({
    position: local,
    map: map,
    icon: '/public/img/sistema/marker.png'
  });
}

var current = 'home';
var links = {home:'home', lecturer:'preletores', local:'local'};
var nums = [0,1,3];

function choose_menu(choose, num, info){
  if(choose != current){
    $('.block:eq('+(num)+')').addClass('animation_block');
    //$(".block:eq(2)").css("background-color", info.style.backgroundColor);
    setTimeout(function(){
      if(choose=='local')
        initMap();
      $('#'+current+'').hide();
      $('#'+choose+'').css('display','flex');
      current = choose;
    },200);
    setTimeout(function(){
      for(var cont = 0;cont<nums.length;cont++)
        $('.block:eq('+nums[cont]+')').removeAttr('id');
      $('.block:eq('+(num)+')').attr('id','active');
    },600)
    //window.history.pushState("", "", "/lineup/"+links[choose]);
  }
}