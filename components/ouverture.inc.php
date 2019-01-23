<?php
 
    if ( ! isset($o['ouverture']) ) return false ;

    echo '<div class="ouverture">' ;
        echo '<h3>Ouverture</h3>' ;
        echo nl2br($o['ouverture']['periodeEnClair']['libelleFr']) ;
    echo '</div>' ;