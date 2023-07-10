
<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>

<!-- Page Content -->
<div class="row">
  <div>
    <h1 class="page-header">Datos Generales</h1>
  </div>
  <div class="col-lg-12">

    <div class="row">
      <div class="col-lg-6">
        <div>
          <h4>Titulo: <?= $capacitacion["titulo"] ?></h4>
        </div>
        <div>
          <h4>Tipo: <?= $capacitacion["tipo"] ?></h4>
        </div>
        <div>
          <h4>Lugar: <?= $capacitacion["lugar"] ?></h4>
        </div>
        <div>
          <h4>Fecha Inicial: <?= $capacitacion["fecha_inicial"] ?></h4>
        </div>
        <div>
          <h4>Fecha Final: <?= $capacitacion["fecha_final"] ?></h4>
        </div>
        <div>
          <h4>Institucion: <?= $capacitacion["institucion"] ?></h4>
        </div>
        <div>
          <h4>Modalidad: <?= $capacitacion["modalidad"] ?></h4>
        </div>
        <div>
          <h4>Horas: <?= $capacitacion["duracion_horas"] ?></h4>
        </div>
        <div>
          <h4>Nombre del instructor: <?= $capacitacion["nombre_instructor"] ?></h4>
        </div>
        <div><a href="<?php base_url(); ?>/capacitaciones/editar/<?= $capacitacion["id"] ?>" class=" btn btn-success">Editar</a></div>
      </div>
      <div class="col-lg-6">
        <div>
          <h2>Evidencia</h2>

          <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Ver evidencia  
      </button>

<!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Evidencia</h5>
      </div>
      <div class="modal-body">
      <div class="viewer">

      
       
      <img class="viewer-img" src="<?php base_url(); ?>/evidencias/<?= $capacitacion["evidencia"] ?>">
         
      <h class="modal-title" id="exampleModalLabel"></h5>
      <a href="<?php base_url(); ?>/evidencias/<?= $capacitacion["evidencia"] ?> " target= "_blank">
      </div>
      
      <div>
      <h4 class="modal-title" id="exampleModalLabel">Ver Archivo Completo</h5>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
        </div>
        <?php if ($_SESSION["rol"] == "admin" && $capacitacion["estado"] == "Enviado") { ?>
          <div><a href="/capacitaciones/estado/<?= $capacitacion["id"]?>/Aceptado" class="btn btn-success" type="submit">Aprobar <i class="fa-solid fa-check"></i></a>
            <a href="/capacitaciones/estado/<?= $capacitacion["id"]?>/Rechazado" class="btn btn-danger">Rechazar <i class="fa-solid fa-x"> </i></a >
          </div>
        <?php } ?>
      </div>
      </form>
    </div>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->


<?php $this->endSection(); ?>