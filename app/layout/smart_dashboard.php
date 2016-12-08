<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	<title><?php echo isset($title_for_layout)?$title_for_layout:'Dashboard'; ?></title>

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
        <!-- Current Page Styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo Router::webroot('webroot/profile/components/revolution_slider/css/settings.css'); ?>" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Router::webroot('webroot/profile/components/revolution_slider/css/style.css'); ?>" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Router::webroot('webroot/profile/components/jquery.bxslider/jquery.bxslider.css'); ?>" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Router::webroot('webroot/profile/components/flexslider/flexslider.css'); ?>" media="screen" />

        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="<?php echo Router::webroot('webroot/profile/css/style.css'); ?>">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="<?php echo Router::webroot('webroot/profile/css/custom.css'); ?>">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="<?php echo Router::webroot('webroot/profile/css/updates.css'); ?>">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="<?php echo Router::webroot('webroot/profile/css/responsive.css'); ?>">
        <link rel="shortcut icon" href="templates/icon.png"/>
        
        <!-- CSS for IE -->
        <!--[if lte IE 9]>
            <link rel="stylesheet" type="text/css" href="profile/css/ie.css" />
        <![endif]-->

    
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.profile/js/1.4.2/respond.js"></script>
        <![endif]-->
        
</head>

<body>
   

<div id="page-wrapper">
    
           
                    <header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-left">
                        <li><a href="">MON COMPTE</a></li>
                        <li class="ribbon">
                            <a href="#">Français</a>
                            <ul class="menu mini">
                                <li><a href="#" title="English">English</a></li>
                                <li class="active"><a href="#" title="Français">Français</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="quick-menu pull-right">
                        <li class="ribbon">
                            <a href="#">
                                <?php 
                                if($this->Session->isLogged()){
									echo $membre->pseudo;
                                }else{
                                    $this->redirect("pages/index");
                                }
                                ?>
                            </a>
                            <ul class="menu mini uppercase">
                                <li><a href="<?php echo Router::url('dashboard'); ?>" class="location-reload">Tableau de Bord</a></li>
                                <li><a href="#settings" class="location-reload">paramètres</a></li>
                                <li><a onclick="return confirm('Voulez-vous vraiment vous déconnecter?');" href="<?php echo Router::url('membre/logout'); ?>">Déconnexion</a></li>
                            </ul>
                        </li>
                        <li class="ribbon currency">
                            <a href="#" title="">XOF CFA</a>
                            <ul class="menu mini">
                                <li class="active"><a href="#" title="USD">XOF CFA</a></li>
                                <li><a href="#" title="EORO">EURO</a></li>
                                <li><a href="#" title="XOF CFA">USD</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="main-header">
                
                <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class="logo navbar-brand">
                        <a href="<?php echo Router::url('pages/index'); ?>" title="Smarts-life - home">
                            <img src="<?php echo Router::webroot('profile/images/logo.png'); ?>" alt="Smarts-life Template" />
                        </a>
                    </h1>
                    
                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="c-active menu-item-has-children"><a href="<?php echo Router::url('pages/index'); ?>" class="c-link dropdown-toggle">Accueil</a></li>
                        </ul>
                    </nav>
                </div>
                
                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li class="menu-item-has-children">
                            <a href="index.html">Home</a>
                            <ul>
                                <li><a href="index.html">Home Layout 1</a></li>
                                <li><a href="homepage2.html">Home Layout 2</a></li>
                                <li><a href="homepage3.html">Home Layout 3</a></li>
                                <li><a href="homepage4.html">Home Layout 4</a></li>
                                <li><a href="homepage5.html">Home Layout 5</a></li>
                                <li><a href="homepage6.html">Home Layout 6</a></li>
                                <li><a href="homepage7.html">Home Layout 7</a></li>
                                <li><a href="homepage8.html">Home Layout 8</a></li>
                                <li><a href="homepage9.html">Home Layout 9</a></li>
                                <li><a href="homepage10.html">Home Layout 10</a></li>
                                <li><a href="homepage11.html">Home Layout 11</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="hotel-index.html">Hotels</a>
                            <ul>
                                <li><a href="hotel-index.html">Home Hotels</a></li>
                                <li><a href="hotel-list-view.html">List View</a></li>
                                <li><a href="hotel-grid-view.html">Grid View</a></li>
                                <li><a href="hotel-block-view.html">Block View</a></li>
                                <li><a href="hotel-detailed.html">Detailed</a></li>
                                <li><a href="hotel-booking.html">Booking</a></li>
                                <li><a href="hotel-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="flight-index.html">Flights</a>
                            <ul>
                                <li><a href="flight-index.html">Home Flights</a></li>
                                <li><a href="flight-list-view.html">List View</a></li>
                                <li><a href="flight-grid-view.html">Grid View</a></li>
                                <li><a href="flight-block-view.html">Block View</a></li>
                                <li><a href="flight-detailed.html">Detailed</a></li>
                                <li><a href="flight-booking.html">Booking</a></li>
                                <li><a href="flight-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="car-index.html">Cars</a>
                            <ul>
                                <li><a href="car-index.html">Home Cars</a></li>
                                <li><a href="car-list-view.html">List View</a></li>
                                <li><a href="car-grid-view.html">Grid View</a></li>
                                <li><a href="car-block-view.html">Block View</a></li>
                                <li><a href="car-detailed.html">Detailed</a></li>
                                <li><a href="car-booking.html">Booking</a></li>
                                <li><a href="car-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="cruise-index.html">Cruises</a>
                            <ul>
                                <li><a href="cruise-index.html">Home Cruises</a></li>
                                <li><a href="cruise-list-view.html">List View</a></li>
                                <li><a href="cruise-grid-view.html">Grid View</a></li>
                                <li><a href="cruise-block-view.html">Block View</a></li>
                                <li><a href="cruise-detailed.html">Detailed</a></li>
                                <li><a href="cruise-booking.html">Booking</a></li>
                                <li><a href="cruise-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="#">Standard Pages</a>
                                    <ul>
                                        <li><a href="pages-aboutus1.html">About Us 1</a></li>
                                        <li><a href="pages-aboutus2.html">About Us 2</a></li>
                                        <li><a href="pages-services1.html">Services 1</a></li>
                                        <li><a href="pages-services2.html">Services 2</a></li>
                                        <li><a href="pages-photogallery-4column.html">Gallery 4 Column</a></li>
                                        <li><a href="pages-photogallery-3column.html">Gallery 3 Column</a></li>
                                        <li><a href="pages-photogallery-2column.html">Gallery 2 Column</a></li>
                                        <li><a href="pages-photogallery-fullview.html">Gallery Read</a></li>
                                        <li><a href="pages-blog-rightsidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="pages-blog-leftsidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="pages-blog-fullwidth.html">Blog Full Width</a></li>
                                        <li><a href="pages-blog-read.html">Blog Read</a></li>
                                        <li><a href="pages-faq1.html">Faq 1</a></li>
                                        <li><a href="pages-faq2.html">Faq 2</a></li>
                                        <li><a href="pages-layouts-leftsidebar.html">Layouts Left Sidebar</a></li>
                                        <li><a href="pages-layouts-rightsidebar.html">Layouts Right Sidebar</a></li>
                                        <li><a href="pages-layouts-twosidebar.html">Layouts Two Sidebar</a></li>
                                        <li><a href="pages-layouts-fullwidth.html">Layouts Full Width</a></li>
                                        <li><a href="pages-contactus1.html">Contact Us 1</a></li>
                                        <li><a href="pages-contactus2.html">Contact Us 2</a></li>
                                        <li><a href="pages-contactus3.html">Contact Us 3</a></li>
                                        <li><a href="pages-travelo-policies.html">Travelo Policies</a></li>
                                        <li><a href="pages-sitemap.html">Site Map</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Extra Pages</a>
                                    <ul>
                                        <li><a href="extra-pages-holidays.html">Holidays</a></li>
                                        <li><a href="extra-pages-hotdeals.html">Hot Deals</a></li>
                                        <li><a href="extra-pages-before-you-fly.html">Before You Fly</a></li>
                                        <li><a href="extra-pages-inflight-experience.html">Inflight Experience</a></li>
                                        <li><a href="extra-pages-things-todo1.html">Things To Do 1</a></li>
                                        <li><a href="extra-pages-things-todo2.html">Things To Do 2</a></li>
                                        <li><a href="extra-pages-travel-essentials.html">Travel Essentials</a></li>
                                        <li><a href="extra-pages-travel-stories.html">Travel Stories</a></li>
                                        <li><a href="extra-pages-travel-guide.html">Travel Guide</a></li>
                                        <li><a href="extra-pages-travel-ideas.html">Travel Ideas</a></li>
                                        <li><a href="extra-pages-travel-insurance.html">Travel Insurance</a></li>
                                        <li><a href="extra-pages-group-booking.html">Group Bookings</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Special Pages</a>
                                    <ul>
                                        <li><a href="pages-404-1.html">404 Page 1</a></li>
                                        <li><a href="pages-404-2.html">404 Page 2</a></li>
                                        <li><a href="pages-404-3.html">404 Page 3</a></li>
                                        <li><a href="pages-coming-soon1.html">Coming Soon 1</a></li>
                                        <li><a href="pages-coming-soon2.html">Coming Soon 2</a></li>
                                        <li><a href="pages-coming-soon3.html">Coming Soon 3</a></li>
                                        <li><a href="pages-loading1.html">Loading Page 1</a></li>
                                        <li><a href="pages-loading2.html">Loading Page 2</a></li>
                                        <li><a href="pages-loading3.html">Loading Page 3</a></li>
                                        <li><a href="pages-login1.html">Login Page 1</a></li>
                                        <li><a href="pages-login2.html">Login Page 2</a></li>
                                        <li><a href="pages-login3.html">Login Page 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Shortcodes</a>
                            <ul>
                                <li><a href="shortcode-accordions-toggles.html">Accordions &amp; Toggles</a></li>
                                <li><a href="shortcode-tabs.html">Tabs</a></li>
                                <li><a href="shortcode-buttons.html">Buttons</a></li>
                                <li><a href="shortcode-icon-boxes.html">Icon Boxes</a></li>
                                <li><a href="shortcode-gallery-styles.html">Image &amp; Gallery Styles</a></li>
                                <li><a href="shortcode-image-box-styles.html">Image Box Styles</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Listing Styles</a>
                                    <ul>
                                        <li><a href="shortcode-listing-style1.html">Listing Style 01</a></li>
                                        <li><a href="shortcode-listing-style2.html">Listing Style 02</a></li>
                                        <li><a href="shortcode-listing-style3.html">Listing Style 03</a></li>
                                    </ul>
                                </li>
                                <li><a href="shortcode-dropdowns.html">Dropdowns</a></li>
                                <li><a href="shortcode-pricing-tables.html">Pricing Tables</a></li>
                                <li><a href="shortcode-testimonials.html">Testimonials</a></li>
                                <li><a href="shortcode-our-team.html">Our Team</a></li>
                                <li><a href="shortcode-gallery-popup.html">Gallery Popup</a></li>
                                <li><a href="shortcode-map-popup.html">Map Popup</a></li>
                                <li><a href="shortcode-style-changer.html">Style Changer</a></li>
                                <li><a href="shortcode-typography.html">Typography</a></li>
                                <li><a href="shortcode-animations.html">Animations</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Bonus</a>
                            <ul>
                                <li><a href="dashboard1.html">Dashboard 1</a></li>
                                <li><a href="dashboard2.html">Dashboard 2</a></li>
                                <li><a href="dashboard3.html">Dashboard 3</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">7 Footer Styles</a>
                                    <ul>
                                        <li><a href="#">Default Style</a></li>
                                        <li><a href="footer-style1.html">Footer Style 1</a></li>
                                        <li><a href="footer-style2.html">Footer Style 2</a></li>
                                        <li><a href="footer-style3.html">Footer Style 3</a></li>
                                        <li><a href="footer-style4.html">Footer Style 4</a></li>
                                        <li><a href="footer-style5.html">Footer Style 5</a></li>
                                        <li><a href="footer-style6.html">Footer Style 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">8 Header Styles</a>
                                    <ul>
                                        <li><a href="#">Default Style</a></li>
                                        <li><a href="header-style1.html">Header Style 1</a></li>
                                        <li><a href="header-style2.html">Header Style 2</a></li>
                                        <li><a href="header-style3.html">Header Style 3</a></li>
                                        <li><a href="header-style4.html">Header Style 4</a></li>
                                        <li><a href="header-style5.html">Header Style 5</a></li>
                                        <li><a href="header-style6.html">Header Style 6</a></li>
                                        <li><a href="header-style7.html">Header Style 7</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">7 Inner Start Styles</a>
                                    <ul>
                                        <li><a href="#">Default Style</a></li>
                                        <li><a href="inner-starts-style1.html">Inner Start Style 1</a></li>
                                        <li><a href="inner-starts-style2.html">Inner Start Style 2</a></li>
                                        <li><a href="inner-starts-style3.html">Inner Start Style 3</a></li>
                                        <li><a href="inner-starts-style4.html">Inner Start Style 4</a></li>
                                        <li><a href="inner-starts-style5.html">Inner Start Style 5</a></li>
                                        <li><a href="inner-starts-style6.html">Inner Start Style 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">3 Search Styles</a>
                                    <ul>
                                        <li><a href="search-style1.html">Search Style 1</a></li>
                                        <li><a href="search-style2.html">Search Style 2</a></li>
                                        <li><a href="search-style3.html">Search Style 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                    <ul class="mobile-topnav container">
                        <li><a href="#">MY ACCOUNT</a></li>
                        <li class="ribbon language menu-color-skin">
                            <a href="#" data-toggle="collapse">ENGLISH</a>
                            <ul class="menu mini">
                                <li><a href="#" title="Dansk">Dansk</a></li>
                                <li><a href="#" title="Deutsch">Deutsch</a></li>
                                <li class="active"><a href="#" title="English">English</a></li>
                                <li><a href="#" title="EspaÃ±ol">EspaÃ±ol</a></li>
                                <li><a href="#" title="FranÃ§ais">FranÃ§ais</a></li>
                                <li><a href="#" title="Italiano">Italiano</a></li>
                                <li><a href="#" title="Magyar">Magyar</a></li>
                                <li><a href="#" title="Nederlands">Nederlands</a></li>
                                <li><a href="#" title="Norsk">Norsk</a></li>
                                <li><a href="#" title="Polski">Polski</a></li>
                                <li><a href="#" title="PortuguÃªs">PortuguÃªs</a></li>
                                <li><a href="#" title="Suomi">Suomi</a></li>
                                <li><a href="#" title="Svenska">Svenska</a></li>
                            </ul>
                        </li>
                        <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                        <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                        <li class="ribbon currency menu-color-skin">
                            <a href="#">USD</a>
                            <ul class="menu mini">
                                <li><a href="#" title="AUD">AUD</a></li>
                                <li><a href="#" title="BRL">BRL</a></li>
                                <li class="active"><a href="#" title="USD">USD</a></li>
                                <li><a href="#" title="CAD">CAD</a></li>
                                <li><a href="#" title="CHF">CHF</a></li>
                                <li><a href="#" title="CNY">CNY</a></li>
                                <li><a href="#" title="CZK">CZK</a></li>
                                <li><a href="#" title="DKK">DKK</a></li>
                                <li><a href="#" title="EUR">EUR</a></li>
                                <li><a href="#" title="GBP">GBP</a></li>
                                <li><a href="#" title="HKD">HKD</a></li>
                                <li><a href="#" title="HUF">HUF</a></li>
                                <li><a href="#" title="IDR">IDR</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="travelo-signup" class="travelo-signup-box travelo-box">
                <div class="login-social">
                    <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
                    <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
                </div>
                <div class="seperator"><label>OR</label></div>
                <div class="simple-signup">
                    <div class="text-center signup-email-section">
                        <a href="#" class="signup-email"><i class="soap-icon-letter"></i>Sign up with Email</a>
                    </div>
                    <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund olicy, and Host Guarantee Terms.</p>
                </div>
                <div class="email-signup">
                    <form>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="first name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="last name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="email address">
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text full-width" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text full-width" placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Tell me about Travelo news
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.</p>
                        </div>
                        <button type="submit" class="full-width btn-medium">SIGNUP</button>
                    </form>
                </div>
                <div class="seperator"></div>
                <p>Already a Travelo member? <a href="#travelo-login" class="goto-login soap-popupbox">Login</a></p>
            </div>
            <div id="travelo-login" class="travelo-login-box travelo-box">
                <div class="login-social">
                    <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
                    <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
                </div>
                <div class="seperator"><label>OR</label></div>
                <form>
                    <div class="form-group">
                        <input type="text" class="input-text full-width" placeholder="email address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="input-text full-width" placeholder="password">
                    </div>
                    <div class="form-group">
                        <a href="#" class="forgot-password pull-right">Forgot password?</a>
                        <div class="checkbox checkbox-inline">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </form>
                <div class="seperator"></div>
                <p>Don't have an account? <a href="#travelo-signup" class="goto-signup soap-popupbox">Sign up</a></p>
            </div>
        </header>
                    
        
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><a href="<?php echo Router::url('dashboard'); ?>">Tableau de Bord</a></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li class="active"><a style="color: yellow" onclick="return confirm('Voulez-vous vraiment vous déconnecter?');" href="<?php echo Router::url('membre/logout'); ?>">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    
    
       
        <?php if(!empty($_SESSION['flash']['message'])):?>
            <button type="button" class="btn btn-<?php echo $_SESSION['flash']['type']; ?>">
           <?php echo $_SESSION['flash']['message']; 
           //$_SESSION['flash'] = array();?>
            </button>
        <?php endif;?>
       <?php echo $content_for_layout; ?>
       <?php $_SESSION['flash'] = array();?>
       


<!-- END: PAGE CONTAINER -->
<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-5 -->
<a name="footer"></a>
<footer id="footer">
            
            <div class="bottom gray-area">
                <div class="container">
                    <div class="logo pull-left">
                        <a href="" title="Travelo - home">
                            <img src="profile/images/logo.png" alt="Travelo HTML5 Template" />
                        </a>
                    </div>
                    <div class="pull-right">
                        <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
                    </div>
                    <div class="copyright pull-right">
                    Tout droits réservé &copy; <a href="www.goteam-ci.com">GOTEAM</a> SARL.  &nbsp; <span class="text-right" style="color: #838383 !important;position:relative;left:50%;top:-4px;"> <a style="color: #838383 !important;" class="" href="<?php echo Router::url('pages/conditionsutilisation'); ?>">Conditions d'utilisation</a></span>
                    </div>
                </div>
            </div>
        </footer>
     </div>   
    <!-- END: THEME SCRIPTS -->


    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/jquery-1.11.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/jquery.noconflict.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/modernizr.2.7.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/jquery.placeholder.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/jquery-ui.1.10.4.min.js'); ?>"></script>
    
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/bootstrap.js'); ?>"></script>

    <!-- Flex Slider -->
    <script type="text/javascript" src="<?php echo Router::webroot('profile/components/flexslider/jquery.flexslider-min.js'); ?>"></script>
    
    <!-- parallax -->
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/jquery.stellar.min.js'); ?>"></script>
    
    <!-- waypoint -->
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/waypoints.min.js'); ?>"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="<?php echo Router::webroot('profile/js/theme-scripts.js'); ?>"></script>
    
    <script src="<?php echo Router::webroot('assets/jquery-1.10.2.min.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('js/server.js'); ?>"></script>
    <script src="<?php echo Router::webroot('assets/script.js'); ?>" type="text/javascript"></script>
    
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#profile .edit-profile-btn").click(function(e) {
                e.preventDefault();
                tjq(".view-profile").fadeOut();
                tjq(".edit-profile").fadeIn();
            });
            $passold = $('#passold'),
             $passoldverif = $('#passoldverif'),
             $pass = $('#pass'),
             $erreur = $('#erreur'),
             $passconf = $('#passconf');
             $update = $('#update');
			 $passconf.keyup(function(){
                if($(this).val() != $pass.val()){ // si la confirmation est différente du mot de passe
                    $(this).css({ // on rend le champ rouge
                        borderColor : 'red',
                        color : 'red'
                    });
                    $update.css({ // on rend le champ rouge
                        visibility : 'hidden',
                        disabled :'true'
                    });
                    $erreur.css({ // on rend le champ rouge
                        visibility : 'visible',
                        color : 'red'
                    });
                }
                else{
                    $(this).css({ // si tout est bon, on le rend vert
                        borderColor : 'green',
                        color : 'green'
                    });
                    $('#update').css({ // on rend le champ rouge
                        visibility : 'visible'
                        
                    });
                    $erreur.css({ // on rend le champ rouge
                        visibility : 'hidden'
                        
                    });
                }
            });
            setTimeout(function() {
                tjq(".notification-area").append('<div class="info-box block"><span class="close"></span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab quis a dolorem, placeat eos doloribus esse repellendus quasi libero illum dolore. Esse minima voluptas magni impedit, iusto, obcaecati dignissimos.</p></div>');
            }, 10000);
        });
        tjq('a[href="#profile"]').on('shown.bs.tab', function (e) {
            tjq(".view-profile").show();
            tjq(".edit-profile").hide();
        });
    </script>

<!-- END: LAYOUT/BASE/BOTTOM -->
</body>
</html>