<?php include('url.php') ?>

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
    <meta content='width=device-width, initial-scale=0.8' name='viewport' />
    <!-- <meta property='og:image' content='https://ibavmarilia.com/public/img/culto/.jpeg' /> -->
    <meta property='og:description' content='&nbsp;' />
    <meta name='description' content='Nosso encargo é edificar uma igreja de vencedores, onde cada membro é um sacerdote e cada casa uma extensão da igreja, conquistando, assim, a nossa geração para Cristo, através das células que se multiplicam.' />
    <title><?php echo ucfirst($parse_url); ?> | MIB Marília</title>
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
        </div>
    </div>

    <script src='/public/js/index.js'></script>

    <div id='loader' class='flex'>
        <svg width='100px' height='100px' viewBox='0 0 100 100'>
            <circle fill='none' cx='50' cy='50' r='30'></circle>
        </svg>
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