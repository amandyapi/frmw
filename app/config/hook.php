<?php
if(isset($this->request->prefix) && $this->request->prefix == 'admin'){
   $this->layout = 'admin'; 
   if(!$this->Session->isLogged() || $this->Session->user('ROLE') != 'admin'){
               //$this->redirect('pages/index');
    }
}

