<?php session_start(); ?><!DOCTYPE html><html><head><meta charset="utf-8"><meta content="IE=edge"http-equiv="X-UA-Compatible"><title>TÁLAMO</title><meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"name="viewport"><link href="vistas/img/plantilla/logo-peque.png"rel="icon"><link href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css"rel="stylesheet"><link href="vistas/bower_components/font-awesome/css/font-awesome.min.css"rel="stylesheet"><link href="vistas/bower_components/Ionicons/css/ionicons.min.css"rel="stylesheet"><link href="vistas/dist/css/AdminLTE.css"rel="stylesheet"><link href="vistas/dist/css/skins/_all-skins.min.css"rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"rel="stylesheet"><link href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"rel="stylesheet"><link href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css"rel="stylesheet"><link href="vistas/plugins/iCheck/all.css"rel="stylesheet"><link href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css"rel="stylesheet"><link href="vistas/bower_components/morris.js/morris.css"rel="stylesheet"><script src="vistas/bower_components/jquery/dist/jquery.min.js"></script><script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script><script src="vistas/bower_components/fastclick/lib/fastclick.js"></script><script src="vistas/dist/js/adminlte.min.js"></script><script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script><script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script><script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script><script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script><script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script><script src="vistas/plugins/iCheck/icheck.min.js"></script><script src="vistas/plugins/input-mask/jquery.inputmask.js"></script><script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script><script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script><script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script><script src="vistas/bower_components/moment/min/moment.min.js"></script><script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script><script src="vistas/bower_components/raphael/raphael.min.js"></script><script src="vistas/bower_components/morris.js/morris.min.js"></script><script src="vistas/bower_components/chart.js/Chart.js"></script></head><body class="hold-transition login-page sidebar-collapse sidebar-mini skin-blue"><?php if(isset($_SESSION["iniciarSesion"])&&$_SESSION["iniciarSesion"]=="ok"){echo '<div class="wrapper">';include "modulos/cabezote.php";include "modulos/menu.php";if(isset($_GET["ruta"])){if($_GET["ruta"]=="asistencia"||$_GET["ruta"]=="usuarios"||$_GET["ruta"]=="historial"||$_GET["ruta"]=="salir"){include "modulos/".$_GET["ruta"].".php";}else{include "modulos/404.php";}}else{include "modulos/404.php";}include "modulos/footer.php";echo '</div>';}else{include "modulos/login.php";} ?><script src="vistas/js/plantilla.js"></script><script src="vistas/js/usuarios.js"></script><script src="vistas/js/asistencia.js"></script><script src="vistas/js/historial.js"></script></body></html>x|