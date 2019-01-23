<?php

    require_once(realpath(dirname(__FILE__)).'/requires.inc.php') ;

    if ( ! isset($_GET['s']) ) die('Aucune sélection sélectionnée') ;

    $maxOffres = isset($_GET['max']) && preg_match('#^[0-9]+$#',$_GET['max']) ? $_GET['max'] : 20 ;
    $max = ceil( $maxOffres / 200 ) ;
    $count = $maxOffres >= 200 ? 200 : $maxOffres ;

    $offres = Array() ;
    for ( $i = 0 ; $i <= $max ; $i++ ) {

        $query = Array(
            'selectionIds'=>[$_GET['s']],
            'count'=>$count,
            'first'=>$i*200,
            'responseFields'=>['@default','ouverture']
        ) ;
        $page = $client->searchObject(['query'=>json_encode($query)]) ;
        if ( isset($page['objetsTouristiques']) ) $offres = array_merge($offres,$page['objetsTouristiques']) ;
        if ( ! isset($page['objetsTouristiques']) || sizeof($page['objetsTouristiques']) < 200 ) break ;
    }
    
    if ( sizeof($offres) == 0 )
        die('Aucune offre trouvée pour cette sélection') ;

    if ( isset($_GET['m']) && preg_match('#^[a-z]+$#',$_GET['m']) && file_exists(realpath(dirname(__FILE__)).'/maquettes/'.$_GET['m'].'.inc.php') )
        include(realpath(dirname(__FILE__)).'/maquettes/'.$_GET['m'].'.inc.php') ;

?><script>
jQuery(document).ready(function(){
    
    var i = 0 ;
    jQuery('.slider>li').each(function(){
        jQuery(this).data('index',i) ;
        jQuery(this).addClass('index'+i) ;
        i++ ;
    }) ;

    var pause = <?php echo $_GET['bx_pause'] ; ?> ;

    var bxSlider = jQuery('.slider').bxSlider({
        mode : '<?php echo $_GET['bx_mode'] ; ?>',
        pause : pause,
        speed : <?php echo $_GET['bx_speed'] ; ?>,
        auto : true,
        randomStart : <?php echo $_GET['bx_randomStart'] ; ?>,
        onSlideAfter : function(slideElement,oldIndex,newIndex) {
            startSlider(newIndex) ;
        }
    }) ;

    var timerImages ;
    startSlider(0) ;

    function startSlider(currentIndex) {
        clearInterval(timerImages) ;
        var currentSlider = jQuery('.slider li.index'+currentIndex) ;
        if ( currentSlider.length > 0 )
        {
            currentSlider = currentSlider.first() ;
            jQuery('.slider .images li.active').removeClass('active') ;
            
            slideImages() ;

            var lis = currentSlider.find('ul.images li') ;
            var newInterval = (pause/lis.length) ;
            timerImages = setInterval(slideImages,newInterval) ;
        }
    }

    function slideImages() {

        var current = bxSlider.getCurrentSlide() ;
        
        if ( current === null ) return ;
        var ul = jQuery('.slider li.index'+current+' ul.images') ;
        var lis = ul.find('li') ;

        var active = ul.find('li.active') ;
        var next = active.next() ;
        if ( next.length == 0 ) next = ul.find('li:first-child') ;
        
        jQuery('.slider .images li.active').removeClass('active') ;
        next.addClass('active') ;
    }
/*
    var i = 0 ;
    jQuery('.images').each(function(){
        sliderImages[i++] = jQuery(this).bxSlider({
            onSlideAfter : function(slideElement,oldIndex,newIndex) { console.log('images'+newIndex) ; },
            mode : 'fade',
            pause : <?php echo ((int)$_GET['bx_pause']/4) ; ?>,
            speed : <?php echo ((int)$_GET['bx_speed']/2) ; ?>,
            auto : i == 1,
            adaptiveHeight:false
        }) ;
    }) ;
    */
}) ;
</script>