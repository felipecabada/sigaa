<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ITSON - SIGAA</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php base_url() ?>/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php base_url() ?>/dist/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php base_url() ?>/dist/css/timeline.css" rel="stylesheet">

    <!-- Template CSS -->
    <link href="<?php base_url() ?>/dist/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php base_url() ?>/dist/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php base_url() ?>/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Estilos de proyecto -->
    <link href="<?php base_url() ?>/dist/css/custom/style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/777822fdd5.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <header class="header navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="header__logo-container navbar-header">
                <img class="header__logo-img" src="<?php base_url(); ?>/dist/img/ITSON_negativo.png"
                    alt="Logo de universidad ITSON">
            </div>
            <div>
                <h2 class="header__title">Sistema Integral De Gestión Académica y Administrativa (SIGAA)</h2>
            </div>

            <div class="header__button">
                <div class="header__button-container">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">   
                    <ul class="nav" id="side-menu">

                        <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"]=="admin"){ ?>
                          <li>
                            <a href="<?php base_url(); ?>/menu" class="active"><i
                                    class="fa fa-home fa-fw"></i> Inicio</a>
                        </li>
                        <?php }else if(isset($_SESSION["rol"]) && $_SESSION["rol"] != "admin"){?>
                        <li>
                            <a href="<?php base_url(); ?>/capacitaciones" class="active"><i
                                    class="fa fa-home fa-fw"></i> Inicio</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_SESSION["rol"]) && $_SESSION['rol'] == "admin" && $_SESSION["menu"]==true) { ?>
                        <li>
                            <a href="<?php base_url(); ?> /usuarios/maestro"><i class="fa-solid fa-person-chalkboard"></i> Maestros</a>
                        </li>
                        <li>
                            <a href="<?php base_url(); ?> /home/proximo"><i class="fa-solid fa-graduation-cap"></i> Estudiantes</a>
                        </li> 
                        <li>
                            <a href="<?php base_url(); ?> /home/proximo"><i class="fa-solid fa-hand-holding-dollar"></i> Becas</a>
                        </li>
                        <li>
                            <a href="<?php base_url(); ?> /home/proximo"><i class="fa-solid fa-book"></i> Programas Educactivos</a>
                        </li> <?php  } ?>
                        <li>
                            <a href="<?php base_url(); ?>/usuario/perfil/<?= isset($_SESSION["rol"]) ? $_SESSION["id"] : ""?>"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="<?php base_url(); ?>/salir"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php $this->renderSection("contenido") ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php base_url() ?>/dist/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php base_url() ?>/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php base_url() ?>/dist/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php base_url() ?>/dist/js/startmin.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php $this->renderSection("js") ?>
</body>

</html>