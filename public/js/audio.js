function calculateTotalValue(length) {
  var hours = parseInt(length / 3600) % 24,
    minutes = parseInt(length / 60) % 60,
    seconds = parseInt(length % 60);
  if (hours > 0)
    var time = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
  else
    var time = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
  return time;
}

function calculateCurrentValue(currentTime, length) {
  var hours = parseInt(currentTime / 3600) % 24,
    minutes = parseInt(currentTime / 60) % 60,
    seconds = parseInt(currentTime % 60);

  if (length.length > 5)
    var time = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
  else
    var time = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);

  return time;
}

function initProgressBar() {
  var player = document.getElementById('player');
  var length = player.duration;
  var current_time = player.currentTime;
  var progressBar = $('#seek_point');
  var progressForward = $('.audio_controls .progress_forward');
  var slider = $('.audio_controls .progress_slider');
  var totalLength = calculateTotalValue(length);
  var remaining_time = calculateCurrentValue(player.duration - player.currentTime, totalLength);

  player.onwaiting = function() {
    $('.audio_img .loader_background').css({
      'opacity': '1',
      'visibility': 'visible'
    });
  };

  player.oncanplaythrough = function() {
    $('.audio_img .loader_background').css({
      'opacity': '0',
      'visibility': 'hidden'
    });
  };

  $(".end_time").html(remaining_time);

  var currentTime = calculateCurrentValue(current_time, totalLength);
  $(".start_time").html(currentTime);

  currentPosition();
  progressBar.click(function(e) {
    seek(e)
  });

  if (player.currentTime == player.duration) {
    $('.play:eq(0)').removeClass('pause');
  }

  function seek(evt) {
    if (evt.target.className.indexOf('progress_slider') != 0) {
      currentPosition();
      var percent = evt.offsetX / progressBar.width();
      player.currentTime = percent * player.duration;
    }
  }

  function currentPosition() {
    progressForward.css('width', (player.currentTime / player.duration) * 100 + '%');
    slider.css('left', 'calc(' + (player.currentTime / player.duration) * 100 + '% - 6px)');
  }
}


function initVolumeBar() {
  var player = document.getElementById('player');
  var progressBar = $('#seek_point2');
  var progressForward = $('.volume_controls .progress_forward');
  var slider = $('.volume_controls .progress_slider');
  progressForward.css('height', (player.volume / 1) * 100 + '%');
  slider.css('bottom', 'calc(' + (player.volume / 1) * 100 + '% - 6px)');
  progressBar.click(function(e) {
    seek(e)
  });

  function seek(evt) {
    if (evt.target.className == 'progress_forward') {
      var percent = (progressForward.height() - evt.offsetY) / progressBar.height();
      player.volume = percent;
      if(player.paused)
        player.currentTime = player.currentTime;
    } else if (evt.target.className.indexOf('progress_slider') != 0) {
      var percent = (progressBar.height() - evt.offsetY) / progressBar.height();
      player.volume = percent;
      if(player.paused)
        player.currentTime = player.currentTime;
    }
  }
}

function initPlayers() {
  var player = document.getElementById('player');
  //player.autoplay = true;
  player.volume = 0.7;
  var playBtn = $('.play:eq(0)');
  var volumeBtn = $('.play:eq(1)');
  var rewind = $('.rewind');
  var forward = $('.forward');
  var num = 10;
  var backupVolume;

  playBtn.click(function() {
    togglePlay()
  });
  volumeBtn.click(function() {
    toggleVolume()
  });
  rewind.click(function() {
    rewindOrForward(-num)
  });
  forward.click(function() {
    rewindOrForward(num)
  });

  function togglePlay() {
    if (player.paused == false) {
      player.pause();
      $('.play:eq(0)').removeClass('pause');

    } else {
      player.play();
      $('.play:eq(0)').addClass('pause');
    }
  }

  function toggleVolume() {
    if (player.volume > 0) {
      backupVolume = player.volume;
      player.volume = 0;
      $('.play:eq(1)').removeClass('mute');
    } else {
      player.volume = backupVolume;
      $('.play:eq(1)').addClass('mute');
    }
    player.currentTime = player.currentTime;
  }

  function rewindOrForward(n) {
    player.currentTime += n;
  }

  $('body').keyup(function(e) {
    if (e.keyCode == '32')
      togglePlay();
    else if (e.keyCode == '37')
      rewindOrForward(-num);
    else if (e.keyCode == '39')
      rewindOrForward(num);
  });

  $('body').keydown(function(e) {
    return !(e.keyCode == 32);
  });
}

initPlayers();
