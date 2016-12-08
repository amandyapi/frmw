<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form
 *
 * @author akass
 */
class Form {
    
    public $controller;
    
    public function __construct($controller) {
        $this->controller = $controller;
    }

    public function input($name,$label,$options = array()) {
        
        if(!isset($this->controller->request->data->$name)){
            $value = '';
        }else{
            $value = $this->controller->request->data->$name;
        }
        if($label == 'hidden'){
            return '<input type="hidden" name="'.$name.'" value="'.$value.'">';
        }
           //debug($this->controller->request->data); 
            $html = '';
         if(isset($options['type']) && $options['type'] != 'checkbox' && $options['type'] != 'radio' && $options['type'] != 'date' && $options['type'] != 'datetime' && $options['type'] != 'select' OR !isset($options['type'])){
             $html='<span class="input-group-addon"><b>'.$label.'</b></span>';
         }
        
        $attr = ' ';  
        foreach ($options as $k => $v) {
            if($k != 'type' && !is_array($options)){
                $attr .= " $k=\"$v\"";
            }
            
        }
        if(!isset($options['type'])){
           $html .= '<input type="text" id="input'.$name.'" name="'.$name.'" 
                value="'.$value.'" class="form-control" '.$attr.'>';
        }
        elseif($options['type'] == 'password'){
            $html .= '<input type="password" id="input'.$name.'" name="'.$name.'" 
                value="'.$value.'" class="form-control" '.$attr.'>';
        }
        elseif($options['type'] == 'textarea'){
            $html .= '<textarea id="input'.$name.'" name="'.$name.'" 
                 class="form-control" '.$attr.'>'.$value.'</textarea>';
        }
        elseif($options['type'] == 'checkbox'){
            $html .= '<label for="input'.$name.'"  style="float:left;">'.$name.'</label>';
            $html .= '<div class="col-sm-2" align="center">';
            $html .= '<input type="hidden" name="'.$name.'" value="0">'.'<input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').' >';
            $html .= '</div>';
            
        }
        elseif($options['type'] == 'radio'){
            $html .= '<div class="" align="center" style="margin-top:-25px;">';
            $html .= '<label for="input'.$name.'"  style="float:left;margin-right:10px;"><b>'.$label.'</b></label>';
            foreach ($options['value'] as $lab => $val) {
                $html .= '<div style="float:left;margin-right:10px;"><label for="input'.$name.'"  >'.$lab.'</label>'
                        . '<input type="radio" name="'.$name.'" value="'.$val.'" '.($val == $value?'checked':'').' style="margin-left:4px;"></div>';
            }
            
            //debug($options['value']);
            $html .= '</div>';
            
        }
        
        elseif($options['type'] == 'select'){
            $html .= '<div class="" align="center" style="margin-top:-25px;">';
            $html .= '<label for="input'.$name.'"  style="float:left;margin-right:10px;"><b>'.$label.'</b></label>';
            $html .= '<select name="'.$name.'" id="pays">';
            foreach ($options['value'] as $key => $val) {
                $html .= '<option value="'.$key.'" '.($key != $value?'':'selected').' style="clear:both;">'.$val.'</option><br />';
            }
            
            //debug($options['value']);
            $html .= '</select></div>';
            
        }
        
        elseif($options['type'] == 'date' OR $options['type'] == 'datetime'){
            $html .= '<div class="" align="center" style="margin-top:0px;">';
            $html .= '<label for="input'.$name.'"  style="float:left;margin-right:10px;"><b>'.$label.'</b></label>';
            $html .= '<input class="col-sm-8" type="'.$options['type'].'" id="input'.$name.'" name="'.$name.'" 
                value="'.$value.'" class="form-control">';
            
            //debug($options['value']);
            $html .= '</div>';
            
        }
         return $html;  
    }
    
    
    
    public function input2($name,$label,$options = array()) {
        
        if(!isset($this->controller->request->data->$name)){
            $value = '';
        }else{
            $value = $this->controller->request->data->$name;
        }
        if($label == 'hidden'){
            return '<input type="hidden" name="'.$name.'" value="'.$value.'">';
        }
           //debug($this->controller->request->data); 
            $html = '';
         if(isset($options['type']) && $options['type'] != 'checkbox' OR !isset($options['type'])){
             
             $html .= '<label for="input'.$name.'"  style="float:left;">'.$label.'</label>';
         }
        
        $attr = ' ';  
        foreach ($options as $k => $v) {
            if($k != 'type'){
                $attr .= " $k=\"$v\"";
            }
            
        }
        
        if(!isset($options['type'])){
           $html .= '<input type="text" id="input'.$name.'" name="'.$name.'" 
                value="'.$value.'" class="form-control" '.$attr.'>';
        }
        elseif($options['type'] == 'password'){
            $html .= '<input type="password" id="input'.$name.'" name="'.$name.'" 
                value="'.$value.'" class="form-control" '.$attr.'>';
        }
        elseif($options['type'] == 'email'){
            $html .= '<input type="email" id="input'.$name.'" name="'.$name.'" 
                value="'.$value.'" class="form-control" '.$attr.'>';
        }
        elseif($options['type'] == 'textarea'){
            $html .= '<textarea id="input'.$name.'" name="'.$name.'" 
                 class="form-control" '.$attr.'>'.$value.'</textarea>';
        }
        elseif($options['type'] == 'checkbox'){
            $html .= '<label for="input'.$name.'"  style="float:left;">'.$label.'</label>';
            $html .= '<div class="col-sm-2" align="center">';
            $html .= '<input type="hidden" name="'.$name.'" value="0">'.'<input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').' >';
            $html .= '</div>';
            
        }
         return $html;  
    }
}
