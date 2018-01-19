<?php
$form = array(
	'name' => 'form_evalumno'
	);
$Puntualidad = array(	
	'name' => 'DESC_Centro',
	'type' => 'radiobutton'
	);
?>

<div>
	<?php echo form_open('Reto/nuevo',$form);?>	
	<?php echo form_label('Evaluar Puntualidad: ','Puntualidad'); ?>
	<?php echo form_radio($Puntualidad); ?>
	<?php echo form_close();?>
</div>

<div>
	<?php echo form_open('Reto/nuevo_reto',$form);?>	
	<?php echo form_submit('asignar','Asignar Modulos/Equipos'); ?>
	<?php echo form_close();?>
</div>