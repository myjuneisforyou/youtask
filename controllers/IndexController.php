<?php

include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Task.php');

class IndexController{
    
    public function actionIndex($page = 1){
        
        $userId = User::checkLogged();
        
        $taskboard = Task::getTask($page); //show by default
        $sort_by = isset($_POST['sort_by']) ? $_POST['sort_by'] : 'latest';

        if($sort_by == 'useremail'){
            $taskboard = Task::sortByEmail($page);
        }
        if($sort_by == 'latest'){
            $taskboard = Task::getTask($page);
        }
        if($sort_by == 'username'){
            $taskboard = Task::sortByName($page);
        }
        if($sort_by == 'status'){
            $taskboard = Task::sortByStatus($page);
        }

        require_once (ROOT.'/views/index/index.php');
        return true;
    }
}
