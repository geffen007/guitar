<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/application/Validate.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/init.php';


$tab = $_POST["tablature"];
$nome = $DB->real_escape_string($_POST["nome"]);
$user_id = $_SESSION["id"];

// $query = "INSERT INTO `amodio`.`compositions` (`composition`, `nome`) VALUES ('$tab', '$nome')";
$query = "INSERT INTO `amodio`.`compositions` (`user_id`, `composition`, `nome`) VALUES ('$user_id', '$tab', '$nome')";

if ($DB->RunQuery($query)){
  $_SESSION["risultato"] = "OK, TAB salvata";
} else{
  $_SESSION["risultato"] = "KO, errore";
}