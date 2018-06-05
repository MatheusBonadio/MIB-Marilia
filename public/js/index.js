var currentHead;

function select_head(n) {
  var path = last_word();
  var sites = ['home', 'eventos', 'palavras', 'celulas', 'igreja', 'login'];
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
      },
      success: function(data) {
        setTimeout(function() {
          window.history.pushState('', '', '/' + sites[n]);
          $('#loader').hide();
          $('.content').show();
          $('.content').html(data);
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

$('#back_top').click(function() {
  $('html, body').animate({
    scrollTop: 0
  }, 'slow');
});
