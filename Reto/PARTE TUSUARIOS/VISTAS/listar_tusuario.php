<div>
	

	<!--------------------TIPO DE USUARIO-------------------->

	<?php

		//SI HAY TIPOS DE USUARIOS
		if ($tipos){

			//CREA UNA TABLA DE TIPOS DE USUARIOS
			echo "<table id='tabla_tipos' border='1'>
				  	<tr>
				  		<th>Tipo de usuario</th>
				  		<th>Acciones</th>
				  	</tr>";

			//RELLENA LA TABLA CON TIPOS DE USUARIOS
			foreach ($tipos->result() as $tipo) {
				echo "<tr>
						<td value='$tipo->ID_TUsuario'>$tipo->DESC_TUsuario</td>
						<td>
							<a href='TUsuario/editar_tusuario/$tipo->ID_TUsuario'><input type='button' value='Editar'></a>
							<a href='TUsuario/borrar_tusuario/$tipo->ID_TUsuario'><input type='button' value='Borrar'></a>
						</td>
					</tr>";
			}

			echo "</table>";			
		}

	?>	

	<!--------------------FIN TIPO DE USUARIO-------------------->
	
	

	<!-------------------------------------------------->



	<!--------------------BOTÓN AÑADIR NUEVO-------------------->
	
	
	<button id="botonAñadirNuevo">Añadir nuevo</button>
	

	<!--------------------FIN BOTÓN AÑADIR NUEVO-------------------->


</div>



<!-------------------------------------------------------------------->


<!----------SCRIPT---------->


<script>
	

	/*----------AL CARGAR EL DOCUMENTO----------*/

	$(document).ready(function(){		



		/*----------AL CLICAR EN EL BOTÓN AÑADIR NUEVO----------*/

		//CUANDO SE CLICA EN EL BOTÓN AÑADIR NUEVO.
		$("#botonAñadirNuevo").click(function(){

			//REDIRIGE A LA FUNCIÓN DE "TUSUARIO.PHP" "NUEVO_TUSUARIO" QUE LLAMA A LA VISTA "NUEVO_TUSUARIO.PHP".
			window.location.href = "TUsuario/nuevo_tusuario";

	    });

		/*----------FIN AL CLICAR EN EL BOTÓN AÑADIR NUEVO----------*/

	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->
