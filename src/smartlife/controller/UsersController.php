<?php


class UsersController extends Controller{
    
    public $layout = 'default_1';
    
    
    /**
     * Login
     */
    
    function login() {
        //debug($this->Session->read());
        if($this->request->data){
           $data = $this->request->data;
           $data->PASSWORD = sha1($data->PASSWORD);
           $this->loadModel('User');
           $user = $this->User->findFirst(array(
               'conditions' => array('LOGIN' => $data->LOGIN,'PASSWORD' => $data->PASSWORD)
           ));
           
           if(!empty($user)){
               //$_SESSION['User'] = $user;
               //debug($user);
               $this->Session->write('User', $user);
           }
           $this->request->data->PASSWORD = '';
           
           
           if($this->Session->isLogged() && $this->Session->user('ROLE') == 'admin'){
               $this->redirect('cockpit');
           }
           elseif($this->Session->isLogged() && $this->Session->user('ROLE') == 'user'){
               $this->redirect('');
           }
           
        }
    }
    
    /**
     * Logout
     */
    
    function logout(){
        unset($_SESSION['User']);
        $this->Session->setFlash('Vous êtes maintenant déconnecté');
        $this->redirect('');
    }
    
    
    
    
    
    
    
    /**
     * ADMIN
     */
   
    function admin_index() {
        $perPage = 10;
         $this->loadModel('User');
         $d['users'] = $this->User->find(array(
             'fields'=>'ID,NOM,PRENOMS,EMAIL,LOGIN,ROLE'
                ));
         $d['total'] = $this->User->findCount();
         $this->set($d);
    }
    
    /**
     * Permet d'editer un article
     */
    
    function admin_edit($id = null) {
        $this->loadModel('User');
        $d['id'] = '';
        if($this->request->data){
            //debug($this->request->data);
            //$this->Post->save($this->request->data);
                $this->User->update($this->request->data);
                $this->Session->setFlash('Le contenu a bien été modifié');
                $id = $this->User->id;
                $this->redirect('admin/users/index');
        }
        
        if($id){
            $this->request->data = $this->User->findFirst(array(
            'conditions'=> array('ID'=> $id)
          ));
            $d['id'] = $id;
        }
        //debug($this->request->data);
       // debug($_POST);
       $this->set($d);
    }
    
    /**
     * Permet de créer un article
     */
    
    function admin_create() {
        
        if($this->request->data){
            $this->loadModel('User');
            
            /*$this->request->data->USER_ID = 1;
            $this->request->data->TYPE = 'post';*/
            $this->request->data->PASSWORD = sha1($this->request->data->PASSWORD);
            $this->request->data->CREATED = date('Y-m-d h:i:s');
            $this->User->add($this->request->data);
            $this->Session->setFlash('L\'utilisateur a bien été ajouté');
            $this->redirect('admin/users/index');

            //debug($this->request->data);
            //$this->redirect("admin/posts/index");
        }
        
        //debug($this->request->data);
       // debug($_POST);
        
    }
    
    /**
     * Permet de supprimer un article
     */
    
    function admin_delete($id) {
        $this->loadModel('User');
        $this->User->delete($id);
        $this->Session->setFlash('L\'utilisateur a bien été supprimé');
        $this->redirect('admin/users/index');
    }
    
}