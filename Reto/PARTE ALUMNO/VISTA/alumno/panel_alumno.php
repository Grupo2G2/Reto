<?php
$form = array(
	'name' => 'form_reto'
	);
?>




		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO
		//echo (var_dump($retos));	
		if ($retos){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primerreto = $retos->result()[0];
			foreach ($primerreto as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Evaluar</th></tr>
			</thead>
			<tbody>');
			foreach ($retos->result() as $reto) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$reto->ID_Reto,$reto->ID_Reto);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$cicloArray = get_object_vars($ciclo);
				//var_dump($ciclo['ID_curso']);
				foreach ($reto as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="Reto/editar/%s">%s</a>
					</td>',$reto->ID_Reto,$detalle);
				}
				$url = "'Alumno/evaluar/".$reto->ID_Reto."'"; 
				printf('<td><input type="button" onclick="location.href=%s" value="Evaluar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
		}
		else{
				printf('No hay Registros');
		}

		printf('--------------------------------------------------------------------<br>');	
		?>	