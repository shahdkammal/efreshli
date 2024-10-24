<?php

$host = "localhost";
$dbname = "efreshli";
$username= "root";
$password="gue55me";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}
return $mysqli; 