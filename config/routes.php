<?php

return [
    
    'status/([0-9]+)'=>'task/status/$1',
    'edit/([0-9]+)'=>'task/edit/$1',
    
    'completed/page-([0-9]+)'=>'task/completed/$1',
    'completed'=>'task/completed',
    'create'=>'task/create',
    
    'index/page-([0-9]+)'=>'index/index/$1',
    'index'=>'index/index',
    
    'dayside-master'=>'dayside/index',
    
    'logout'=>'user/logout',
    'signup'=>'user/signup',
    ''=>'user/signin'
    ];
