<header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="vistas/img/plantilla/logoAsitenciaPeque.png" class="img-responsive" style="padding:10px;width: 55px;height: 55px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			<img src="vistas/img/plantilla/logoAsistenciaLargo.png" class="img-responsive hidden-xs" style="padding:10px 0px;width: 180px;height: 55px">
			<p class="hidden-lg hidden-md" style="font-size: 30px">TÁLAMO</p>

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav" style="padding-top: 10px">
				
				<li>
					<span style="color: orange;"><FONT SIZE=4.5><?php  echo $_SESSION["nombre"];?></font></span>

				<li>

				<li><label style="margin-left: 5px; color: white"><FONT SIZE=4.5>|</FONT></label></li>

				<li>
					<button onclick="location.href='salir'" type="button" class="btn btn-link btn-xs" style="padding-top: 0;color: white; padding-right: 20px"><FONT SIZE=3>Salir</FONT></button>
				</li>

			</ul>

		</div>

	</nav>

 </header>

