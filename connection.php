<?php

// Database connection
$host = 'localhost';
$username = 'root';
$password = 'qwerty12345#';
$dbname = 'login_info';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_errorno);
} 
?>
