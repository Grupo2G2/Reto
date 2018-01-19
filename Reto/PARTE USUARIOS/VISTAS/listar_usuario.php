<div>
	

	<!--------------------CENTRO-------------------->

	<?php

		//SI HAY CENTROS
		if ($centros){

			//CREA UN SELECT DE CENTROS PONIENDO "SELECCIONA CENTRO" COMO VALOR PRINCIPAL
			echo "<select id='select_centro'>
				  <option>Selecciona centro</option>";

			//RELLENA EL SELECT CON CENTROS
			foreach ($centros->result() as $centro) {
				echo "<option value='$centro->ID_Centro'>$centro->DESC_Centro</option>";
			}

			echo "</select>";			
		}


		//SI HAY TIPOS DE USUARIOS
		if ($tipos){

			//CREA UN SELECT DE TIPOS DE USUARIOS PONIENDO "SELECCIONA TIPO USUARIO" COMO VALOR PRINCIPAL
			echo "<select id='select_tipo'>
				  <option>Selecciona Tipo Usuario</option>";

			//RELLENA EL SELECT CON TIPOS DE USUARIOS
			foreach ($tipos->result() as $tipo) {
				echo "<option value='$tipo->ID_TUsuario'>$tipo->DESC_TUsuario</option>";
			}

			echo "</select>";			
		}

	?>	

	<!--------------------FIN CENTRO-------------------->


	<!-------------------------------------------------->


	<!--------------------BOTÓN MOSTRAR-------------------->
	
	
	<button id="botonMostrar">Mostrar</button>
	

	<!--------------------FIN BOTÓN MOSTRAR-------------------->


	<!-------------------------------------------------->


	<!--------------------TABLA USUARIOS-------------------->
 

	<table id="tabla_usuarios" border="1">
		<tr>
			<th>Centro</th>
			<th>Tipo Usuario</th>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Email</th>
			<th>DNI</th>
			<th>Acciones</th>
		</tr>
	</table>


	<!--------------------FIN TABLA USUARIOS-------------------->
	
	


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

		//VARIABLES TRAMPA PARA PODER USARLA AL HACER CLICK EN "MOSTRAR".
		var trampaCentro = false;
		var trampaTipo = false;


		/*----------AL CAMBIAR EL SELECT CENTRO----------*/

		//CUANDO SE CAMBIA EL SELECT CENTRO.
		$("#select_centro").change(function(){

			//SE PONE LA TRAMPA "CENTRO" A "TRUE" PORQUE SE LA MODIFICADO SELECT CENTRO.
			trampaCentro = true;

			//SE PONE LA TRAMPA "TIPO" A FALSE PARA QUE TENGAS QUE VOLVER A SELECCIONARLA.
		 	trampaTipo = false;


	    	//VACIA LAS FILAS DE LA TABLA DE USUARIOS.
	    	$(".contenido").remove();

		});

		/*----------FIN AL CAMBIAR EL SELECT CURSO----------*/


		/*--------------------------------------------------*/


		/*----------AL CAMBIAR EL SELECT TIPO----------*/

		//CUANDO SE CAMBIA EL SELECT TIPO.
		$("#select_tipo").change(function(){

			//SE PONE LA TRAMPA A "TRUE" PORQUE SE LA MODIFICADO SELECT TIPO.
			trampaTipo = true;			

		});

		/*----------FIN AL CAMBIAR EL SELECT TIPO----------*/


		/*--------------------------------------------------*/


		/*----------AL CLICAR EN EL BOTÓN MOSTRAR----------*/


		//CUANDO SE CLICA EN EL BOTÓN MOSTRAR.
		$("#botonMostrar").click(function(){


    		//SI NO SE HA SELECCIONADO CENTRO.
    		if(trampaCentro == false){

    			//MUESTRA MENSAJE DE ERROR.
    			alert("¡Selecciona un centro!");
    		}


    		//SI NO SE HA SELECCIONADO TIPO.
    		if(trampaTipo == false){

    			//MUESTRA MENSAJE DE ERROR.
    			alert("¡Selecciona un tipo de usuario!");
    		}

    		//SI SE HAN SELECCIONADO TODOS LOS PARÁMETROS.
    		else{

		    	//VACIA LAS FILAS DE LA TABLA DE MODULOS.
		    	$(".contenido").remove();


		    	//LLAMA A LA FUNCIÓN "OBTENER_TUSUARIOS" UTILIZANDO JSON.
		    	$.post({url: "<?php echo base_url(); ?>index.php/Usuario/obtener_usuarios",
		        datatype:"json",
	        	data:{'ID_Centro':$("#select_centro").val(),'ID_TUsuario':$("#select_tipo").val()},
		        success: function(devuelto){
		        $('#tabla_equipos').css("display","block");
		        
		        	var array=JSON.parse(devuelto);
		        	for (var i = 0; i < array.length; i++) {

		        	

		        		//VARIABLES QUE CONTIENEN LA RUTA DE BORRAR Y EDITAR.
		        		var url_borrar = "Usuario/borrar_usuario/"+array[i]['ID_Usuario'];
		        		var url_editar = "Usuario/editar_usuario/"+array[i]['ID_Usuario'];


		        		//RELLENA LA TABLA CON LOS USUARIOS.
		            	$('#tabla_usuarios').append($('<tr class="contenido"><td>'+$("#select_centro option:selected").text()+'</td><td>'+$("#select_tipo option:selected").text()+'</td><td>'+array[i]['User']+'</td><td>'+array[i]['Password']+'</td><td>'+array[i]['Nombre']+'</td><td>'+array[i]['Apellidos']+'</td><td>'+array[i]['Email']+'</td><td>'+array[i]['Dni']+'</td><td><a href='+url_editar+'><input type="button" value="Editar"></a><a href='+url_borrar+'><input type="button" value="Borrar"></a></td></tr>'));

		        	}
		    

		    	}});
	    	}

	    });

		/*----------FIN AL CLICAR EN EL BOTÓN MOSTRAR----------*/


		/*--------------------------------------------------*/


		/*----------AL CLICAR EN EL BOTÓN AÑADIR NUEVO----------*/

		//CUANDO SE CLICA EN EL BOTÓN AÑADIR NUEVO.
		$("#botonAñadirNuevo").click(function(){

			//REDIRIGE A LA FUNCIÓN DE "USUARIO.PHP" "NUEVO_USUARIO" QUE LLAMA A LA VISTA "NUEVO_USUARIO.PHP".
			window.location.href = "Usuario/nuevo_usuario";

	    });

		/*----------FIN AL CLICAR EN EL BOTÓN AÑADIR NUEVO----------*/



	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->
