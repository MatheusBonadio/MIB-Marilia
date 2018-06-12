    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/models/dao/PalavraDAO.php';
        $dao = new PalavraDAO();
        $palavra = $dao->listar();
    ?>
    <link rel='stylesheet' href='/public/css/home.css' type='text/css'>

    <div class='slideshow'>
        <?php foreach($palavra as $listar){ ?>
        <div class='slide_img' style='background-image: linear-gradient(to bottom, rgba(20,20,20,.45) 0%,rgba(20,20,20,.45) 100%), url(/public/img/culto/<?php echo $listar['img'] ?>);'>
            <div class='shadow'></div>
            <div class='slide_position'>
                <div class='slide_date'><?php echo $listar['data_formatada'] ?></div>
                <div class='slide_title'>
                    <?php echo $listar['titulo_dividido'] ?>
                </div>
                <a class='slide_button flex' onclick='select_word("<?php echo $listar['titulo'] ?>","<?php echo $dao->formatarTitulo($listar['titulo']) ?>", "<?php echo $listar['id_palavra'] ?>")'>
                    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/public/audio/'.$dao->formatarTitulo($listar['titulo']).'.mp3')) {?>
                    <div class='material-icons flex'>headset</div>
                  <?php } else {?>
                    <div class='material-icons flex'>file_copy</div>
                  <?php } ?>
                    <span>Acesse agora</span>
                </a>
            </div>
        </div>
        <?php } ?>
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