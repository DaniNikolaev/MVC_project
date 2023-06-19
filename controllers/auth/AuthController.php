<?php
namespace controllers\auth;
use models\auth\AuthUser;

class AuthController{

    public function register(){
        include "app/views/auth/register.php";
    }
    public function store(){
        if (isset($_POST['username'])&&
            isset($_POST['email'])&&
            isset($_POST['password'])&&
            isset($_POST['confirm_password'])
        )
        {
            $username=trim($_POST['username']);
            $email=trim($_POST['email']);
            $password=trim($_POST['password']);
            $confirm_password=trim($_POST['confirm_password']);
            $role=1;
            if ($password!==$confirm_password){
                echo "Password do not match";
                return;
            }
            $userModel=new AuthUser();
            $userModel->register($username,$email,$role,password_hash($password,PASSWORD_DEFAULT));
        }
        $path='/'.APP_BASE_PATH.'/auth/login';
        header("Location: $path");
    }
    public function login(){
        include "app/views/auth/login.php";
    }
    public function authenticate(){
        $authModel=new AuthUser();
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email=trim($_POST['email']);
            $password=trim($_POST['password']);
            $remember=isset($_POST['remember'])??"";
            $user=$authModel->findByEmail($email);
            if ($user&&password_verify($password,$user['password'])){
                session_start();
                $_SESSION['user_id']=$user['id'];
                $_SESSION['user_name']=$user['username'];
                $_SESSION['user_role']=$user['role'];

                if($remember=="on"){
                    setcookie("user_email",$email,time()+(30*24*60*60),'/');
                    setcookie("user_password",$password,time()+(30*24*60*60),'/');
                }
                $path='/'.APP_BASE_PATH.'/users';
                header("Location: $path");
            }
            else{
                echo "Invalid email or password";
            }
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        $path='/'.APP_BASE_PATH.'/users';
        header("Location: $path");
    }
}