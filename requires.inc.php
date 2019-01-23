<?php

    require_once(realpath(dirname(__FILE__)).'/config.inc.php') ;
    require_once(realpath(dirname(__FILE__)).'/vendor/autoload.php') ;

    $maquettes = Array(
        'simple' => Array('titre'=>'Simple','description'=>'Diaporama simple sans listing')
    ) ;

    $informationsSpecifiques = Array(
        'ACTIVITE' 				=>	'Activite',
        'COMMERCE_ET_SERVICE' 	=>	'CommerceEtService',
        'DEGUSTATION'			=>	'Degustation',
        'DOMAINE_SKIABLE'		=>	'DomaineSkiable',
        'EQUIPEMENT' 			=>	'Equipement',
        'FETE_ET_MANIFESTATION'	=>	'FeteEtManifestation',
        'HEBERGEMENT_COLLECTIF'	=>	'HebergementCollectif',
        'HEBERGEMENT_LOCATIF'	=>	'HebergementLocatif',
        'HOTELLERIE' 			=>	'Hotellerie',
        'HOTELLERIE_PLEIN_AIR'	=>	'HotelleriePleinAir',
        'PATRIMOINE_CULTUREL'	=>	'PatrimoineCulturel',
        'PATRIMOINE_NATUREL'	=>	'PatrimoineNaturel',
        'RESTAURATION'			=>	'Restauration',
        'SEJOUR_PACKAGE'		=>	'SejourPackage',
        'STRUCTURE'				=> 	'Structure',
        'TERRITOIRE'			=>	'Territoire'
    ) ;

    $client = false ;

    try {
        $client = new \Sitra\ApiClient\Client([
            'apiKey'           => $apiKey,
            'projectId'        => $projectId,
            'baseUrl'          => 'https://api.apidae-tourisme.com/'
        ]) ;
    } catch ( Exception $e ) {
        
    }

    if ( ! $client )
    {
        echo 'Impossible de récupérer les informations du projet... vérifier la configuration.' ;
        die() ;
    }