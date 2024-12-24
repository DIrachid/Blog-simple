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
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

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

            if(!empty($data['name-err']) && !empty($data['email-err']) && !empty($data['password-err']) && !empty(['confirm-password-err'])){
                $this->view('users/register',$data);
            }else{

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
}