/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function($){
    var valid = true;var pseudovalid = false;var mailvalid = false;
		
		$('#pseudo').focusout(function(){
			var valuepseudo = $('#pseudo').val();
				$.ajax({
				url : 'verifierpseudounique/pseudo/'+valuepseudo, 
				type : 'GET',
				dataType : 'text',
				success : function(text,statut){
					//alert(text);
					if(text == "existe"){
						valid = false;
						$('#pseudo').css({ borderColor : 'red', color : 'red' });
						$('#pseudoerr').text('Le pseudo '+valuepseudo+' existe déjà');
					}
					else{
						pseudovalid = true;
						$('#pseudo').css({ borderColor : 'green',color : 'green'});
					}
				},
				complete : function(resultat, statut){
					
				}
				//data : 'name=' + name +'value='+value
				});
		});
		
		
		 $('#mail').focusout(function(){
			 var valueemail = $('#mail').val();
			var lenght = valueemail.length;
		
			 $.ajax({
            url : 'verifieremailunique/emailmembre/'+valueemail, 
            type : 'GET',
            dataType : 'text',
            success : function(text,statut){
				//alert(text);
                if(text == "existe"){
						valid = false;
						$('#mail').css({ borderColor : 'red', color : 'red' });
						$('#mailerr').text('Le mail '+valueemail+' existe déjà');
					}
					else{
						mailvalid = true;
						$('#mail').css({ borderColor : 'green',color : 'green'});
					}
            },
            complete : function(resultat, statut){
                
            }
            //data : 'name=' + name +'value='+value
            });
		
		}); 
		
     $('#enregistrer').click( function(){
		
		if($('#pseudo').val() == "" || $('#pseudo').val().length < 3){
            valid = false;
            $('#pseudo').css({ borderColor : 'red', color : 'red' });
        }
		else{
             $('#pseudo').css({ borderColor : '#d0d7de',color : '#555'});
			 
        }
		
        
        //Pseudo Parrain
        if($('#ppseudo').val() == ""){
            valid = false;
            $('#ppseudo').css({ borderColor : 'red', color : 'red' });
        }else{
             $('#ppseudo').css({ borderColor : '#d0d7de',color : '#555'});
        }
        
        //Nom
        if($('#nom').val() == "" | $('#nom').val().length < 3){
            valid = false;
            $('#nom').css({ borderColor : 'red', color : 'red' });
        }else{
             $('#nom').css({ borderColor : '#d0d7de',color : '#555'});
        }
        
        //Prénom
        if($('#pnom').val() == "" | $('#pnom').val().length < 3){
            valid = false;
            $('#pnom').css({ borderColor : 'red', color : 'red' });
        }else{
             $('#pnom').css({ borderColor : '#d0d7de',color : '#555'});
        }
        
        
         //Sexe
        if($('#sexe').val() == "0"){
            valid = false;
            $('#sexe').css({ borderColor : 'red', color : 'red' });
        }else{
             $('#sexe').css({ borderColor : '#d0d7de',color : '#555'});
        }
       
        //Email
        if( $('#mail').val() == "" |  $('#mail').val().length < 4 | $('#mail').val().indexOf('@') == -1 | $('#mail').val().indexOf('.') == -1){
            valid = false;
            $('#mail').css({ borderColor : 'red', color : 'red' });
        }else{
             
			$('#mail').css({ borderColor : '#d0d7de',color : '#555'});
        }
        
        
       
       
         //Password
        if($('#pass').val() == "" | $('#pass').val().length < 4){
            valid = false;
            $('#pass').css({ borderColor : 'red', color : 'red' });
        }else{
             $('#pass').css({ borderColor : '#d0d7de',color : '#555'});
        }
        
        
        //Conf
        if($('#conf').val() != $('#pass').val()){
            valid = false;
            $('#conf').css({ borderColor : 'red', color : 'red' });
        }else{
             $('#conf').css({ borderColor : '#d0d7de',color : '#555'});
        }
        
        
         //Country
        if($('#country').val() == "0"){
            valid = false;
            $('#country').css({ borderColor : 'red', color : 'red' });
        }else{
             $('#country').css({ borderColor : '#d0d7de',color : '#555'});
        }
        
		
        return valid;
        
    });
});

