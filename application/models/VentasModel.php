<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasModel extends  CI_Model {
    public function __construct() {
      parent::__construct();
    
    }

    function consultar_stand ($stand){
      $this->db->select('*');
      $this->db->from('ventas');
      $this->db->join('stands', 'stands.id_stand = ventas.stand');
      $this->db->join('productos', 'productos.id_producto = ventas.producto');
      $this->db->where('ventas.stand', $stand);
      
      $query = $this->db->get();
      
      return $query->result();
    } 
    
    function consultar_feria ($feria){
      $this->db->select('*');
      $this->db->from('ventas');
      $this->db->join('stands', 'stands.id_stand = ventas.stand');
      $this->db->join('productos', 'productos.id_producto = ventas.producto');
      $this->db->where('ventas.feria', $feria);
      $this->db->order_by('ventas.stand', 'ASC');
      
      $query = $this->db->get();
      
      return $query->result();
    } 
  }
  