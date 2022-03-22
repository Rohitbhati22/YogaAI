<?php

$username = 'root';
$dbname = 'yogaai';
$host = 'localhost';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);
   
if(! $conn ){
    die('Could not connect: ');
}
else {
}
?>