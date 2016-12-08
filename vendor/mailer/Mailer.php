<?php

/**
 * Description of mailer
 * Send mail 
 * @author yan
 */
class Mailer {
    //Mail params
    public $email_subject;
    public $text_email_body;
    public $html_email_body;
    public $headers;
    
    //Form data
    public $user_name;
    public $user_mail_adress;
    public $user_message;
    
    //Construct method
    public function __construct(){
        $this->setUser_name();
        $this->setUser_mail_adress();
        $this->setUser_message();
        
        $this->setEmail_subject('Smarts-life.com: Lien de parrainage');
        $this->setText_email_body();
        $this->setHeaders();
    }
    
    //Setters
        //Form data
    public function setUser_name() {
        
          $this->user_name  = "user";
       
        //$this->user_name = filter_input(INPUT_POST, 'user_name');
    }
    
    public function setUser_mail_adress() {
        
          $this->user_mail_adress  = "yapiamand@gmail.com";
        
    }
    
    public function setUser_message() {
        if(!empty($_POST['user_message'])){
          $this->user_message  = $_POST['user_message'];
        }
    }
    
        //Mail params
   
    
    public function setEmail_subject($text) {
        $this->email_subject = "$text";
    }
    
    public function setText_email_body() {
        
        //$body = "Vous avez reçu un nouveau mail du formulaire de contact de votre site internet.\n\n".
        //   "Voici les détails du mail:\n\nNom: $this->user_name\n\nEmail: $this->user_mail_adress\n\nMessage:\n$this->user_message";
        $body = $_POST['user_message'].$_POST['lien_parrainage'];
        $this->text_email_body = $body;
    }
    
    public function setHtml_email_body() {
        
        $body = "Vous avez reçu un nouveau mail du formulaire de contact de votre site internet.\n\n".
                "Voici les détails du mail:\n\nNom: "
                . "$this->user_name\n\nEmail: "
                . "$this->user_mail_adress\n\nMessage:\n"
                . "$this->user_message";
        
        
        $html = '<html>
			<head>
			  <title>Message de '. $this->user_name .'</title>
			</head>
			<body style="background: white;text-align:left;">
                                <h3 style="margin-bottom:-10px;">Vous avez un nouveau mail de '. $this->user_mail_adress .'</h3>
			  <table style="width: 500px; font-family: arial; font-size: 14px;background: #b1e8aa;text-align:left;">
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Nom:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">'. $this->user_name .'</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">'. $this->user_mail_adress .'</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Message:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">'. $this->user_message .'</td>
				</tr>
			  </table>
			</body>
			</html>';
        
        $this->html_email_body = $html;
    }
    
    public function setHeaders() {
        $noreply = Conf::$mailer['noreply_mail'];
        $headers = "From: $noreply\n"; 
        $headers .= "Reply-To: $this->user_mail_adress";
        
        $this->headers = $headers;
    }
    
    //Send mail method
    public function sendtextmail() {
        $this->setText_Email_body();
        $this->setHeaders();
        mail(Conf::$mailer['website_mail'],  $this->email_subject,  $this->text_email_body,  $this->headers);
        return true;
    }
    
    public function sendhtmlmail() {
        $this->setHtml_Email_body();
        $this->setHeaders();
        //mail(Conf::$mailer['website_mail'],  $this->email_subject,  $this->html_email_body,  $this->headers);
        return true;
    }
}
