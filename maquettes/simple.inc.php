<?php

    require_once(realpath(dirname(__FILE__)).'/../requires.inc.php') ;

    $pc = realpath(dirname(__FILE__)).'/../components/' ;

    if ( isset($_GET['t']) ) include($pc.'titreselection.inc.php') ;
    
    echo '<div class="c'.(isset($_GET['t'])?' t':null).'">' ;
        echo '<ul class="slider">' ;

            foreach ( $offres as $i => $o )
            {
                $is = $informationsSpecifiques[$o['type']] ;
                echo '<li>' ;
                    include($pc.'illustrations.inc.php') ;
                    echo '<h2>'.$o['nom']['libelleFr'].'</h2>' ;
                    if ( isset($o['presentation']['descriptifCourt']['libelleFr']) )
                        echo '<div class="descriptifCourt">'.nl2br($o['presentation']['descriptifCourt']['libelleFr']).'</div>' ;
                    if ( isset($o['presentation']['descriptifDetaille']['libelleFr']) )
                        echo '<div class="descriptifDetaille">'.nl2br($o['presentation']['descriptifDetaille']['libelleFr']).'</div>' ;
                        include($pc.'mc.inc.php') ;
                        include($pc.'ouverture.inc.php') ;
                echo '</li>' ;
            }

        echo '</ul>' ;
    echo '</div>' ;