<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {

	/*--------------------CONSTRUCTOR------------------*/

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');			
		$this->load->model('Curso_model');				
		$this->load->model('Centro_model');			
		$this->load->model('Ciclo_model');
		$this->load->model('Modulo_model');
	}

	/*--------------------FIN CONSTRUCTOR------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN INDEX------------------*/

	public function index()
	{
		//Lista los cursos.
		$datosCurso['cursos'] = $this->Curso_model->obtener_cursos();

		//Lista los centros.
		$datosCentro['centros'] = $this->Centro_model->obtener_centros();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "listar_modulo" pasandole los datos (cursos y centros).
		$this->load->view('modulo/listar_modulo',$datosCurso, $datosCentro);

		//Carga el footer.
		$this->load->view('footer');

	}

	/*--------------------FIN FUNCIÓN INDEX------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN MODULOS------------------*/

	public function obtener_modulos()
	{		
		//Función que mediante Ajax pasandole a la función "obtener_modulos" de "Modulo_model.php" el parámetro "ID_Ciclo" obtiene los módulos.
	 	$idciclo=$this->input->post('ID_Ciclo');
	 	$modulos=$this->Modulo_model->obtener_modulos($idciclo);
 		echo json_encode($modulos->result());
	}

	/*--------------------FIN FUNCIÓN MODULOS------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN NUEVO MODULO------------------*/

	public function nuevo_modulo()
	{
		//Lista los cursos.
		$datosCurso['cursos'] = $this->Curso_model->obtener_cursos();

		//Lista los centros.
		$datosCentro['centros'] = $this->Centro_model->obtener_centros();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "listar_modulo" pasandole los datos (cursos t centros).
		$this->load->view('modulo/nuevo_modulo',$datosCurso, $datosCentro);

		//Carga el footer.
		$this->load->view('footer');

		//Si se ha mandado el formulario.
		if(isset($_POST['Crear'])){

			//Array con los datos del nuevo módulo.
			$datosNuevo = array(
				'ID_Ciclo' => $this->input->post('ID_Ciclo_Formulario'),
				'COD_Modulo' => $this->input->post('COD_Modulo'),
				'DESC_Modulo' => $this->input->post('DESC_Modulo'),
			);

			//Manda a "nuevo_modulo" de "Modulo_model.php" el array "datosNuevo" para añadir un nuevo módulo a la base de datos.
			$moduloNuevo = $this->Modulo_model->nuevo_modulo($datosNuevo);
		}
	}

	/*--------------------FIN FUNCIÓN NUEVO MODULO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN BORRAR MODULO------------------*/

	public function borrar_modulo()
	{		
		//Manda el módulo seleccionado a borrar_modulo.
	 	$idmoduloBorrar=$this->uri->segment(3);
	 	$this->Modulo_model->borrar_modulo($idmoduloBorrar);

	 	//Redirije a la página principal.
	 	redirect('Modulo');
	}

	/*--------------------FIN FUNCIÓN BORRAR MODULO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EDITAR MODULO------------------*/

	public function editar_modulo()
	{
		//Obtener los datos del módulo seleccionado.
		$datosEditar['segmento'] = $this->uri->segment(3);
		$datosEditar['modulo'] = $this->Modulo_model->obtener_modulo($datosEditar['segmento']);

		//Carga la cabecera.
		$this->load->view('header');

		//Cargar la vista pasandole los datos del módulo seleccionado.
		$this->load->view('modulo/editar_modulo', $datosEditar);

		//Carga el footer.
		$this->load->view('footer');
	}

	/*--------------------FIN FUNCIÓN EDITAR MODULO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN GUARDAR CAMBIOS MODULO------------------*/

	public function guardar_cambios_modulo()
	{
		//Array con los datos del módulo actualizado.
		$datosActualizado = array(
			'COD_Modulo' => $this->input->post('COD_Modulo'),
			'DESC_Modulo' => $this->input->post('DESC_Modulo'),
		);


		//Manda el módulo seleccionado a borrar_modulo.
	 	$idmoduloActualizar=$this->uri->segment(3);
	 	$this->Modulo_model->guardar_cambios_modulo($idmoduloActualizar,$datosActualizado);


	 	//Redirije a la página principal.
	 	redirect('Modulo');
	}

	/*--------------------FIN FUNCIÓN GUARDAR CAMBIOS MODULO------------------*/

}