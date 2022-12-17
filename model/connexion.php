<?php
session_start();
$servername = "localhost";
$database_name = 'cours_gstock';
$username = "root";
$password = "";

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);

} catch(Exception $e) {
    die("Erreur de connexion:" . $e->getMessage());
}