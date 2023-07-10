<?php $this->extend("General"); ?>

<?php $this->section("contenido"); ?>

<!-- Page Content -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Menu Principal</h1>
  </div>
  <!-- /.col-lg-12 -->
  
</div>
<!-- /.row -->
<div class="row">

  <div class="col-xs-12 col-sm-4">
    <a href="<?php base_url();?>/usuarios/maestro" class="btn btn-lg btn-block btn-primary">
      <div class="btn-icon"><i class="fa fa-chalkboard-teacher fa-2x"></i></div>
      <div class="btn-title">Maestros</div>
    </a>
  </div>
  <div class="col-xs-12 col-sm-4">
    <a href="<?php base_url();?>/home/proximo" class="btn btn-lg btn-block btn-primary">
      <div class="btn-icon"><i class="fa fa-user-graduate fa-2x"></i></div>
      <div class="btn-title">Estudiantes</div>
    </a>
  </div>
  <div class="col-xs-12 col-sm-4">
    <a href="<?php base_url();?>/home/proximo" class="btn btn-lg btn-block btn-primary">
      <div class="btn-icon"><i class="fa fa-graduation-cap fa-2x"></i></div>
      <div class="btn-title">Becas</div>
    </a>
  </div>
  <div class="col-xs-12 col-sm-4">
    <a href="<?php base_url();?>/home/proximo" class="btn btn-lg btn-block btn-primary">
      <div class="btn-icon"><i class="fa fa-book fa-2x"></i></div>
      <div class="btn-title">Programas educativos</div>
    </a>
  </div>

</div>


<?php $this->endSection(); ?>