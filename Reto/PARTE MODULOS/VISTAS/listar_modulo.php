<div>
	

	<!--------------------CURSO-------------------->

	<?php

		//SI HAY CURSOS
		if ($cursos){

			//CREA UN SELECT DE CURSOS PONIENDO "SELECCIONA CURSO" COMO VALOR PRINCIPAL
			echo "<select id='select_curso'>
				  <option>Selecciona curso</option>";

			//RELLENA EL SELECT CON CURSOS
			foreach ($cursos->result() as $curso) {
				echo "<option value='$curso->ID_Curso'>$curso->COD_Curso</option>";
			}

			echo "</select>";			
		}

	?>	

	<!--------------------FIN CURSO-------------------->
	
	


	<!-------------------------------------------------->




	<!--------------------CENTRO-------------------->


	<select id="select_centro">

		<option value="0">Selecciona Centro</option>

	</select>


	<!--------------------FIN CENTRO-------------------->
	


	
	<!-------------------------------------------------->
	


	
	<!--------------------CICLO-------------------->


	<select id="select_ciclo">

		<option value="0">Selecciona Ciclo</option>

	</select>


	<!--------------------FIN CICLO-------------------->
	
	


	<!-------------------------------------------------->


	<!--------------------BOTÓN MOSTRAR-------------------->
	
	
	<button id="botonMostrar">Mostrar</button>
	

	<!--------------------FIN BOTÓN MOSTRAR-------------------->


	<!-------------------------------------------------->


	<!--------------------TABLA MODULOS-------------------->
 

	<table id="tabla_modulos" border="1">
		<tr>
			<th>Curso</th>
			<th>Centro</th>
			<th>Ciclo</th>
			<th>Modulo</th>
			<th>Acciones</th>
		</tr>
	</table>


	<!--------------------FIN TABLA MODULOS-------------------->
	
	


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
		var trampaCurso = false;
		var trampaCentro = false;
		var trampaCiclo = false;


		/*----------AL CAMBIAR EL SELECT CURSO----------*/

		//CUANDO SE CAMBIA EL SELECT CURSO.
		$("#select_curso").change(function(){

			//SE PONE LA TRAMPA "CURSO" A "TRUE" PORQUE SE LA MODIFICADO SELECT CURSO.
			trampaCurso = true;

			//SE PONEN LAS TRAMPAS "CENTRO" Y "CICLO" A FALSE PARA QUE TENGAS QUE VOLVER A SELECCIONARLAS.
		 	trampaCentro = false;
		 	trampaCiclo = false;

			//EL SELECT CENTRO SE VACIA.
	    	$("#select_centro").empty();


	    	//VACIA LAS FILAS DE LA TABLA DE MODULOS.
	    	$(".contenido").remove();


	    	//PONE COMO VALOR INICIAL EN EL SELECT CICLO "SELECCIONA CENTRO".
	    	$('#select_centro').append($('<option>Selecciona Centro</option>'));


	    	//LLAMA A LA FUNCIÓN "OBTENER_CENTROS" UTILIZANDO JSON QUE RELLENARÁ EL SELECT CURSO.
	    	$.post({url: "<?php echo base_url(); ?>index.php/Centro/obtener_centros",
	        datatype:"json",
	        data:{'ID_Curso':$("#select_curso").val()},
	        success: function(devuelto){
	        	var array=JSON.parse(devuelto);
	        	for (var i = 0; i < array.length; i++) {

	            	$('#select_centro').append($('<option>', {

	                	value: array[i]['ID_Centro'],
	                	text: array[i]['DESC_Centro']

	            	}));
	        	}
	    

	    	}});
		});

		/*----------FIN AL CAMBIAR EL SELECT CURSO----------*/


		/*--------------------------------------------------*/


		/*----------AL CAMBIAR EL SELECT CENTRO----------*/


		//CUANDO SE CAMBIA EL SELECT CENTRO.
		$("#select_centro").change(function(){

			//SE PONE LA TRAMPA A "TRUE" PORQUE SE LA MODIFICADO SELECT CENTRO.
			trampaCentro = true;


			//EL SELECT CICLO SE VACIA.
	    	$("#select_ciclo").empty();


	    	//VACIA LAS FILAS DE LA TABLA DE MODULOS.
	    	$(".contenido").remove();


	    	//PONE COMO VALOR INICIAL EN EL SELECT CICLO "SELECCIONA CICLO".
	    	$('#select_ciclo').append($('<option>Selecciona Ciclo</option>'));


	    	//LLAMA A LA FUNCIÓN "OBTENER_CICLOS" UTILIZANDO JSON QUE RELLENARÁ EL SELECT CENTRO.
	    	$.post({url: "<?php echo base_url(); ?>index.php/Ciclo/obtener_ciclos",
	        datatype:"json",
	        data:{'ID_Curso':$("#select_curso").val(), 'ID_Centro':$("#select_centro").val()},
	        success: function(devuelto){

	        	var array=JSON.parse(devuelto);
	        	for (var i = 0; i < array.length; i++) {
	            	$('#select_ciclo').append($('<option>', {

	                	value: array[i]['ID_Ciclo'],
	                	text: array[i]['COD_Ciclo']

	            	}));

	        	}
	    

	    	}});
		});

		/*----------FIN AL CAMBIAR EL SELECT CENTRO----------*/


		/*--------------------------------------------------*/


		/*----------AL CAMBIAR EL SELECT CICLO----------*/


		//CUANDO SE CAMBIA EL SELECT CICLO.
		$("#select_ciclo").change(function(){

			//SE PONE LA TRAMPA A "TRUE" PORQUE SE LA MODIFICADO SELECT CICLO.
			trampaCiclo = true;

		});

		/*----------FIN AL CAMBIAR EL SELECT CICLO----------*/


		/*--------------------------------------------------*/


		/*----------AL CLICAR EN EL BOTÓN MOSTRAR----------*/


		//CUANDO SE CLICA EN EL BOTÓN MOSTRAR.
		$("#botonMostrar").click(function(){


    		//SI NO SE HA SELECCIONADO CURSO.
    		if(trampaCurso == false){

    			//MUESTRA MENSAJE DE ERROR.
    			alert("¡Selecciona un curso!");
    		}


    		//SI NO SE HA SELECCIONADO CENTRO.
    		if(trampaCentro == false){

    			//MUESTRA MENSAJE DE ERROR.
    			alert("¡Selecciona un centro!");
    		}


    		//SI NO SE HA SELECCIONADO CICLO.
    		if(trampaCiclo == false){

    			//MUESTRA MENSAJE DE ERROR.
    			alert("¡Selecciona un ciclo!");
    		}


    		//SI SE HAN SELECCIONADO TODOS LOS PARÁMETROS.
    		else{
			

		    	//VACIA LAS FILAS DE LA TABLA DE MODULOS.
		    	$(".contenido").remove();


		    	//LLAMA A LA FUNCIÓN "OBTENER_MODULOS¡" UTILIZANDO JSON QUE RELLENARÁ EL SELECT CICLO.
		    	$.post({url: "<?php echo base_url(); ?>index.php/Modulo/obtener_modulos",
		        datatype:"json",
		        data:{'ID_Ciclo':$("#select_ciclo").val()},
		        success: function(devuelto){
		        $('#tabla_modulos').css("display","block");

		        	var array=JSON.parse(devuelto);
		        	for (var i = 0; i < array.length; i++) {


		        		//VARIABLES QUE CONTIENEN LA RUTA DE BORRAR Y EDITAR.
		        		var url_borrar = "Modulo/borrar_modulo/"+array[i]['ID_Modulo'];
		        		var url_editar = "Modulo/editar_modulo/"+array[i]['ID_Modulo'];


		        		//RELLENA LA TABLA CON LOS MÓDULOS.
		            	$('#tabla_modulos').append($('<tr class="contenido"><td>'+$("#select_curso option:selected").text()+'</td><td>'+$("#select_centro option:selected").text()+'</td><td>'+$("#select_ciclo option:selected").text()+'</td><td>'+array[i]['COD_Modulo']+'</td><td><a href='+url_editar+'><input type="button" value="Editar"></a><a href='+url_borrar+'><input type="button" value="Borrar"></a></td></tr>'));

		        	}
		    

		    	}});
	    	}

	    });

		/*----------FIN AL CLICAR EN EL BOTÓN MOSTRAR----------*/


		/*--------------------------------------------------*/


		/*----------AL CLICAR EN EL BOTÓN AÑADIR NUEVO----------*/

		//CUANDO SE CLICA EN EL BOTÓN AÑADIR NUEVO.
		$("#botonAñadirNuevo").click(function(){

			//REDIRIGE A LA FUNCIÓN DE "MODULO.PHP" "NUEVO_MODULO" QUE LLAMA A LA VISTA "NUEVO_MODULO.PHP".
			window.location.href = "Modulo/nuevo_modulo";

	    });

		/*----------FIN AL CLICAR EN EL BOTÓN AÑADIR NUEVO----------*/



	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->