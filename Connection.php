<?php

class Connexion {

    private static $instance;

    private $pdo;

    private function __construct()
    {
        $config=file_get_contents('config.json');
        $config=json_decode($config);
        try{
            $pdo = new PDO('mysql:host='.$config->host.'; dbname='.$config->db_name,$config->username,$config->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo=$pdo;
        } 
        catch(PDOException $e){
            echo $e->getMessage();
        } 
               
    }

    public static function getInstance(){

        if (self::$instance==null){
            return self::$instance=new Connexion();
        }
        else return self::$instance;

    }

    /**
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }
}