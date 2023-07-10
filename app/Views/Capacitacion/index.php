<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>

<div class="row">
  <div>
    <h1 class="page-header">Listado De Capacitaciones</h1>
  </div>
</div>
<div class="row">

  <div class="col">
    <div class="row">


      <!-- /.col-lg-12 -->


      <!-- panels admin-->
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">

          <div class="panel-heading">

            <div class="row">
              <div class="col-xs-8 text-left">

                <div class="huge"><?php echo isset($horas["disciplinar"]) ? $horas["disciplinar"] : "0"  ?>/20</div>

                <div>Horas Disciplinar</div>
              </div>
              <div class="col-xs-3">
                <i class="fa fa-book-open fa-3x"></i>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">

          <div class="panel-heading">

            <div class="row">
              <div class="col-xs-8 text-left">
                <div class="huge"><?php echo isset($horas["docente"]) ? $horas["docente"] : "0" ?>/20</div>
                <div>Horas Docentes</div>
              </div>
              <div class="col-xs-3">
                <i class="fa fa-apple-whole fa-3x"></i>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- fin de panels admin-->

    </div>

    <?php if (session('msg') !== null) : ?>
      <div class="alert alert-success"> <?= session('msg') ?></div>
    <?php endif; ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Capacitaciones
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Lugar</th>
                    <th>Nombre del instructor</th>
                    <th>Fecha inicial</th>
                    <th>Fecha final</th>
                    <th>Organización</th>
                    <th>Modalidad</th>
                    <th>Horas</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($capacitaciones as $key => $capacitacion) { ?>
                    <tr>
                      <td>
                        <?= $capacitacion["titulo"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["tipo"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["lugar"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["nombre_instructor"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["fecha_inicial"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["fecha_final"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["institucion"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["modalidad"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["duracion_horas"] ?>
                      </td>
                      <td>
                        <?= $capacitacion["estado"] ?>
                      </td>
                      <td> <a class="btn btn-primary" href="<?php base_url(); ?>/capacitaciones/mostrar/<?= $capacitacion["id"] ?>">Ver</a>
                      </td>
                      <?php if ($_SESSION['rol'] != "admin") {  ?>
                        <td><a class="btn btn-danger btn-eliminar" data-id="<?= $capacitacion["id"] ?>"><i class="fa fa-trash"></i></a></td>

                      <?php         } ?>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-6 -->
    </div>
    <?php if ($_SESSION['rol'] != "admin") {  ?>
      <div class="row">
        <div class="col-lg-12">
          <a class="btn btn-success" href="<?php base_url(); ?>/capacitaciones/agregar">Agregar</a>

        </div>
      </div>
    <?php } ?>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>

<!-- /#page-wrapper -->

<?php $this->endSection(); ?>


<?php $this->section("js"); ?>
<script>
  $(document).ready(function() {
    function eliminar(id) {

      Swal.fire({
        title: '¿Estás seguro?',
        text: "Se borrará completamente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borralo!'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "<?= base_url(); ?>/capacitaciones/eliminar/" + id
        }
      })

    }
    $(".btn-eliminar").click(function() {

      var id = $(this).data("id");
      eliminar(id);


    });



  });
</script>



<?php $this->endSection(); ?>