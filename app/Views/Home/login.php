<!DOCTYPE html>
<html lang="en">
<?php session() ?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ITSON - Registro De Capacitaciones</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php base_url() ?>/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?php base_url() ?>/dist/css/metisMenu.min.css" rel="stylesheet">

  <!-- Timeline CSS -->
  <link href="<?php base_url() ?>/dist/css/timeline.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php base_url() ?>/dist/css/startmin.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="<?php base_url() ?>/dist/css/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?php base_url() ?>/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Estilos de proyecto -->
  <link href="<?php base_url() ?>/dist/css/custom/style.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.../assets/js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
  <div class="container-fluid">
    <header class="header navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="header__logo-container navbar-header">
        <img class="header__logo-img" src="<?php base_url(); ?>/dist/img/ITSON_negativo.png" alt="Logo de universidad ITSON">
      </div>
    </header>

    <div class="row ">

      <div class="col-md-4 col-md-offset-4">

        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Inicia Sesión</h3>
          </div>
          <div class="panel-body ">

            <form action="<?php base_url(); ?>/iniciar-sesion" method="POST">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" value='<?= old('matricula') ?>' placeholder="Ingresa tu Matrícula" name="matricula" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Contraseña" name="password" type="password">
                </div>
                <?php if (!null == (session('errors.matricula') or !null == (old('errors.password')))) : ?><p>La matrícula o contraseña son incorrectos </p><?php endif; ?>
                  
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php base_url() ?>/dist/js/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php base_url() ?>/dist/js/bootstrap.min.js"></script>

  <!--   Metis Menu Plugin JavaScript -->
  <script src="<?php base_url() ?>/dist/js/metisMenu.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="<?php base_url() ?>/dist/js/startmin.js"></script>


</body>

</html>