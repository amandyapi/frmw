<?php $title_for_layout = $page->NAME; ?>
   
<header class="c-layout-header c-layout-header-4 c-bordered c-layout-header-default-mobile">
        <div class="c-navbar">
	<div class="container">
		<!-- BEGIN: BRAND -->
		<div class="c-navbar-wrapper clearfix">
			<div class="c-brand c-pull-left">
                                <?php if(!empty($this->Session->read('lnk'))):?>
				<a href="<?php echo Router::url('pages/index'); ?>?lnk=<?php echo $this->Session->read('lnk'); ?>" class="c-logo">
                                <?php else:?>
                                <a href="<?php echo Router::url('pages/index'); ?>" class="c-logo">
                                <?php endif;?>
                                    
				<img src="<?php echo Router::webroot('webroot/assets/base/img/layout/logos/logo-3.png'); ?>" alt="Smart Life" class="c-desktop-logo">
				<img src="<?php echo Router::webroot('webroot/assets/base/img/layout/logos/logo-3.png'); ?>" alt="Smart Life" class="c-desktop-logo-inverse">
				<img src="<?php echo Router::webroot('webroot/assets/base/img/layout/logos/logo-1.png'); ?>" alt="Smart Life" class="c-mobile-logo">
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
                                 <?php if(!$this->Session->isLogged() Or isset($this->request->req->lnk)):?>
								 
                                <li>
                                    
                                    <a href="javascript:;" data-toggle="modal" data-target="#login-form" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> 
                                        <?php  echo 'connexion';?>
                                    </a>
                                </li>
                                <li>
                                    
                                        <?php if(!empty($this->request->req->lnk)):?>
                                    <a href="javascript:;" data-toggle="modal" data-target="#signup-form" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> 
                                    inscription
                                         </a>
                                        <?php else:?>
                                    <a href="#" onclick="alert('Veuillez vous inscrire en utilisant un lien de parrainage');" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> 
                                     inscription
                                      </a>
                                        <?php endif;?>
                                   
                                </li>
                                    <?php else:?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" href="#"  title="" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                        
                                        <?php echo $this->Session->read('Membre')->pseudo;
                                        ?>
                                        
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo Router::url('dashboard'); ?>" class="location-reload">Tableau de Bord</a></li>
                                        <li><a href="<?php echo Router::url('dashboard'); ?>#settings">Paramètres</a></li>
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
				<p>Renseignez vos pseudo et email pour regénérer votre mot de passe ensuite un email vous sera envoyé</p>
				<form action="<?php echo Router::url('membre/restorepassword'); ?>" method="post">
					<div class="form-group">
						<label for="forget-email" class="hide">Votre pseudo</label>
                                                <input type="text" name="pseudo" class="form-control input-lg c-square" id="forget-email" placeholder="Votre pseudo">
					</div>
					<div class="form-group">
						<label for="forget-email" class="hide">Votre email</label>
                                                <input type="text" name="emailmembre" class="form-control input-lg c-square" id="forget-email" placeholder="Votre email">
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
				<p class="errp">
					Remplissez le formulaire sans erreur svp
				</p>
				
				<p id="pseudoerr" style="color: red;font-size: 17px;">
					
				</p>
				
				<p id="mailerr" style="color: red;font-size: 17px;">
					
				</p>
				
				<form action="<?php echo Router::url('membre/create/'); ?>" method="post">
                                        <div class="row">
						<div class="col-md-5">
							<label for="signup-fullname" class="hide">Votre Pseudo</label>
                            <input type="text" name="pseudo" class="form-control input-lg c-square full-width" id="pseudo" placeholder="Votre pseudo">
						</div>
						<div class="col-md-7">
							<label for="signup-fullname" class="hide">Pseudo parrain</label>
                            <input type="text" name="parrain" class="form-control input-lg c-square full-width" id="ppseudo" placeholder="" value="<?php echo $parrain->pseudo; ?>" readonly>
                            <input type="hidden" name="link" class="form-control input-lg c-square full-width" id="link" placeholder="" value="<?php echo $this->request->req->lnk; ?>">
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-5">
							<label for="signup-fullname" class="hide">Votre nom</label>
							<input type="text" name="nommembre" class="form-control input-lg c-square full-width" id="nom" placeholder="Votre nom">
						</div>
						<div class="col-md-7">
							<label for="signup-fullname" class="hide">Votre prénoms</label>
							<input type="text" name="pnommbre" class="form-control input-lg c-square full-width" id="pnom" placeholder="Votre prénoms">
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-5">
							<label for="signup-fullname" class="hide">Sexe</label>
                                                        <select name="genremembre" class="form-control input-lg c-square full-width" id="sexe">
								<option value="0">Sexe</option>
								<option value="M">Masculin</option>
								<option value="F">Feminin</option>
							</select>
						</div>
						<div class="col-md-7">
							<label for="signup-fullname" class="hide">Email</label>
                                                        <input type="text" name="emailmembre" class="form-control input-lg c-square full-width" id="mail" placeholder="Votre Email">
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-5">
							<label for="signup-fullname" class="hide">Mot de passe</label>
                                                        <input type="password" name="passmbre" class="form-control input-lg c-square full-width" id="pass" placeholder="Mot de passe">
						</div>
						<div class="col-md-7">
							<label for="signup-fullname" class="hide">Confirmation</label>
							<input type="password" name="passmbreconfirm" class="form-control input-lg c-square full-width" id="conf" placeholder="Confirmation">
						</div>
					</div>
					<div class="form-group">
						<label for="signup-country" class="hide">Votre pays</label>
                                                <select class="form-control input-lg c-square" name="pays" id="country">
							<option value="0">Selectionnez votre pays</option>
                                                        <optgroup label="Afrique">
                                                            <option value="384">Côte d'ivoire</option>
                                                            <option value="768">Togo</option>
                                                            <option value="854">Burkina Faso</option>
                                                            <option value="466">Mali</option>
                                                            <option value="686">Sénégal</option>
                                                        </optgroup>
                                                         
                                                        <optgroup label="Plus de pays">
                                                            <?php foreach ($pays as $key => $value):?>
                                                            <option value="<?php echo $value->id; ?>">
                                                                <?php echo $value->langFR; ?>
                                                            </option>
                                                            <?php endforeach ;?>
                                                        </optgroup>
                                                        
						</select>
					</div>
					<div class="form-group">
						<button  id="enregistrer" type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">ENREGISTRER</button>
						<a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">J'ai un compte</a>
					</div>
					<div class="form-group">
						<em id="repsignup"></em>
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
                                    <div class="form-group">
									<label for="login-email" class="hide">Pseudo</label>
									<input name="pseudo" type="text" class="form-control input-lg c-square" id="login-email" placeholder="Votre pseudo">
									</div>
                                    <div class="form-group">
									<label for="login-password" class="hide">Mot de passe</label>
									<input name="passmbre" type="password" class="form-control input-lg c-square" id="login-password" placeholder="Votre mot de passe">
									<input name="parrain" type="hidden" class="form-control input-lg c-square" id="parrain" value="<?php echo $parrain->id; ?>">
									</div>
					<div class="form-group pull-md-left">
						<button type="submit" name="sl" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Se connecter</button>
					</div>
                                       
					<div class="clearfix">
						<span>Inscription </span>
                        <?php if(!empty($this->request->req->lnk)):?>
                        <button type="submit" name="mondenouveau" class="btn btn-md c-btn-uppercase c-btn-bold c-btn-square bg-danger text-info"><span class="">Monde Nouveau</span></button>
                        <?php else:?>
                        <button onclick="event.preventDefault();alert('Veuillez vous inscrire en utilisant un lien de parrainage');" name="#" class="btn btn-md c-btn-uppercase c-btn-bold c-btn-square bg-danger text-info"><span class="">Monde Nouveau</span></button>
                        <?php endif;?>
                     </div>             
                 </form>
			</div>
                    
			<div class="modal-footer c-no-border">
                                mot de passe oublié?<a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot"> cliquez-ici</a>   
                                <br>
				<span class="c-text-account">Pas encore de compte ?</span>
				<a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Inscrivez vous!</a>
			</div>
		</div>
	</div>
</div>



    <section class="c-layout-revo-slider c-layout-revo-slider-11 circle-fill">
    <!-- SLIDER --><div class="tp-banner-container c-arrow-dark" style="height: 620px">
			<div class="tp-banner">
				<ul>
					<!--BEGIN: SLIDE #1 -->
					<li class="c-bg-white" data-transition="fade" data-slotamount="2">
						<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/base/blank.png">
						<!--BEGIN: MAIN TITLE -->
						<div class="caption sft tp-resizeme customin customout start" data-x="center" data-y="90" data-speed="600" data-start="1000" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
							<h3 class="c-font-42 c-font-center c-font-dark c-font-sbold c-font-uppercase c-reset">
							Le Ebusiness ouvert à tous </h3>
						</div>
						<!--END -->
						<!--BEGIN: MAIN DEVICE -->
						<div class="tp-caption lfb customin customout tp-resizeme" data-x="center" data-y="bottom" data-speed="600" data-start="500" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 3;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/mac.png">
						</div>
						<!--END -->
						<!--BEGIN: BEAN 1 -->
						<div class="tp-caption lfl customout tp-resizeme" data-x="center" data-hoffset="-245" data-y="230" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/beam1.png">
						</div>
						<div class="tp-caption lfl customout tp-resizeme" data-x="center" data-hoffset="-380" data-y="228" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset c-font-right">
							Entrez dans le réseau </h3>
							<p class="c-font-15 c-font-blue-4 c-margin-t-8 c-font-right">
								 Inscrivez vous dans<br>
								 notre vaste réseau de<br>
								 consommateurs, producteurs<br> et acheteurs
							</p>
						</div>
						<!--END -->
						<!--BEGIN: BEAN 2 -->
						<div class="tp-caption lfl customout tp-resizeme" data-x="center" data-hoffset="-280" data-y="420" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="2100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/beam2.png">
						</div>
						<div class="tp-caption lft customout tp-resizeme" data-x="center" data-hoffset="-410" data-y="453" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="2100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset c-font-right">
							Acheter</h3>
							<p class="c-font-15 c-font-blue-4 c-margin-t-8 c-font-right">
								 Bénéficiez de coûts<br>
								 réduits sur les produits<br>
								 et les services offerts
							</p>
						</div>
						<!--END -->
						<!--BEGIN: BEAN 3 -->
						<div class="tp-caption lfr customout tp-resizeme" data-x="center" data-hoffset="260" data-y="240" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1800" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/beam3.png">
						</div>
						<div class="tp-caption lfr customout tp-resizeme" data-x="center" data-hoffset="400" data-y="236" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1800" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset c-font-left">
							 Vendez facilement </h3>
							<p class="c-font-15 c-font-blue-4 c-margin-t-8 c-font-left">
								 Ecoulez facilement<br>
								 vos produits grace à notre<br>
								 réseau de consommateurs<br>
							</p>
						</div>
						<!--END -->
						<!--BEGIN: BEAN 4 -->
						<div class="tp-caption lfr customout tp-resizeme" data-x="center" data-hoffset="280" data-y="410" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="2400" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/beam4.png">
						</div>
						<div class="tp-caption lfr customout tp-resizeme" data-x="center" data-hoffset="413" data-y="407" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="2400" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset c-font-left">
							 Gagnez plus </h3><p class="c-font-15 c-font-blue-4 c-margin-t-8 c-font-left">Gagnez des commissions<br>en consommant et en invitant les autres<br> à rejoindre la plateforme</p>
						</div>
						<!--END -->
					</li>
					<!--END -->
					<!--BEGIN: SLIDE #2 -->
					<li class="c-bg-white" data-transition="fade" data-slotamount="2">
						<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/base/blank.png">
						<!--BEGIN: MAIN TITLE -->
						<div class="caption sft customin customout tp-resizeme" data-x="center" data-hoffset="-255" data-y="90" data-speed="500" data-start="500" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
							<h3 class="c-font-42 c-font-center c-font-dark c-font-sbold c-font-uppercase c-reset">
							Comment fonctionne Smarts-LIFE </h3>
						</div>
						<!--END -->
						<!--BEGIN: MAIN DEVICE -->
						<div class="tp-caption lfb customout customin tp-resizeme" data-x="center" data-hoffset="350" data-y="bottom" data-speed="500" data-start="700" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 3;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/ipad.png">
						</div>
						<!--END -->
						<!--BEGIN: CONTENT 1 -->
						<div class="caption sft customin customout tp-resizeme" data-x="center" data-hoffset="-425" data-y="190" data-speed="400" data-start="800" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 3;">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset">Comment devenir membre?</h3><p class="c-margin-t-8 c-font-15">Vous avez juste besoin<br>de vous créer un compte,<br>Puis de vous abonner</p>
						</div>
						<!--END -->
						<!--BEGIN: CONTENT 2 -->
						<div class="caption sft customin customout tp-resizeme" data-x="center" data-hoffset="-175" data-y="190" data-speed="400" data-start="1200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset">Comment acheter?</h3><p class="c-margin-t-8 c-font-15">Connectez vous,<br>puis accéder à la liste<br>de nos produits et services</p>
						</div>
						<!--END -->
						<!--BEGIN: CONTENT 3 -->
						<div class="caption sft customin customout tp-resizeme" data-x="center" data-hoffset="-425" data-y="320" data-speed="400" data-start="1600" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset">Comment vendre? </h3><p class="c-margin-t-8 c-font-15">Signez un<br>partenariat de distribution <br>ou de vente avec GOTEAM</p>
						</div>
						<!--END -->
						<!--BEGIN: CONTENT 4 -->
						<div class="caption sft customin customout tp-resizeme" data-x="center" data-hoffset="-175" data-y="320" data-speed="400" data-start="2000" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
							<h3 class="c-font-uppercase c-font-15 c-font-sbold c-theme-font c-reset">Comment gagner</h3><p class="c-margin-t-8 c-font-15">Gagnez des commissions<br>en invitant des personnes<br> à  rejoindre le réseau<br> et en consommant </p>
						</div>
						<!--END -->
						<!--BEGIN: ACTION BUTTON 
						<div class="caption sfb tp-resizeme randomrotate" data-x="center" data-hoffset="-446" data-y="450" data-speed="400" data-start="2400" data-easing="easeOutBack">
							<a href="#" class="btn c-btn-dark btn-md c-btn-square c-btn-uppercase c-btn-border-2x c-btn-bold">Voir toutes les opportunités</a>
						</div>-->
						<!--END -->
					</li>
					<!--END -->
					<!--BEGIN: SLIDE #3 -->
					<li class="c-bg-white" data-transition="fade" data-slotamount="2">
						<img src="#" alt="" data-bgrepeat="no-repeat" data-bgfit="fit" data-bgposition="center 80px" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/map.png">
						<!--BEGIN: MAIN TITLE -->
						<div class="caption sft customin customout tp-resizeme" data-x="center" data-y="70" data-speed="600" data-start="500" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
							<h3 class="c-font-42 c-font-center c-font-dark c-font-sbold c-font-uppercase c-reset">
							Ou pouvez vous nous retrouver ? </h3>
						</div>
						<!--END -->
						<!--BEGIN: CUSTOMER 1 -->
						<div class="tp-caption customin customout skewfromtopshort tp-resizeme" data-x="center" data-hoffset="-55" data-y="200" data-speed="500" data-start="1000" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 2;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/mapmarker.png">
						</div>
						<div class="tp-caption customin customout tp-resizeme" data-x="center" data-hoffset="65" data-y="200" data-speed="500" data-start="2500" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 2;">
							<h3 class="c-font-dark c-font-23">Côte d'Ivoire</h3>
							<h6 class="c-font-uppercase c-font-sbold c-font-15 c-theme-font">
							Abidjan </h6>
							<p class="c-font-blue-4 c-font-15 c-margin-t-8">
								 La société est basée à Angré,<br> dans la commune de Cocody <br>
								 Vous pouvez visiter nos locaux
							</p>
						</div>
						<!--END -->
						<!--BEGIN: CUSTOMER 2 -->
						<div class="tp-caption customin customout skewfromtopshort tp-resizeme" data-x="center" data-hoffset="-375" data-y="310" data-speed="500" data-start="1500" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 2;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/mapmarker.png">
						</div>
						<div class="tp-caption customin customout tp-resizeme" data-x="center" data-hoffset="-255" data-y="310" data-speed="500" data-start="3000" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 2;">
							<h3 class="c-font-dark c-font-23">
							Le Togo  </h3>
							<h6 class="c-font-uppercase c-font-sbold c-font-15 c-theme-font">
							Lomé </h6>
							<p class="c-font-blue-4 c-font-15 c-margin-t-8">
								 Nous sommes aussi implantés<br> à Lomé pour l'extension<br> de nos activités
							</p>
						</div>
						<!--END -->
						<!--BEGIN: CUSTOMER 3 -->
						<div class="tp-caption customin customout skewfromtopshort tp-resizeme" data-x="center" data-hoffset="255" data-y="310" data-speed="500" data-start="2000" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 2;">
							<img src="#" alt="" data-lazyload="assets/base/img/layout/sliders/revo-slider/slider-11/mapmarker.png">
						</div>
						<div class="tp-caption customin customout tp-resizeme" data-x="center" data-hoffset="375" data-y="310" data-speed="500" data-start="3500" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" style="z-index: 2;">
							<h3 class="c-font-dark c-font-23">
							Burkina Faso </h3>
							<h6 class="c-font-uppercase c-font-sbold c-font-15 c-theme-font">
							Ouagadougou </h6>
							<p class="c-font-blue-4 c-font-15 c-margin-t-8">
								 Notre réseau s'étend aussi<br> au Burkina Faso avec<br> plus de 1000 membres
							</p>
						</div>
						<!--END -->
					</li>
					<!--END -->
				</ul>
			</div>
		</div>
	</section>
    
   <div class="c-layout-page"> 
        <!-- SLIDER -->

	<div class="c-content-box c-size-md c-bg-grey-1">
		<div class="container">
			<div class="row" data-auto-height="true">
				<div class="col-md-8">
					<div class="c-content-media-2-slider" data-slider="owl" data-single-item="true" data-auto-play="4000">
						<div class="c-content-label c-font-uppercase c-font-bold">
							Quelques services offerts
						</div>
						<div class="owl-carousel owl-theme c-theme owl-single">
							<div class="item">
								<div class="c-content-media-2 c-bg-img-center" style="background-image: url(assets/base/img/content/stock3/18.jpg); min-height: 360px;">
									<div class="c-panel">
										<div class="c-fav">
											<i class="icon-heart c-font-thin"></i>
											<p class="c-font-thin">
												FORMATION ET ASSISTANCE AU MARKETING RESEAU ET A RECYCLIX
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="c-content-media-2 c-bg-img-center" style="background-image: url(assets/base/img/content/stock3/22.jpg); min-height: 360px;">
									<div class="c-panel">
										<div class="c-fav">
											<i class="icon-heart c-font-thin"></i>
											<p class="c-font-thin">
												ECHANGE DE MONNAIE ELECTRONIQUE
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="c-content-media-2 c-bg-img-center" style="background-image: url(assets/base/img/content/stock3/22_1.jpg); min-height: 360px;">
									<div class="c-panel">
										<div class="c-fav">
											<i class="icon-heart c-font-thin"></i>
											<p class="par c-font-thin" style="color: #32c5d2 !important;">
												INVESTISSEMENT PARTICIPATIF
											</p>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-4 c-margin-b-30">
					<div class="c-content-v-center c-theme-bg" style="height: 360px">
						<div class="c-wrapper">
							<div class="c-body c-center">
								<h3 class="c-font-25 c-line-height-34 c-font-white c-font-uppercase c-font-bold">La page facebook du site ici</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: CONTENT/PRICING/PRICING-1 -->
	<!-- BEGIN: CONTENT/MISC/ABOUT-1 -->
	<div class="c-content-box c-size-md c-bg-white">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="c-content-client-logos-1">
						<!-- Begin: Title 1 component -->
						<div class="c-content-title-1">
							<h3 class="c-font-uppercase c-font-bold">Nos Partenaires</h3>
							<div class="c-line-left c-theme-bg">
							</div>
						</div>
						<!-- End-->
						<div class="c-logos">
							<div class="row">
                                                                <div class="col-md-4 col-xs-6 c-logo c-logo-1">
									<a href="https://recyclix.com" target="_blank"><img class="c-img-pos" src="assets/base/img/content/client-logos/recyclix.gif" alt=""/></a>
								</div>
								<div class="col-md-4 col-xs-6 c-logo c-logo-1">
									<a href="#"><img class="c-img-pos" src="assets/base/img/content/client-logos/client1.jpg" alt=""/></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: CONTENT/MISC/ABOUT-1 -->
	<!-- END: PAGE CONTENT -->

    </div>

