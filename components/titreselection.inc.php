<?php

    $query = Array(
        'selectionIds'=>[$_GET['s']],
    ) ;

    $selection = $client->getReferenceSelection(['query'=>json_encode($query)]) ;
    
    echo '<h1>'.$selection[0]['nom'].'</h1>' ;