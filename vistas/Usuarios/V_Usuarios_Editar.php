<script src="js/usuarios.js"></script>
<?php
foreach ($datos as $key => $usuarioDatos) {
    ?>
    <div class="card abs-center" style="margin-top: 1em">
        <div class="card-body">
            <div class="card-header align-content-center"><h5 >Editar datos del
                    usuario: &nbsp<?php echo $usuarioDatos['nombre']; ?> </h5></div>
            <form name="formularioModificarDatos" id="formularioModificarDatos" readonly class="form-control-plaintext"
            ">
            <div class="row mx-auto">
                <label for="fidUsuario"></label>
                <input type="hidden" name="fidUsuario" id="fidUsuario" class="form-control col-5"
                       value="<?php echo $usuarioDatos['id_Usuario']; ?>"/>
                <div class="col-md-6">
                    <label for="fnombre" id="labelForm">Nombre</label>
                    <input type="text" name="fnombre" id="fnombre" class="form-control col-5"
                           value="<?php echo $usuarioDatos['nombre']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="fapellido1">Primer apellido</label>
                    <input type="text" name="fapellido1" id="fapellido1" class="form-control col-5"
                           value="<?php echo $usuarioDatos['apellido1']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="fapellido2">Segundo Apellido</label>
                    <input type="text" name="fapellido2" id="fapellido2" class="form-control col-5"
                           value="<?php echo $usuarioDatos['apellido2']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="ffecha">Fecha de alta</label>
                    <input type="text" name="ffecha" id="ffecha" class="form-control col-5"
                           value="<?php echo $usuarioDatos['fecha_Alta']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="fgenero">Genero</label>
                    <select id="fgenero" name="fgenero" class="form-control col-5"
                            value="<?php echo $usuarioDatos['sexo']; ?>"/>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                    <option value="N">No especificar</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="fmail">Email:</label>
                    <input type="text" name="fmail" id="fmail" class="form-control col-5"
                           value="<?php echo $usuarioDatos['mail']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="fmovil">Telefono movil:</label>
                    <input type="text" name="fmovil" id="fmovil" class="form-control col-5"
                           value="<?php echo $usuarioDatos['movil']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="loginUser">Username:</label>
                    <input type="text" name="loginUser" id="loginUser" class="form-control col-5"
                           value="<?php echo $usuarioDatos['login']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="fpassword">Contraseña actual:</label>
                    <input type="text" name="fpassword" id="fpassword" class="form-control col-5"
                           value="<?php echo $usuarioDatos['password']; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="festado">Estado actual:</label>
                    <select id="festado" name="festado" class="form-control col-5"/>
                    <?php if ($usuarioDatos['activo'] == "S") {
                        echo '<option value="N">Inactivo</option>';
                        echo '<option value="S" SELECTED>Activo</option>';
                        echo '</select>';
                    } else {
                        echo ' <option value="S">Activo</option>
        <option value="N" selected>Inactivo</option>
        </select>';
                    }
                    ?>
                </div>
                <br>
            </div>

            <button type="button" onclick="actualizar();" class="btn btn-primary float-sm-right ">Guardar</button>
        </div>
    </div>
    </form>

    <?php
} ?>