<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php
			if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li class="active">

				<a href="asistencia">

					<i class="fa fa-home"></i>
					<span>Asistencia</span>

				</a>

			</li>

			';


			}

			if($_SESSION["perfil"] == "Administrador"){

			echo '<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>

			<li>

				<a href="historial">

					<i class="fa fa-history"></i>
					<span>Historial Asistencia</span>

				</a>

			</li>';

			}


		?>

		</ul>

	 </section>

</aside>