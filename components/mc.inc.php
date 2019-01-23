<?php

    $mcs = Array() ;
    if ( isset($o['informations']['moyensCommunication']) )
    {
        foreach ( $o['informations']['moyensCommunication'] as $mc )
        {
            $tmp = '<strong>'.$mc['type']['libelleFr'].'</strong>' ;
            $tmp .= ' : '.$mc['coordonnees']['fr'] ;
            if ( isset($mc['observation']['libelleFr']) ) $tmp .= ' <em>('.$mc['observation']['libellefr'].')</em>' ;
            $mcs[] = $tmp ;
        }
    }

    $adr = Array() ;
    if ( isset($o['localisation']['adresse']) )
    {
        $a = $o['localisation']['adresse'] ;
        if ( isset($o[$is]['nomLieu']) ) $adr[] = $o[$is]['nomLieu'] ;
        if ( isset($a['adresse1']) ) $adr[] = $a['adresse1'] ;
        if ( isset($a['adresse2']) ) $adr[] = $a['adresse2'] ;
        if ( isset($a['adresse3']) ) $adr[] = $a['adresse3'] ;
        if ( isset($a['commune']) ) $adr[] = $a['commune']['codePostal'].' '.$a['commune']['nom'] ;
    }

    echo '<div class="mcs">' ;
        echo '<h3>Contact</h3>' ;

        if ( sizeof($adr) > 0 )
            echo '<address>'.implode("<br />".PHP_EOL,$adr).'</address>' ;

        if ( sizeof($mcs) > 0 )
        {
            echo '<ul>' ;
            foreach ( $mcs as $mc )
            {
                echo '<li>'.$mc.'</li>' ;
            }
            echo '</ul>' ;
        }
    echo '</div>' ;