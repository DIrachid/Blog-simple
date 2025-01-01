<?php

#[AllowDynamicProperties]
class Users extends Controller
{

    public function __construct(){
        $this->usermodel = $this->model('User');
    }

    public function index(){
        echo "hello";
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $_POST['username'] = htmlspecialchars($_POST['username']);
            $_POST['email'] = htmlspecialchars($_POST['email']);
            $_POST['password'] = htmlspecialchars($_POST['password']);
            $_POST['confirm_password'] = htmlspecialchars($_POST['confirm_password']);

            $data = [
                'name' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password'],
                'name-err' => '',
                'email-err' => '',
                'password-err' => '',
                'confirm-password-err' => '',
            ];

            

            if(empty($data['name'])) $data['name-err'] = 'Please fill your name';
            if(empty($data['email'])) $data['email-err'] = 'Please fill your email';
            if(empty($data['password'])) $data['password-err'] = 'Please fill your password';
            if(empty($data['confirm_password'])) $data['confirm-password-err'] = 'Please fill your confirm password';
            if($data['password'] !== $data['confirm_password']) $data['confirm-password-err'] = "password is don't match";
            
            // check if you email exist

            if($this->usermodel->getUserByEmail($data['email'])){
                $data['email-err'] = 'email already taken';
            }
            // create user
            
            var_dump($data);
            if(empty($data['name-err']) && empty($data['email-err']) && empty($data['password-err']) && empty($data['confirm-password-err'])){
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                if($this->usermodel->register($data['name'],$data['email'],$data['password'])){
                    redirect('users/login');
                }else{
                    die('something is wrong');
                }
            }else{
                $this->view('users/register',$data);
            }
        }else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name-err' => '',
                'email-err' => '',
                'password-err' => '',
                'confirm-password-err' => '',
            ];

            // load the register
            $this->view('users/register',$data);
        }
        
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $_POST['email']=htmlspecialchars($_POST['email']);
            $_POST['password']=htmlspecialchars($_POST['password']);

            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email-err' => '',
                'password-err' => ''
            ];

            if(!$this->usermodel->getUserByEmail($data['email'])){
                $data['email-err'] = "user not found";
            }

            if(empty($data['email'])) $data['email-err'] = 'please fill your email';
            if(empty($data['password'])) $data['password-err'] = 'please fill your password';

            

            if(empty($data['email-err']) && empty($data['password-err'])){
                var_dump($data);
                $user = $this->usermodel->login($data['email'] , $data['password']);
                var_dump($user);
                if($user){
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['user_name'] = $user->username;

                    redirect('posts');
                    
                }else{
                    $data['password-err'] = 'password inccorect';
                    $this->view('users/login',$data);
                }
            }else{
                $this->view('users/login',$data);
            }
            
        }else{
            $data = [
                'email' => '',
                'password' => '',
                'email-err' => '',
                'password-err' => '',
            ];
            $this->view('users/login',$data);
        }
    }

    public function logout(){
        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] =null;

        session_destroy();
        redirect('users/login');
    }
}