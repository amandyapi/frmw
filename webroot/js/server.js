function include(fileName){
document.write("<script type='text/javascript' src='"+fileName+"'></script>" );
}

include('js/client.js');

$(document).ready(function() {
listpays()
});

function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function signup()
{
	var xhr = getXMLHttpRequest(); var nom= $('#nom').val(); var pnom= $('#pnom').val(); var mail= $('#mail').val(); var pseudo= $('#pseudo').val(); var parrain= $('#ppseudo').val(); 
	var sexe= $('#sexe').val(); var pays= $('#country').val(); var pass= $('#pass').val(); var conf= $('#conf').val();	var action="signup"; form= new FormData();
	form.append("action", action); form.append("nom", nom); form.append("pnom", pnom); form.append("mail", mail); form.append("pseudo", pseudo); form.append("parrain", parrain); 
	form.append("sexe", sexe); form.append("pays", pays); form.append("pass", pass); 
	if(verif_input('#pseudo') && verif_input('#ppseudo')&& verif_input('#nom') && verif_input('#pnom') && verif_input('#sexe') && verif_input('#mail') && verif_input('#country')&& verif_input('#pass')&& verif_input('#conf')&& verif_pass(pass, conf, '#repsignup'))
	{
		xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
		{
			if(xhr.responseText=='ok'){document.location.href='?page=compte';} document.getElementById('repsignup').innerHTML =xhr.responseText;
		} };
		document.getElementById('repsignup').innerHTML ='Patientez svp...';
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
	}
}

function formeditprofile()
{
	 // filters option
	$('.view-profile').fadeOut();
	$('#edit-profile').fadeIn();
}

function payabonnement()
{
	var xhr = getXMLHttpRequest(); var action="payabonnement"; form= new FormData(); form.append("action", action);
	
	xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
	{
		if(xhr.responseText=='ok'){document.location.href='./cinet/'; document.getElementById('repsolde').innerHTML ='Redirection en cours...';}
		else {document.getElementById('repsolde').innerHTML =xhr.responseText;}
	} };
	document.getElementById('repsolde').innerHTML ='Patientez svp...';
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function updateprofile()
{
	var xhr = getXMLHttpRequest(); var nom= $('#nommodif').val(); var pnom= $('#pnommodif').val(); var mail= $('#emailmodif').val(); var mobile= $('#mobilemodif').val(); var fix= $('#fixmodif').val(); 
	var fax= $('#faxmodif').val(); var cc= $('#ccmodif').val(); var rc= $('#rcmodif').val(); 	var action="updateprofile"; form= new FormData();
	form.append("action", action); form.append("nom", nom); form.append("pnom", pnom); form.append("mail", mail); form.append("mobile", mobile); 
	form.append("fix", fix); form.append("fax", fax); form.append("cc", cc); form.append("rc", rc);
	if(verif_input('#nommodif') && verif_input('#pnommodif') && verif_input('#emailmodif') && verif_input('#mobilemodif') && verif_input('#ccmodif') && verif_input('#rcmodif'))
	{
		xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
		{
			document.getElementById('rep_updateprofile').innerHTML =xhr.responseText;
		} };
		document.getElementById('rep_updateprofile').innerHTML ='<img src="./images/reload.gif" width=30/>';
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
	}
}

function changepassuserclt()
{
	var xhr = getXMLHttpRequest(); var old= $('#oldpass').val(); var pass= $('#newpass').val(); var confirm= $('#confirm').val();
	var action="changepassuserclt"; form= new FormData(); form.append("action", action); form.append("old", old); form.append("pass", pass);
	if(verif_input('#oldpass') && verif_input('#newpass') && verif_input('#confirm')&&verif_pass(pass, confirm, '#repchangepass'))
	{xhr.onreadystatechange = function(){ if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
			{ document.getElementById('repchangepass').innerHTML =xhr.responseText; if (xhr.responseText=='ok') {infoparametre();}}
		};
		document.getElementById('repchangepass').innerHTML ='<img src="./assets/images/reload.gif" width=30/>'; 
		xhr.open("POST", "./php/rooter.php"); 
		xhr.send(form);
	}
}

function profile()
{
	var xhr = getXMLHttpRequest(); var action="viewprofile"; form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				tjq('#viewprofile').html(xhr.responseText);
			}
	};
	tjq('#viewprofile').html('<img src="assets/base/img/load.gif"/>');
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function nextsteppay()
{
	var xhr = getXMLHttpRequest(); var plan=$('#planpay').val(); var mode=$('#modepay').val(); var action="nextsteppay"; 
	form= new FormData(); form.append("action", action); form.append("plan", plan); form.append("mode", mode);
	xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
	{
		if(xhr.responseText=="succes") document.location.href='?page=resultpay'; else document.getElementById('loadpay').innerHTML =xhr.responseText;
	} };
	document.getElementById('loadpay').innerHTML ='<img src="./images/reload.gif" style="width:20px"/>';
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function returnprofile()
{
	 // filters option
	$('#edit-profile').fadeOut();	$('.view-profile').fadeIn();	pageprofile();
}

function inscription_client()
{
	var xhr = getXMLHttpRequest(); var type= get('type_client'); var nom= get('nom_client'); var email= get('email_inscrit_client'); var pass= get('pass_inscrit_client'); var confirm= get('confirm_inscrit_client');
	var action="inscription_client"; form= new FormData();
	form.append("action", action); form.append("type", type); form.append("nom", nom); form.append("email", email); form.append("pass", pass); form.append("confirm", confirm);
	if(verif_input('#type_client')&&verif_input('#nom_client')&&verif_input('#email_inscrit_client')&&verif_input('#pass_inscrit_client')&&verif_input('#confirm_inscrit_client')&&verif_pass(pass, confirm, '#rep_inscrit_client'))
	{
		xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
		{
			document.getElementById('rep_inscrit_client').innerHTML =xhr.responseText;
			if(xhr.responseText=="succes")
			document.location.href="?page=sendmail";
		} };
		document.getElementById('rep_inscrit_client').innerHTML ='<img src="./images/reload.gif" width=30/>';
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
	}
}

function ajouteraupanier()
{
	var xhr = getXMLHttpRequest();
	var deb= get('debutajout'); var duree= get('duree'); var debut= deb.replace(/[/]/gi, '-');
	var action= 'ajouteraupanier';
	form= new FormData();
	form.append("action", action); form.append("debut", debut); form.append("duree", duree);
	if(verif_input('#debutajout') && verif_input('#duree'))
	{
		xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				if(xhr.responseText=='ok'){document.location.href='?page=compte_client#boxpanier'; } 
				else if(xhr.responseText=='connectez vous svp') { boxconnexion(); document.getElementById('rep_ajout_pannier').innerHTML =xhr.responseText;}
				else if(xhr.responseText=='Activez votre compte') { boxcompte(); document.getElementById('rep_ajout_pannier').innerHTML =xhr.responseText;}
				else if(xhr.responseText=='Contactez nous svp') { boxusercompte(); document.getElementById('rep_ajout_pannier').innerHTML =xhr.responseText;}
				else{ document.getElementById('rep_ajout_pannier').innerHTML =xhr.responseText;}
				}
		};
		document.getElementById('rep_ajout_pannier').innerHTML ='Patientez...';
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
	}
}

function modifpannier()
{
	var xhr = getXMLHttpRequest();
	var deb= get('debutajout'); var duree= get('duree'); var debut= deb.replace(/[/]/gi, '-');
	var action= 'modifpannier';
	form= new FormData(); form.append("action", action); form.append("debut", debut); form.append("duree", duree);
	if(verif_input('#debutajout') && verif_input('#duree'))
	{
		xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				if(xhr.responseText=='ok'){document.location.href='?page=compte_client#boxpanier'; } 
				else if(xhr.responseText=='connectez vous svp') {boxconnexion(); document.getElementById('rep_ajout_pannier').innerHTML =xhr.responseText;}
				else{ document.getElementById('rep_ajout_pannier').innerHTML =xhr.responseText;}
				}
		};
		document.getElementById('rep_ajout_pannier').innerHTML ='Patientez...';
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
	}
}

function suppanier(pan)
{
	var xhr = getXMLHttpRequest(); var action= 'suppanier';	form= new FormData(); form.append("action", action); form.append("pan", pan); 
	if(confirm('Voulez enlever ce panneau de votre panier?'))
	{
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok'){ voirpannier(); qtepannier(); } }
		};
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
	}
}

function countresult()
{
	var xhr = getXMLHttpRequest(); var action= 'countresult'; var form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
		$('#countresult, #countresult2').html(xhr.responseText);
		}
	};
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function signin()
{
	var xhr = getXMLHttpRequest(); var pseudo= $('#pseudocon').val();var pass= $('#passconn').val(); var action="signin";
	form= new FormData(); form.append("action", action); form.append("pseudo", pseudo); form.append("pass", pass);
	if(verif_input('#pseudocon') && verif_input('#passconn'))
	{
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				if(xhr.responseText=='ok') { document.location.href="?page=compte"; } else document.getElementById('repcon').innerHTML =xhr.responseText;
			}
		};
		document.getElementById('repcon').innerHTML ='Pateintez...';
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
	}
}

function filtre(id)
{
	filter(id);
}

function listpays()
{
	var xhr = getXMLHttpRequest(); var action="listpays"; form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { $('#country').html(xhr.responseText); } };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function modifsearch()
{
	var ville=$('#ville').val(); alert(ville);
}

function tableaubord()
{
	var xhr = getXMLHttpRequest(); var action="tableaubord"; form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('tableaudebord').innerHTML =xhr.responseText;} };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function pageprofile()
{
	var xhr = getXMLHttpRequest(); var action="pageprofile"; form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('pageprofile').innerHTML =xhr.responseText;} };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function showville()
{
	var xhr = getXMLHttpRequest(); var action="showville"; form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('showville').innerHTML =xhr.responseText; } };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function selectcommune(div)
{
	var xhr = getXMLHttpRequest(); var action="selectcommune";  var ville=get(div); form= new FormData(); form.append("action", action); form.append("ville", ville); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('commune').innerHTML =xhr.responseText;} };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function selectsearchcom(id)
{
	var xhr = getXMLHttpRequest(); var action="selectsearchcom";  form= new FormData(); form.append("action", action); form.append("ville", id); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { $('#searchcom').html(xhr.responseText);} };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function listtypepan()
{
	var xhr = getXMLHttpRequest(); var action="listtypepan"; form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('typepan').innerHTML =xhr.responseText; } };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function listregie()
{
	var xhr = getXMLHttpRequest(); var action="listregie"; form= new FormData(); form.append("action", action); 
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('regie').innerHTML =xhr.responseText; } };
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function searchpanville()
{
	var xhr = getXMLHttpRequest(); var ville= get('ville'); var action="searchpanville"; 
	form= new FormData(); form.append("action", action); form.append("ville", ville);
	if(verif_input('#ville'))
	{
		xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=search'; } }; xhr.open("POST", "./php/rooter.php"); xhr.send(form);
	}
}

function searchpandispo()
{
	var xhr = getXMLHttpRequest(); var deb= get('debut'); var debut=deb.replace(/[/]/gi,"-"); var duree= get('duree'); var action="searchpandispo"; 
	form= new FormData(); form.append("action", action); form.append("debut", debut); form.append("duree", duree);
	if(verif_input('#debut')&&verif_input('#duree'))
	{
		xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=search'; } }; xhr.open("POST", "./php/rooter.php"); xhr.send(form);
	}
}

function searchpanregie()
{
	var xhr = getXMLHttpRequest(); var ville= get('regie'); var action="searchpanregie"; 
	form= new FormData(); form.append("action", action); form.append("ville", ville);
	if(verif_input('#regie'))
	{
		xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=search'; } }; xhr.open("POST", "./php/rooter.php"); xhr.send(form);
	}
}

function searchpantype(id)
{
	var xhr = getXMLHttpRequest(); var action="searchpantype"; 
	form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=search'; } }; xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function searchpanzone(id)
{
	var xhr = getXMLHttpRequest(); var action="searchpanzone"; 
	form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=search'; } }; xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function searchpanselectvil(id)
{
	var xhr = getXMLHttpRequest(); var action="searchpanselectvil"; 
	form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=search'; } }; xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function viewpan(id,formul)
{
	var xhr = getXMLHttpRequest(); var action="viewpan"; 
	form= new FormData(); form.append("action", action); form.append("id", id); form.append("formul", formul);
		xhr.onreadystatechange = function() { 
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=viewpan'; } };
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
}

function pagemodifpan(id,num)
{
	var xhr = getXMLHttpRequest(); var action="pagemodifpan"; 
	form= new FormData(); form.append("action", action); form.append("id", id); form.append("num", num);
		xhr.onreadystatechange = function() { 
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { if(xhr.responseText=='ok') window.location.href='?page=modifpanneau'; } };
		xhr.open("POST", "./php/rooter.php");
		xhr.send(form);
}

function criteresearch()
{
	var xhr = getXMLHttpRequest(); var action="criteresearch"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { 
	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
	{ 
		$('#criteresearch').html(xhr.responseText);} 
	};
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function criteresearch2()
{
	var xhr = getXMLHttpRequest(); var action="criteresearch2"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { 
	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
	{ 
		$('#criteresearch2').html(xhr.responseText);} 
	};
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function showpan()
{
	var xhr = getXMLHttpRequest(); var action="showpan"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {choixselect(); document.getElementById('showpan').innerHTML =xhr.responseText; countresult(); } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function choixselect()
{
	var xhr = getXMLHttpRequest(); var action="choixselect"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('choixselect').innerHTML =xhr.responseText; } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function removechoixregie(id)
{
	var xhr = getXMLHttpRequest(); var action="removechoixregie"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { choixselect(); showpan() } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function removechoixville(id)
{
	var xhr = getXMLHttpRequest(); var action="removechoixville"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { choixselect(); showpan() } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function removechoixcom(id)
{
	var xhr = getXMLHttpRequest(); var action="removechoixcom"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { choixselect(); showpan() } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function removechoixtype(id)
{
	var xhr = getXMLHttpRequest(); var action="removechoixtype"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { choixselect(); showpan() } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function removechoixprice(id)
{
	var xhr = getXMLHttpRequest(); var action="removechoixprice"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { choixselect(); showpan() } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function removechoixsize(id)
{
	var xhr = getXMLHttpRequest(); var action="removechoixsize"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { choixselect(); showpan() } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function voirpannier()
{
	var xhr = getXMLHttpRequest(); var action="voirpannier"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('voirpannier').innerHTML =xhr.responseText; } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function voircommande()
{
	var xhr = getXMLHttpRequest(); var action="voircommande"; form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { document.getElementById('voircommande').innerHTML =xhr.responseText; } };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function selectregie(id)
{
	var xhr = getXMLHttpRequest(); var action="selectregie"; form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { showpan();} };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function modifsearch()
{
	var xhr = getXMLHttpRequest(); var action="modifsearch"; var ville=$('#searchville').val(); var com=$('#searchcom').val(); var regie=$('#searchregie').val(); var type=$('#searchtype').val();
	form= new FormData(); form.append("action", action); form.append("ville", ville); form.append("com", com); form.append("regie", regie); form.append("type", type);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { showpan();} };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function selectprice(id)
{
	var xhr = getXMLHttpRequest(); var action="selectprice"; form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { showpan();} };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function selectville(id)
{
	var xhr = getXMLHttpRequest(); var action="selectville"; form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { showpan();} };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function selectcom(id)
{
	var xhr = getXMLHttpRequest(); var action="selectcom"; form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { showpan();} };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function selectsize(id)
{
	var xhr = getXMLHttpRequest(); var action="selectsize"; form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { showpan();} };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function selecttype(id)
{
	var xhr = getXMLHttpRequest(); var action="selecttype"; form= new FormData(); form.append("action", action); form.append("id", id);
	xhr.onreadystatechange = function() { if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { showpan();} };
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function envoiecommande(user)
{
	var xhr = getXMLHttpRequest();
	var action= 'envoiecommande'; var red= $('#reduction').val();
	form= new FormData(); form.append("action", action); form.append("user", user); form.append("red", red);
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			document.getElementById('voirpannier').innerHTML =xhr.responseText; qtepannier();
		}
	};
	document.getElementById('voirpannier').innerHTML ='<img src="./images/reload.gif" width=50/>';
	xhr.open("POST", "./php/rooter.php");
	xhr.send(form);
}

function qtepannier()
{
	var xhr = getXMLHttpRequest();
	var action= 'qtepannier';
	form= new FormData();
	form.append("action", action);
	xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				document.getElementById('qtepannier').innerHTML =xhr.responseText;
			}
	};
	xhr.open("POST", "./php/rooter.php");
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('action='+action);
}

function showmenu()
{
	var xhr = getXMLHttpRequest();
	var action= 'showmenu';
	form= new FormData(); form.append("action", action);
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			if(xhr.responseText=='ok')
			{
				$('#menucompte, #menulogout').fadeIn();
			} else { $('#menuinsc, #menucon').fadeIn(); }
		}
	};
	xhr.open("POST", "./php/rooter.php"); xhr.send(form);
}

function changepriceformule(div)
{
	var val=$(div).val();
	var prix=val*10000;
	$('#priceformule').html(prix.toLocaleString()+' F CFA');
}
var actu= setInterval('showpan(), qtepannier(), voircommande(), tableaubord()', 30000);
var actu1= setInterval('voircommande()', 10000);