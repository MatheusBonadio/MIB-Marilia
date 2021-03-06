var currentHead;

function select_head(n) {
  var path = last_word();
  var sites = ['home', 'eventos', 'palavras', 'celulas', 'igreja', 'login'];
  var sites_format = ['Home', 'Eventos', 'Palavras', 'Células', 'Igreja', 'Login'];
  var url = '/views/pages/' + sites[n] + '.php';
  if (path != sites[n]) {
    currentHead = false;
    $.ajax({
      url: url,
      beforeSend: function() {
        $('html, body').animate({
          scrollTop: 0
        }, 400);
        $('#loader').show();
        $('.content').hide();
        $('.content').html('');
        $('.header').removeClass('active');
      },
      success: function(data) {
        $('.content').html(data);
        document.title = sites_format[n] + ' | MIB Marília';
        window.history.pushState('', '', '/' + sites[n]);
        setTimeout(function() {
          $(function() {
            $('#loader').hide();
            $('.content').show();
          });
        }, 700);
      }
    });
  } else
    currentHead = true;
}

window.onpopstate = function(event) {
  location.reload();
}

function last_word() {
  var path = window.location.pathname;
  if (path != '/') {
    path = path.split('').reverse().join('');
    var indexPath = path.indexOf('/');
    path = path.substring(0, indexPath);
    path = path.split('').reverse().join('');
    path = path.replace('/', '');
  } else {
    path = 'home';
  }
  return path;
}


function slider(element) {
  $('.header a').addClass('default');
  $(element).removeClass('default');;
  $('.header a').removeClass('active');
  $(element).addClass('active');
}

$('.header a').click(function(e) {
  if (!currentHead)
    slider($(this));
});

$(document).on('scroll', function() {
  if ($(document).scrollTop() < 50) {
    $('.header').removeClass('small');
  } else {
    $('.header').addClass('small');
  }
});

$('.header_icon .material-icons').click(function() {
  var header = $('.header');
  if (header.hasClass('active')) {
    header.removeClass('active');
  } else {
    header.addClass('active');
  }
});

$('#back_top').click(function() {
  $('html, body').animate({
    scrollTop: 0
  }, 'slow');
});

function initMap() {
  var center = {
    lat: -22.181720,
    lng: -49.960683
  }
  var local = {
    lat: -22.181920,
    lng: -49.960683
  };
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: center,
    scrollwheel: false,
    streetViewControl: false,
    mapTypeControl: false,
    fullscreenControl: false,
    styles: [{
      'featureType': 'administrative',
      'elementType': 'geometry',
      'stylers': [{
        'visibility': 'off'
      }]
    }, {
      'featureType': 'poi',
      'stylers': [{
        'visibility': 'off'
      }]
    }, {
      'featureType': 'road',
      'elementType': 'labels.icon',
      'stylers': [{
        'visibility': 'off'
      }]
    }, {
      'featureType': 'transit',
      'stylers': [{
        'visibility': 'off'
      }]
    }]
  });
  var marker = new google.maps.Marker({
    position: local,
    map: map,
    icon: '/public/img/system/marker-small.png'
  });
}

var currentAudio;

function select_audio(audio, titulo, data, img) {
  if (currentAudio != audio) {
    var container_audio = $('.container_audio');
    var player = document.getElementById('player');
    player.src = '/public/audio/' + audio;
    $('#titulo').html(titulo);
    $('#data').html(data);
    $('.audio_img').css('background-image', 'url(/public/img/culto/' + img + ')');
    if (!container_audio.hasClass('show_audio')) {
      container_audio.addClass('show_audio');
      $('body').css('--viewWidth', 'calc(100vh - 60px)');
    }
    currentAudio = audio;
  }
}

function select_word(titulo, n, id) {
  var url = '/views/pages/palavra.php';
  $.ajax({
    url: url,
    data: 'id_palavra=' + id + '&titulo=' + n,
    beforeSend: function() {
      $('html, body').animate({
        scrollTop: 0
      }, 400);
      $('#loader').show();
      $('.content').hide();
      $('.content').html('');
    },
    success: function(data) {
      $('.content').html(data);
      document.title = titulo + ' | MIB Marília';
      window.history.pushState('', '', '/palavras/' + n);
      setTimeout(function() {
        $('#loader').hide();
        $('.content').show();
      }, 700);
    }
  });
}