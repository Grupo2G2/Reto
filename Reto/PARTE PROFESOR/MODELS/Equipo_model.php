<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function obtener_equipo_reto($id){
		$query = $this->db->query("SELECT ID_Equipo, DESC_Equipo FROM Equipo WHERE ID_Reto = $id");
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_equipo_usuarios($id){
		$query = $this->db->query("SELECT Equipo.DESC_Equipo, Usuario.User, Usuario.ID_Usuario FROM Equipo, Equipo_Usuario, Usuario WHERE Equipo.ID_Equipo = Equipo_Usuario.ID_Equipo AND Equipo_Usuario.ID_Usuario = Usuario.ID_Usuario AND Equipo.ID_Equipo = $id");
		if($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function nuevo_equipo($datos){
		/*
		$datosBD = array(
			'DESC_TUsuario' => $this->input->post('Nombre')
		);
		$this->db->insert('TUsuario', $datosBD);
		echo "algo: " + $this->db->insert_id();
		$datosBD = array(
			'ID_Centro' => $this->input->post('ID_Centro'),
			'ID_TUsuario' => $this->db->insert_id(),
			'User' => $this->input->post('User'),
			'Password' => $this->input->post('Password'),									
			'Nombre' => $this->input->post('Nombre'),
			'Apellidos' => $this->input->post('Apellidos'),
			'Email' => $this->input->post('Email'),
			'Dni' => $this->input->post('Dni')
		);
		$this->db->insert('Usuario', $datosBD);
		*/
		
		
	}
	public function obtener_usuarios(){
		/*
		$query = "SELECT ID_Usuario, DESC_Centro, ID_TUsuario, User, Nombre, Apellidos, Email, Dni FROM Usuario, Centro WHERE Usuario.ID_Centro=Centro.ID_Centro";
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
		*/
	}
	public function obtener_usuarios_valores(){
		/*
		$query = "SELECT ID_Usuario, DESC_Centro, ID_TUsuario, User, Nombre, Apellidos, Email, Dni FROM Usuario, Centro WHERE Usuario.ID_Centro=Centro.ID_Centro";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
		*/
	}
	public function borrar_usuario($id){
		/*
		$where = $this->db->where('ID_Usuario',$id);
		$query = $this->db->get('Usuario');
		foreach ($query->result() as $row)
		{
        	$idts = $row->ID_TUsuario;
		}
		$this->db->where('ID_Usuario',$id);
		$this->db->delete('Usuario');
		$this->db->where('ID_TUsuario',$idts);
		$this->db->delete('TUsuario');
		*/
	}
	public function obtener_usuario($id){
		/*
		$where = $this->db->where('ID_Usuario',$id);
		$query = $this->db->get('Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
		*/
	}
	public function actualizar_usuario($id,$datos){
		/*
		$datosBD = array(
			'ID_Centro' => $datos['ID_Centro'],			
			'User' => $datos['User'],
			'Password' => $datos['Password'],
			'Nombre' => $datos['Nombre'],
			'Apellidos' => $datos['Apellidos'],
			'Email' => $datos['Email'],
			'Dni' => $datos['Dni'],
		);
		$this->db->where('ID_Usuario',$id);
		$this->db->update('Usuario', $datosBD);

		//select
		$where = $this->db->where('ID_Usuario',$id);
		$query = $this->db->get('Usuario');
		foreach ($query->result() as $row)
		{
        	$idts = $row->ID_TUsuario;
		}
		//update TUsuario
		$datosDB = array(
			'DESC_TUsuario' => $datos['Nombre'],
		);
		$this->db->where('ID_TUsuario',$idts);
		$this->db->update('TUsuario',$datosDB);
		*/
	}

	public function filtrar_usuarios_valores($filtro){
		/*
		$query = "SELECT ID_Usuario, DESC_Centro, ID_TUsuario, User, Nombre, Apellidos, Email, Dni FROM Usuario, Centro WHERE Usuario.ID_Centro=Centro.ID_Centro";
		if ($filtro['ID_Centro'] != 0){
			$query = $query . " and Centro.ID_Centro = " . $filtro['ID_Centro'];
		}		
		$query = $this->db->query($query);		
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
		*/
	}	
}