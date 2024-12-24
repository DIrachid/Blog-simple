<?php

class User{

    private $db;

    public function __construct(){
        $this->db = new Database();

    }

    public function getUserByEmail($email){
        $this->db->query('select * from user where email = :email');
        $this->db->bind(':email',$email);
        $this->db->execute();
        if($this->db->count()) return true;
        else return false;
    }
}