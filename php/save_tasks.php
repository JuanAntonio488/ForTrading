<?php
include "connect_db.php";
$dataBase_selection = "USE forTrading_Test;";
mysqli_query($conn, $dataBase_selection);

    if(isset($_POST['save_tasks'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $ecivil = $_POST['ecivil'];

        // echo $firstName . "<br>";
        // echo $lastName . "<br>";
        // echo $gender . "<br>";
        // echo $birthday . "<br>";
        // echo $ecivil . "<br>";

        $query = "INSERT INTO persons(first_name,last_name,gender,birthday,partner_status) VALUES('$firstName','$lastName','$gender','$birthday','$ecivil')";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query failed");
        }
        $_SESSION['message'] = 'Guardado';
        $_SESSION['message_type'] = 'success';  
        
        header("Location: ../index.php");
    }
?>