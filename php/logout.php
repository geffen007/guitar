<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/init.php';

session_destroy();

header("location: /APP2/");
