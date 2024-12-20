<?php


// create class

class Posts extends Controller
{

    public function __construct(){
        $this->postmodel = $this->model('Post');
    }
    public function index(): void{
         echo "nice";
    }

    public function edit($id){
        $this->postmodel->edit();
    }
}