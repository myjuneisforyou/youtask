<?php

include_once (ROOT.'/models/User.php');

class UserController {
    
    //login
    public function actionSignin(){
        
        //if user logged in he can't acces to this page
        //can't do that cause of infinity loop = no access to website
        
        /*$userId = User::checkLogged();
        if($userId){
            header('Location: /index');
        }*/
        
        if(isset($_POST['submit'])){
            
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $error = false;
            
            if(!User::checkLogin($login)){
                $error_login = "Enter login"; 
                $error = true;
            }
            
            if(!User::checkPassword($password)){
                $error_password = "Enter password";
                $error = true;
            }
            
            $userId = User::checkUserData($login, $password);
            if(!$userId){
               $error_error = "Incorrect values";
            }else{
                User::auth($userId);
                header('Location: http://youtask/index');
                exit();
            }
            
        }
        
        require_once(ROOT.'/views/user/signin.php');
        return true;
    }

    //registraion
    public function actionSignup(){
        
        $result = false;
        
        if(isset($_POST['submit'])){
            
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            
            $error = false;
            
            if(!User::checkLogin($login)){
                $error_login = "Login must be more than 4 symbols!"; 
                $error = true;
            }
            
            if(!User::checkLoginExists($login)){
                $error_login = "Login already exists!";
                $error = true;
            }
            
            if(!User::checkEmail($email)){
                $error_email = "Incorrect email";
                $error = true;
            }
            
            if(!User::checkEmailExists($email)){
                $error_email = "Email already exists!";
                $error = true;
            }
            
            if(!User::checkPassword($password)){
                $error_password = "Password must be more than 2 symbols!";
                $error = true;
            }
            
            if(!User::checkPasswordCoincidence($password, $password2)){
                $error_password2 = "Passwords doesn't match!";
                $error = true;
            }
            if($error == false){
                $result = User::signup($login, $email, $password);
                header('Refresh: 1; URL=http://youtask');
            }        
        }
        
        require_once(ROOT.'/views/user/signup.php');
        return true;
    }
    
    //logout
    public function actionLogout(){
        unset($_SESSION['user']);
        header("Location: /");
    }
}
