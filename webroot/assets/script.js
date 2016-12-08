/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function($){
    
    var div1 = $('#projectsInfos');//
    var div2 = $('#projetsDetails');//
    
    var tr = $('#projetsTable tr');//
    var trDetails = $('#projectDetails tr');
   // alert('');
    div1.on('hover', function(){
       // $('#projectDetails h3').text('Details');
             //alert('on hover');
    });
    
    var tr = $('#projectsInfos table tr td');//
    
    tr.hover(function(){
      $('#projectDetails h3').text($(this).text());
        //alert('div 1');
    });
   
   
    
    //$('.spanServ').hide();
    var spanParent = $('.spanServ').parent('a');
    
     spanParent.hover(function(){
       //alert($(this).text());
       $(this).children('.spanServ').show();
	  // alert('hover');
    });
    
    spanParent.mouseleave(function(){
       alert($(this).text());
       $(this).children('.spanServ').hide();
	   //alert('leave');
    });
    
   //$('#connexion').hide();
   
    $(".msg").hide();
	
});