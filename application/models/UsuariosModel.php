<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariosmodel extends  CI_Model {
    public function __construct() {
		parent::__construct();
	
	}

    function agregar($tipo,$estado,$nombre,$email,$telefono,$password) {
	    $tipo = $this->db->escape($tipo);
	    $estado = $this->db->escape($estado);
		$nombre = $this->db->escape($nombre);
		$telefono = $this->db->escape($telefono);
	    $email = $this->db->escape($email);
        $password = $this->encryption->encrypt($password);
        
        $this->db->query("INSERT INTO usuarios (tipo_usuario,estado,nombre_usuario,email,telefono,password)
							VALUES ($tipo,$estado,$nombre,$email,$telefono,'$password')");
						
		return $this->db->insert_id();
    }
	
	function consultar(){
		$query = $this->db->query("SELECT * FROM usuarios WHERE tipo_usuario LIKE 'userferia' AND estado = 'Activo'");
		return $query->result();
	}

    function editar($usuario,$estado,$nombre,$email,$telefono) {
	    $estado = $this->db->escape($estado);
	    $nombre = $this->db->escape($nombre);
		$email = $this->db->escape($email);
		$telefono = $this->db->escape($telefono);
	   
	    $this->db->query("UPDATE usuarios SET estado = $estado,nombre_usuario =$nombre,email = $email,telefono = $telefono WHERE id_usuario = '$usuario'");
	}
	 function eliminar ($usuario){   
		$this->db->query("UPDATE usuarios SET estado = 'Inactivo' WHERE id_usuario = '$usuario'");
	}

	function verificar ($email) {
		$email = $this->db->escape($email);

		$query = $this->db->query("SELECT * FROM usuarios WHERE email = $email");
		$row = $query->row();

		if (isset($row)) { return 'true'; }else{ return 'false'; };
	}

	function verificar_dos ($email) {
		$email = $this->db->escape($email);

		$query = $this->db->query("SELECT * FROM usuarios WHERE email = $email");
		$row = $query->row();

		if (isset($row)) { 
			foreach ($query->result() as $row) {
				if($row->tipo_usuario == 'userstand'){
					$data =  array ('estado' => 'valido',
									'infouser' => $row);

					return $data;
				}else{
					$data =  array ('estado' => 'invalido');
					
					return $data;
				}
			}
		}else{
			$data =  array ('estado' => 'nulo');

			return $data;
		};
	}


	
	//====================

	function edit_datos($data){
		$id = $this->session->userdata['info_usuario']->id_usuario;
        $this->db->where('id_usuario', $id);

        $this->db->update('usuarios', $data);
    }	

	function cambio_password($data){
		$id = $this->session->userdata['info_usuario']->id_usuario;

		if($password==$confirm_password){
			$this->db->where('id_usuario', $id);
        	$this->db->update('usuarios', $data);
    	}	
	}

	function actualizar_session(){
		$id = $this->session->userdata['info_usuario']->id_usuario;

		$query  = $this->db->query("SELECT * FROM usuarios 
                                        WHERE id_usuario = $id");                                      

		foreach ($query->result() as $user){
			return $user;	
		}
	}
}