<?php
    $parse_url= (isset($_GET['url'])) ? $_GET['url']:'home';
    $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/'.$parse_url.'.php';
    if (!file_exists($url)) {
        $url = (isset($_GET['url'])) ? $_GET['url']:'404';
        if ($url == '404') {
            $errorKey = '404';
            $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
            $parse_url = 'Error '.$errorKey;
        } else {
            $url = $_SERVER['DOCUMENT_ROOT'].'/'.$_GET['url'];
            if (file_exists($url) || $_GET['url'] == '403') {
                $errorKey = '403';
                $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
            } else {
                $errorKey = '404';
                $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
            }
            $parse_url = 'Error '.$errorKey;
        }
    }

    require_once $_SERVER['DOCUMENT_ROOT'].'/models/dao/PalavraDAO.php';
    $dao = new PalavraDAO();
    $exec = $dao->listar();

    $palavraExiste = false;

    if ($parse_url == 'palavra') {
        if (isset($_GET['titulo'])) {
            foreach ($exec as $listar) {
                if ($dao->formatarTitulo($listar['titulo']) == $_GET['titulo']) {
                    $parse_url = $listar['titulo'];
                    $_GET['id_palavra'] = $listar['id_palavra'];
                    $palavraExiste = true;
                }
            }
        }

        if (!$palavraExiste) {
            $errorKey = '404';
            $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
            $parse_url = 'Error '.$errorKey;
        }
    }
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <script async src='https://www.googletagmanager.com/gtag/js?id=UA-110299461-2'></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-110299461-2');
    </script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <meta name='theme-color' content='#fff' />
    <meta charset='UTF-8' />
    <meta content='width=device-width, initial-scale=0.6' name='viewport' />
    <!-- <meta property='og:image' content='https://ibavmarilia.com/public/img/culto/.jpeg' /> -->
    <meta property='og:description' content='&nbsp;' />
    <meta name='description' content='Acesse e fique por dentro das novidades que ocorrem na nossa igreja local Igreja Batista Água Viva de Marília (IBAV Marília).' />
    <meta name='keywords' content='igreja, ibav, marilia, ibav marilia, igreja local, eclésia, ministério, edificação, radicais livres' />
    <title><?php echo ucfirst($parse_url); ?> | IBAV Marília</title>
    <link rel='shortcut icon' href='/favicon.ico' type='image/x-icon' />
    <link rel='stylesheet' href='/public/css/font.css' type='text/css' />
    <link rel='stylesheet' href='/public/css/index.css' type='text/css' />
</head>

<body>

    <div class='header'>
        <a class='logo' onclick='select_head(0)'>
            <div class='img'></div>
        </a>
        <div class='header_icon'>
            <div class='material-icons'></div>
        </div>
        <div class='header_side'>
            <div class='header_space'></div>
            <a class='flex' onclick='select_head(0)'>home</a>
            <a class='flex' onclick='select_head(1)'>eventos</a>
            <a class='flex' onclick='select_head(2)'>palavras</a>
            <!-- <a class='flex' onclick='select_head(3)'>células</a> -->
            <a class='flex' onclick='select_head(4)'>a igreja</a>
            <!-- <a class='flex' onclick='select_head(5)'>login</a> -->
            <div class='fill'></div>
        </div>
    </div>

    <script src='/public/js/index.js'></script>

    <div id='loader' class='flex'>
        <div class='loader'></div>
        <label>Loading</label>
    </div>

    <script>$('#loader').hide();</script>

    <div class='content'><?php include($url) ?></div>

    <?php include('audio.php') ?>

    <?php include('footer.php') ?>

    <!-- <div class='container_alert'>
        <div class='alert'>
            <div class='flag'>
                <div class='material-icons'>warning</div>
            </div>
            <div class='text'>
                <p>Por favor, desabilite o bloqueador de pop-ups e clique no link novamente.</p>
            </div>
            <div class='close'>
                <div class='material-icons'>close</div>
            </div>
        </div>
    </div> -->