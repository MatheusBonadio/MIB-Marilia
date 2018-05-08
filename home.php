<?php 
    session_start();
    //error_reporting(E_ALL); 
    //ini_set("display_errors", 1); 
    //include($_SERVER['DOCUMENT_ROOT']."/url.php");
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!-- <script src='/public/js/jquery.js'></script> -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <meta name='theme-color' content='#fff'>
    <meta charset='UTF-8'>
    <title>IBAV Marília | Igreja Batista Água Viva Marília</title>
    <!-- <meta content='width=device-width, initial-scale=0.6, maximum-scale=0.6, user-scalable=0' name='viewport' /> -->
    <link rel='shortcut icon' href='/public/img/sistema/icon.png' type='image/x-icon'>
    <link rel='stylesheet' href='/public/css/index.css' type='text/css'>
    <link rel='stylesheet' href='/public/css/home.css' type='text/css'>
</head>

<body>

    <div class='header'>
        <a href='/'>
            <div class='img'></div>
        </a>
        <a class='flex active'>home</a>
        <a class='flex'>eventos</a>
        <a class='flex'>notícias</a>
        <a class='flex'>a igreja</a>
        <a class='flex'>login</a>
    </div>

    <!-- <script src='/public/js/header.js'></script>

    <div id='loader' class='flex'>
        <div class='loader'></div>
        <label>Loading</label>
    </div>

    <script>$('#loader').hide();</script>

    <div class='content'><?php include($url); ?></div>
    
    <?php include("footer.php");?>