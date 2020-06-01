<?php include("php/db.php"); ?>
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
                <form action="php/save_tasks.php" method="POST">
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
                                <label><input type="checkbox" name="ecivil" value="soltero" onclick="selectOnlyThis(this)" style="margin-right: 5px;">Soltero</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="ecivil" value="casado" onclick="selectOnlyThis(this)" style="margin-right: 5px;">Casado</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="ecivil" value="viudo" onclick="selectOnlyThis(this)" style="margin-right: 5px;">Viudo</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="ecivil" value="divorciado" onclick="selectOnlyThis(this)" style="margin-right: 5px;">Divorciado</label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_tasks" value="Enviar">
                </form>
            </div>
        </div>

        <div class = "col-md-8">
            <table class="table table-bordered table-responsive">
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
                        include "php/connect_db.php";
                        $dataBase_selection = "USE forTrading_Test;";
                        mysqli_query($conn, $dataBase_selection);

                        $query = "SELECT * FROM persons;";
                        $result = mysqli_query($conn,$query);
                        

                        while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td style="text-align:center;"><b><?php echo $row['id'] ?></b></td>
                            <td style="text-align:center;"><?php echo $row['first_name'] ?></td>
                            <td style="text-align:center;"><?php echo $row['last_name'] ?></td>
                            <td style="text-align:center;"><?php echo $row['gender'] ?></td>
                            <td style="text-align:center;"><?php echo $row['birthday'] ?></td>
                            <td style="text-align:center;"><?php echo $row['partner_status'] ?></td>
                            <td>
                                <div style="display:flex;">
                                    <div style="padding-right:8px;">
                                        <a href="php/edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary" style="background-color:#20B2AA !important; border-color:#20B2AA !important">
                                            <i class="material-icons" style="font-size: 20px;">edit</i>
                                        </a>
                                    </div>
                                    <div style="padding-left:8px;">
                                        <a href="php/delete_tasks.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                            <i class="material-icons" style="font-size: 20px;">delete</i>
                                        </a>
                                    </div>
                                </div>
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

