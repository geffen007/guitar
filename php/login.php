<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/application/Validate.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/init.php';

if (isset($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];   
    
    $sqluser = "SELECT * from users WHERE username = '$username'";

    $userDB = $DB->GetSingleRow($sqluser);
   
    if(!empty($userDB)){
        $passDB = $userDB['password'];
        if(password_verify($password, $passDB)){
            $_SESSION['user'] = $userDB['username'];
            $_SESSION['id'] = $userDB['id'];
            $_SESSION['risultato'] = "OK, Login effettuato";
            header("location: /guitar/");
        }else{
            $_SESSION['risultato'] = "KO, Password errata";
            header("location: /guitar/views/login.php");
        }
    }else{
        $_SESSION['risultato'] = "KO, Username non Valido";
        header("location: /guitar/views/login.php");
    }
  
}




