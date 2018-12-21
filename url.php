<?php

$parse_url= (isset($_GET['url'])) ? $_GET['url']:'home';
$url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/'.$parse_url.'.php';

if (!file_exists($url)) {
    $url = (isset($_GET['url'])) ? $_GET['url']:'404';
    if ($url == '404') {
        $errorKey = '404';
        $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
        $parse_url = 'Error '.$errorKey;
    } else if ($parse_url == 'maintenance') {
        $errorKey = 'maintenance';
        $url = $_SERVER['DOCUMENT_ROOT'].'/views/pages/warning.php';
        $parse_url = 'Manutenção';
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