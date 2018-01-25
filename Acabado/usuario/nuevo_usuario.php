<div>
	

	<!--------------------CURSO-------------------->

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

	<!--------------------FIN CURSO-------------------->
	
	


	<!-------------------------------------------------->


	<!--------------------BOTÓN MOSTRAR-------------------->
	
	
	<button id="botonMostrar">Mostrar</button>
	

	<!--------------------FIN BOTÓN MOSTRAR-------------------->
	
	
	<!-------------------------------------------------->


	<!--------------------SECCIÓN FORMULARIO-------------------->
	
	<div id="seccionFormulario">
		
		<?php
    		/*--------------------ARRAY DEL FORMULARIO-------------------*/

			$formularioUsuario = array(
				'name' => 'formularioUsuario'
			);

			/*--------------------FIN ARRAY DEL FORMULARIO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL USUARIO-------------------*/

			$User = array(
				'name' => 'User',
				'placeholder' => 'Usuario',
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL USUARIO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL NOMBRE-------------------*/

			$Nombre = array(
				'name' => 'Nombre',
				'placeholder' => 'Nombre',
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL NOMBRE-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DE LOS APELLIDOS-------------------*/

			$Apellidos = array(
				'name' => 'Apellidos',
				'placeholder' => 'Apellidos',
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DE LOS APELLIDOS-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL EMAIL-------------------*/

			$Email = array(
				'name' => 'Email',
				'placeholder' => 'Email',
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL EMAIL-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL DNI-------------------*/

			$Dni = array(
				'name' => 'Dni',
				'placeholder' => 'Dni',
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL DNI-------------------*/


			/*---------------------------------------------------*/



			/*--------------------TRAMPA PARA INSERTAR A LA BASE DE DATOS EL CENTRO Y TIPO DE USUARIO SELECCIONADO--------------------*/


			/*--------------------ARRAY DEL ID DEL CENTRO-------------------*/

			$ID_Centro_Formulario = array(
				'name' => 'ID_Centro_Formulario',
				'class' => 'ID_Centro_Formulario',
				'placeholder' => 'ID del centro',
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL ID DEL CENTRO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL ID DEL TIPO DE USUARIO-------------------*/

			$ID_TUsuario_Formulario = array(
				'name' => 'ID_TUsuario_Formulario',
				'class' => 'ID_TUsuario_Formulario',
				'placeholder' => 'ID del tipo de usuario',
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL ID DEL TIPO DE USUARIO-------------------*/


			/*--------------------FIN TRAMPA PARA INSERTAR A LA BASE DE DATOS EL CENTRO Y TIPO DE USUARIO SELECCIONADO--------------------*/
		?>

		<?php echo form_open('Usuario/nuevo_usuario',$formularioUsuario);?>

		<?php echo form_label('Usuario: ','User'); ?>
		<?php echo form_input($User); ?>

		<?php echo form_label('Nombre: ','Nombre'); ?>
		<?php echo form_input($Nombre); ?>

		<?php echo form_label('Apellidos: ','Apellidos'); ?>
		<?php echo form_input($Apellidos); ?>

		<?php echo form_label('Email: ','Email'); ?>
		<?php echo form_input($Email); ?>

		<?php echo form_label('DNI: ','Dni'); ?>
		<?php echo form_input($Dni); ?>

		<!--------------------TRAMPA PARA INSERTAR A LA BASE DE DATOS EL CENTRO Y TIPO DE USUARIO SELECCIONADO-------------------->

		<?php echo form_label('Centro: ','ID_Centro_Formulario'); ?>
		<?php echo form_input($ID_Centro_Formulario); ?>

		<?php echo form_label('TUsuario: ','ID_TUsuario_Formulario'); ?>
		<?php echo form_input($ID_TUsuario_Formulario); ?>

		<!--------------------FIN TRAMPA PARA INSERTAR A LA BASE DE DATOS EL CENTRO Y TIPO DE USUARIO SELECCIONADO-------------------->

		<?php echo form_submit('Crear','Crear'); ?>
		<?php echo form_close();?>

	</div>

	<!--------------------FIN SECCIÓN FORMULARIO-------------------->
	
	
	<!-------------------------------------------------->


	<!--------------------BOTÓN VOLVER-------------------->
	
	
	<button id="botonVolver">Volver</button>
	

	<!--------------------FIN BOTÓN VOLVER-------------------->


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

	    	//RELLENA EL INPUT CENTRO DEL FORMULARIO CON EL VALOR DEL CENTRO QUE SE HAYA SELECCIONADO. 
	    	$('.ID_Centro_Formulario').val($("#select_centro").val());

		});

		/*----------FIN AL CAMBIAR EL SELECT CURSO----------*/


		/*--------------------------------------------------*/


		/*----------AL CAMBIAR EL SELECT TIPO----------*/

		//CUANDO SE CAMBIA EL SELECT TIPO.
		$("#select_tipo").change(function(){

			//SE PONE LA TRAMPA A "TRUE" PORQUE SE LA MODIFICADO SELECT TIPO.
			trampaTipo = true;	


			//RELLENA EL INPUT TIPO DEL FORMULARIO CON EL VALOR DEL TIPO QUE SE HAYA SELECCIONADO. 
	    	$('.ID_TUsuario_Formulario').val($("#select_tipo").val());		

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


    		//SI NO SE HA SELECCIONADO TIPO DE USUARIO.
    		if(trampaTipo == false){

    			//MUESTRA MENSAJE DE ERROR.
    			alert("¡Selecciona un tipo de usuario!");
    		}


    		//SI SE HAN SELECCIONADO TODOS LOS PARÁMETROS.
    		else{

    			//MUESTRA EL FORMULARIO.
	        	$('#seccionFormulario').css("display","block");

			}
	    });

		/*----------FIN AL CLICAR EN EL BOTÓN MOSTRAR----------*/


		/*--------------------------------------------------*/


		/*----------AL CLICAR EN EL BOTÓN VOLVER----------*/


		//CUANDO SE CLICA EN EL BOTÓN VOLVER.
		$("#botonVolver").click(function(){
    		
    		//VUELVE A LA PÁGINA PRINCIPAL DE USUARIO.
    		window.location.href = "../Usuario";
	    });

		/*----------FIN AL CLICAR EN EL BOTÓN VOLVER----------*/


	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->	