<div>
	


	<!--------------------SECCIÓN FORMULARIO-------------------->
	
	<div id="seccionFormulario">
		
		<?php
    		/*--------------------ARRAY DEL FORMULARIO-------------------*/

			$formularioModulo = array(
				'name' => 'formularioModulo'
			);

			/*--------------------FIN ARRAY DEL FORMULARIO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL CÓDIGO DEL MÓDULO-------------------*/

			$COD_Modulo = array(
				'name' => 'COD_Modulo',
				'placeholder' => 'Código del módulo',
				'value' => $modulo->result()[0]->COD_Modulo,
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL CÓDIGO DEL MÓDULO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DE LA DESCRIPCIÓN DEL MÓDULO-------------------*/

			$DESC_Modulo = array(
				'name' => 'DESC_Modulo',
				'placeholder' => 'Descripción del módulo',
				'value' => $modulo->result()[0]->DESC_Modulo,
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DE LA DESCRIPCIÓN DEL MÓDULO-------------------*/
		?>

		<?php echo form_open('Modulo/guardar_cambios_modulo/'.$modulo->result()[0]->ID_Modulo,$formularioModulo);?>

		<?php echo form_label('Código del módulo: ','COD_Modulo'); ?>
		<?php echo form_input($COD_Modulo); ?>

		<?php echo form_label('Descripción del módulo: ','DESC_Modulo'); ?>
		<?php echo form_input($DESC_Modulo); ?>

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
    		
    		//VUELVE A LA PÁGINA PRINCIPAL DE MÓDULO.
    		window.location.href = "../Modulo";
	    });

		/*----------FIN AL CLICAR EN EL BOTÓN VOLVER----------*/


	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->	