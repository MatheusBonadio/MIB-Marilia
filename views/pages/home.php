    <link rel='stylesheet' href='/public/css/home.css' type='text/css'>

    <div class='slideshow'>
        <div class='slide_img' style='background-image: linear-gradient(to bottom, rgba(20,20,20,.45) 0%,rgba(20,20,20,.45) 100%), url(/public/img/culto/ideas.png);'>
            <div class='shadow'></div>
            <div class='slide_position'>
                <div class='slide_date'>27/05/2018</div>
                <div class='slide_title'>
                    <span>A posição cristã em</span>
                    <div class='subtitle'>meio ao caos</div>
                </div>
                <a class='slide_button flex'>
                    <div class='material-icons flex'>headset</div>
                    <span>Acesse agora</span>
                </a>
            </div>
        </div>
        <div class='slide_img' style='background-image: linear-gradient(to bottom, rgba(20,20,20,.45) 0%,rgba(20,20,20,.45) 100%), url(/public/img/culto/sun.jpeg);'>
            <div class='shadow'></div>
            <div class='slide_position'>
                <div class='slide_date'>13/05/2018</div>
                <div class='slide_title'>
                    <span>Paixão pela</span>
                    <div class='subtitle'>Glória de deus</div>
                </div>
                <a class='slide_button flex'>
                    <div class='material-icons flex'>headset</div>
                    <span>Acesse agora</span>
                </a>
            </div>
        </div>
        <div class='slide_img slide_fade' style='background-image: linear-gradient(to bottom, rgba(20,20,20,.45) 0%,rgba(20,20,20,.45) 100%), url(/public/img/culto/church.jpeg);'>
            <div class='shadow'></div>
            <div class='slide_position'>
                <div class='slide_date'>06/05/2018</div>
                <div class='slide_title'>
                    <span>Paixão pela</span>
                    <div class='subtitle'>igreja</div>
                </div>
                <a class='slide_button flex'>
                    <div class='material-icons flex'>headset</div>
                    <span>Acesse agora</span>
                </a>
            </div>
        </div>
        <div class='container_dots flex'>
            <div class='slide_play flex material-icons' onclick='reset(true)'>keyboard_arrow_right</div>
            <div class='group_dots'></div>
            <div class='slide_play flex material-icons' onclick='reset()'>pause</div>
        </div>
        <div class='arrow flex' onclick='plusSlides(1)'>
            <div class='sprite'></div>
        </div>
        <div class='arrow flex' onclick='plusSlides(-1)'>
            <div class='sprite'></div>
        </div>
        <div class='line'></div>
    </div>
    <div class='mission'>
        <div class='block_mission'>
            <div class='block_header'>
                <div class='material-icons'>people</div>
                <span>Quem Somos</span>
            </div>
            <div class='body'>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </div>
        </div>
        <div class='block_mission'>
            <div class='block_header'>
                <div class='material-icons'>flag</div>
                <span>Missão</span>
            </div>
            <div class='body'>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </div>
        </div>
        <div class='block_mission'>
          <div class='block_header'>
            <div class='material-icons'>remove_red_eye</div>
            <span>Visão</span>
          </div>
          <div class='body'>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          </div>
        </div>
    </div>

    <script>
        var slides = $('.slide_img');
        for(i = 0; i < slides.length; i++){
          var div = $('<div class=\'dots\' onclick=\'currentSlide('+(i+1)+')\'></div>');
          $('.group_dots').append(div);
        }
        var url = "/public/js/home.js";
        $.getScript(url);
        slider($(".header a:eq(1)"))
    </script>