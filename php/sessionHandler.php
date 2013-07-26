<?php
    if (isset($_GET["failedRegistration"])){
        #TODO nice error message
    }
    if (isset($_POST["register"])){
        global $lang;
        $user=$_POST["register"];
        $pass=$_POST["pass"];
        $attributes=array();
        $attributes["age"]=$_POST["age"];
        $attributes["gender"]=$_POST["gender"];
        $attributes["city"]=$_POST["city"];
        $attributes["country"]=$_POST["country"];
        $attributes["lang"]=$lang;
        if (register($user, $pass)){
            $_SESSION["USER_ID"]=$user;
            adduser($user, $attributes);
        }
        else {
            header("Location: ".$_SERVER['PHP_SELF']."?failedRegistration");
            exit;
        }
    }
    if (isset($_POST["login"])){
        $user=$_POST["login"];
        $pass=$_POST["pass"];
        if (checkLogin($user,$pass)){
            $_SESSION["USER_ID"]=$_POST["login"];
            setcookie("USER_ID", $user, time()+60*60*24*365);
            setcookie("USER_PASS", getUserPass($user), time()+60*60*24*365);
        }
        else {
            header("Location: ".$_SERVER['PHP_SELF']."?failedLogin=1");
            exit;
        }
    }
    if (isset($_GET["logout"])){
        $lang=null;
        if (isset($_SESSION["lang"])){
            $lang=$_SESSION["lang"];
        }
        session_destroy();
        setcookie("USER_ID", $user, time()-60*60*24*365);
        setcookie("USER_PASS", getUserPass($user), time()-60*60*24*365);
        if ($lang!=null){
            session_start();
            $_SESSION["lang"]=$lang;
        }
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    if (!isset($_SESSION["USER_ID"])&&!isset($_SESSION["TEMP_USER_ID"])){ //user not logged in
        if (!isset($_COOKIE["USER_ID"])){  //user hasn't got an account
            if (isset($_COOKIE["USER_PSERVER_ID"])){  //but has a temporary account
                if (userExists($_COOKIE["USER_PSERVER_ID"])){   //check that the temp account is valid
                    $_SESSION["TEMP_USER_ID"]=$_COOKIE["USER_PSERVER_ID"];
                }
                else {
                    setcookie("USER_PSERVER_ID", "", time()-60*60*24*365);  //invalidate temp account cookie
                }
            }
            if (!isset($_SESSION["TEMP_USER_ID"])) {  //no real or temp accounts found above->create temp account
                $_SESSION["TEMP_USER_ID"]=getRandomId();
                setcookie("USER_PSERVER_ID", $_SESSION["TEMP_USER_ID"], time()+60*60*24*365);
            }
        }
        else { //user has an account
            $user=$_COOKIE["USER_ID"];
            $pass=$_COOKIE["USER_PASS"];
            
            if (checkLoginFromCookie($user,$pass)){
                $_SESSION["USER_ID"]=$user;
            }
            else {
                unset($_COOKIE["USER_ID"]);
                unset($_COOKIE["USER_PASS"]);
                header("Location: ".$_SERVER['PHP_SELF']."?failedLogin=1");
                exit;
            }
        }
    }
    $static_home='static_parts/'.$lang.'/';
    if (isset($_SESSION["USER_ID"])) {
        $CURRENT_USER=$_SESSION["USER_ID"];
    }
    else if (isset($_SESSION["TEMP_USER_ID"])){
        $CURRENT_USER=$_SESSION["TEMP_USER_ID"];
    }
    else {
        header("Location: ".$_SERVER['PHP_SELF']."?failedLogin=1");
        exit;
    }
?>