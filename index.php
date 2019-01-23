<?php require_once(realpath(dirname(__FILE__)).'/requires.inc.php') ; ?><!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <link rel="stylesheet" href="./style.css">
        <?php if ( isset($_GET['m']) && preg_match('#^[a-z]+$#',$_GET['m']) ) echo '<link rel="stylesheet" href="./maquettes/'.$_GET['m'].'.css">' ; ?>
        <?php if ( isset($_GET['fs']) && preg_match('#^[0-9.]+$#',$_GET['fs']) ) echo '<style>html { font-size:'.$_GET['fs'].'em ; }</style>' ; ?>
        <title></title>
    </head>
    <body>
        <?php
            if ( ! isset($_GET['s']) )
            {
                include(realpath(dirname(__FILE__)).'/settings.inc.php') ;
            }
            else
            {
                include(realpath(dirname(__FILE__)).'/diapo.inc.php') ;
            }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>