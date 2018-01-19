<?php 
$form = array(
	'name' => 'form_centro'
);
?>
<div>
	<h1 class="titulo">EVALUACIÓN <?php foreach ($alumno->result() as $a) { echo $a->User;} ?></h1>
	<div>
		
		<br>
		<table border="1">
			<tr><th>A VALORAR</th><th>PUNTUACIÓN</th></tr>
			<?php 
			if($competencias){
				foreach ($competencias->result() as $compe) {
					echo "<tr><td>$compe->DESC_Competencia</td>
						<td><select id='select_competencia$compe->ID_Competencia'>";
						?>
						<option value="<?php echo $compe->ID_Competencia ?>-25">Mal</option>
						<option value="<?php echo $compe->ID_Competencia ?>-50">Regular</option>
						<option value="<?php echo $compe->ID_Competencia ?>-75">Bueno</option>
						<option value="<?php echo $compe->ID_Competencia ?>-100">Excelente</option>
						<?php
						echo "</select>";
				}
			}
			?>
		</table>
		<br>
		<div>
			<?php echo form_submit('RESTABLECER','RESTABLECER'); ?>
			
			<input id ="Enviar" type="submit" name="Enviar" value="Enviar">
			<?php echo form_button('VOLVER','VOLVER'); ?>
		</div>
		
	</div>
</div>
<script>
	$(document).ready(function(){

		document.getElementById("Enviar").addEventListener("click",function(){
			
			for(var i=1; i < 10; i++){
				var select1 = $("#select_competencia"+i).val().split("-");
				
				$.post({url: "<?php echo base_url(); ?>index.php/Profesor/agregar_evaluacion",
				datatype:"json",
				data:{
					'ID_Competencia':select1[0],
					'ID_Nota':select1[1],
					'ID_User':<?php foreach ($alumno->result() as $a) { echo $a->ID_Usuario;} ?>,
				}});
			}
			alert("Notas añadidas.");
		});
	});
</script>