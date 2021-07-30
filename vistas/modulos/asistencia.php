<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    REGISTRO DE ASISTENCIA
    </h1>
    
    <?php
     echo'
      <div>'.$_SESSION["fecha"].'</div>';
    ?>
    <ol class="breadcrumb">

      <li><a href="asistencia"><i class="fa fa-dashboard"></i>Asistencia</a></li>

    </ol>

  </section>
  <!-- content-body -->
  <section class="content">
    <!--=====================================
      REGISTRO ASISTENCIA INGRESO
      ======================================-->

      <?php 

           $item = "ASI_FECHA";
           $valor = $_SESSION["fecha"];
           $item2 = "USU_ID";
           $valor2 = $_SESSION["id"];

           $resultado = ControladorAsistencia::ctrTraerFecha($item, $valor, $item2, $valor2);
           
                       if($_SESSION["id"] != 2){
				if(!$resultado){
		                   $item3 = null;
		                   $valor3 = null;
		                   $usuario = ControladorUsuarios::ctrMostrarUsuarios($item3, $valor3);

		                   foreach ($usuario as $key => $value) {
		                      if ($value["USU_ESTADO"] == 1 && $value["USU_ID"] != 2) {
		                        $valor4 = $value["USU_ID"];
		                        ControladorAsistencia::ctrRegistrofechaDiaria($valor4);
		                      }
		                      
		                   }

		                }			
			}
      ?>
      <?php
        echo '<div class="box box-success">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-lg-6">
                              <form role="form" method="post">
                                <div class="input-group">
                                  <div class="input-group-btn">';

                                    if($resultado["ASI_HORA_INGRESO"]=="" || $resultado["ASI_HORA_INGRESO"]=="00:00:00"){

                                      echo '<button class="btn btn-success btn-lg boton" id="boton"  onclick="registrarHora();">

                                        <i class="fa fa-sign-in"></i>
                                        <span>INGRESO</span>
                      
                                      </button>';

                                    }else{

                                      echo '<button class="btn btn-default btn-lg" disabled="true">

                                        <i class="fa fa-sign-in"></i>
                                        <span>INGRESO</span>
                      
                                      </button>';

                                    }
                                      
                                  echo '</div>

                                  <div class="col-lg-6">

                                        <input type="text" value="'.$resultado["ASI_HORA_INGRESO"].'" class="form-control input-lg" id="ingreso" name="ingreso" readonly style="text-align: center; font-size: 22pt;">

                                  </div>

                                </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>';
      ?>          
      <?php
          //REGISTRO HORA SALIDA
          echo '
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" method="post">
                                  <div class="input-group">
                                    <div class="input-group-btn">';

                                      if($resultado["ASI_HORA_INGRESO"] != "00:00:00"){

                                        if ($resultado["ASI_HORA_SALIDA"] =="" || $resultado["ASI_HORA_SALIDA"] =="00:00:00") {
                                          echo '<button class="btn btn-info btn-lg botonSalir" id="botonSalir" name="botonSalir" onclick="registrarHoraSalida();">

                                                    <i class="fa fa-sign-out"></i>
                                                    <span>SALIDA</span>
                                                
                                              </button>';
                                        }else{

                                          echo '<button class="btn btn-default btn-lg botonSalir" id="botonSalir" name="botonSalir" onclick="registrarHoraSalida();" disabled="true">

                                                <i class="fa fa-sign-out"></i>
                                                <span>SALIDA</span>
                              
                                              </button>';

                                        }                

                                      }else{

                                        echo '<button class="btn btn-default btn-lg botonSalir" id="botonSalir" name="botonSalir" onclick="registrarHoraSalida();" disabled="true">

                                                <i class="fa fa-sign-out"></i>
                                                <span>SALIDA</span>
                              
                                              </button>';

                                      }

                                    echo '</div>

                                    <div class="col-lg-6">
                                          <input type="text" value="'.$resultado["ASI_HORA_SALIDA"].'" class="form-control input-lg" readonly style="text-align: center; font-size: 22pt;" id="Horasalida" name="Horasalida">
                                          <input type="hidden" id="HoraSalidaOculto" name="HoraSalidaOculto" value="">
                                    </div>

                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>'; 
      ?>     

        <div class="box box-warning" id="justificarText">
          <div class="box-body">
              <div class="row">
                  <div class="col-lg-6">
                      <form role="form" method="post">
                          <?php   echo'
                           <input type="date" name="fechaJustificar" id="fechaJustificar" max="'.$_SESSION["fecha"].'" value="'.$_SESSION["fecha"].'">';
                           ?>
                           <div class="form-group">
                              <label for="justificar">Justificar <sub>(En caso de no poder presentarse)</sub></label>
                              <textarea class="form-control" rows="5" id="justificar" name="justificar"></textarea>
                              <input type="hidden" id="justificarOculto" name="justificarOculto" value="0">
                            </div>
                            <button class="btn btn-warning" id="botonJustificar">
                                  <span>ENVIAR</span>                             
                            </button>

                      </form>
                  </div>
              </div>
          </div>
        </div>

        <!--=====================================
        REGISTRO JUSTIFICACIÓN
        ======================================-->
        <?php

          $justificacion = new ControladorAsistencia();
          $justificacion -> ctrRegistroJustificacion();

        ?>    
      
  </section>


</div>
<!-- content-wrapper -->

  
