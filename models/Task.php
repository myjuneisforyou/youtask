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
       
        //$page = intval($page);
        //$offset = ($page - 1) * 3;
        
        $db = Db::getConnection();
        $taskList = [];
       
        /*$result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
                . 'ORDER BY status DESC LIMIT 3 OFFSET ' . $offset );*/
        $result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
            . 'ORDER BY id DESC');
        
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['user_name'] = $row['user_name'];
            $taskList[$i]['user_email'] = $row['user_email'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['image'] = $row['image'];
            $taskList[$i]['tasktext'] = $row['tasktext'];
            $taskList[$i]['status'] = $row['status'];
            $i++;
        }
        return $taskList;
    }
    
    //sort by user name ASC
    public static function sortByName(){
        
        $db = Db::getConnection();
        $taskList = [];
        
        $result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
                . 'ORDER BY user_name ASC');
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['user_name'] = $row['user_name'];
            $taskList[$i]['user_email'] = $row['user_email'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['image'] = $row['image'];
            $taskList[$i]['tasktext'] = $row['tasktext'];
            $taskList[$i]['status'] = $row['status'];
            $i++;
        }
        return $taskList;
    }
    
    //sort by user name ASC
    public static function sortByNameStatus(){
        
        $db = Db::getConnection();
        $taskList = [];
        
        $result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
                . 'WHERE status = "Completed" ORDER BY user_name ASC');
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['user_name'] = $row['user_name'];
            $taskList[$i]['user_email'] = $row['user_email'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['image'] = $row['image'];
            $taskList[$i]['tasktext'] = $row['tasktext'];
            $taskList[$i]['status'] = $row['status'];
            $i++;
        }
        return $taskList;
    }
    
    //sort by user email ASC
    public static function sortByEmail(){
        
        $db = Db::getConnection();
        $taskList = [];
        
        $result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
                . 'ORDER BY user_email ASC' );
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['user_name'] = $row['user_name'];
            $taskList[$i]['user_email'] = $row['user_email'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['image'] = $row['image'];
            $taskList[$i]['tasktext'] = $row['tasktext'];
            $taskList[$i]['status'] = $row['status'];
            $i++;
        }
        return $taskList;
    }
    
    //sort by user email ASC WHERE STATUS = COMPLETED
    public static function sortByEmailStatus(){
        
        $db = Db::getConnection();
        $taskList = [];
        
        $result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
                . 'WHERE status = "Completed" ORDER BY user_email ASC ' );
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['user_name'] = $row['user_name'];
            $taskList[$i]['user_email'] = $row['user_email'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['image'] = $row['image'];
            $taskList[$i]['tasktext'] = $row['tasktext'];
            $taskList[$i]['status'] = $row['status'];
            $i++;
        }
        return $taskList;
    }
    
    //sort by status DESC
    public static function sortByStatus(){

        $db = Db::getConnection();
        $taskList = [];
        
        $result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
                . 'ORDER BY status DESC');
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['user_name'] = $row['user_name'];
            $taskList[$i]['user_email'] = $row['user_email'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['image'] = $row['image'];
            $taskList[$i]['tasktext'] = $row['tasktext'];
            $taskList[$i]['status'] = $row['status'];
            $i++;
        }
        return $taskList;
    }
    
    //need to edit task (connect task's id to output task)
    //edit/12 => output task with id 12
    public static function getInfo($infoid = false)
    {
        if ($infoid) {

            $db = Db::getConnection();            
            $info = array();
            $result = $db->query("SELECT title, image, tasktext, status FROM task "
                    . "WHERE id = '$infoid'");
            $i = 0;
            while ($row = $result->fetch()) {
                $info[$i]['title'] = $row['title'];
                $info[$i]['image'] = $row['image'];
                $info[$i]['tasktext'] = $row['tasktext'];
                $info[$i]['status'] = $row['status'];
                $i++;
            }
            return $info;       
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
        //$result->bindParam(':status', 'Completed', PDO::PARAM_STR);
   
        return $result->execute();
    }
    
    //take task with status Completed
    public static function completedTasks(){
        
        $db = Db::getConnection();
        $taskList = [];
        
        $result = $db->query('SELECT id, user_name, user_email, title, image, tasktext, status FROM task '
                . 'WHERE status = "Completed" ORDER BY id DESC');
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['user_name'] = $row['user_name'];
            $taskList[$i]['user_email'] = $row['user_email'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['image'] = $row['image'];
            $taskList[$i]['tasktext'] = $row['tasktext'];
            $taskList[$i]['status'] = $row['status'];
            $i++;
        }
        return $taskList;
    }
    
}
