<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/application/Validate.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/init.php';


$tab = $_POST["tablature"];
$nome = $DB->real_escape_string($_POST["nome"]);
$user_id = $_SESSION["id"];

// $query = "INSERT INTO `guitar`.`compositions` (`composition`, `nome`) VALUES ('$tab', '$nome')";
$query = "INSERT INTO `guitar`.`compositions` (`user_id`, `composition`, `nome`) VALUES ('$user_id', '$tab', '$nome')";

if ($DB->RunQuery($query)){
  $_SESSION["risultato"] = "OK, TAB salvata";
} else{
  $_SESSION["risultato"] = "KO, errore";
}