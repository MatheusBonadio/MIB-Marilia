    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/models/dao/PalavraDAO.php';
        $dao = new PalavraDAO();
        $palavra = $dao->listarId($_GET['id_palavra']);
    ?>
    <link rel='stylesheet' href='/public/css/palavra.css' type='text/css'>

    <div class='container'>
        <div class='word_header' style='background-image: linear-gradient(to bottom, rgba(20,20,20,.45) 0%,rgba(20,20,20,.45) 50%), url(/public/img/culto/<?php echo $palavra['img'] ?>);'>
            <img style='display: none' src='/public/img/culto/<?php echo $palavra['img'] ?>'></img>
            <div class='title'><?php echo $palavra['titulo'] ?></div>
        </div>
        <div class='word_body'>
            <div class='word_content'>
                <div class='author'>
                    <div class='img' style='background-image: url(/public/img/culto/photo.jpg);'></div>
                    <div class='name'><?php echo $palavra['sigla'].' '.$palavra['nome'] ?></div>
                    <div class='date'><?php echo $palavra['data_formatada'] ?></div>
                </div>
                <div class='word_text'>
                    <?php echo $palavra['texto'] ?>
                </div>
                <div class='line'></div>
                <div class='share'>
                    <span>Compartilhe: </span>
                    <a class='socicon socicon-facebook' title='Compartilhar no Facebook' target='_blank' onclick="window.open('https://www.facebook.com/sharer.php?s=100&p[url]=https://ibavmarilia.com/palavras/<?php echo $_GET['titulo']?>','','height=612,width=580,toolbar=0,status=0,')"></a>
                    <a class='socicon socicon-twitter' title='Compartilhar no Twitter' target='_blank' onclick='window.open("https://twitter.com/intent/tweet?text=<?php echo $palavra['titulo']." - https://ibavmarilia.com/palavras/".$_GET['titulo']; ?>","","height=612,width=700,toolbar=0,status=0,")'></a>
                    <a class='socicon socicon-whatsapp' title='Compartilhar no Whatsapp' target='_blank' onclick='window.open("https://api.whatsapp.com/send?text=<?php echo $palavra['titulo']." - https://ibavmarilia.com/palavras/".$_GET['titulo']; ?>","","height=612,width=700,toolbar=0,status=0,")'></a>
                    <a class='socicon material-icons' title='Compartilhar no Email' href='mailto:?subject=IBAV Marília&amp;body=<?php echo $palavra['titulo']." - https://ibavmarilia.com/palavras/".$_GET['titulo']; ?>'>email</a>
                </div>
            </div>
            <div class='content_side'>
                <div class='title'>Mídia</div>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/public/audio/'.$_GET["titulo"].'.mp3')) { ?>
                <div class='button' onclick='select_audio("<?php echo $_GET["titulo"].'.mp3' ?>")'>
                    <div class='material-icons flex'>headset</div>
                    <div class='vertical flex'>
                        <span>OUVIR</span>
                        <span>(57:20)</span>
                    </div>
                </div>
                <div class='button'>
                    <div class='material-icons flex'>save_alt</div>
                    <div class='vertical flex'>
                        <span>BAIXAR</span>
                        <span>(39.8 MB)</span>
                    </div>
                </div>
                <?php } ?>
                <div class='button' id='print'>
                    <div class='material-icons flex'>print</div>
                    <div class='vertical flex'>
                        <span>IMPRIMIR</span>
                        <span>(Formato PDF)</span>
                    </div>
                </div>
                <div class='title'>Mais lidas</div>
            </div>
        </div>
    </div>

    <script>
        var url = "/public/js/palavra.js";
        $.getScript(url);
        slider($(".header a:eq(3)"))
    </script>