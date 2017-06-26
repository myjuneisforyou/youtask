<?php

include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Task.php');

class TaskController {
    
    //create a task
    public function actionCreate(){
        
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $result = false;
        
        if(isset($_POST['submit'])){
            
            $error = false;
            
            $title = $_POST['title'];
            $image = $_FILES['image']['name'];
            $task = $_POST['task'];
                
            if(!Task::checkTitle($title)){
                $error_title = "Enter title for you task!";
                $error = true;
            }
            
            if(!Task::checkTask($task)){
                $error_task= "You must write a task!";
                $error = true;
            }
            
            $imgName = basename($_FILES['image']['name']); //file nae
            $imgPath = ROOT.'/tmp/img/db/'.$imgName;  // directory to save img
            $file_type = $_FILES['image']['type']; //returns the mimetype
            $allowed = ["image/jpeg", "image/gif", "image/png"]; //allowed file formats
            
            if(!in_array($file_type, $allowed)) {
                $error_image = 'Only jpg, gif, and pdf files are allowed.';
                $error = true;
            }else{
                move_uploaded_file($_FILES['image']['tmp_name'], $imgPath);
            }
            
            if($error == false){
                $result = Task::taskCreate($user['login'], $user['email'], $title, $image, $task);
            }  
        }
        
        require_once(ROOT.'/views/task/create.php');
        return true;
    }
    
    //edit task (admin only permission)
    public function actionEdit($info){
        
        $infoedit = Task::getInfo($info);

        $result = false;
        
        if(isset($_POST['submit'])){
            
            $error = false;
            
            $title = $_POST['title'];
            $tasktext = $_POST['task'];
            
            if(!Task::checkTitle($title)){
                $error_title = "Enter title for you task!";
                $error = true;
            }
            
            if(!Task::checkTask($tasktext)){
                $error_task = "You must write a task!";
                $error = true;
            }
            
            if($error == false){
                $result = $var = Task::editTask($info, $title, $tasktext);
            }    
        }
        
        require_once(ROOT.'/views/task/edit.php');
        return true;
    }
    
    //change status of the task
    public function actionStatus($info){
        
        $infoedit = Task::getInfo($info);
        Task::changeStatus($info);
        header('Location: http://youtask/index');
        return true;
      
    }
    
    public function actionCompleted($page = 1){
        
        $userId = User::checkLogged();
        
        $completedTask = Task::completedTasks($page);
        
        //$taskboard = Task::getTask(); //show by default
        $sort_by = isset($_POST['sort_by']) ? $_POST['sort_by'] : 'latest';

        if($sort_by == 'useremail'){
            $completedTask = Task::sortByEmailStatus($page);
        }
        if($sort_by == 'username'){
            $completedTask = Task::sortByNameStatus($page);
        }
       if($sort_by == 'latest'){
            $completedTask = Task::completedTasks($page);
        }
        
        require_once(ROOT.'/views/task/completed.php');
        return true;
    }  
}
