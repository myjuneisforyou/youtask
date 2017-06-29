<?php

include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Task.php');

class IndexController{
    
    public function actionIndex(){
        
        $userId = User::checkLogged();
        
        $taskboard = Task::getTask(); //show by default
        $sort_by = isset($_POST['sort_by']) ? $_POST['sort_by'] : 'latest';

        if($sort_by == 'useremail'){
            $taskboard = Task::sortByEmail();
        }
        if($sort_by == 'latest'){
            $taskboard = Task::getTask();
        }
        if($sort_by == 'username'){
            $taskboard = Task::sortByName();
        }
        if($sort_by == 'status'){
            $taskboard = Task::sortByStatus();
        }

        require_once (ROOT.'/views/index/index.php');
        return true;
    }
}
