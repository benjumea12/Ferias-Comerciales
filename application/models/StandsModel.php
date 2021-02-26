<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class StandsModel extends CI_Model 
{
    function __construct() {
        parent::__construct();
    }

    function get_stands(){
        $id_usuario = $this->session->userdata['info_usuario']->id_usuario;

        $this->db->select('*');
        $this->db->from('stands');
        $this->db->join('usuarios', 'stands.usuario_enc = usuarios.id_usuario');
        $this->db->join('ferias', 'ferias.id_feria = stands.feria');
        $this->db->where('stands.usuario_enc', $id_usuario);
        $this->db->where('stands.estado_stand', 'activo');

    	$query=$this->db->get();

        return $query->result();
    }

    function otro_get_stands($id_feria){
    	$query = $this->db->query("SELECT * 
                                    FROM stands 
                                    INNER JOIN ferias ON stands.feria = ferias.id_feria 
                                    INNER JOIN usuarios ON stands.usuario_enc = usuarios.id_usuario
                                    WHERE feria = '$id_feria' AND estado_stand = 'activo'");

    	return $query->result();
    }

    function get_stands_user ($stand){
    	$this->db->select('*');
        $this->db->from('stands');
        $this->db->join('usuarios', 'stands.usuario_enc = usuarios.id_usuario');
        $this->db->join('ferias', 'ferias.id_feria = stands.feria');
        $this->db->where('stands.id_stand', $stand);

        $query = $this->db->get();
        $row = $query->result();

    	return $row[0];
    }

    function edit_stands($id_stand, $data){
        $this->db->where('id_stand', $id_stand);

        $this->db->update('stands', $data);
    }

    function eliminar($stand){
        if($this->session->userdata['feria']->estado == 'creada'){
            $this->db->where('id_stand', $stand);
            $this->db->delete('stands'); 

            $this->db->where('stand', $stand);
            $this->db->delete('productos'); 
        }else{
            $this->db->query("UPDATE stands SET  estado_stand = 'inactivo'  WHERE id_stand = $stand");
            $this->db->query("UPDATE productos SET  estado_producto = 'inactivo'  WHERE stand = $stand");
        }      
    }

    function agregar_u ($feria,$usuario,$nombre){
        $feria = $this->db->escape($feria);
        $usuario = $this->db->escape($usuario);
        $nombre = $this->db->escape($nombre);

        $query = $this->db->query("INSERT INTO stands (feria,usuario_enc,nombre,estado_stand)
                                    VALUES ($feria,$usuario,$nombre,'activo')");
    }

    function editar_u ($id_stand,$data) {
        $this->db->where('id_stand', $id_stand);
        $this->db->update('stands', $data);
    }
}



