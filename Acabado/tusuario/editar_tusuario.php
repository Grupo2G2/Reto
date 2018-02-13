<div>
	


	<!--------------------SECCIÓN FORMULARIO-------------------->
	
	<div id="seccionFormulario">
		
		<?php
    		/*--------------------ARRAY DEL FORMULARIO-------------------*/

			$formularioTUsuario = array(
				'name' => 'formularioTUsuario'
			);

			/*--------------------FIN ARRAY DEL FORMULARIO-------------------*/


			/*---------------------------------------------------*/

			/*--------------------ARRAY DE LA DESCRIPCIÓN DEL TIPO DE USUARIO-------------------*/

			$DESC_TUsuario = array(
				'name' => 'DESC_TUsuario',
				'placeholder' => 'Descripción del tipo de usuario',
				'value' => $tipo->result()[0]->DESC_TUsuario,
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DE LA DESCRIPCIÓN DEL TIPO DE USUARIO-------------------*/
		?>

		<?php echo form_open('TUsuario/guardar_cambios_tusuario/'.$tipo->result()[0]->ID_TUsuario,$formularioTUsuario);?>

		<?php echo form_label('Descripción del tipo de usuario: ','DESC_TUsuario'); ?>
		<?php echo form_input($DESC_TUsuario); ?>

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
    		
    		//VUELVE A LA PÁGINA PRINCIPAL DE TIPO DE USUARIO.
    		window.location.href = "../TUsuario";
	    });

		/*----------FIN AL CLICAR EN EL BOTÓN VOLVER----------*/


	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->	