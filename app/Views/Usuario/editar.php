<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>

<div class="col">
  <div class="row">
  <div>
    <h1 class="page-header">Datos Generales</h1>
  </div>
    <form action="<?php base_url(); ?>/usuario/update/<?= $usuario["id"] ?>" method="POST">

      <div class="form-group">
        <label>Nombre</label>
        <input class="form-control" value="<?=$usuario["nombre"]?>" name="nombre" placeholder="Su nombre">
        <p class='page-warning'><?=session("errors.nombre")?></p>
      </div>
      <div class="form-group">
        <label>Correo electronico</label>
        <input class="form-control" value="<?= $usuario["correo"] ?>" name="correo" placeholder="Correo institucional de ITSON">
        <p class='page-warning'><?= session('errors.correo') ?></p>
      </div>
      <div class="form-group">
        <label>Correo electronico adicional</label>
        <input class="form-control" value="<?= $usuario["correo_adicional"] ?>" name="correo_adicional" placeholder="Correo institucional de ITSON">
        <p class='page-warning'><?= session('errors.correo_adicional') ?></p>
      </div>
      <div class="form-group">
        <label>Telefono</label>
        <input class="form-control" value="<?= $usuario["telefono"] ?>" name="telefono" placeholder="Telefono de contacto">
        <p class='page-warning'><?= session('errors.telefono') ?></p>
      </div>
      
      <?php if ($_SESSION['rol'] == "admin") { ?>
        <div class="form-group">
        <label>Matricula</label>
        <input class="form-control" value="<?= $usuario["matricula"] ?>" name="matricula" placeholder="Matricula institucional de ITSON">
        <p class='page-warning'><?= session('errors.matricula') ?></p>
        </div>
      <?php  } ?>
      <div>
        <button class="btn btn-success" type="submit">Guardar</button> <a href ="<?php base_url();?>/usuario/perfil/<?=$usuario["id"]?>"class="btn btn-danger">Cancelar</a>
      </div>
    </form>
  </div>
</div>

<?php $this->endSection(); ?>