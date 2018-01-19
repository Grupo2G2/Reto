<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->model('Reto_model');
		$this->load->model('Alumno_model');

	}

	//ok


	public function index(){

		$datos['usuario'] = $this->Alumno_model->obtener_nombre(3);
		$datos['retos'] = $this->Reto_model->obtener_retos_usu(3);
		
			
		$this->load->view('header_usuario',$datos);		
		$this->load->view('alumno/panel_alumno',$datos);
		$this->load->view('footer');
	}

	public function evaluar(){

		$datos['segmento']=$this->uri->segment(3);
		$this->load->view('header');		
		$this->load->view('alumno/evaluar_alumno',$datos);
		$this->load->view('footer');

	}






}