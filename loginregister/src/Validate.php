<?php
namespace Songjiangfeng\Loginregister;

final class  Validate{

   
    final  static function validate($user) {
        $username = $user['username'];
        $password = $user['password'];
        if (!self::checkusername($username)) {
            echo("Invalid username.");
            return false;
        }
        if (!self::checkpassword($password)) {
            echo("Password too short.");
            return false;
        }
        return true;
    }
   
   
    final  static function checkpassword($password) {
        return is_string($password) && strlen($password) >= 8;
    }

   
    final  static function checkusername($username) {
        return is_string($username) && preg_match('/^[a-zA-Z0-9_]{3,32}$/', $username);
    }
    
    //more rules
}