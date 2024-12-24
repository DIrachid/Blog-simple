<?php

// create database connection

class Database{
    
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASSWORD;

    private $pdo;
    private $stm;

    public function __construct(){
        $dsn = "mysql:host=".$this->host."; dbname=".$this->db_name;
        try{
            $this->pdo = new PDO($dsn,$this->user,$this->password);
        }catch(PDOException $e){
            die("There is an issue".$e->getMessage());
        }
    }

    public function __destruct(){
        if($this->stm !== null){
            $this->stm = null;
        }

        if($this->pdo !== null){
            $this->pdo = null;
        }
    }

    public function query($sql){
        $this->stm = $this->pdo->prepare($sql);
    }

    public function bind($param,$value,$type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = pdo::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = pdo::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = pdo::PARAM_NULL;
                    break;
                default :
                    $type = pdo::PARAM_STR;

            }
        }

        $this->stm->bindValue($param ,$value , $type);
    }

    public function execute(){
        $this->stm->execute();
    }

    public function fetchall(){
        $this->stm->execute();
        $result = $this->stm->fetchAll();

        return $result;
    }

    public function fetch(){
        $this->stm->execute();
        $result = $this->stm->fetch();

        return $result;
    }

    public function count(){
        return $this->stm->rowCount();
    }

}