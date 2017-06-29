<?php


class Task {
    
    //title validation
    public static function checkTitle($title){
        if(strlen($title) != 0){
            return true;
        }
        return false;
    }
    
    //task validation
    public static function checkTask($task){
        if(strlen(htmlspecialchars($task)) > 0){
            return true;
        }
        return false;
    }
    
    //insert our task in DB
    public static function taskCreate($user_name, $user_email, $title, $image, $tasktext){
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO task (user_name, user_email, title, image, tasktext)'
                . 'VALUES (:user_name, :user_email, :title, :image, :tasktext)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $result->bindParam(':user_email', $user_email, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':tasktext', $tasktext, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    //echo TASK from db to our page
    public static function getTask(){ //($page = 1)
       
        /*$page = intval($page);
        $offset = ($page - 1) * 3;*/
        
        $db = Db::getConnection();
       
        $result = $db->query('SELECT * FROM task ORDER BY status DESC');

        return $result->fetchAll();
    }
    
    //sort by user name ASC
    public static function sortByName(){
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM task ORDER BY user_name ASC');

        return $result->fetchAll();
    }
    
    //sort by user name ASC
    public static function sortByNameStatus(){
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM task WHERE status = "Completed" ORDER BY user_name ASC');

        return $result->fetchAll();
    }
    
    //sort by user email ASC
    public static function sortByEmail(){
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM task ORDER BY user_email ASC');

        return $result->fetchAll();
    }
    
    //sort by user email ASC WHERE STATUS = COMPLETED
    public static function sortByEmailStatus(){
 
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM task WHERE status = "Completed" ORDER BY user_email ASC');

        return $result->fetchAll();
    }
    
    //sort by status DESC
    public static function sortByStatus(){
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM task ORDER BY status DESC');
        
        return $result->fetchAll();
    }
    
    //need to edit task (connect task's id to output task)
    //edit/12 => output task with id 12
    public static function getInfo($infoid = false)
    {
        if ($infoid) {

            $db = Db::getConnection();            
            
            $result = $db->query("SELECT title, image, tasktext, status FROM task "
                    . "WHERE id = '$infoid'");
            
            return $result->fetchAll();
        }
    }
    
    //edit task
    public static function editTask($id, $title, $tasktext){
        $db = Db::getConnection();
        
        $sql = 'UPDATE task SET title = :title, tasktext = :tasktext
            WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':tasktext', $tasktext, PDO::PARAM_STR);
   
        return $result->execute();
    }
    
    //change status to Done
    public static function changeStatus($id){
        $db = Db::getConnection();
        
        $sql = 'UPDATE task SET status = "Completed" WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
   
        return $result->execute();
    }
    
    // <url>/completed
    public static function completedTasks(){
          
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM task WHERE status = "Completed" ORDER BY id DESC');

        return $result->fetchAll();
    }
    
}
