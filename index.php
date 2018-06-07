<?php
    $url = (isset($_GET['url'])) ? $_GET['url']:'home';
    $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/'.$url.'.php';
    if (!file_exists($url)) {
        $url = (isset($_GET['url'])) ? $_GET['url']:'404';
        if ($url=='403') {
            $errorKey = '403';
            $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
        } else {
            $errorKey = '404';
            $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
        }
    }
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <meta name='theme-color' content='#fff' />
    <meta charset='UTF-8' />
    <meta content='width=device-width, initial-scale=0.6' name='viewport' />
    <title>IBAV Marília | Igreja Batista Água Viva de Marília</title>
    <link rel='shortcut icon' href='/favicon.ico' type='image/x-icon' />
    <link rel='stylesheet' href='/public/css/font.css' type='text/css' />
    <link rel='stylesheet' href='/public/css/index.css' type='text/css' />
</head>

<body>

    <div class='header'>
        <a onclick='select_head(0)'>
            <div class='img'></div>
        </a>
        <a class='flex' onclick='select_head(0)'>home</a>
        <a class='flex' onclick='select_head(1)'>eventos</a>
        <a class='flex' onclick='select_head(2)'>palavras</a>
        <a class='flex' onclick='select_head(3)'>células</a>
        <a class='flex' onclick='select_head(4)'>a igreja</a>
        <a class='flex' onclick='select_head(5)'>login</a>
    </div>

    <script src='/public/js/index.js'></script>

    <div id='loader' class='flex'>
        <div class='loader'></div>
        <label>Loading</label>
    </div>

    <script>$('#loader').hide();</script>

    <div class='content'><?php include($url) ?></div>

    <?php //include('audio.php')?>

    <?php include('footer.php') ?>