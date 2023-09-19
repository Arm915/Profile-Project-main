<?php

$hostname = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'profile';
$conn = mysqli_connect($hostname,$user,$pass,$dbName);  

if (mysqli_connect_error()){ //for connection error finding
    die ('There was an error while connecting to database');
    }

?>