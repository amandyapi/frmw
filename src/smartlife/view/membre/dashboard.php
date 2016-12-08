
        <section id="content" class="gray-area">
            <div class="container">
                <div id="main">
                    <div class="tab-container full-width-style arrow-left dashboard">
                        <ul class="tabs">
                            <li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Tableau de bord</a></li>
                            <li class=""><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Profil</a></li>
                            <!--<li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Vos commandes</a></li>-->
                            <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i>Paramètres</a></li>
                        </ul>
                        
                        <div class="tab-content">
                            <div id="dashboard" class="tab-pane fade in active">
							<?php 
                                    if($membre->etat!='abonner'){
							?>
							    <div  class="" style="float: right">
                                      <a href="javascript:payabonnement();" title="">
                                        <img src="<?php echo Router::webroot('profile/images/abonvou2.gif'); ?>"  height="80" width="200"/>
                                      </a> <span id="repsolde"></span>
                                   </div>
								   <?php  } ?>
                                <h1 class="no-margin skin-color">Salut 
                                    <?php 
                                    if($this->Session->isLogged()){
										echo $membre->pseudo;
										//$_SESSION['id'] = $this->Session->read('Membre')->id;
										$_SESSION['ong'] = $this->Session->read('Membre')->ong;
                                    }
                                    ?> </h1>
                                <p>Ceci est votre tableau de bord, vous pouvez modifier votre profile et accéder à nos services à partir de là!</p>
                                <br />
                                <div class="row block">
                                    <div class="col-sm-6 col-md-3">
                                        <a href="<?php echo Router::url('histocash'); ?>">
                                            <div class="fact blue">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counte" data-value="<?php echo $membre->cash->solde; ?>"><?php echo $membre->cash->solde; ?></dt> Frs CFA
                                                        <dd>CASH</dd>
                                                    </dl>
                                                    <i class="fa fa-money" style="font-size: 37pt"></i>
                                                </div>
                                                <div class="description">
                                                    <i class="icon soap-icon-longarrow-right"></i>
                                                    <span>Historique</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <a href="#">
                                            <div class="fact yellow">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counter" data-value="<?php echo $membre->compteprincipal->solde; ?>">0</dt> Frs CFA
                                                        <dd>Compte Principal</dd>
                                                    </dl>
                                                    <i class="fa fa-money" style="font-size: 37pt"></i>
                                                </div>
                                                <div class="description">
                                                    <i class="icon soap-icon-longarrow-right"></i>
                                                    <span>Historique</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
									
									<div class="col-sm-6 col-md-3">
                                        <a href="<?php echo Router::url('histocf'); ?>">
                                            <div class="fact green">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counter" data-value="<?php echo $membre->crowfounding->solde; ?>">0</dt> Frs CFA
                                                        <dd>Crow funding</dd>
                                                    </dl>
                                                    <i class="fa fa-money" style="font-size: 37pt"></i>
                                                </div>
                                                <div class="description">
                                                    <i class="icon soap-icon-longarrow-right"></i>
                                                    <span>Historique</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
									
									
                                       
                                </div>
                                <h2>Nos services</h2>
                                <div class="row block">
                                   <div class="row">
                                    <div class="col-sm-3 col-md-3">
                                        <?php if($membre->etat == 'abonner'):?>
					<a href="<?php echo Router::url('membre/indexBitcoin'); ?>" target="_blank">
					<?php else:?>
					<a href="#" onclick="event.preventDefault;alert('Vous devez vous abonner avant de pouvoir utiliser ce service.');">
					<?php endif;?>
                                            <div class="fact jauneor">
                                                <div class="numbers counters-box text-center">
                                                    
                                                    <span class="glyphicon glyphicon-bitcoin" style="font-size: 37pt;"></span>
                                                    
                                                </div>
                                                <div class="text-center description">
                                                    
                                                    <span class="center">Echange de Bitcoin</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="col-sm-3 col-md-3">
                                        <a href="#">
                                            <div class="fact electblue1">
                                                <div class="numbers counters-box text-center">
                                                    
                                                    
                                                    <span class="glyphicon glyphicon-shopping-cart" style="font-size: 37pt;"></span>
                                                  
                                                </div>
                                                 <div class="description text-center">
                                                    <span>E-market</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="col-sm-3 col-md-3">
                                       <a href="#">
                                            <div class="fact marineblue">
                                                <div class="numbers counters-box text-center">
                                                    
                                                    <dl>
                                                        <dd style="font-size: 30px;"></dd>
                                                    </dl>
                                                    <i class="fa fa-money" style="font-size: 37pt"></i>
                                                </div>
                                                <div class="description text-center">
                                                    <span>Crow Funding</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    </div>
                                   <div class="row">
                                   <div class="col-sm-3 col-md-3">
                                        <a href="#">
                                            <div class="fact orangeburned">
                                                <div class="numbers counters-box text-center">
                                                    
                                                    <i class="fa fa-plane" style="font-size: 37pt;"></i>
                                                    <i class="fa fa-car" style="font-size: 37pt;"></i>
                                                </div>
                                                <div class="description text-center">
                                                    <span>Transports</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                      
                                       
                                       <div class="col-sm-3 col-md-3">
                                        <a href="#">
                                            <div class="fact electblue">
                                                <div class="numbers counters-box text-center">
                                                    
                                                    <dl>
                                                        <dd style="font-size: 30px;"></dd>
                                                    </dl>
                                                    <i class="fa fa-hotel" style="font-size: 37pt"></i>
                                                </div>
                                                <div class="description text-center">
                                                    <span>Hotelerie</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    </div>				
                                </div>
                                
                            </div>
                            <div id="profile" class="tab-pane fade">
                                 <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                            <a title="" href="#">
                                               <img alt="" src="<?php echo Router::webroot("webroot/uploads/profile/$membre->photombre"); ?>" width="63" height="59">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <a href="#update_profil" class="button btn-mini pull-right edit-profile-btn">MODIFIER PROFIL</a>
                                            <h2 class="box-title fullname">
                                                <?php  echo $membre->pseudo;?>
                                            </h2>
                                            <dl class="term-description ">
                                                <dt>Pseudo:</dt><dd><?php echo $membre->pseudo; ?></dd>
                                                <dt>Nom:</dt><dd><?php echo $membre->nommembre; ?></dd>
                                                <dt>Prénoms:</dt><dd><?php echo $membre->pnommbre; ?></dd>
                                                <dt>Contact:</dt><dd><?php echo $membre->phonemembre; ?></dd>
                                                
                                                <dt>Date de naissance:</dt><dd><?php 
                                                $date = new DateTime($membre->dnaiss);
                                                echo $date->format('d-m-Y');?></dd>
                                                <dt>Email :</dt><dd class="text-lowercase dd"><?php echo $membre->emailmembre; ?></dd>
                                                <dt>Ville:</dt><dd><?php echo $membre->ville; ?></dd>
                                                <dt>Pays:</dt><dd><?php echo $membre->pays; ?></dd>
                                                
                                            </dl>
                                        </div>
                                    </article>
                                    <hr>
                                    
                                   
                                    <div class="row">
                                        <div class="col-md-4 previous-bookings image-box style14">
                                            <h4>Informations parrain</h4>
                                            <article class="box">
                                                <figure class="no-padding" style="border-radius: 10px;">
                                                    <a title="" href="">
                                                       <img alt="" src="<?php echo Router::webroot("webroot/uploads/profile/$membre->photoparrain"); ?>" width="63" height="59">
                                                    </a>
                                                </figure>
                                                <div class="details">
                                                    <h5 class="box-title"><a href="#"><?php echo $membre->parrain; ?></a></small></h5>
                                                </div>
                                            </article>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 previous-bookings image-box style14">
                                            <h4>Informations Fieuls</h4>
                                            <?php if(!empty($membre->fieuls)):?>
                                            
                                                <?php foreach($membre->fieuls as $k => $v):?>
                                                <article class="pull-md-left col-md-4" >
                                                    <figure class="no-padding">
                                                        <a title="" href="#">
                                                            <img alt="" src="<?php echo Router::webroot("webroot/uploads/profile/$v->photombre"); ?>" width="63" height="59">
                                                        </a>
                                                    </figure>
                                                    <div class="details">
                                                        <h5 class="box-title"><a href="#"><?php echo $v->pnommbre; ?> <?php echo $v->nommembre; ?></a></small></h5>
                                                    </div>
                                                </article>
                                                
                                                <?php endforeach;?>
                                            <?php else:?>
                                            
                                            <article class="box">
                                                <figure class="no-padding">
                                                    <a title="" href="#">
                                                        <img alt="" src="<?php echo Router::webroot('webroot/uploads/profile/default.png'); ?>" width="63" height="59">
                                                    </a>
                                                </figure>
                                                <div class="details">
                                                    <h5 class="box-title">Vous n'avez pas encore de fieuls, <br>veuillez envoyer votre lien de parrainage à des potentiels membres</h5>
                                                </div>
                                            </article>
                                            
                                            <?php endif;?>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="edit-profile" id="update_profil">
                                    <form class="edit-profile-form" action="<?php echo Router::url('edit_profil/'.$membre->id); ?>" method="post" enctype="multipart/form-data">
                                        <h2>Informations Personnelles</h2>
                                        <div class="col-sm-9 no-padding no-float">
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Nom</label>
                                                    <input type="text" name="nommembre" class="input-text full-width" placeholder="" value="<?php echo $membre->nommembre; ?>">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Prénoms</label>
                                                    <input type="text" name="pnommbre" class="input-text full-width" placeholder="" value="<?php echo $membre->pnommbre; ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Adresse Email</label>
                                                    <input type="text" name="emailmembre" class="input-text full-width" placeholder="" value="<?php echo $membre->emailmembre; ?>">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Pseudo</label>
                                                    <input type="text" name="pseudo" class="input-text full-width" placeholder="" value="<?php echo $membre->pseudo; ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Numéro de téléphone</label>
                                                    <input type="text" name="phonemembre" class="input-text full-width" placeholder="" value="<?php echo $membre->phonemembre; ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                               <div class="col-sms-6 col-sm-6">
                                                    <label class="col-xs-12">Date de naissance</label>
                                                    <input type="date" name="dnaiss" class="input-text full-width" placeholder="" value="<?php echo $membre->dnaiss; ?>">
                                                </div>
                                                
                                                <div class="col-sms-6 col-sm-6">
                                                    <label class="col-xs-12">Genre</label>
                                                    <input type="text" name="genremembre" class="input-text full-width" placeholder="" value="<?php echo $membre->genremembre; ?>">
                                                </div>
                                            </div>
                                            
                                           
                                            <hr>
                                            
                                            
                                            <h2>Détails </h2>
                                            <div class="row form-group">
                                                
                                                <div class="col-sms-6 col-sm-6">
                                                    <label for="signup-country" >Pays</label>
                                                <select class="form-control" name="pays" class="show">
                                                        <optgroup label="Votre pays" >
                                                             <?php foreach($pays as $key => $value):?>
                                                                <?php if ($value->langFR == $membre->pays):?>
                                                            <option value="<?php echo $value->id; ?>" selected>
                                                                    <?php echo $value->langFR; ?>
                                                                </option>
                                                                <?php endif ;?>
                                                            <?php endforeach ;?>
                                                        </optgroup>
                                                         
                                                        <optgroup label="Plus de pays">
                                                            <?php foreach($pays as $key => $value):?>
                                                            <option value="<?php echo $value->id; ?>">
                                                                <?php echo $value->langFR; ?>
                                                            </option>
                                                            <?php endforeach ;?>
                                                        </optgroup>
						</select>
                                                </div>
                                                
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Ville</label>
                                                    <input type="text" name="ville" class="input-text full-width" placeholder="" value="<?php echo $membre->ville; ?>">
                                                </div>
                                                    <div class="col-sms-4 col-sm-4">
                                                        <input type="hidden" name="id" class="input-text full-width" placeholder="" value="<?php echo $membre->id; ?>">
                                                    </div>
                                                    <div class="col-sms-4 col-sm-4">
                                                        <input type="hidden" name="passmbre" class="input-text full-width" placeholder="" value="<?php echo $membre->passmbre; ?>">
                                                    </div>
                                                    <div class="col-sms-4 col-sm-4">
                                                        <input type="hidden" name="grade" class="input-text full-width" placeholder="" value="<?php echo $membre->grade; ?>">
                                                    </div>
                                                    <div class="col-sms-4 col-sm-4">
                                                        <input type="hidden" name="zipcode" class="input-text full-width" placeholder="" value="<?php echo $membre->zipcode; ?>">
                                                    </div>
                                                    <div class="col-sms-4 col-sm-4">
                                                        <input type="hidden" name="etat" class="input-text full-width" placeholder="" value="<?php echo $membre->etat; ?>">
                                                    </div>
                                                    <div class="col-sms-4 col-sm-4">
                                                        <input type="hidden" name="ong" class="input-text full-width" placeholder="" value="<?php echo $membre->ong; ?>">
                                                    </div>
                                                
                                            </div>
                                            
                                            <hr>
                                            
                                            <h2>Photo de profil</h2>
                                            <div class="row form-group">
                                                <div class="col-sms-12 col-sm-6 no-float">
                                                    <div class="fileinput full-width">
                                                        <input type="file" name='photombre' class="input-text" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Plus ...</h2>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Lien</label>
                                                    <input type="text" name="lien" readonly class="input-text full-width" placeholder="" value="<?php echo $membre->lien; ?>">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Date d'adhésion</label>
                                                    <input type="text" name="dateadhesion" readonly class="input-text full-width" placeholder="" value="<?php echo $membre->dateadhesion; ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Parrain</label>
                                                    <input type="text" name="parrain" readonly class="input-text full-width" placeholder="" value="<?php echo $membre->parrain; ?>">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Contrat</label>
                                                    <input type="text" name="contrat" readonly class="input-text full-width" placeholder="" value="<?php echo $membre->contrat; ?>">
                                                </div>
                                            </div>
                                            <h2>Décrivez vous...</h2>
                                            <div class="form-group">
                                                <textarea rows="5" name="descriptionperso" class="input-text full-width" placeholder=""></textarea>
                                            </div>
                                            <div class="from-group">
                                                <button type="submit" class="btn-medium col-sms-6 col-sm-4">MISE A JOUR</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            <div id="settings" class="tab-pane fade">
                                <h2>Paramètres</h2>
                                <div class="col-lg-6"> 
                                <h5 class="skin-color">Changer votre mot de passe</h5>
                                <form action="<?php echo Router::url('membre/changerpassword'); ?>" method="post">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-8">
                                            <label>Ancien mot de passe</label>
                                            <input type="password" id="passold" name="passold" class="input-text full-width">
                                            <input type="hidden" id="passoldverif" name="passoldverif" value="<?php echo $this->Session->read('Membre')->passmbre; ?>" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-8">
                                            <label>Nouveau mot de passe</label>
                                            <input type="password" id="pass" name="pass" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-8">
                                            <label>Confirmation</label>
                                            <input type="password" id="passconf" name="passconf" class="input-text full-width">
                                            <label id="erreur" style="visibility: hidden">Les deux mots de passes sont différents</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="update" class="btn-medium">MISE A JOUR</button>
                                    </div>
                                </form>
                                
                               </div> 
                                
                                <div class="col-lg-6"> 
                                <h5 class="skin-color">Envoyer votre lien d'affiliation à un ami</h5>
                                <form method="post" action="<?php echo Router::url('membre/envoyerlien'); ?>">
                                    <div class="row form-group">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
                                            <label>Adresse e-mail de votre ami</label>
                                            <input name="friend_mail" type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
                                            <label>Lien d'affiliation</label>
											<input type="text" name="lien_" class="input-text full-width" value="http://localhost:8080/frmw/?lnk=<?php echo $membre->lien; ?>">
                                            <input type="hidden" name="lien_parrainage" class="input-text full-width" value="http://localhost:8080/frmw/?lnk=<?php echo $membre->lien; ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
                                            <label>Votre message</label>
                                            <textarea cols="55" rows="10" name="user_message" style="padding-left:2px !important;text-align: left; ">
											
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium">ENVOYER</button>
                                    </div>
                                </form>
                               </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
   