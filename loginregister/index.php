<?php

require __DIR__ . '/vendor/autoload.php';

use Songjiangfeng\Loginregister\Auth;
use Songjiangfeng\Loginregister\Validate;

$users = [
    ['username'=>'',
    'password'=>'12345678'],
    ['username'=>'sam',
    'password'=>''],
    ['username'=>'sam',
    'password'=>'12345678']
];
 

$case1 = Validate::validate($users[0]);
$case2 = Validate::validate($users[1]);
$case3 = Validate::validate($users[2]);


var_dump($case1);
var_dump($case2);
var_dump($case3);
$username = "jiangfeng";
$password = "12345678";
Auth::register($username, $password);
Auth::login($username, $password);

