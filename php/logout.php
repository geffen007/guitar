<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/init.php';

session_destroy();

header("location: /guitar/");
