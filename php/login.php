<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/application/Validate.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/init.php';

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
            header("location: /APP2/");
        }else{
            $_SESSION['risultato'] = "KO, Password errata";
            header("location: /APP2/views/login.php");
        }
    }else{
        $_SESSION['risultato'] = "KO, Username non Valido";
        header("location: /APP2/views/login.php");
    }
  
}




