<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GastosModel extends  CI_Model {
    public function __construct() {
		parent::__construct();
	
  }
  
    function consultar_stand ($stand){
      $this->db->select('*');
      $this->db->from('gastos');
      $this->db->join('stands', 'stands.id_stand = gastos.stand');
      $this->db->where('gastos.stand', $stand);
      
      $query = $this->db->get();
      
      return $query->result();
    } 
    
    function consultar_feria ($feria){
      $this->db->select('*');
      $this->db->from('gastos');
      $this->db->join('stands', 'stands.id_stand = gastos.stand');
      $this->db->where('gastos.feria', $feria);
      $this->db->order_by('gastos.stand', 'ASC');
      
      $query = $this->db->get();
      
      return $query->result();
    } 

     function agregar($descripcion,$valor) {
      $feria = $this->session->userdata['feria']->id_feria;
      $stand = $this->session->userdata['stand']->id_stand;
	    $descripcion = $this->db->escape($descripcion);
	    $valor = $this->db->escape($valor);

        $this->db->query("INSERT INTO gastos (feria,stand,descripcion,total)
                        VALUES ($feria,$stand,$descripcion,$valor)");
      }
	
      function consultar(){
        $stand = $this->session->userdata['stand']->id_stand;
        //$this->db->select('id_categoria','nom_categoria');
        $query = $this->db->query("SELECT * FROM gastos WHERE stand = '$stand'");

        return $query->result();
      }
    
      function eliminar($gasto){
        $gastos  = $this->db->query("DELETE FROM gastos
        WHERE id_gasto = '$gasto'");

        return $gastos;
      }

     function editar($gasto,$descripcion,$valor) {

      $descripcion = $this->db->escape($descripcion);
      $valor = $this->db->escape($valor);
      
     $this->db->query("UPDATE gastos SET descripcion = $descripcion, total = $valor WHERE id_gasto = $gasto");
     }    
  }