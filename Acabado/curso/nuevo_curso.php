<div>
	


	<!--------------------SECCIÓN FORMULARIO-------------------->
	
	<div id="seccionFormulario">
		
		<?php
    		/*--------------------ARRAY DEL FORMULARIO-------------------*/

			$formularioCurso = array(
				'name' => 'formularioCurso'
			);

			/*--------------------FIN ARRAY DEL FORMULARIO-------------------*/


			/*---------------------------------------------------*/

			/*--------------------ARRAY DE EL CÓDIGO DEL CURSO-------------------*/

			$COD_Curso = array(
				'name' => 'COD_Curso',
				'placeholder' => 'Código del curso',
				'maxlength' => 20,
				'size' => 20
			);

			/*--------------------FIN ARRAY DE EL CÓDIGO DEL CURSO-------------------*/
		?>

		<?php echo form_open('Curso/nuevo_curso',$formularioCurso);?>

		<?php echo form_label('Código del curso: ','COD_Curso'); ?>
		<?php echo form_input($COD_Curso); ?>

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


		/*----------AL CLICAR EN EL BOTÓN VOLVER----------*/


		//CUANDO SE CLICA EN EL BOTÓN VOLVER.
		$("#botonVolver").click(function(){
    		
    		//VUELVE A LA PÁGINA PRINCIPAL DE CURSO.
    		window.location.href = "../Curso";
	    });

		/*----------FIN AL CLICAR EN EL BOTÓN VOLVER----------*/


	});

	/*----------FIN AL CARGAR EL DOCUMENTO----------*/

</script>


<!----------FIN SCRIPT---------->	