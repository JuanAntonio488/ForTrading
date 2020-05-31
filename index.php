<?php include("db.php"); ?>
<?php include("include/header.php"); ?>

<div class = "container p-4">
    <div class = "row">

        <div class = "col-md-4">
            .<div class = "card card-body">
                <form action="save_tasks.php" method="POST">
                    <div class="form-group">
                        <input type = "text" name="firstName" class="form-control" placeholder="Nombre" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type = "text" name="lastName" class="form-control" placeholder="Apellido" autofocus>
                    </div>
                    <div class="form-group"> <!-- GENERO-->
                        <select name="gender" class="selectpicker form-control" required>
                            <option disabled selected value>Selecciona una opción</option>
                            <option value="Female">Femenino</option>
                            <option value="Male">Masculino</option>
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
        </div>

    </div>
</div>
<?php include("include/footer.php"); ?>

