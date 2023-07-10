<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>

<div class="col">
    <div class="row">
        <div>
            <h1 class="page-header">Datos Generales</h1>
        </div>
        <form action="<?php base_url(); ?>/usuario/save" method="POST">

            <div class="form-group">
                <label>Nombre </label>
                <input class="form-control" value="<?= old('nombre') ?>" name="nombre" placeholder="Su nombre ">
                <p class='page-warning'><?= session('errors.nombre') ?></p>
                <?php if (session('nom') !== null):?>
                <p class='page-warning'><?= session('nom') ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Apellidos </label>
                <input class="form-control" value="<?= old('apellidos') ?>" name="apellidos"
                    placeholder="Sus apellidos">
                <p class='page-warning'><?= session('errors.apellidos') ?></p>
                <?php if (session('ape') !== null):?>
                <p class='page-warning'><?= session('ape') ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Correo electronico</label>
                <input class="form-control" value="<?= old('correo') ?>" name="correo"
                    placeholder="Correo institucional de ITSON">
                <p class='page-warning'><?= session('errors.correo') ?></p>
            </div>

            <div class="form-group">
                <label>Telefono</label>
                <input class="form-control" value="<?= old('telefono') ?>" name="telefono"
                    placeholder="Telefono de contacto">
                <p class='page-warning'><?= session('errors.telefono') ?></p>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input class="form-control" name="contrasena" placeholder="Ingrese una contraseña segura">
                <p class='page-warning'><?= session('errors.contrasena') ?></p>
            </div>

            <div class="form-group">
                <label>Verifique su contraseña</label>
                <input class="form-control" name="contrasena2" placeholder="Ingrese una contraseña segura">
            </div>
            <div> <label>Rol de Usuario</label></div>
            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="rol" value="Maestro">Maestro
                </label>
                <label class="radio-inline">
                    <input type="radio" name="rol" value="Estudiante">Estudiante
                </label>
                <p class='page-warning'><?= session('errors.rol') ?></p>
            </div>


            <div class="form-group">
                <label>Matricula (Sin ceros)</label>
                <input class="form-control" value="<?= old('matricula') ?>" name="matricula"
                    placeholder="Matricula institucional de ITSON">
                <p class='page-warning'><?= session('errors.matricula') ?></p>
            </div>

            <div>
                <button class="btn btn-success" type="submit">Guardar</button> <a href="<?php base_url();?>/usuarios"
                    class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php $this->endSection(); ?>