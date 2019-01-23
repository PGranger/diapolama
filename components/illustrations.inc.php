<?php

    if ( ! isset($o['illustrations']) || sizeof($o['illustrations']) == 0 ) return false ;

    echo '<div class="colphotos">' ;
        echo '<ul class="images">' ;
            foreach ( $o['illustrations'] as $num => $i )
            {
                if ( ! isset($i['traductionFichiers'][0]) ) continue ;
                if ( isset($_GET['maxImages']) && $num > (int)$_GET['maxImages'] - 1 ) break ;
                echo '<li style="background-image:url('.$i['traductionFichiers'][0]['urlDiaporama'].');">' ;
                    echo '<div class="t">' ;
                        if ( isset($i['nom']['libelleFr']) ) echo '<strong class="nom">'.$i['nom']['libelleFr'].'</strong>' ;
                        if ( isset($i['copyright']['libelleFr']) ) echo '<strong class="copyright">&copy; '.$i['copyright']['libelleFr'].'</strong>' ;
                        if ( isset($i['legende']['libelleFr']) ) echo '<strong class="legende">'.$i['legende']['libelleFr'].'</strong>' ;
                    echo '</div>' ;
                echo '</li>' ;
            }
        echo '</ul>' ;
    echo '</div>' ;