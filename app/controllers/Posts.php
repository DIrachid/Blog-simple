<?php

// create class
#[AllowDynamicProperties]
class Posts extends Controller
{

    public function __construct(){
        $this->postmodel = $this->model('Post');
    }
    public function index(){
         echo "nice";
    }

    public function edit($id){
        $data = [
            'id' => $id
        ];
        $this->view('posts/edit',$data);
    }
}