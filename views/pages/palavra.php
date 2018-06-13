    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/models/dao/PalavraDAO.php';
        $dao = new PalavraDAO();
        $palavra = $dao->listarId($_GET['id_palavra']);
    ?>
    <link rel='stylesheet' href='/public/css/palavra.css' type='text/css'>

    <div class='container'>
        <div class='word_header flex' style='background-image: linear-gradient(to bottom, rgba(20,20,20,.5) 0%,rgba(20,20,20,.5) 50%), url(/public/img/culto/<?php echo $palavra['img'] ?>);'>
            <img style='display: none' src='/public/img/culto/<?php echo $palavra['img'] ?>'></img>
            <div class='title'><?php echo $palavra['titulo_dividido'] ?></div>
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
                <a class='button' onclick='select_audio("<?php echo $_GET['titulo'].'.mp3' ?>", "<?php echo $palavra['titulo'] ?>", "<?php echo $palavra['data_formatada2'] ?>", "<?php echo $palavra['img'] ?>")'>
                    <div class='material-icons flex'>headset</div>
                    <div class='vertical flex'>
                        <span>OUVIR</span>
                        <span id='length'>(00:00)</span>
                    </div>
                </a>
                <a class='button' href='<?php echo '/public/audio/'.$_GET['titulo'].'.mp3' ?>' download>
                    <div class='material-icons flex'>save_alt</div>
                    <div class='vertical flex'>
                        <span>BAIXAR</span>
                        <span>(<?php echo number_format(filesize($_SERVER['DOCUMENT_ROOT'].'/public/audio/'.$_GET['titulo'].'.mp3')/1024/1024, 1, '.', '').' MB' ?>)</span>
                    </div>
                </a>
                <script>
                    getDuration('<?php echo '/public/audio/'.$_GET['titulo'].'.mp3' ?>', function(length) {
                        length = calculateTotalValue(length);
                        $('#length').html('('+length+')');
                    });
                </script>
                <?php } ?>
                <a class='button' onclick='printable("<?php echo $palavra['titulo'] ?>")'>
                    <div class='material-icons flex'>print</div>
                    <div class='vertical flex'>
                        <span>IMPRIMIR</span>
                        <span>(Formato PDF)</span>
                    </div>
                </a>
                <div class='title'>Mais lidas</div>
            </div>
        </div>
    </div>

    <script>
        var url = "/public/js/palavra.js";
        $.getScript(url);
        slider($(".header a:eq(3)"))
    </script>