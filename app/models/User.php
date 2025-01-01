<?php

class User{

    private $db;

    public function __construct(){
        $this->db = new Database();

    }

    public function getUserByEmail($email){
        $this->db->query('select * from users where email = :email');
        $this->db->bind(':email',$email);
        $this->db->execute();
        if($this->db->count()) return true;
        else return false;
    }

    public function register($name,$email,$password){
        $this->db->query("insert into users(username,email,password) values (:name,:email,:password)");
        $this->db->bind(':name',$name);
        $this->db->bind(':email',$email);
        $this->db->bind(':password',$password);
        if($this->db->execute()) return true;
        else return false;
    }

    public function login($email,$password){
        $this->db->query('select * from users where email = :email');
        $this->db->bind(':email',$email);
        $row = $this->db->fetch();
        $hashed = $row->password;
        if(password_verify($password,$hashed)){
            return $row;
        }else{
            return false;
        }
    }
}