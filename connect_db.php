<?php
session_start();
//Los test se realizaron usando XAMPP, si su usuario y contraseña son diferentes debe cambiarlo.
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection

if (!$conn) {
    echo "Error: Unable to connect to MySQL" . "<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}
?>