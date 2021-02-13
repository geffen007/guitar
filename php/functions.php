<?php

function isLogged(){
    if (isset($_SESSION['user'])) {
        return true;
    }
}

function crumbs(){
    $link = $_SERVER["REQUEST_URI"];
    $crumbs = explode("/", $link);
  
    $arr = [];

    $page = $_SERVER['PHP_SELF'];
    $currentpage = ucwords(str_replace("-"," ",(basename($page,".php"))));
    $currentdir = ucwords(basename(dirname($page)));
    $topdir ="/" .basename(dirname(dirname($page)))."/";
    
    if ($currentpage != "Index"){
        echo $currentpage;
    }
}

function mycompositions(){
    global $DB;
    $arr =[];
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM compositions WHERE user_id = '$user_id'";
    $sql = "SELECT * FROM compositions";
    $rs = $DB->RawQuery($sql);
        while($t = $DB->FetchObject($rs)){
            // $arr[] = ['nome' => htmlspecialchars($t->nome), 'composizione' => $t->composition];
            $arr[] = ['id' => $t->id, 'nome' => htmlspecialchars($t->nome), 'composizione' => $t->composition];
        }
        return $arr;
    
}

function alert(){    
    if (isset($_SESSION["risultato"]) === true) {
        $res = $_SESSION["risultato"];
        if (strpos($res, "OK") !== FALSE) echo "<h3 style=\"background-color: #cfc\">".$res."</h3>";
        else if (strpos($res, "KO") !== FALSE) echo "<h3 style=\"background-color: #fcc\">".$res."</h3>";
        else echo "<h3>".$res."</h3>";   
        unset($_SESSION["risultato"]);
    }	
}

