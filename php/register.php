<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/application/Validate.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/init.php';


if (isset($_POST)) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $passHash = password_hash($password, PASSWORD_BCRYPT);

  $query = "INSERT INTO `guitar`.`users` (`username`, `password`) VALUES ('$username', '$passHash')";

  // if(preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) { 
    if($DB->RunQuery($query)){
      $_SESSION["user"] = $username;
      $_SESSION["risultato"] = "OK, Registrazione andata a buon fine, sei loggato";
      $_SESSION["id"] = $DB->GetInsertId();
      header("location: /guitar/");
    }else {
      if (strpos($DB->GetLastError(), "Duplicate") !== FALSE){
        $_SESSION["risultato"] = "KO, username già esistente";
        header("location: /guitar/");
      }
      $_SESSION["risultato"] = "KO, Suca";
      header("location: /guitar/");
    };

  // }else{
  //   $_SESSION["risultato"] = "KO, username non valido";
  //   header("location: /guitar/");
  // }

}




