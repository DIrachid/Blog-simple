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

    public function add(){

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $_POST['title'] = htmlspecialchars($_POST['title']);
            $_POST['body'] = htmlspecialchars($_POST['body']);

            $data = [
                'title' => $_POST['title'],
                'body' => $_POST['body'],
                'user' => $_SESSION['user_id'],
                'title-err' => '',
                'body-err' => ''
            ];

            if(empty($data['ttile'])) $data['title-err'] = "please fill your title";
            if(empty($data['body'])) $data['body-err'] = "please write your post";

            if(empty($data['title-err']) && empty($data['body-err']) && !empty($data['user'])){
                if($this->postmodel->add($data['title'] , $data['body'] ,$data['user'])){
                    redirect('posts');
                }else{
                    die('something is warning');
                }
            }else{
                $this->view('posts/add',$data);
            }
        }else{
            $data = [
                'title' => '',
                'body' => '',
                'title-err' => '',
                'body-err' => '',
            ];
            $this->view('posts/add',$data);
        }

    }

    public function edit($id){
        $data = [
            'id' => $id
        ];
        $this->view('posts/edit',$data);
    }
}