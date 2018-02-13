<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Grupo 2</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>estilo.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/tablet.css" media="only screen and (min-width: 600px) and (max-width:767px)" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/movil.css" media="only screen and (max-width: 599px)" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/estilo.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<header>

<nav>
	<ul id="listaheader">
	<a id="logo" href=""><li> Logo </li></a>

	<li id="vacio"></li>
	<li id="vacio"></li>
	<li id="vacio"></li>
	<li id="vacio"></li>
	<li id="vacio"></li>
	<li id="vacio"></li>
	<li id="vacio"></li>
	<a href="http://127.0.0.1/webs/RETORUBRICAS/CodeIgniter/index.php/Profesor/index"><li> Retos </li></a>
	<a href="http://127.0.0.1/webs/RETORUBRICAS/CodeIgniter/index.php/Profesor/rubricas"><li> Rubricas </li></a>
	</ul>
	<h1>Hola
	<?php 
	foreach ($profesor->result() as $profe) {
		echo $profe->User; 	
	} 
	?> 
	</h1>
	<button id="btnoff" onclick="location.href='<?php echo base_url(); ?>';">
		<img id="imgbtn" src="<?php echo base_url(); ?>btnapagar.png" alt="">
	</button>
</nav>
</header>