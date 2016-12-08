<!DOCTYPE html>
<html>
<head>
        <title><?php echo isset($title_for_layout)?$title_for_layout:'SMARTS-LIFE - Entrez dans le Ebusiness'; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="http://localhost:8080/frmw/webroot/favicon.ico" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo Router::webroot('webroot/assets/plugins/socicon/socicon.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/bootstrap-social/bootstrap-social.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/simple-line-icons/simple-line-icons.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/animate/animate.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN: BASE PLUGINS  -->
        <link href="<?php echo Router::webroot('webroot/assets/plugins/revo-slider/css/settings.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/cubeportfolio/css/cubeportfolio.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/owl-carousel/owl.carousel.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/owl-carousel/owl.theme.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/owl-carousel/owl.transitions.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/plugins/fancybox/jquery.fancybox.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- END: BASE PLUGINS -->
        <!-- BEGIN THEME STYLES -->
        <link href="<?php echo Router::webroot('webroot/assets/base/css/plugins.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/base/css/components.css'); ?>" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/base/css/themes/default.css'); ?>" rel="stylesheet" id="style_theme" type="text/css"/>
        <link href="<?php echo Router::webroot('webroot/assets/base/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        
        
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
        
</head>

<body class="c-layout-header-fixed">
        <?php if(!empty($_SESSION['flash']['message'])):?>
            <button type="button" class="btn btn-<?php echo $_SESSION['flash']['type']; ?>">
           <?php echo $_SESSION['flash']['message']; 
           //$_SESSION['flash'] = array();?>
            </button>
            
        <?php endif;?>
       <br>
       <?php echo $content_for_layout; ?>
       <?php $_SESSION['flash'] = array();?>
<!-- END: PAGE CONTAINER -->
<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-5 -->
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
<div class="c-postfooter">
	<div class="container">
		<p class="c-font-oswald c-font-14">
                    Tout droits réservé &copy; <a href="www.goteam-ci.com">GOTEAM</a> SARL.  &nbsp; <span class="text-right" style="color: white !important;position:relative;left:50%;top:-6px;"> <a style="color: white !important;" class="" href="<?php echo Router::url('pages/conditionsutilisation'); ?>">Conditions d'utilisation</a></span>
		</p>
	</div>
</div>
</footer>
<!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
<!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
<div class="c-layout-go2top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END: LAYOUT/FOOTERS/GO2TOP -->
<!-- BEGIN: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="../assets/global/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="<?php echo Router::webroot('assets/jquery-1.10.2.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('webroot/assets/plugins/jquery-migrate.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('webroot/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- END: CORE PLUGINS -->
<!-- BEGIN: LAYOUT PLUGINS -->
<script src="<?php echo Router::webroot('webroot/assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('webroot/assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('webroot/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('webroot/assets/plugins/owl-carousel/owl.carousel.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('webroot/assets/plugins/counterup/jquery.waypoints.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('webroot/assets/plugins/counterup/jquery.counterup.min.js'); ?>" type="text/javascript"></script>
<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="<?php echo Router::webroot('assets/base/js/components.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('assets/base/js/app.js'); ?>" type="text/javascript"></script>

<script src="<?php echo Router::webroot('assets/script.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('assets/validation.js'); ?>" type="text/javascript"></script>
<script>
	$(document).ready(function() {    
		App.init(); // init core    

		//init main slider
		var slider = $('.c-layout-revo-slider .tp-banner');
	    var cont = $('.c-layout-revo-slider .tp-banner-container');
	    var api = slider.show().revolution({
	        delay: 15000,    
	        startwidth:1170,
	        startheight: (App.getViewPort().width < App.getBreakpoint('md') ? 1024 : 620),
	        navigationType: "hide",
	        navigationArrows: "solo",
	        touchenabled: "on",
	        onHoverStop: "on",
	        keyboardNavigation: "off",
	        navigationStyle: "circle",
	        navigationHAlign: "center",
	        navigationVAlign: "center",
	        fullScreenAlignForce:"off",
	        shadow: 0,
	        fullWidth: "on",
	        fullScreen: "off",       
	        spinner: "spinner2",
	        forceFullWidth: "on",
	        hideTimerBar:"on",
	        hideThumbsOnMobile: "on",
	        hideNavDelayOnMobile: 1500,
	        hideBulletsOnMobile: "on",
	        hideArrowsOnMobile: "on",
	        hideThumbsUnderResolution: 0,
	        videoJsPath: "rs-plugin/videojs/",
	    });
	});
	</script>
<!-- END: THEME SCRIPTS -->
<!-- END: LAYOUT/BASE/BOTTOM -->
</body>
</html>