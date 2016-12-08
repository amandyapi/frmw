<?php

/* 
 * Configuration
 */

class Conf{
    
    static $debug = 1;


    static $database = array(
        'default' =>  array(
            'host'     => 'localhost',
            'database' => 'mondenouveau',
            'login'    => 'root',
            'password' => ''
        ),
        'smart' =>  array(
            'host'     => 'localhost',
            'database' => 'smartlife',
            'login'    => 'root',
            'password' => ''
        ),
        'mondenouveau1' =>  array(
             'host'     => 'localhost',
            'database' => 'mondenouveau',
            'login'    => 'root',
            'password' => ''
        ),
        'remote2' =>  array(
            'host'     => 'mysql.hostinger.fr',
            'database' => 'u330710098_smrts',
            'login'    => 'u330710098_smrts',
            'password' => 'smartslife2016'
            )
      );
    
    static $bundle = array(
        'default' => 'smartlife'
    );
    
    
    static $mailer = array(
        'website_mail' =>  'webmaster@smarts-life.com',
        'noreply_mail' =>  'noreply@smarts-life.com',
            
       );
}

