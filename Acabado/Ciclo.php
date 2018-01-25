<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciclo extends CI_Controller {

	/*--------------------CONSTRUCTOR------------------*/

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');			
		$this->load->model('Curso_model');				
		$this->load->model('Centro_model');				
		$this->load->model('Ciclo_model');
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

		//Carga la vista "listar_ciclo" pasandole los datos (cursos y centros).
		$this->load->view('ciclo/listar_ciclo',$datosCurso, $datosCentro);

		//Carga el footer.
		$this->load->view('footer');

	}

	/*--------------------FIN FUNCIÓN INDEX------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN CICLOS------------------*/

	public function obtener_ciclos()
	{	
		//Función que mediante Ajax pasandole a la función "obtener_ciclos" de "Ciclo_model.php" el parámetro "ID_Curso" e "ID_Centro" obtiene los ciclos.	
	 	$idcurso=$this->input->post('ID_Curso');
	 	$idcentro=$this->input->post('ID_Centro');
	 	$ciclos=$this->Ciclo_model->obtener_ciclos($idcurso,$idcentro);
 		echo json_encode($ciclos->result());
	}

	/*--------------------FIN FUNCIÓN CICLOS------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN NUEVO CICLO------------------*/

	public function nuevo_ciclo()
	{
		//Lista los cursos.
		$datosCurso['cursos'] = $this->Curso_model->obtener_cursos();

		//Lista los centros.
		$datosCentro['centros'] = $this->Centro_model->obtener_centros();

		//Carga la cabecera.
		$this->load->view('header');

		//Carga la vista "nuevo_ciclo" pasandole los datos (cursos y centros).
		$this->load->view('ciclo/nuevo_ciclo',$datosCurso, $datosCentro);

		//Carga el footer.
		$this->load->view('footer');

		//Si se ha mandado el formulario.
		if(isset($_POST['Crear'])){

			//Array con los datos del nuevo ciclo.
			$datosNuevo = array(
				'ID_Centro' => $this->input->post('ID_Centro_Formulario'),
				'ID_Curso' => $this->input->post('ID_Curso_Formulario'),
				'COD_Ciclo' => $this->input->post('COD_Ciclo'),
				'DESC_Ciclo' => $this->input->post('DESC_Ciclo'),
			);

			//Manda a "nuevo_ciclo" de "Ciclo_model.php" el array "datosNuevo" para añadir un nuevo ciclo a la base de datos.
			$cicloNuevo = $this->Ciclo_model->nuevo_ciclo($datosNuevo);
		}
	}

	/*--------------------FIN FUNCIÓN NUEVO CICLO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN BORRAR CICLO------------------*/

	public function borrar_ciclo()
	{		
		//Manda el ciclo seleccionado a borrar_ciclo.
	 	$idcicloBorrar=$this->uri->segment(3);
	 	$this->Ciclo_model->borrar_ciclo($idcicloBorrar);

	 	//Redirije a la página principal.
	 	redirect('Ciclo');
	}

	/*--------------------FIN FUNCIÓN BORRAR CICLO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN EDITAR CICLO------------------*/

	public function editar_ciclo()
	{
		//Obtener los datos del ciclo seleccionado.
		$datosEditar['segmento'] = $this->uri->segment(3);
		$datosEditar['ciclo'] = $this->Ciclo_model->obtener_ciclo($datosEditar['segmento']);

		//Carga la cabecera.
		$this->load->view('header');

		//Cargar la vista pasandole los datos del ciclo seleccionado.
		$this->load->view('ciclo/editar_ciclo', $datosEditar);

		//Carga el footer.
		$this->load->view('footer');
	}

	/*--------------------FIN FUNCIÓN EDITAR CICLO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN GUARDAR CAMBIOS CICLO------------------*/

	public function guardar_cambios_ciclo()
	{
		//Array con los datos del ciclo actualizado.
		$datosActualizado = array(
			'COD_Ciclo' => $this->input->post('COD_Ciclo'),
			'DESC_Ciclo' => $this->input->post('DESC_Ciclo'),
		);


		//Manda el ciclo seleccionado a guardar_cambios_ciclo.
	 	$idcicloActualizar=$this->uri->segment(3);
	 	$this->Ciclo_model->guardar_cambios_ciclo($idcicloActualizar,$datosActualizado);


	 	//Redirije a la página principal.
	 	redirect('Ciclo');
	}

	/*--------------------FIN FUNCIÓN GUARDAR CAMBIOS CICLO------------------*/

}