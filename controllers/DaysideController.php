<?php

class DaysideController {
    
    public function actionIndex(){
        require_once (ROOT.'/dayside-master/index.php');
        return true;
    }
}
