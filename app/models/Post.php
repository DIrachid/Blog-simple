<?php

class Post{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function add($title,$post,$user){
        $this->db->query('insert into posts(title,content,user_id) values (:title,:content,:user_id)');
        $this->db->bind(':title' , $title);
        $this->db->bind(':content' , $post);
        $this->db->bind(':user_id' , $user);
        if($this->db->execute()) return true;
        else return false; 
    }

    // that for view is one post
    public function getpost($id){
        $this->db->query('select * from posts where id=:id');
        $this->db->bind(':id',$id);
        $this->db->execute();
        if($this->db->count() >=1) return $this->db->fetch();
        else return false;
    }

    // that for lot posts 
    public function getposts(){
        $this->db->query('select * from posts');
        $this->db->execute();
        if($this->db->count() >= 1) return $this->db->fetchall();
        else return false;
    }

    public function edit($id){
        echo "edit that post : ".$id;
    }
}