<?php

class User {
    
    //signup    
    public static function signup($login, $email, $password){
        $db = Db::getConnection();
        
        //$password = password_hash($password, PASSWORD_DEFAULT); //TODO VERIFY
        $sql = 'INSERT INTO user (login, email, password)'
                . 'VALUES (:login, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }
    
    //login validation
    public static function checkLogin($login){
        if(strlen($login) >= 5){
            return true;
        }
        return false;
    }
    
    //email validation
    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    
    //check if email already exists
    public static function checkEmailExists($email){
        $db = Db::getConnection();
        
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $result = $db->prepare($sql);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return false;
        return true;
    }
    
    //check if login already exists
    public static function checkLoginExists($login){
        $db = Db::getConnection();
        
        $sql = "SELECT COUNT(*) FROM user WHERE login = :login";
        $result = $db->prepare($sql);
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return false;
        return true;
    }
    
    //password validation
    public static function checkPassword($password){
        if(strlen($password) >= 3){
            return true;
        }
        return false;
    }
    
    //password confirm validation
    public static function checkPasswordCoincidence($password,$password2){
        if($password2 == $password){
            return true;
        }
        return false;
    }
    
    //check user data in DB (login)
    public static function checkUserData($login, $password) {
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM user WHERE login = :login AND password = :password';
        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        
        $user = $result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
    }
    
    //add current user to session
    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }
    
    //check if user logged in
    public static function checkLogged(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /");
        exit();
    }
    
    //check if user is an admin 
    public static function checkSuperuser($id){
        $db = Db::getConnection();
        $sql = "SELECT id = :id FROM user WHERE superuser IS NOT NULL";
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }
    
    //get user's id 
    public static function getUserById($userName){
        $userName = intval($userName);

        if ($userName) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM user WHERE id=' . $userName);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
}
