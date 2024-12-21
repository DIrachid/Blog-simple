<?php

// create class
#[AllowDynamicProperties]
class Posts extends Controller
{

    public function __construct(){
        $this->postmodel = $this->model('Post');
    }
    public function index(){
         $this->view('posts/index');
    }

    public function edit($id){
        $data = [
            'id' => $id
        ];
        $this->view('posts/edit',$data);
    }
}