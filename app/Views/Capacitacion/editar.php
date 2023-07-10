<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>
<!-- Page Content -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Editar Capacitación </h1>
        <div class="row">
            <div class="col-lg-6">
                <div>
                    <h1>Datos Generales</h1>
                </div>
                <div>
                    <form action="<?php base_url(); ?>/Capacitacion/update/<?php echo $capacitacion['id'] ?>"
                        method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Título </label>
                            <input class="form-control" value="<?= $capacitacion['titulo'] ?>" name="titulo"
                                placeholder="Título de la Capacitación">
                            <p class='page-warning'><?= session('errors.titulo') ?></p>
                            <?php if (session('tit') !== null):?>
                            <p class='page-warning'><?= session('tit') ?></p>
                            <?php endif; ?>
                        </div>
                        <div><label>Tipo de Capacitación</label></div>
                        <div class="form-group">
                            <?php if ($capacitacion["tipo"] == "Disciplinar") { ?>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" id="tipo" value="Disciplinar" checked>Disciplinar
                            </label>
                            <?php } else { ?>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" id="tipo" value="Disciplinar">Disciplinar
                            </label>
                            <?php } ?>

                            <?php if ($capacitacion["tipo"] == "Docente") { ?>

                            <label class="radio-inline">
                                <input type="radio" name="tipo" id="tipo" value="Docente" checked>Docente
                            </label>
                            <?php } else { ?>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" id="tipo" value="Docente">Docente
                            </label>
                            <?php } ?>
                            <p class='page-warning'><?= session('errors.tipo') ?></p>
                        </div>

                        <div><label>Modalidad</label></div>
                        <div class="form-group">
                            <?php if ($capacitacion["modalidad"] == "Presencial") { ?>
                            <label class="radio-inline">
                                <input type="radio" name="modalidad" id="modalidad" value="Presencial"
                                    checked>Presencial
                            </label>
                            <?php } else { ?>
                            <label class="radio-inline">
                                <input type="radio" name="modalidad" id="modalidad" value="Presencial">Presencial
                            </label>
                            <?php } ?>
                            <?php if ($capacitacion["modalidad"] == "Virtual") { ?>
                            <label class="radio-inline">
                                <input type="radio" name="modalidad" id="modalidad" value="Virtual" checked>Virtual
                            </label>
                            <?php } else { ?>
                            <label class="radio-inline">
                                <input type="radio" name="modalidad" id="modalidad" value="Virtual">Virtual
                            </label>
                            <?php } ?>
                            <p class='page-warning'><?= session('errors.modalidad') ?> </p>
                        </div>
                        <div class="form-group">
                            <label>Nombre del instructor </label>
                            <input class="form-control" name="nombre_instructor"
                                value="<?= $capacitacion['nombre_instructor'] ?>">
                            <p class='page-warning'><?= session('errors.nombre_instructor') ?> </p>
                            <?php if (session('nom') !== null):?>
                            <p class='page-warning'><?= session('nom') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Lugar </label>
                            <input class="form-control" name="lugar" value="<?= $capacitacion['lugar'] ?>"
                                placeholder="Localidad donde se imparte">
                            <p class='page-warning'><?= session('errors.lugar') ?> </p>
                        </div>
                        <div class="form-group">
                            <label>Horas de la capacitación </label>
                            <input class="form-control" name="duracion_horas"
                                value="<?= $capacitacion['duracion_horas'] ?>"
                                placeholder="Duración de la capacitación en horas">
                            <p class='page-warning'><?= session('errors.duracion_horas') ?> </p>
                        </div>
                        <div class="form-group">
                            <label>Fecha de inicio</label>
                            <input class="form-control" value="<?= $capacitacion['fecha_inicial'] ?>"
                                name="fecha_inicial" type="date">
                            <p class='page-warning'><?= session('errors.fecha_inicial') ?> </p>
                            <?php if (session('fec') !== null):?>
                            <p class='page-warning'><?= session('fec') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Fecha del final</label>
                            <input class="form-control" value="<?= $capacitacion['fecha_final'] ?>" name="fecha_final"
                                type="date">
                            <p class='page-warning'><?= session('errors.fecha_final') ?> </p>
                        </div>
                        <div class="form-group">
                            <label>Organización</label>
                            <input class="form-control" value="<?= $capacitacion['institucion'] ?>" name="institucion"
                                placeholder="Institución donde se imparte">
                            <p class='page-warning'><?= session('errors.institucion') ?> </p>
                        </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <h1>Evidencia</h1>
                </div>
                <div>
                    <p>Archivos tipo PDF,JPG,PNG. Tamaño máximo 5MB</p>
                </div>

                <div class="form-group">
                    <h3><?php echo $capacitacion["evidencia"] ?></h3>
                </div>
                <div class="form-group">
                    <input type="file" name="evidencia" class="fa fa-file">
                </div>
                <p class='page-warning'><?= session('errors.evidencia') ?> </p>
                <div><button class="btn btn-success" type="submit">Guardar</button> <a
                        href="<?php base_url();?>/capacitaciones/<?=$capacitacion["id_usuario"]?>"
                        class="btn btn-danger">Cancelar</a> </div>
            </div>
            </form>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php $this->endSection(); ?>