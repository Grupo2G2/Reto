<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	/*--------------------CONSTRUCTOR------------------*/

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');						
		$this->load->model('Centro_model');			
		$this->load->model('Usuario_model');	
		$this->load->model('TUsuario_model');
	}

	/*--------------------FIN CONSTRUCTOR------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN INDEX------------------*/

	public function index()
	{
		//Lista los centros.
		$datosUsuario['centros'] = $this->Centro_model->obtener_centros();

		//Lista los tipos de usuario.
		$datosUsuario['tipos'] = $this->TUsuario_model->obtener_tusuarios();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "listar_usuario" pasandole los datos (centros y tipos de usuarios).
		$this->load->view('usuario/listar_usuario',$datosUsuario);

		//Carga el footer.
		$this->load->view('footer');

	}

	/*--------------------FIN FUNCIÓN INDEX------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN USUARIOS------------------*/

	public function obtener_usuarios()
	{		
		//Función que mediante Ajax pasandole a la función "obtener_usuarios" de "Usuario_model.php" los parámetros "ID_Centro" y "ID_TUsuario" obtiene los usuarios.
	 	$idcentro=$this->input->post('ID_Centro');
	 	$idtusuario=$this->input->post('ID_TUsuario');
	 	$usuarios=$this->Usuario_model->obtener_usuarios($idcentro, $idtusuario);
 		echo json_encode($usuarios->result());
	}

	/*--------------------FIN FUNCIÓN USUARIOS------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN NUEVO USUARIO------------------*/

	public function nuevo_usuario()
	{
		//Lista los centros.
		$datosUsuario['centros'] = $this->Centro_model->obtener_centros();

		//Lista los tipos de usuario.
		$datosUsuario['tipos'] = $this->TUsuario_model->obtener_tusuarios();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "nuevo_usuario" pasandole los datos (centros y tipos de usuarios).
		$this->load->view('usuario/nuevo_usuario',$datosUsuario);

		//Carga el footer.
		$this->load->view('footer');

		//Si se ha mandado el formulario.
		if(isset($_POST['Crear'])){

			//Array con los datos del nuevo usuario.
			$datosNuevo = array(
				'ID_Centro' => $this->input->post('ID_Centro_Formulario'),
				'ID_TUsuario' => $this->input->post('ID_TUsuario_Formulario'),
				'User' => $this->input->post('User'),
				'Nombre' => $this->input->post('Nombre'),
				'Apellidos' => $this->input->post('Apellidos'),
				'Email' => $this->input->post('Email'),
				'Dni' => $this->input->post('Dni'),
			);

			//Manda a "nuevo_usuario" de "Usuario_model.php" el array "datosNuevo" para añadir un nuevo usuario a la base de datos.
			$usuarioNuevo = $this->Usuario_model->nuevo_usuario($datosNuevo);


		}
	}

	/*--------------------FIN FUNCIÓN NUEVO USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN BORRAR USUARIO------------------*/

	public function borrar_usuario()
	{		
		//Manda el usuario seleccionado a borrar_usuario.
	 	$idusuarioBorrar=$this->uri->segment(3);
	 	$this->Usuario_model->borrar_usuario($idusuarioBorrar);

	 	//Redirije a la página principal.
	 	redirect('Usuario');
	}

	/*--------------------FIN FUNCIÓN BORRAR USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EDITAR USUARIO------------------*/

	public function editar_usuario()
	{
		//Obtener los datos del usuaio seleccionado.
		$datosEditar['segmento'] = $this->uri->segment(3);
		$datosEditar['usuario'] = $this->Usuario_model->obtener_usuario($datosEditar['segmento']);

		//Carga la cabecera.
		$this->load->view('header');

		//Cargar la vista pasandole los datos del usuario seleccionado.
		$this->load->view('usuario/editar_usuario', $datosEditar);

		//Carga el footer.
		$this->load->view('footer');
	}

	/*--------------------FIN FUNCIÓN EDITAR USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN GUARDAR CAMBIOS USUARIO------------------*/

	public function guardar_cambios_usuario()
	{
		//Array con los datos del usuario actualizado.
		$datosActualizado = array(
			'User' => $this->input->post('User'),
			'Password' => $this->input->post('Password'),
			'Nombre' => $this->input->post('Nombre'),
			'Apellidos' => $this->input->post('Apellidos'),
			'Email' => $this->input->post('Email'),
			'Dni' => $this->input->post('Dni'),
		);


		//Manda el usuario seleccionado a guardar_cambios_usuario.
	 	$idusuarioActualizar=$this->uri->segment(3);
	 	$this->Usuario_model->guardar_cambios_usuario($idusuarioActualizar,$datosActualizado);


	 	//Redirije a la página principal.
	 	redirect('Usuario');
	}

	/*--------------------FIN FUNCIÓN GUARDAR CAMBIOS USUARIO------------------*/

}