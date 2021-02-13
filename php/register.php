<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/application/Validate.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/init.php';


if (isset($_POST)) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $passHash = password_hash($password, PASSWORD_BCRYPT);

  $query = "INSERT INTO `amodio`.`users` (`username`, `password`) VALUES ('$username', '$passHash')";

  // if(preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) { 
    if($DB->RunQuery($query)){
      $_SESSION["user"] = $username;
      $_SESSION["risultato"] = "OK, Registrazione andata a buon fine, sei loggato";
      $_SESSION["id"] = $DB->GetInsertId();
      header("location: /APP2/");
    }else {
      if (strpos($DB->GetLastError(), "Duplicate") !== FALSE){
        $_SESSION["risultato"] = "KO, username già esistente";
        header("location: /APP2/");
      }
      $_SESSION["risultato"] = "KO, Suca";
      header("location: /APP2/");
    };

  // }else{
  //   $_SESSION["risultato"] = "KO, username non valido";
  //   header("location: /APP2/");
  // }

}




