<?php

    require_once(realpath(dirname(__FILE__)).'/requires.inc.php') ;

    $selections = $client->getReferenceSelection() ;

    foreach ( $selections as $k => $s )
    {
        $query = Array(
            'selectionIds'=>[$s['id']],
            'count'=>1,
            //'responseFields'=>['@minimal']
        ) ;
        $page = $client->searchObjectIdentifier(['query'=>json_encode($query)]) ;
        if ( isset($page['numFound']) )
            $selections[$k]['nb'] = $page['numFound'] ;
    }

?>
<div class="container">
    <h1>Configuration</h1>
    <p></p>
    <form class="form" method="get">
        
        <div class="form-group">
            <label for="s">Sélection</label>
            <select class="form-control" name="s" id="s"><?php
                    foreach ( $selections as $selection ) {
                        echo PHP_EOL."\t\t\t\t".'<option value="'.$selection['id'].'"'.( ( isset($_GET['s']) && $_GET['s'] == $selection['id'] ) ? ' selected="selected"':null ).'>' ;
                            echo $selection['nom'].' ('.$selection['nb'].')' ;
                        echo '</option>' ;
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="t">Afficher le titre de la sélection ?</label>
            <input type="checkbox" name="t" id="t" value="1"<?php if ( isset($_GET['t']) ) echo ' checked="checked"' ; ?> />
        </div>

        <div class="form-group">
            <label for="fs">Taille des textes</label>
            <select class="form-control" name="fs" id="fs"><?php
                if ( ! isset($_GET['fs']) ) $_GET['fs'] = (float)1 ;
                for ( $i = .5 ; $i < 3 ; $i+= .1 ) {
                    echo PHP_EOL."\t\t\t\t".'<option value="'.$i.'"'.( ( isset($_GET['fs']) && (string)$_GET['fs'] == (string)$i ) ? ' selected="selected"':null ).'>' ;
                        echo $i.'em' ;
                    echo '</option>' ;
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="m">Maquette</label>
            <select class="form-control" name="m" id="m"><?php
                foreach ( $maquettes as $km => $m ) {
                    echo PHP_EOL."\t\t\t\t".'<option value="'.$km.'"'.( ( isset($_GET['m']) && $_GET['m'] == $km ) ? ' selected="selected"':null ).'>' ;
                        echo $m['titre'].' <em>'.$m['description'].'</em>' ;
                    echo '</option>' ;
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="a">Agenda ?</label>
            <select class="form-control" name="a" id="a">
                <option value="0"<?php if ( isset($_GET['a']) && $_GET['a'] == 0 ) echo ' selected="selected"' ; ?>>Non</option>
                <option value="1"<?php if ( isset($_GET['a']) && $_GET['a'] == 1 ) echo ' selected="selected"' ; ?>>Oui</option>
            </select>
        </div>

        <div class="form-group">
            <label for="max">Nombre d'offres maxi</label>
            <?php if ( ! isset($_GET['max']) ) $_GET['max'] = 20 ; ?>
            <input class="form-control" type="number" name="max" id="max" value="<?php echo @$_GET['max'] ; ?>" />
        </div>

        <div class="form-group">
            <label for="maxImages">Nombre d''images max par offre</label>
            <?php if ( ! isset($_GET['maxImages']) ) $_GET['maxImages'] = 4 ; ?>
            <input class="form-control" type="number" name="maxImages" id="maxImages" value="<?php echo @$_GET['maxImages'] ; ?>" />
        </div>

        <fieldset>
            <legend>Configuration bxSlider</legend>
            <p><a href="https://bxslider.com/options/" onclick="window.open(this.href);return false;">https://bxslider.com/options/</a></p>
            <div class="form-group">
                <label for="bx_mode">Mode</label>
                <select class="form-control" name="bx_mode" id="bx_mode">
                    <option value="horizontal"<?php if ( isset($_GET['bx_mode']) && $_GET['bx_mode'] == 'horizontal' ) echo ' selected="selected"' ; ?>>horizontal</option>
                    <option value="vertical"<?php if ( isset($_GET['bx_mode']) && $_GET['bx_mode'] == 'vertical' ) echo ' selected="selected"' ; ?>>vertical</option>
                    <option value="fade"<?php if ( isset($_GET['bx_mode']) && $_GET['bx_mode'] == 'fade' ) echo ' selected="selected"' ; ?>>fade</option>
                </select>
            </div>

            <div class="form-group">
                <label for="bx_pause">Pause (en millisecondes : 1000 = 1 seconde)</label>
                <?php if ( ! isset($_GET['bx_pause']) ) $_GET['bx_pause'] = 10000 ; ?>
                <input class="form-control" type="number" name="bx_pause" id="bx_pause" value="<?php echo @$_GET['bx_pause'] ; ?>" />
            </div>

            <div class="form-group">
                <label for="bx_speed">Speed (en millisecondes : 1000 = 1 seconde)</label>
                <?php if ( ! isset($_GET['bx_speed']) ) $_GET['bx_speed'] = 600 ; ?>
                <input class="form-control" type="number" name="bx_speed" id="bx_speed" value="<?php echo @$_GET['bx_speed'] ; ?>" />
            </div>

            <div class="form-group">
                <label for="bx_randomStart">randomStart</label>
                <select class="form-control" name="bx_randomStart" id="bx_randomStart">
                    <option value="false"<?php if ( isset($_GET['bx_randomStart']) && $_GET['bx_randomStart'] == 'false' ) echo ' selected="selected"' ; ?>>false</option>
                    <option value="true"<?php if ( isset($_GET['bx_randomStart']) && $_GET['bx_randomStart'] == 'true' ) echo ' selected="selected"' ; ?>>true</option>
                </select>
            </div>

        </fieldset>

        <button class="btn btn-primary" type="submit">Afficher le diaporama</button>
        
    </form>
</div>