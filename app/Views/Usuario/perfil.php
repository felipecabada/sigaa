<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>
<?php $session = session(); ?>


<div class="row">
  <div>
    <h1 class="page-header">Información </h1>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
      <?php if (session('msg') !== null) : ?>
      <div class="alert alert-success"> <?= session('msg') ?></div>
    <?php endif; ?>
        <h3 class="card-text">Nombre:
          <?php echo $usuario["nombre"] ?>
        </h3>
        <h5 class="card-text">Matrícula:
          <?php echo $usuario["matricula"] ?>
        </h5>
        <h5 class="card-text">Correo:
          <?php echo $usuario["correo"] ?>
        </h5>
        <h5 class="card-text">Correo Adicional:
          <?php echo $usuario["correo_adicional"] ?>
        </h5>
        <h5 class="card-text">Teléfono:
          <?php echo $usuario["telefono"] ?>
        </h5>
        <a class="btn btn-primary" href="/usuarios/editar/<?= $usuario["id"]?>">Actualizar Datos</a>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper --
    
<?php $this->endSection(); ?>