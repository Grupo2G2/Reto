<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

		public function obtener_nombre($id){
		$query = "SELECT * FROM Usuario WHERE ID_Usuario = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	
}


?>