<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     PRUEBA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="asistencia"><i class="fa fa-dashboard"></i>PRUEBA</a></li>
      
      <li class="active">Prueba</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <?php

        $item = "ASI_FECHA";
        $valor1 = "2019-12-06";
        $valor2 = "2019-12-09";


        $respuesta = ControladorAsistencia::ctrTraerFechaReporte($item, $valor1, $valor2);

        var_dump($respuesta);


       ?>


      </div>

    </div>

  </section>

</div>




