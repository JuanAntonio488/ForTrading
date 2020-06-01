<?php
include "connect_db.php";
$dataBase_selection = "USE forTrading_Test;";
mysqli_query($conn, $dataBase_selection);


if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM persons WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $gender = $row['gender'];
      $birthday = $row['birthday'];
      $partner_status = $row['partner_status'];
    }
  }
  
  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $first_name= $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $gender= $_POST['gender'];
    $birthday= $_POST['birthday'];
    $partner_status= $_POST['ecivil'];
  
    $query = "UPDATE persons SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', birthday = '$birthday', partner_status = '$partner_status' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Datos actualizados correctamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: ../index.php');
  }
  ?>

  <?php include('../include/header.php'); ?>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <input type = "text" name="firstName" class="form-control" maxlength="20" placeholder="Nombre" autofocus required>
            </div>
            <div class="form-group">
                <input type = "text" name="lastName" class="form-control" maxlength="20" placeholder="Apellido" autofocus>
            </div>
            <div class="form-group"> <!-- GENERO-->
                <select name="gender" class="selectpicker form-control" required>
                    <option disabled selected value>Selecciona una opción</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
            </div>
            <div class="form-group"><!-- Nacimiento-->
                <input type="date" name="birthday" class="form-control" required>
            </div>
            <div class="form-group"><!-- Estado Civil-->
                <div id="chkLst">
                    <div>Estado</div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="ecivil" value="soltero" onclick="selectOnlyThis(this)">Soltero</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="ecivil" value="casado" onclick="selectOnlyThis(this)">Casado</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="ecivil" value="viudo" onclick="selectOnlyThis(this)">Viudo</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="ecivil" value="divorciado" onclick="selectOnlyThis(this)">Divorciado</label>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar">
        </form>
        </div>
      </div>
    </div>
  </div>
  <?php include('../include/footer.php'); ?>
  