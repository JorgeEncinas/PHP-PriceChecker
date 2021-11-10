<?php
    $connectIP = "localhost";
    $dbname = "";
    $username = "";
    $passwd = "";
    $port = 3306;
    error_reporting(0);
    $mysqlConn = new mysqli($connectIP, $username, $passwd, $dbname);
?>