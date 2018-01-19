<div>
	

	

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
				'value' => $usuario->result()[0]->User,
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL USUARIO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DE LA CONTRASEÑA-------------------*/

			$Password = array(
				'name' => 'Password',
				'placeholder' => 'Contraseña',
				'value' => $usuario->result()[0]->Password,
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DE LA CONTRASEÑA-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL NOMBRE-------------------*/

			$Nombre = array(
				'name' => 'Nombre',
				'placeholder' => 'Nombre',
				'value' => $usuario->result()[0]->Nombre,
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL NOMBRE-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DE LOS APELLIDOS-------------------*/

			$Apellidos = array(
				'name' => 'Apellidos',
				'placeholder' => 'Apellidos',
				'value' => $usuario->result()[0]->Apellidos,
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DE LOS APELLIDOS-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL EMAIL-------------------*/

			$Email = array(
				'name' => 'Email',
				'placeholder' => 'Email',
				'value' => $usuario->result()[0]->Email,
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL EMAIL-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL DNI-------------------*/

			$Dni = array(
				'name' => 'Dni',
				'placeholder' => 'Dni',
				'value' => $usuario->result()[0]->Dni,
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL DNI-------------------*/
			
		?>

		<?php echo form_open('Usuario/guardar_cambios_usuario/'.$usuario->result()[0]->ID_Usuario,$formularioUsuario);?>

		<?php echo form_label('Usuario: ','User'); ?>
		<?php echo form_input($User); ?>

		<?php echo form_label('Contraseña: ','Password'); ?>
		<?php echo form_input($Password); ?>

		<?php echo form_label('Nombre: ','Nombre'); ?>
		<?php echo form_input($Nombre); ?>

		<?php echo form_label('Apellidos: ','Apellidos'); ?>
		<?php echo form_input($Apellidos); ?>

		<?php echo form_label('Email: ','Email'); ?>
		<?php echo form_input($Email); ?>

		<?php echo form_label('DNI: ','Dni'); ?>
		<?php echo form_input($Dni); ?>
		
		<?php echo form_submit('Editar','Editar'); ?>
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