<?php
$host = 'localhost';
$dbname = 'dynamic_one';
$username = 'root';
$password = 'root';
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
         // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
    // echo "Connected to <b>$dbname</b> at <b>$host</b> successfully.<br>";
} catch (PDOException $pe) {
    die("Could not connect to the database <b>$dbname</b> :" . $pe->getMessage());
}
