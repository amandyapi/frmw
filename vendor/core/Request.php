<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Request{
    
    public $url=null;
    public $page = 1;
    public $prefix = false;
    public $data = false;
    public $req = false;
    public $file = false;
    
    function __construct() {
        $requri = preg_replace('#/frmw#', '', $_SERVER['REQUEST_URI']);
        $requri = preg_replace('#\?lnk=([a-zA-Z0-9]+)(&([a-zA-Z0-9]+)=([a-zA-Z0-9]+))*#', '', $requri);
       $this->url = isset($_SERVER['REQUEST_URI'])?$requri:'/';
       
        if(isset($_GET['page'])){
            if(is_numeric($_GET['page'])){
                if($_GET['page'] > 0){
                    $this->page = round($_GET['page']);
                }
            }
        }
        if(!empty($_POST)){
            $this->data = new stdClass();
            //debug($_POST);
            foreach ($_POST as $k => $v) {
                $this->data->$k=$v;
            }
        }
        
        if(!empty($_GET)){
            $this->req = new stdClass();
            //debug($_POST);
            foreach ($_GET as $k => $v) {
                $this->req->$k=$v;
            }
        }
        
        if(!empty($_FILES)){
            $this->file = new stdClass();
            foreach ($_FILES as $k => $v) {
                $this->file->$k=$v;
            }
        }
    }
}
