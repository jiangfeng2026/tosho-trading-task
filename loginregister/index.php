<?php

require __DIR__ . '/vendor/autoload.php';

use Songjiangfeng\Loginregister\Auth;
use Songjiangfeng\Loginregister\Validate;
error_reporting(E_ERROR);
$users = [
    ['username'=>'',
    'password'=>'12345678'],
    ['username'=>'sam',
    'password'=>''],
    ['username'=>'sam',
    'password'=>'12345678']
];
 
$user = $users[2];
$auth = new Auth();
if(Validate::validate($user)){
    echo "validate success";
    $auth->register($user);
    $auth->login($user);
}else{
    echo "validate fail";
}



