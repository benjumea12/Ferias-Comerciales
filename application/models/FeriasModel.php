<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class FeriasModel extends CI_Model 
{
    function __construct() {
        parent::__construct();
    }

    function get_ferias(){
        $this->db->select('ferias.id_feria, ferias.estado, ferias.nombre_feria, ferias.fecha, ferias.lugar, ferias.descripcion, usuarios.id_usuario, usuarios.nombre_usuario, usuarios.email');
        $this->db->from('ferias');
        $this->db->join('usuarios', 'ferias.usuario_enc = usuarios.id_usuario');

        $query=$this->db->get();
        
        return $query->result();
    }

    function get_ferias_user(){
        $id = $this->session->userdata['info_usuario']->id_usuario;
        $this->db->select('ferias.id_feria, ferias.estado, ferias.nombre_feria, ferias.fecha, ferias.lugar, ferias.descripcion, usuarios.id_usuario, usuarios.nombre_usuario');
        $this->db->from('ferias');
        $this->db->join('usuarios', 'ferias.usuario_enc = usuarios.id_usuario');
        $this->db->where('usuario_enc', $id);

        $query=$this->db->get();
        
        return $query->result();
    }

    function get_ferias_id($feria){
        $this->db->select('ferias.id_feria, ferias.estado, ferias.nombre_feria, ferias.fecha, ferias.lugar, ferias.descripcion, usuarios.email, usuarios.nombre_usuario');
        $this->db->from('ferias');
        $this->db->join('usuarios', 'ferias.usuario_enc = usuarios.id_usuario');
        $this->db->where('id_feria', $feria);

        $query=$this->db->get();
        $row = $query->result();
        
        return $row[0];
    }

    function insert_ferias($data){
    	if ($this->db->insert('ferias',$data)) {
    		$id_insertado = $this->db->insert_id();
    		return $id_insertado;
    	}else{
    		return false;
    	}
    }

    function edit_ferias($id, $data){
        $this->db->where('id_feria', $id);

        if ($this->db->update('ferias', $data)){
            return true;
        }else{
            return false;
        }
    }

    function delete_ferias($feria){
        $this->db->query("UPDATE ferias SET  estado = 'inactiva'  WHERE id_feria = $feria");
    }
    
    function verificar_estado_feria ($feria) {
        $query = $this->db->query("SELECT * FROM ferias WHERE id_feria = $feria");

        foreach ($query->result() as $row) {
            if($row->estado == 'en curso'){ return true; }else{ return false;  };
        }
    }
}