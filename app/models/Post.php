<?php

class Post{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function add($post,$title,$user){
        $this->db->query('insert into posts values (:title,:content,:user_id)');
        $this->db->bind(':title' , $title);
        $this->db->bind(':content' , $post);
        $this->db->bind(':user_id' , $user);
        if($this->db->execute()) return true;
        else return false; 
    }

    public function edit($id){
        echo "edit that post : ".$id;
    }
}