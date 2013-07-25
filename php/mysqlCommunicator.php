<?php

    $mysqli = new mysqli("127.0.0.1", "root", "123", "newSumOnline",3306);
    
    function userExists($userid) {
        global $mysqli;
        $res=$mysqli->query("SELECT username FROM users WHERE username='".$userid."'");
        if ($res->num_rows==0){
            return false;
        }
        return true;
    }
    
    function getRandomId() {
        $userid="tempUser:".rand(0,999999);
        while (userExists($userid)){
            $userid="tempUser:".rand(0,999999);
        }
        register($userid,"temp_account_password");
        return $userid;
    }
    
    function checkLogin($userid,$pass) {
        global $mysqli;
        
        $res=$mysqli->query("select username FROM users WHERE username='".$userid."' AND pass=MD5('".$pass."');");
        if ($res->num_rows==0){
            return false;
        }
        return true;
    }
    
    function register($userid,$pass){
        global $mysqli;
        adduser($userid,null);
        return $mysqli->query("insert into users values ('".$userid."',MD5('".$pass."'));");
    }
    
    function getUserPass($userid){
        global $mysqli;
        
        $res=$mysqli->query("select pass from users where username='".$userid."';");
        $row=$res->fetch_assoc();
        return $row['pass'];
    }
    
    function checkLoginFromCookie($userid,$pass){
        global $mysqli;
        
        $res=$mysqli->query("select username FROM users WHERE username='".$userid."' AND pass='".$pass."';");
        if ($res->num_rows==0){
            return false;
        }
        return true;
    }
?>  
