<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>

<div class="row">
    
    <div>
        <h1 class="page-header">Listado De Usuarios</h1>
    </div>
</div>
<div class="row">
    <div class="col">

        <div class="row">
            <div class="col-lg-12">
                <form action="<?php base_url() ?>/usuario/search" method="get">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" <?php if (isset($query) == true) : ?> value = "<?=$query?><?php endif;?>" name="query" placeholder="Buscar...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                            </button>
                    </span>
                </div>
                </form>

                <br>
                <?php if (session('msg') !== null) : ?>
                <div class="alert alert-success"> <?= session('msg'); ?></div>
                <?php endif; ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Usuarios
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Rol</th>
                                        <th>Matrícula</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $key => $usuarios) { ?>
                                    <tr>
                                        <td>
                                            <?= $usuarios["nombre"] ?>
                                        </td>
                                        <td>
                                            <?= $usuarios["correo"] ?>
                                        </td>
                                        <td>
                                            <?= $usuarios["telefono"] ?>
                                        </td>
                                        <td>
                                            <?= $usuarios["rol"] ?>
                                        </td>
                                        <td>
                                            <?= $usuarios["matricula"] ?>
                                        </td>

                                        <td> <a class="btn btn-primary"
                                                href="<?php base_url(); ?>/usuarios/editar/<?php echo $usuarios["id"] ?>">Editar</a>
                                        </td>
                                        <td> <a class="btn btn-primary"
                                                href="<?php base_url(); ?>/capacitaciones/<?php echo $usuarios["id"] ?>">Capacitaciones</a>
                                        </td>
                                        <td><a class="btn btn-danger btn-eliminar" data-id="<?= $usuarios["id"] ?>"><i
                                                    class="fa fa-trash"></i></a></td>
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
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php base_url(); ?>/usuarios/agregar">Agregar</a>

            </div>
        </div>
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
                console.log(id);

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