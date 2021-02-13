<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/init.php';

$id = $_GET["id"];

$sqluser = "SELECT `user_id` FROM `guitar`.`compositions` WHERE `id` = $id";

$usercomp = intval($DB->GetSingleValue($sqluser));

$currentUser = $_SESSION["id"];

if($currentUser === $usercomp){
  if(is_numeric($id)){
    $sql = "DELETE FROM `guitar`.`compositions` WHERE  `id`= $id";
    if ($DB->RunQuery($sql)){
      $_SESSION["risultato"] = "OK, TAB CANCELLATA";
    } else{
      $_SESSION["risultato"] = "KO, NON CANCELLATA";
    }
    header("location: /guitar/views/mycompositions.php");
  }
}else{
  $_SESSION["risultato"] = "KO, non è una tua composizione";
  header("location: /guitar/views/mycompositions.php");
}


