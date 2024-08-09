<?php
$host = 'localhost';
$dbname = 'surveydb';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password); // For MySQL
    // $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password); // For PostgreSQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die(); // Stop the script if a connection error occurs
}
?>
