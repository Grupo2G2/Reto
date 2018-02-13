<div>
	<h1>EVALUACION <?php foreach ($COD_Reto->result() as $r) { echo $r->COD_Reto;} ?></h1>
	<div>
		<?php
			$form = array(
			'name' => 'form_centro'
		);
		?>
		<?php echo form_label('Grupo: ','ID_Grupo'); ?>
		<?php
			echo "<select id='select_equipo'>";
			if ($equipos){
				echo "<option value='0'>Selecciona Equipo</option>";
				foreach ($equipos->result() as $equipo) {
					echo "<option value='$equipo->ID_Equipo'>$equipo->DESC_Equipo</option>";
				}		
			}else{
				echo "<option value='0'>Sin equipos</option>";
			}
			echo "</select>";	
			?>
		<br>
		<input id ="Buscar" type="submit" name="Buscar" value="Buscar">
	</div>
	<div>
		<table id="tabla_evaluar" cellspacing="10">

		</table>
	</div>

</div>
<script>
	$(document).ready(function(){
		//GENERADOR TABLA
		document.getElementById("Buscar").addEventListener("click", function(){
			$('#tabla_evaluar').empty();
			$(".contenido").remove();
			$('#tabla_evaluar').append($('<tr><th>GRUPO</th><th>ALUMNO</th><th>ACCIONES</th></tr>'));

			$.post({url: "<?php echo base_url(); ?>index.php/Equipo/equipo_usuarios_json",
			datatype:"json",
			data:{
				'ID_Equipo':$("#select_equipo").val(), 
			},
			success: function(devuelto){
				var array=JSON.parse(devuelto);
				for(var i = 0; i < array.length; i++){
	        		$('#tabla_evaluar').append($('<tr class="contenido">					<td>'+array[i]['DESC_Equipo']+'</td>							<td>'+array[i]['User']+'</td>									<td><input onclick="location.href=\'<?php echo base_url(); ?>index.php/Profesor/evaluserindi/'+array[i]['ID_Usuario']+'\'" type="button" value="EVALUAR" name="'+array[i]['ID_Reto']+'"></td></tr>'));
	        	}
			}});

		});
	});
</script>