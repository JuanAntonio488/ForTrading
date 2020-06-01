<?php include("db.php"); ?>
<?php include("include/header.php"); ?>

<div class = "container p-4">
    <div class = "row">
        <div class = "col-md-4">

        <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php session_unset(); } ?>

            .<div class = "card card-body">
                <form action="save_tasks.php" method="POST">
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
                    <input type="submit" class="btn btn-success btn-block" name="save_tasks" value="Enviar">
                </form>
            </div>
        </div>

        <div class = "col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">Identificador</th>
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Apellido</th>
                        <th style="text-align:center;">Genero</th>
                        <th style="text-align:center;">Fecha de Nacimiento</th>
                        <th style="text-align:center;">Estado Civil</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "connect_db.php";
                        $dataBase_selection = "USE forTrading_Test;";
                        mysqli_query($conn, $dataBase_selection);

                        $query = "SELECT * FROM persons;";
                        $result = mysqli_query($conn,$query);
                        

                        while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['birthday'] ?></td>
                            <td><?php echo $row['partner_status'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="material-icons">edit</i>
                                <a href="delete_tasks.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="material-icons">delete</i>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php 
session_unset();
session_destroy();
 ?>
<?php include("include/footer.php"); ?>

