<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      HISTORIAL DE ASISTENCIA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="asistencia"><i class="fa fa-dashboard"></i>Asistencia</a></li>
      
      <li class="active">Historial Asistencia</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row" style="margin: auto">
      <div class="col-md-12">
        
        <div class="form-inline" >
            <label style="padding-left: 10px;">Fecha Inicio</label>
            <div class="input-group mb-2 mr-sm-2">  
              <input type="date" id="ReporteFechaInicio" min="2019-10-24" <?php echo 'max="'.$_SESSION["fecha"].'"'?> class="form-control" name="ReporteFechaInicio">
            </div>

            <label style="padding-left: 10px;">Fecha Fin</label>
            <div class="input-group mb-2 mr-sm-2">  
              <input type="date" id="ReporteFechaFin" min="2019-10-24" <?php echo 'max="'.$_SESSION["fecha"].'"'?> <?php echo 'value="'.$_SESSION["fecha"].'"'?> class="form-control" name="ReporteFechaFin">
            </div>

            <button style="margin: 10px" onclick="botonReporteAsistenciaMes()" class="btn btn-primary mb-2">Generar reporte</button>
        </div>

      </div>
    </div>

    <br>

    <div class="box">

      <div class="box-body">
        
       <table class="table table-bordered table-striped" id="tablaHistorial" class="display nowrap" style="width:100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Empleado</th>
           <th>Hora ingreso</th>
           <th>Hora salida</th>
           <th>Justificación</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;
        $item2 = null;
        $valor2 = null;

        $registro = ControladorAsistencia::ctrTraerFecha($item, $valor, $item2, $valor2);


       foreach ($registro as $key => $value){

          $item3 = "USU_ID";
          $valor3 = $value["USU_ID"];

          $usuario = ControladorUsuarios::ctrMostrarUsuarios($item3, $valor3);
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["ASI_FECHA"].'</td>
                  <td>'.$usuario["USU_NOMBRES"].'</td>';

                  if($value["ASI_ESTADO"] == 0){
                    echo '<td style="color:red;" id="horaIngreso'.$value["ASI_ID"].'">'.$value["ASI_HORA_INGRESO"].'</td>';
                  }else{
                    echo '<td>'.$value["ASI_HORA_INGRESO"].'</td>';
                  }

            echo '<td>'.$value["ASI_HORA_SALIDA"].'</td>
                  <td>'.$value["ASI_OBSERVACION"].'</td>';

          echo '  <td>

                    <div class="btn-group">';

                      if($value["ASI_ESTADO"] == 0){
                          echo '<button class="btn btn-info btnJustificar" idRegistro="'.$value["ASI_ID"].'"><i class="fa fa-check"></i></button>';
                      }else{
                          echo '<button class="btn btn-default" disabled=true><i class="fa fa-check"></i></button>';
                      }
                        
                      echo '<button class="btn btn-warning btnEditarJustificar" idRegistro="'.$value["ASI_ID"].'" data-toggle="modal" data-target="#modalEditarJustificar"><i class="fa fa-pencil"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR JUSTIFICACIÓN
======================================-->

<div id="modalEditarJustificar" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar justificación</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil fa-2x"></i></span> 

                <textarea class="form-control" rows="5" id="editarJustificar" name="editarJustificar" value></textarea>
                <input type="hidden" id="editarJustificarOculto" name="editarJustificarOculto" value="">

              </div>

            </div>
          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar justificación</button>

        </div>

        <?php

          $editarJustificar = new ControladorAsistencia();
          $editarJustificar -> ctrActualizarJustificacion();

        ?> 

      </form>

    </div>

  </div>

</div>



