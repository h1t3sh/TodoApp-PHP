<?php

$sName = "localhost";
$uName = "phpdev";
$dbname = "todo_db";
$pass = "Password@123";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$dbname", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected";
    
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
} 

