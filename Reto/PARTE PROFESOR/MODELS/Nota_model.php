<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function obtener_nota_alumno($idreto, $iduser, $ID_Competencia){
		$query = $this->db->query("SELECT ID_Nota FROM Notas WHERE ID_Reto = $idreto AND ID_Usuario = $iduser AND ID_Competencia = $ID_Competencia");
		if ($query->num_rows() > 0){
			return $query->row()->ID_Nota;
		}else{
			return false;
		}
	}
		
	public function agregar_notas_profesor($idreto, $ID_User, $ID_Competencia, $ID_Nota, $id){
		$datosBD = array(
			'ID_Reto' => $idreto,
			'ID_Medicion' => 3,
			'ID_Usuario' => $ID_User,
			'ID_Competencia' => $ID_Competencia,
			'Nota' => $ID_Nota,
			'ID_Evaluador' => $id
		);
		$this->db->insert('Notas', $datosBD);
	}

	public function actualizar_nota($ID_Nota, $Nota){
		$datosBD = array(
			'Nota' => $Nota,
		);
		$this->db->where('ID_Nota',$ID_Nota);
		$this->db->update('Notas', $datosBD);
	}	
}
?>