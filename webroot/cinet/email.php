<?php
         $query5= $bdd->query('SELECT * FROM membre WHERE id = '.(int) $idmbre);$membremail=$query5->fetch();
                                    $mail = $membremail[5];   
        
     
                
                // Pour les champs $noreply/ $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
                $noreply= 'noreply@smarts-life.com';
                $objet = 'Smarts-life.com: Confirmation de l\'abonnement'; // Objet du message
                $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
                $headers .= 'Reply-To: '. $noreply."\n"; // Mail de reponse
                $headers .= 'From: "WWW.SMARTS-LIFE.COM"<'. $noreply.'>'."\n"; // Expediteur
                $headers .= 'Delivered-to: '.$mail."\n"; // Destinataire

                $message = '<div style="width: 100%; text-align: center; font-weight: bold">
                <p><img style="width: 100px" src="https://smarts-life.com/sl/webroot/profile/images/logo.png"/></p>
                <p>    Bonjour M./Mme, '.$membremail[2].', le paiement de votre abonnement s\'est effectué avec succès.</p>';
                if (mail($mail, $objet, $message, $headers))  return true; else return false;   
           
      