<?php

include "connect_db.php";

// Create database
$dataBase = "CREATE DATABASE IF NOT EXISTS forTrading_Test";
if (mysqli_query($conn, $dataBase)) {
//   echo "Database created successfully";
} else {
//   echo "Error creating database: " . mysqli_error($conn);
}

$dataBase_selection = "USE forTrading_Test;";
mysqli_query($conn, $dataBase_selection);

$tablePersons = "CREATE TABLE IF NOT EXISTS persons(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50),
    gender ENUM('M','F') NOT NULL,
    birthday DATE NOT NULL,
    partner_status ENUM('soltero','casado','viudo','divorciado') NOT NULL
)";
if(mysqli_query($conn, $tablePersons)){
    // echo "Table created successfully.";
} else{
    // echo "ERROR: Could not able to execute $tablePersons. " . mysqli_error($conn);
}

mysqli_close($conn);
unset($conn);

?>