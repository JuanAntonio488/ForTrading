<?php

include "connect_db.php";
$dataBase_selection = "USE forTrading_Test;";
mysqli_query($conn, $dataBase_selection);

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM persons WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
