<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

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
	}

	/*--------------------FIN CONSTRUCTOR------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN INDEX------------------*/

	public function index()
	{
		//Lista los cursos.
		$datosCurso['cursos'] = $this->Curso_model->obtener_cursos();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "listar_equipo" pasandole los datos (cursos).
		$this->load->view('equipo/listar_equipo',$datosCurso);

		//Carga el footer.
		$this->load->view('footer');

	}

	/*--------------------FIN FUNCIÓN INDEX------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EQUIPOS------------------*/

	public function obtener_equipos()
	{		
		//Función que mediante Ajax pasandole a la función "obtener_equipos" de "Equipo_model.php" el parámetro "ID_Reto" obtiene los equipos.
	 	$idreto=$this->input->post('ID_Reto');
	 	$equipos=$this->Equipo_model->obtener_equipos($idreto);
 		echo json_encode($equipos->result());
	}

	/*--------------------FIN FUNCIÓN EQUIPOS------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN NUEVO EQUIPO------------------*/

	public function nuevo_equipo()
	{
		//Lista los cursos.
		$datosEquipo['cursos'] = $this->Curso_model->obtener_cursos();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "nuevo_equipo" pasandole los datos (cursos).
		$this->load->view('equipo/nuevo_equipo',$datosEquipo);

		//Carga el footer.
		$this->load->view('footer');

		//Si se ha mandado el formulario.
		if(isset($_POST['Crear'])){

			//Array con los datos del nuevo equipo.
			$datosNuevo = array(
				'ID_Reto' => $this->input->post('ID_Reto_Formulario'),
				'COD_Equipo' => $this->input->post('COD_Equipo'),
				'DESC_Equipo' => $this->input->post('DESC_Equipo'),
			);

			//Manda a "nuevo_equipo" de "Equipo_model.php" el array "datosNuevo" para añadir un nuevo equipo a la base de datos.
			$equipoNuevo = $this->Equipo_model->nuevo_equipo($datosNuevo);


		}
	}

	/*--------------------FIN FUNCIÓN NUEVO EQUIPO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN BORRAR EQUIPO------------------*/

	public function borrar_equipo()
	{		
		//Manda el equipo seleccionado a borrar_equipo.
	 	$idequipoBorrar=$this->uri->segment(3);
	 	$this->Equipo_model->borrar_equipo($idequipoBorrar);

	 	//Redirije a la página principal.
	 	redirect('Equipo');
	}

	/*--------------------FIN FUNCIÓN BORRAR EQUIPO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EDITAR EQUIPO------------------*/

	public function editar_equipo()
	{
		//Obtener los datos del equipo seleccionado.
		$datosEditar['segmento'] = $this->uri->segment(3);
		$datosEditar['equipo'] = $this->Equipo_model->obtener_equipo($datosEditar['segmento']);

		//Carga la cabecera.
		$this->load->view('header');

		//Cargar la vista pasandole los datos del equipo seleccionado.
		$this->load->view('equipo/editar_equipo', $datosEditar);

		//Carga el footer.
		$this->load->view('footer');
	}

	/*--------------------FIN FUNCIÓN EDITAR EQUIPO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN GUARDAR CAMBIOS EQUIPO------------------*/

	public function guardar_cambios_equipo()
	{
		//Array con los datos del reto actualizado.
		$datosActualizado = array(
			'COD_Equipo' => $this->input->post('COD_Equipo'),
			'DESC_Equipo' => $this->input->post('DESC_Equipo'),
		);


		//Manda el equipo seleccionado a guardar_cambios_equipo.
	 	$idequipoActualizar=$this->uri->segment(3);
	 	$this->Equipo_model->guardar_cambios_equipo($idequipoActualizar,$datosActualizado);


	 	//Redirije a la página principal.
	 	redirect('Equipo');
	}

	/*--------------------FIN FUNCIÓN GUARDAR CAMBIOS EQUIPO------------------*/

}