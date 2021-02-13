<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
	
require_once($_SERVER["DOCUMENT_ROOT"] . '/guitar/configuration.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/guitar/application/Database.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/guitar/application/Validate.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/guitar/application/DateTimeUtils.php');

$DB = new Database($DBHOST, $DBUSER, $DBPASS, $DBNAME);



