<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DevolucionesModel extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        public function devolver($venta,$cantidad) {
            $producto = null;
            $valor_producto = null;

            $query = $this->db->query("SELECT * FROM ventas  WHERE id_venta = '$venta'");

            foreach ($query->result() as $row){
                $producto = $row->producto;
                $total = $row->total;
                $cantidad_venta = $row->cantidad_venta;
                $valor_producto = $total / $cantidad_venta;
            }

            $dinero = $valor_producto*$cantidad;

            $this->db->query("UPDATE ventas SET cantidad_venta = cantidad_venta - '$cantidad', total = total - '$dinero' WHERE id_venta = '$venta'");

            return $dinero;
        }
    }
?>