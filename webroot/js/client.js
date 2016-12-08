function get(id)
{
	var val= document.getElementById(id).value;
	return val;
}
function monnaie(div) 
 {
	if(document.getElementById(div).value!='')
	{
        var eur = parseFloat(supprEspace(document.getElementById(div).value.replace(/,/,"." )));
        document.getElementById(div).value = format(eur,0," " );
	}
}
function format(valeur,decimal,separateur) {
	var deci=Math.round( Math.pow(10,decimal)*(Math.abs(valeur)-Math.floor(Math.abs(valeur))));
	var val=Math.floor(Math.abs(valeur));
		if ((decimal==0)||(deci==Math.pow(10,decimal))) {val=Math.floor(Math.abs(valeur)); deci=0;}
		var val_format=val+"";
		var nb=val_format.length;
		for (var i=1;i<4;i++) {
			if (val>=Math.pow(10,(3*i))) {
			val_format=val_format.substring(0,nb-(3*i))+" "+val_format.substring(nb-(3*i));
			}
		}
		if (decimal>0) {
			var decim="";
			for (var j=0;j<(decimal-deci.toString().length);j++) {decim+="0";}
			deci=decim+deci.toString();
			val_format=val_format+","+deci;
		}
		if (parseFloat(valeur)<0) {val_format="-"+val_format;}
	return val_format;
}
function supprEspace(f)    {
	var txtResultat="";
	for (var i=0; i<=f.length-1; i++)    {
		if (f.charAt(i)!=" " )    {
			txtResultat+=f.charAt(i);
		}
	}
	return txtResultat;
}

function closedropdownville(id)
{
	$('#sous-ville').fadeOut();
}

function verif_input(id) { if($(id).val()=="" || $(id).val()=='0')  { $(id).css({ border: '2px solid red' }); return false; } else $(id).css({ border: '' }); return true; }

function verif_pass(pass, confirm, div)
{
	if(pass!=confirm)
	{
		$('#pass_user_reg, #confirm_user_reg').css({ border: '2px solid red' });
		$(div).html('<span style="color: red">Vérifiez le mot de passe et sa confirmation</span>');
		return false;
	}
	else return true;
}

function number(e)
{
	if( 48 <= e.which && e.which <= 57 || e.which ==8 || e.which==0) { } else { e.preventDefault(); return false; }
	if((event.which < 45 || event.which > 57) && !((event.which==8) || (event.which==37) || (event.which==39) || (event.which==46))) return false;
}

function getExtension(filename)
{
	var parts = filename.split(".");
	return (parts[(parts.length-1)]);
}    

function verifImage(fichier)
{
	var listeExt=new Array('jpg','jpeg','png');
	filename = fichier.name.toLowerCase();
	fileExt = getExtension(filename);
	if(fileExt =='jpg' ||  fileExt =='jpeg' || fileExt =='png') { return (true); } else { alert("L'images doit être au format JPG, JPEG ou PNG!!"); return false; }
}
function verifImageSize(taille)
{
	if(taille>1000000){ alert('La taille ne doit exéger 1Mo!!'); return false;} else { return true; }
}