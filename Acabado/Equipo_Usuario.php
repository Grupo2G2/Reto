<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_Usuario extends CI_Controller {

	/*--------------------CONSTRUCTOR------------------*/

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');			
		$this->load->model('Curso_model');				
		$this->load->model('Centro_model');			
		$this->load->model('Ciclo_model');
		$this->load->model('Modulo_model');
		$this->load->model('Reto_model');
		$this->load->model('Equipo_model');
		$this->load->model('Usuario_model');
		$this->load->model('TUsuario_model');
		$this->load->model('Equipo_Usuario_model');
	}

	/*--------------------FIN CONSTRUCTOR------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN INDEX------------------*/

	public function index()
	{
		//Lista los cursos.
		$datosEquipoUsuario['cursos'] = $this->Curso_model->obtener_cursos();


		//Lista los centros.
		$datosEquipoUsuario['centros'] = $this->Centro_model->obtener_centros();


		//Carga la cabecera.
		$this->load->view('header');


		//Carga la vista "listar_equipo_usuario" pasandole los datos (cursos y centros).
		$this->load->view('equipo_usuario/listar_equipo_usuario',$datosEquipoUsuario);


		//Carga el footer.
		$this->load->view('footer');

	}

	/*--------------------FIN FUNCIÓN INDEX------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EQUIPOS USUARIOS------------------*/

	public function obtener_equipos_usuarios()
	{		
		//Función que mediante Ajax pasandole a la función "obtener_equipos_usuarios" de "Equipo_Usuario_model.php" el parámetro "ID_Reto" obtiene los equipos.
	 	$idequipo=$this->input->post('ID_Equipo');
	 	$equipos=$this->Equipo_Usuario_model->obtener_equipos_usuarios($idequipo);
 		echo json_encode($equipos->result());
	}

	/*--------------------FIN FUNCIÓN EQUIPOS USUARIOS------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EQUIPOS USUARIOS------------------*/

	public function obtener_usuarios_tipo_modulo()
	{		
		//Función que mediante Ajax pasandole a la función "obtener_usuarios_tipo_modulo" de "Equipo_Usuario_model.php" el parámetro "ID_Modulo" e "ID_TUsuario" obtiene los usuarios según el módulo y tipo de usuario que se haya seleccionado.
	 	$idmodulo=$this->input->post('ID_Modulo');
	 	$idtusuario=$this->input->post('ID_TUsuario');
	 	$usuarios=$this->Equipo_Usuario_model->obtener_usuarios_tipo_modulo($idmodulo,$idtusuario);
 		echo json_encode($usuarios->result());
	}

	/*--------------------FIN FUNCIÓN EQUIPOS USUARIOS------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EQUIPOS USUARIOS USUARIO------------------*/

	public function obtener_equipos_usuarios_usuario()
	{		
		//Función que mediante Ajax pasandole a la función "obtener_equipos_usuarios" de "Equipo_Usuario_model.php" el parámetro "ID_Reto" obtiene los equipos.
	 	$idusuario=$this->input->post('ID_Usuario');
	 	$equipos=$this->Equipo_Usuario_model->obtener_equipos_usuarios_usuario($idusuario);
 		echo json_encode($equipos->result());
	}

	/*--------------------FIN FUNCIÓN EQUIPOS USUARIOS USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN NUEVO EQUIPO USUARIO------------------*/

	public function nuevo_equipo_usuario()
	{
		//Lista los cursos.
		$datosEquipoUsuario['cursos'] = $this->Curso_model->obtener_cursos();

		//Lista los centros.
		$datosEquipoUsuario['centros'] = $this->Centro_model->obtener_centros();

		//Lista los tipos de usuario.
		$datosEquipoUsuario['tipos'] = $this->TUsuario_model->obtener_tusuarios();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "nuevo_usuario_modulo" pasandole los datos (cursos, centros y tipos).
		$this->load->view('equipo_usuario/nuevo_equipo_usuario',$datosEquipoUsuario);

		//Carga el footer.
		$this->load->view('footer');
	}

	/*--------------------FIN FUNCIÓN NUEVO EQUIPO USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN CREAR EQUIPO USUARIO------------------*/

	public function nuevo_equipo_usuario_crear()
	{		
		//Manda el usuario y equipo seleccionado a nuevo_equipo_usuario.
		$datosCrear = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'COD_Rol' => $this->input->post('COD_Rol'),
		);

	 	$this->Equipo_Usuario_model->nuevo_equipo_usuario_crear($datosCrear);

	 	//Redirije a la página principal.
	 	redirect('Equipo_Usuario');
	}

	/*--------------------FIN FUNCIÓN CREAR EQUIPO USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN BORRAR EQUIPO USUARIO------------------*/

	public function borrar_equipo_usuario()
	{		
		//Manda el equipo y usuario seleccionado a borrar_equipo_usuario.
	 	$idequipoBorrar=$this->uri->segment(3);
	 	$this->Equipo_Usuario_model->borrar_equipo_usuario($idequipoBorrar);
	 	
	 	//Redirije a la página principal.
	 	redirect('Equipo_Usuario');
	}

	/*--------------------FIN FUNCIÓN BORRAR EQUIPO USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EDITAR EQUIPO USUARIO------------------*/

	public function editar_equipo_usuario()
	{	

		//Obtener los datos del usuaio seleccionado.
		$datosEditar['segmento'] = $this->uri->segment(3);

		//Lista los cursos.
		$datosEditar['cursos'] = $this->Curso_model->obtener_cursos();

		$datosEditar['usuario'] = $this->Equipo_Usuario_model->obtener_equipo_usuario($datosEditar['segmento']);

		//Carga la cabecera.
		$this->load->view('header');

		//Cargar la vista pasandole los datos del usuario seleccionado.
		$this->load->view('equipo_usuario/editar_equipo_usuario', $datosEditar);

		//Carga el footer.
		$this->load->view('footer');
	}

	/*--------------------FIN FUNCIÓN EDITAR EQUIPO USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN GUARDAR CAMBIOS EQUIPO USUARIO------------------*/

	public function guardar_cambios_equipo_usuario()
	{
		//Array con los datos del usuario actualizado.
		$datoEquipo = $this->input->post('ID_Equipo');
		$datoRol = $this->input->post('COD_Rol');


		//Manda el usuario seleccionado a guardar_cambios_equipo_usuario.
	 	$idusuarioActualizar=$this->uri->segment(3);


	 	$this->Equipo_Usuario_model->guardar_cambios_equipo_usuario($idusuarioActualizar, $datoEquipo, $datoRol);
	 	
	 	//Redirije a la página principal.
	 	redirect('Equipo_Usuario');
	}

	/*--------------------FIN FUNCIÓN GUARDAR CAMBIOS EQUIPO USUARIO------------------*/

}