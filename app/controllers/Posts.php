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
        $post = $this->postmodel->getpost($id);
        if($_SESSION['user_id'] == $post->user_id){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $title = htmlspecialchars($_POST['title']);
                $body = htmlspecialchars($_POST['body']);

                $data = [
                    'post' => $post,
                    'title' => $title,
                    'body' => $body,
                    'id' => $post->id,
                    'title-err' => '',
                    'body-err' => ''
                ];

                if(empty($data['title'])) $data['title-err'] = 'Please fill your title';
                if(empty($data['body'])) $data['body-err'] = 'Please fill your post';

                if(empty($data['title-err']) && empty($data['body-err'])){
                    if($this->postmodel->update($data)){
                        redirect('posts');
                    }else{
                        die('Something is wrong ?');
                    }
                }else{
                    $this->view('posts/edit',$data);
                }
            }else{
                $data = [
                    'post' => $post,
                    'title' => $post->title,
                    'body' => $post->content,
                    'title-err' => '',
                    'body-err' => ''
                ];
                $this->view('posts/edit',$data);
            }
        }else{
            redirect('posts');
        }
    }

    public function show($id){
        $post = $this->postmodel->getpost($id);
        if($post){
            $this->view('posts/show',$post);
        }else{
            die('Something went wrong !');
        }
    }

    public function delete($id){
        $post = $this->postmodel->getpost($id);
        if($_SESSION['user_id'] === $post->user_id){
            if($this->postmodel->delete($id)){
                redirect('posts');
            }{
                die('Something went wrong');
            }
        }
    }
}