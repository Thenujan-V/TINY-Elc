<?php
    $server = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database = 'tinyelectronics';
    $connection = '';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>