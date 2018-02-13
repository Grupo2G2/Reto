<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	/*--------------------CONSTRUCTOR------------------*/

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/*--------------------FIN CONSTRUCTOR------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN OBTENER USUARIOS------------------*/

	//Función que obteniendo el parámetro "ID_Centro" de la función "obtener_usuarios" de "Usuario.php" obtiene los usuarios.
	public function obtener_usuarios($idCentro, $idTipoUsuario){

		$sql="SELECT ID_Usuario, ID_Centro, ID_TUsuario, User, Password, Nombre, Apellidos, Email, Dni FROM Usuario WHERE ID_Centro = $idCentro AND ID_TUsuario = $idTipoUsuario";

		$consulta = $this->db->query($sql);

		if ($consulta->num_rows() > 0){
			return $consulta;
		}
		
		else{
			return false;
		}
	}

	/*--------------------FIN FUNCIÓN OBTENER USUARIOS------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN NUEVO USUARIO------------------*/

	//Función que obteniendo el parámetro "datosNuevo" de la función "nuevo_usuario" de "Usuario.php" inserta un nuevo usuario a la base de datos.
	public function nuevo_usuario($datosNuevo){

		$sql="INSERT INTO Usuario VALUES (NULL,'".$datosNuevo['ID_Centro']."', '".$datosNuevo['ID_TUsuario']."', '".$datosNuevo['User']."', 'Contraseña', '".$datosNuevo['Nombre']."', '".$datosNuevo['Apellidos']."', '".$datosNuevo['Email']."', '".$datosNuevo['Dni']."')";

		$consulta = $this->db->query($sql);
	}

	/*--------------------FIN FUNCIÓN NUEVO USUARIO------------------*/	


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN BORRAR USUARIO------------------*/

	//Función que obteniendo el parámetro "idusuarioBorrar" de la función "borrar_usuario" de "Usuario.php" borra el usuario de la base de datos.
	public function borrar_usuario($idusuarioBorrar){

		$this->db->where('ID_Usuario',$idusuarioBorrar);
		$this->db->delete('Usuario');
	}

	/*--------------------FIN FUNCIÓN BORRAR USUARIO------------------*/	


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN OBTENER USUARIO------------------*/

	//Función que obteniendo el parámetro "ID_Usuario" de la función "guardar_cambios_usuario" de "Usuario.php" obtiene los datos del usuario seleccionado.
	public function obtener_usuario($datosEditar){

		$sql="SELECT ID_Usuario, ID_Centro, ID_TUsuario, User, Password, Nombre, Apellidos, Email, Dni FROM Usuario WHERE ID_Usuario = $datosEditar";

		$consulta = $this->db->query($sql);

		if ($consulta->num_rows() > 0){
			return $consulta;
		}
		
		else{
			return false;
		}
	}

	/*--------------------FIN FUNCIÓN OBTENER USUARIO------------------*/


	/*-------------------------------------------------------*/


	/*--------------------FUNCIÓN GUARDAR CAMBIOS USUARIO------------------*/

	//Función que obteniendo el parámetro de la función "guardar_cambios_usuario" de "Usuario.php" obtiene los datos del usuario seleccionado.
	public function guardar_cambios_usuario($idusuarioActualizar,$datosActualizado){

		$this->db->where('ID_Usuario',$idusuarioActualizar);
		$this->db->update('Usuario',$datosActualizado);
	}

	/*--------------------FIN FUNCIÓN GUARDAR CAMBIOS USUARIO------------------*/
}


?>