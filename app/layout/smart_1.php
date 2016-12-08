<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	<title><?php echo isset($title_for_layout)?$title_for_layout:'SMARTS-LIFE - Entrez dans le Ebusiness'; ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
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
        <link rel="shortcut icon" href="templates/icon.png"/>
        
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
        
</head>

<body class="c-layout-header-fixed">
    <header class="c-layout-header c-layout-header-4 c-bordered c-layout-header-default-mobile">
        <div class="c-navbar">
	<div class="container">
		<!-- BEGIN: BRAND -->
		<div class="c-navbar-wrapper clearfix">
			<div class="c-brand c-pull-left">
				<a href="<?php echo Router::url('pages/index'); ?>" class="c-logo">
				<img src="<?php echo Router::webroot('webroot/assets/base/img/layout/logos/logo-3.png'); ?>" alt="JANGO" class="c-desktop-logo">
				<img src="<?php echo Router::webroot('webroot/assets/base/img/layout/logos/logo-3.png'); ?>" alt="JANGO" class="c-desktop-logo-inverse">
				<img src="<?php echo Router::webroot('webroot/assets/base/img/layout/logos/logo-1.png'); ?>" alt="JANGO" class="c-mobile-logo">
				</a>
				<button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
				<span class="c-line"></span>
				<span class="c-line"></span>
				<span class="c-line"></span>
				</button>
				<button class="c-search-toggler" type="button">
				<i class="fa fa-search"></i>
				</button>
			</div>
			<!-- END: BRAND -->
			<!-- BEGIN: QUICK SEARCH -->
			<form class="c-quick-search" action="#">
				<input type="text" name="query" placeholder="Type to search..." value="" class="form-control" autocomplete="off">
				<span class="c-theme-link">&times;</span>
			</form>
			<!-- END: QUICK SEARCH -->
			<!-- BEGIN: HOR NAV -->
			<!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
			<!-- BEGIN: MEGA MENU -->
			<nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
			<!-- BEGIN: MEGA MENU -->
			<ul class="nav navbar-nav c-theme-nav">
				<li class="c-active c-menu-type-classic"><a href="<?php echo Router::url('pages/index'); ?>" class="c-link dropdown-toggle">Accueil</a></li>
				<li class="c-menu-type-classic"><a href="<?php echo Router::url('pages/apropos'); ?>" class="c-link dropdown-toggle">Services</a></li>
				<li class="c-menu-type-classic"><a href="#" class="c-link dropdown-toggle">Les opportunités</a></li>
				<li class="c-menu-type-classic"><a href="#" class="c-link dropdown-toggle">Contact</a></li>
				
                                
                                <?php if(!$this->Session->isLogged()):?>
                                <li>
                                    
                                    <a href="javascript:;" data-toggle="modal" data-target="#login-form" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> 
                                        <?php 
                                            echo 'Se connecter';
                                        ?>
                                        
                                    </a>
                                </li>
                                    <?php else:?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" href="#"  title="" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                        <?php 
                                        echo $this->Session->read('Membre')->pseudo;
                                        ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo Router::url('profil/'.$this->Session->read('Membre')->pseudo); ?>">Profil</a></li>
                                        <li><a href="<?php echo Router::url('compte/'.$this->Session->read('Membre')->pseudo); ?>">Compte</a></li>
                                        <li><a href="#">Paramètres</a></li>
                                        <li><a onclick="return confirm('Voulez-vous vraiment vous déconnecter?');" href="<?php echo Router::url('membre/logout'); ?>">Déconnexion</a></li>
                                    </ul>
                                </li>   
                                    <?php endif;?>
                                
			</ul>
                        
                        </nav>
		</div>
	</div>
</div>
    </header>
   
<div class="modal fade c-content-login-form" id="forget-password-form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content c-square">
			<div class="modal-header c-no-border">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h3 class="c-font-24 c-font-sbold">Restauration de mot de passe</h3>
				<p>Renseignez vos pseudo et email pour regénérer votre mot de passe</p>
				<form>
					<div class="form-group">
						<label for="forget-email" class="hide">Votre pseudo</label>
						<input type="email" class="form-control input-lg c-square" id="forget-email" placeholder="Votre pseudo">
					</div>
					<div class="form-group">
						<label for="forget-email" class="hide">Votre email</label>
						<input type="email" class="form-control input-lg c-square" id="forget-email" placeholder="Votre email">
					</div>
					<div class="form-group">
						<button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Envoyez</button>
						<a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">J'ai un compte</a>
					</div>
				</form>
			</div>
			<div class="modal-footer c-no-border">
				<span class="c-text-account">Pas encore de compte ?</span>
				<a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Inscrivez vous!</a>
			</div>
		</div>
	</div>
</div>
<!-- END: CONTENT/USER/FORGET-PASSWORD-FORM -->
<!-- BEGIN: CONTENT/USER/SIGNUP-FORM -->
<div class="modal fade c-content-login-form" id="signup-form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content c-square">
			<div class="modal-header c-no-border">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h3 class="c-font-24 c-font-sbold">Créer votre compte</h3>
				<p>
					Remplissez le formulaire sans erreur
				</p>
				<form action="<?php echo Router::url('membre/create/'); ?>" method="post">
                                        
					<div class="form-group">
						<label for="signup-fullname" class="hide">Votre nom</label>
						<input name='nommembre' type="text" class="form-control input-lg c-square" id="signup-fullname" placeholder="Nom">
					</div>
                                        <div class="form-group">
						<label for="signup-fullname" class="hide">Votre prénom</label>
						<input name='pnommbre' type="text" class="form-control input-lg c-square" id="signup-fullname" placeholder="prénoms">
					</div>
					<div class="form-group">
						<label for="signup-username" class="hide">Pseudo</label>
						<input name='pseudo' type="text" class="form-control input-lg c-square" id="signup-username" placeholder="Entrez un pseudo">
					</div>
					<div class="form-group">
						<label for="signup-email" class="hide">Email</label>
						<input name='emailmembre' type="email" class="form-control input-lg c-square" id="signup-email" placeholder="Votre email">
					</div>
                                        <div class="form-group">
						<label for="signup-password" class="hide">Mot de passe</label>
                                                <input name="passmbre" type="password" class="form-control input-lg c-square" id="signup-password" placeholder="Votre mot de passe">
					</div>
					<div class="form-group">
						<label for="signup-country" class="hide">Votre pays</label>
						<select class="form-control input-lg c-square" id="signup-country" name='pays'>
							<option value="0">Selectionnez votre pays</option>
                                                        <option value="1">Côte d'ivoire</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Je crée mon compte</button>
						<a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">J'ai un compte</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END: CONTENT/USER/SIGNUP-FORM -->
<!-- BEGIN: CONTENT/USER/LOGIN-FORM -->
<div class="modal fade c-content-login-form" id="login-form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content c-square">
			<div class="modal-header c-no-border">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h3 class="c-font-24 c-font-sbold">Bienvenue !</h3><p>Entrez vos parametres pour vous connecter</p>
				<form action="<?php echo Router::url('membre/login'); ?>" method="post">
                                    <div class="form-group"><label for="login-email" class="hide">Pseudo</label><input name="pseudo" type="text" class="form-control input-lg c-square" id="login-email" placeholder="Votre pseudo"></div>
                                    <div class="form-group"><label for="login-password" class="hide">Mot de passe</label><input name="passmbre" type="password" class="form-control input-lg c-square" id="login-password" placeholder="Votre mot de passe"></div>
					<div class="form-group">
						<button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Se connecter</button>
						<a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot">mot de passe oublié?</a>
					</div>
					<div class="clearfix">
						<div class="c-content-divider c-divider-sm c-icon-bg c-bg-grey c-margin-b-20"><span style="width: 160px">Connectez vous via</span></div>
						<ul class="c-content-list-adjusted"><li><a class="btn btn-block c-btn-square btn-social btn-twitter"><i class="fa fa-twitter"></i>Twitter </a></li><li><a class="btn btn-block c-btn-square btn-social btn-facebook"><i class="fa fa-facebook"></i>Facebook </a></li><li><a class="btn btn-block c-btn-square btn-social btn-google"><i class="fa fa-google"></i>Google </a></li></ul>
					</div>
				</form>
			</div>
			<div class="modal-footer c-no-border">
				<span class="c-text-account">Pas encore de compte ?</span>
				<a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Inscrivez vous!</a>
			</div>
		</div>
	</div>
</div>

<div class="c-layout-page"> 
       
       <?php echo $this->Session->flash(); ?>
       <?php echo $content_for_layout; ?>
       
       
</div>

<!-- END: PAGE CONTAINER -->
<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-5 -->
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
<div class="c-postfooter">
	<div class="container">
		<p class="c-font-oswald c-font-14">
			Tout droits réservé &copy; SMARTS-LIFE SARL.
                        &nbsp;&nbsp;
                        <a style="color: white;position:relative;left:500px;" href="<?php echo Router::url('pages/apropos'); ?>" class="c-font-oswald c-font-14 right">A propos de nous</a>
		
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
<script src="<?php echo Router::webroot('webroot/assets/plugins/jquery.min.js'); ?>" type="text/javascript"></script>
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
<script src="<?php echo Router::webroot('webroot/assets/plugins/fancybox/jquery.fancybox.pack.js'); ?>" type="text/javascript"></script>
<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="<?php echo Router::webroot('assets/base/js/components.js'); ?>" type="text/javascript"></script>
<script src="<?php echo Router::webroot('assets/base/js/app.js'); ?>" type="text/javascript"></script>
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