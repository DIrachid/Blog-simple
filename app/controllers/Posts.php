<?php
 
// create class
#[AllowDynamicProperties]
class Posts extends Controller
{

    public function __construct(){
        $this->postmodel = $this->model('Post');
    }
    public function index(){
        $posts = $this->postmodel->getposts();
        if($posts){
            $this->view('posts/index',$posts);
        }else{
            die('something is wrong');
        }
    }

    public function add(){
        if(isset($_SESSION['user_id'])){
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

                if(empty($data['title'])) $data['title-err'] = "please fill your title";
                if(empty($data['body'])) $data['body-err'] = "please write your post";

                if(empty($data['title-err']) && empty($data['body-err']) && !empty($data['user'])){
                    if($this->postmodel->add($data['title'] , $data['body'] ,$data['user'])){
                        
                        redirect('posts');
                    }else{
                        die('something is wrong');
                    }
                }else{
                    $this->view('posts/add',$data);
                }
             }else{
                $data = [
                    'title' => '',
                    'body' => '',
                    'user' => $_SESSION['user_id'],
                    'title-err' => '',
                    'body-err' => '',
                ];
            $this->view('posts/add',$data);
            }

        }else{
            redirect('posts');
        }
    }

    

    public function edit($id){
        $data = [
            'id' => $id
        ];
        $this->view('posts/edit',$data);
    }

    public function show($id){
        $post = $this->postmodel->getpost($id);
        if($post){
            $this->view('posts/show',$post);
        }else{
            die('Something went wrong !');
        }
    }
}