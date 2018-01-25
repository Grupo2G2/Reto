<div>
	

	<!--------------------CENTRO-------------------->

	<?php

		//SI HAY CENTROS
		if ($centros){

			//CREA UNA TABLA DE CENTROS
			echo "<table id='tabla_centros' border='1'>
				  	<tr>
				  		<th>Centro</th>
				  		<th>Acciones</th>
				  	</tr>";

			//RELLENA LA TABLA CON CENTROS
			foreach ($centros->result() as $centro) {
				echo "<tr>
						<td value='$centro->ID_Centro'>$centro->DESC_Centro</td>
						<td>
							<a href='Centro/editar_centro/$centro->ID_Centro'><input type='button' value='Editar'></a>
							<a href='Centro/borrar_centro/$centro->ID_Centro'><input type='button' value='Borrar'></a>
						</td>
					</tr>";
			}

			echo "</table>";			
		}

	?>	

	<!--------------------FIN CENTRO-------------------->
	
	

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

			//REDIRIGE A LA FUNCIÓN DE "CENTRO.PHP" "NUEVO_CENTRO" QUE LLAMA A LA VISTA "NUEVO_CENTRO.PHP".
			window.location.href = "Centro/nuevo_centro";

	    });

		/*----------FIN AL CLICAR EN EL BOTÓN AÑADIR NUEVO----------*/

	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->
