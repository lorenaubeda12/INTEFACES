<?php
?>
<div class="container-fluid">
    <div class="card abs-center" style="margin-top: 1em">
        <form id="formularioAñadir" name="formularioAñadir">
            <div class="card-body">
                <div class="card-header align-content-center"><h5>Añadir nuevo usuario</h5></div>
                <br>
                <div class="form-group">
                    <div class="row mx-auto">
                        <div class="col-md-6">
                            <label for="fnombre">Nombre*</label>
                            <input type="text" name="fnombre" id="fnombre" placeholder="Nombre completo" value=""
                                   class="form-control col-6 " required>
                        </div>
                        <div class="col-md-6">
                            <label for="fapellido1">Primer apellido*</label>
                            <input type="text" name="fapellido1" id="fapellido1" placeholder="Primer apellido" value=""
                                   class="form-control col-6 " required>
                        </div>
                        <div class="col-md-6">
                            <label for="fapellido2">Segundo apellido</label>
                            <input type="text" name="fapellido2" id="fapellido2" placeholder="Segundo apellido" value=""
                                   class="form-control col-6 ">
                        </div>
                        <div class="col-md-6">
                            <label for="ffecha">Fecha de alta</label>
                            <input type="date" name="ffecha" id="ffecha" placeholder="Fecha altual" value=""
                                   class="form-control col-6 ">
                        </div>
                        <div class="col-md-6">
                            <label for="fsexo">Genero*</label>
                            <select id="fsexo" name="fsexo" class="form-control col-6" required>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                                <option value="N" selected>No especificado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="fmail">Mail*</label>
                            <input type="text" name="fmail" id="fmail" placeholder="prueba@prueba.com" value=""
                                   class="form-control col-6 " required>
                        </div>
                        <div class="col-md-6">
                            <label for="fmovil">Movil</label>
                            <input type="text" name="fmovil" id="fmovil" placeholder="123456789" value=""
                                   class="form-control col-6 ">
                        </div>
                        <div class="col-md-6">
                            <label for="flogin">Username*</label>
                            <input type="text" name="flogin" id="flogin" placeholder="prueba123" value=""
                                   class="form-control col-6 " required>
                        </div>
                        <div class="col-md-6">
                            <label for="fpassword">Contraseña*</label>
                            <input type="text" name="fpassword" id="fpassword" placeholder="123ABC" value=""
                                   class="form-control col-6 " required>
                        </div>
                        <div class="col-md-6">
                            <label for="fpassword">Estado*</label>
                            <select id="factivo" name="factivo" class="form-control col-6" required>
                                <option value="S">activo</option>
                                <option value="N">inactivo</option>
                            </select>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="col clearfix" style="margin-top: 1rem">
                        <button type="button" class="btn btn-primary float-sm-right " onclick="añadirUsuario()">Enviar
                        </button>
                    </div>
                </div>
                <br>
            </div>
        </form>
    </div>
</div>