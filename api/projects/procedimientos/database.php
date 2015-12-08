<?php
    function getConnection() {
    	$dbhost="localhost";
    	$dbuser="Ricardo";
    	$dbpass="12345";
    	$dbname="db_final";

    	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	return $dbConnection;
    }
?>
