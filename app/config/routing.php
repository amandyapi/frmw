<?php

/* 
 * Routes
 */

//Router::prefix('cockpit','admin');

//PagesController
Router::connect('','pages/index');
Router::connect('index.html','pages/index');
Router::connect('slug:([a-z0-9\-]+)','pages/view/slug:([a-z0-9\-]+)');
Router::connect('ajax','pages/ajax');
//Router::connect('contact','pages/contact');
//Router::connect('opportunite.html','pages/opportunite');
//Router::connect('projets.html','pages/projets');//Liste de tous les projets
//Router::connect('contact.html','pages/contact');
//Router::connect('services.html','pages/services');
Router::connect('conditionsutilisation.html','pages/conditionsutilisation');
Router::connect('cgusmartlife.pdf','pages/cgusmartlife');

//MembreController
Router::connect('abonnement','membre/abonnement');
Router::connect('membre_logout','membre/logout');
Router::connect('dashboard','membre/dashboard');
Router::connect('histocash','membre/histocash');
Router::connect('histocp','membre/histocp');
Router::connect('histocf','membre/histocf');
Router::connect('profil/:pseudo','membre/index/pseudo:([a-z0-9\-]+)');
Router::connect('compte/:pseudo','membre/compte/pseudo:([a-z0-9\-]+)');
Router::connect('edit_profil/:id','membre/edit/id:([a-z0-9\-]+)');
Router::connect('envoi_lien','membre/envoyerlien');
Router::connect('changerpassword.html','membre/changerpassword');
Router::connect('restorepassword.html','membre/restorepassword');
Router::connect('verifierpseudounique/:name/:value','membre/verifierpseudounique/name:([a-zA-Z0-9]+)/value:([a-zA-Z0-9]+)');
//Router::connect('verifieremailunique/:name/:value','membre/verifieremailunique/name:([a-zA-Z0-9]+)/value:([^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$])');
Router::connect('verifieremailunique/:name/:value','membre/verifieremailunique/name:([a-zA-Z0-9]+)/value:(.*)');
Router::connect('formdmdretait.html','membre/formdmdretait');
Router::connect('dmdeffectue.html','membre/dmdeffectue');
Router::connect('indexBitcoin.html','membre/indexBitcoin');

//AdminController
Router::connect('admin-login.html','admin/login');
Router::connect('admin_logout','admin/logout');
Router::connect('dashboard-admin','admin/dashboard');
Router::connect('membres_index','admin/membresIndex');
Router::connect('membres_show/:id','admin/membresShow/id:([a-z0-9\-]+)');
Router::connect('abonnement_manuel/:id','admin/abonnementManuel/id:([a-z0-9\-]+)');
Router::connect('membres_delete/:id','admin/membresDelete/id:([a-z0-9\-]+)');
Router::connect('demandeRetraitIndex','admin/demandeRetraitIndex');
Router::connect('demandeValider/:id','admin/demandeValider/id:([a-z0-9\-]+)');
Router::connect('abonnementManuel/:id','admin/abonnementManuel/id:([a-z0-9\-]+)');

//ServiceController
Router::connect('services/:idcategorie','service/services/idcategorie:([0-9\-]+)');
Router::connect('fiche_services/:idservice','service/ficheservices/idservice:([0-9\-]+)');
Router::connect('commander/:idservice','service/commander/idservice:([0-9\-]+)');


