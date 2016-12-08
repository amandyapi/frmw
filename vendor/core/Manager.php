<?php

class Manager{
    
    /**
     * 
     */
    static $connexions = array();

    public $conf='smart';
    
    public $table = false;
    
    public $db;
    
    public $primaryKey = 'id';
    
    public $id;
    

    function __construct() {
        //je vérifie si une connexion n'existe pas déjà
       $conf = Conf::$database[$this->conf];
       //J'initialise quelques variables
        if($this->table === false){
            $this->table = strtolower(get_class($this));
        }
       if(isset(Manager::$connexions[$this->conf])){
           $this->db = Manager::$connexions[$this->conf];
           return true;
       }
       //S'il n'y a pas déjà une connexion j'ouvre une nouvelle 
       //connexion à la base de donner et je l'utilise pour m'y connecter
        try {
            $pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';charset=utf8',
                    $conf['login'],
                    $conf['password'],
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                    );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            Manager::$connexions[$this->conf] = $pdo;
            $this->db = $pdo;
            
        } catch (PDOException $e) {
            if(Conf::$debug >= 1){
                die($e->getMessage());
            }
            else{
                die('Impossible de se connecter à la base de données');
            }
        }
        //j'ai chargé la base et je m'y suis connecté";
    }
   public function last($req,$var) {
      $sql = 'SELECT*FROM '.$this->table.' as '.get_class($this).' '; 
      if(isset($req['conditions'])){
            $sql.='WHERE ';
            if(!is_array($req['conditions'])){
                $sql.=$req['conditions'];
            }else{
                $cond = array();
                foreach($req['conditions'] as $k => $v) {
                    if(!is_numeric($v)){
                        $v = "'".$v."'";
                       // $v = "'".$v."'";
                    }
                    
                    $cond[] = "$k=$v";
                }
                $sql.= implode(' AND ', $cond);
                
                
            }
            
        }
        $sql.=' ORDER BY '.$var.' DESC'; 
       $pre = $this->db->prepare($sql);
        //debug($sql);die();
        $pre->execute();        
        return $pre->fetch(PDO::FETCH_OBJ);
    }
	
    public function find($req = NULL) {
        $sql = 'SELECT ';
        
        
        if(isset($req['fields'])){
            if(is_array($req['fields'])){
                $sql.=implode(', ', $req['fields']);
            }
            else{
                $sql.=$req['fields'];
            }
            
        }else{
            $sql .='*';
        }
        
        $sql .= ' FROM '.$this->table.' as '.get_class($this).' ';
        //Construction de la condition
        if(isset($req['conditions'])){
            $sql.='WHERE ';
            if(!is_array($req['conditions'])){
                $sql.=$req['conditions'];
            }else{
                $cond = array();
                foreach($req['conditions'] as $k => $v) {
                    if(!is_numeric($v)){
                        $v = "'".$v."'";
                       // $v = "'".$v."'";
                    }
                    
                    $cond[] = "$k=$v";
                }
                $sql.= implode(' AND ', $cond);
                
                
            }
            
        }
        
        
        if(isset($req['limit'])){
            $sql.=' LIMIT '.$req['limit'];
        }
        
        
        
        $pre = $this->db->prepare($sql);
        //debug($sql);die();
        $pre->execute();
        
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function findFirst($req) {
        return current($this->find($req));//la fonction "current" retourne l'élement courant du tableau ndrl le 1er element....
        //retourner un seul enregistrement
        
    }
    
    public function findCount($condition = null) {
      $res = $this->findFirst(array(
            'fields' => 'COUNT('.$this->primaryKey.') as count',
            'conditions' =>$condition
        ));
        
      return $res->count;
    }
    
	public function findSum($condition = null,$var) {
      $res = $this->findFirst(array(
            'fields' => 'SUM('.$var.') as somme',
            'conditions' =>$condition
        ));
        
      return $res->somme;
    }
	
    public function findMax($condition = null,$var) {
      $res = $this->findFirst(array(
            'fields' => 'MAX('.$var.') as max',
            'conditions' =>$condition
        ));
        
      return $res->max;
    }
	
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = $id";
        $this->db->query($sql);
    }
    
    public function save($data) {
        
        $key = $this->primaryKey;
        $fields = array();
        $sql = '';
        //$action ='';
        //$d = array();
        
        //if(isset($data->$key)) unset($data->$key); 
        foreach ($data as $k => $v) {
                $fields[] = " $k=:$k";
                //$d[":$k"] = $v;
         }
         
        if(isset($data->$key) && !empty($data->$key)){
            $sql = 'UPDATE '.$this->table.' SET '.implode(',',$fields).' WHERE '.$key.'=:'.$key;
            //$this->id = $data->$key;
            //$action = 'update';
        }
        debug($sql);
        die();
        
    }
    
    public function add($data) {
        $fields = array();
        $d = array();
        
        foreach ($data as $k => $v) {
                $fields[] = " $k=:$k";
                $d[":$k"] = htmlspecialchars($v);
         }
         
         $sql = 'INSERT INTO '.$this->table.' SET '.implode(',',$fields);
         
         $pre = $this->db->prepare($sql);
         $pre->execute($d);
         
         return $pre->errorCode();
         
    }
    
    public function update($data) {
         $key = $this->primaryKey;
        $fields = array();
        $d = array();
        
        foreach ($data as $k => $v) {
                $fields[] = " $k=:$k";
                //$d[":$k"] = mysql_real_escape_string($v);
                $d[":$k"] = $v;
         }
         
         $sql = 'UPDATE '.$this->table.' SET '.implode(',',$fields).' WHERE '.$key.'=:'.$key;
         $pre = $this->db->prepare($sql);
         
         /*debug($sql);
         debug($d);*/
         //debug($sql);
         //die();
         $pre->execute($d);
    }
    
    function validates($data) {
        $errors = array();
        foreach ($this->validate as $k => $v) {
           /* if(!isset($data->$k)){
            $errors[$k] = $v['message'];
            }else{
                //debug($data->$k);
                if($v['rule'] === 'notEmpty'  && empty($data->$k)){
                    $errors[$k] = $v['message'];
                    
                }elseif(!preg_match('/^'.$v['rule'].'$/', $data->$k)){
                    $errors[$k] = $v['message'];
                }
            }*/
            
            /*if(!isset($data->$k)){
            $errors[$k] = $v['message'];
            }else*/
                
            if(empty($data->$k) && $v['rule'] === 'notEmpty'){
                    $errors[$k] = $v['message'];
            }elseif(!preg_match('/^'.$v['rule'].'$/', $data->$k)){
                    $errors[$k] = $v['message'];
            }
            
        }
        debug($data);
        debug($errors);
        die();
    }
    
    public function setConf($conf = 'smart') {
        $this->conf = $conf;
    }
}
