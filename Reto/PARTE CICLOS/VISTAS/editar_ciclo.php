<div>
	


	<!--------------------SECCIÓN FORMULARIO-------------------->
	
	<div id="seccionFormulario">
		
		<?php
    		/*--------------------ARRAY DEL FORMULARIO-------------------*/

			$formularioCiclo = array(
				'name' => 'formularioCiclo'
			);

			/*--------------------FIN ARRAY DEL FORMULARIO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DEL CÓDIGO DEL CICLO-------------------*/

			$COD_Ciclo = array(
				'name' => 'COD_Ciclo',
				'placeholder' => 'Código del ciclo',
				'value' => $ciclo->result()[0]->COD_Ciclo,
				'maxlength' => 10,
				'size' => 20
			);

			/*--------------------FIN ARRAY DEL CÓDIGO DEL CICLO-------------------*/


			/*---------------------------------------------------*/


			/*--------------------ARRAY DE LA DESCRIPCIÓN DEL CICLO-------------------*/

			$DESC_Ciclo = array(
				'name' => 'DESC_Ciclo',
				'placeholder' => 'Descripción del ciclo',
				'value' => $ciclo->result()[0]->DESC_Ciclo,
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DE LA DESCRIPCIÓN DEL CICLO-------------------*/
		?>

		<?php echo form_open('Ciclo/guardar_cambios_ciclo/'.$ciclo->result()[0]->ID_Ciclo,$formularioCiclo);?>

		<?php echo form_label('Código del ciclo: ','COD_Ciclo'); ?>
		<?php echo form_input($COD_Ciclo); ?>

		<?php echo form_label('Descripción del ciclo: ','DESC_Ciclo'); ?>
		<?php echo form_input($DESC_Ciclo); ?>

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
    		
    		//VUELVE A LA PÁGINA PRINCIPAL DE CICLO.
    		window.location.href = "../Ciclo";
	    });

		/*----------FIN AL CLICAR EN EL BOTÓN VOLVER----------*/


	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->	