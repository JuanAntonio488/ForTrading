<?php
include "connect_db.php";

    if(isset($_POST['save_tasks'])){
        $firstName = $_POST['firstName'];
        $lasttName = $_POST['lastName'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $ecivil = $_POST['ecivil'];

        echo $firstName . "<br>";
        echo $lasttName . "<br>";
        echo $gender . "<br>";
        echo $birthday . "<br>";
        echo $ecivil . "<br>";

    }

?>