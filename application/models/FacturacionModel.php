<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class FacturacionModel extends CI_Model 
{
    function __construct() {
        parent::__construct();
    }

    function get_productos(){
        $stand = $this->session->userdata['stand']->id_stand;
        $query = $this->db->query("SELECT * FROM productos WHERE stand = '$stand'");
        return $query->result();
    }

    function consulta_carrito(){
        $stand = $this->session->userdata['stand']->id_stand;
        $query = $this->db->query("SELECT * FROM carrito 
                                    INNER JOIN productos 
                                    ON carrito.id_producto = productos.id_producto
                                    WHERE carrito.stand = '$stand'");

        return $query->result();
    }

    function total_caja ($stand) {
        $ventas = 0;
        $gastos = 0;

        $query = $this->db->query("SELECT SUM(total) AS total_ventas FROM ventas WHERE stand = $stand");
        foreach ($query->result() as $row){ $ventas = (int)$row->total_ventas; }
        $query = $this->db->query("SELECT SUM(total) AS total_gastos FROM gastos WHERE stand = $stand");
        foreach ($query->result() as $row){ $gastos = (int)$row->total_gastos; }

        $total_caja = $ventas-$gastos;
        return $total_caja;
    }

    function agregar_carrito($id_producto,$cantidad) {
        $stand = $this->session->userdata['stand']->id_stand;
        $feria = $this->session->userdata['feria']->id_feria;

        $query = $this->db->query("SELECT * FROM productos WHERE id_producto = '$id_producto'");
        $row = $query->result();
        $precio_producto = $row[0]->precio_total-(($row[0]->precio_total)/100)*$row[0]->descuento;

        $query = $this->db->query("SELECT * FROM carrito WHERE id_producto = '$id_producto'");
        $row = $query->row();

        if (isset($row)) {
            $id = $row->id_carrito;
            $cantidad_update = (int)$row->cantidad_carrito;
            $nueva_cantidad = $cantidad_update + $cantidad;
            $total = $precio_producto*$nueva_cantidad;

            $this->db->query("UPDATE carrito SET cantidad_carrito = $nueva_cantidad, total = $total WHERE id_carrito = $id");
        }else{
            $total = $precio_producto*$cantidad;
            $this->db->query("INSERT INTO carrito (stand,feria,id_producto,cantidad_carrito,total)  
                          VALUES ($stand,$feria,$id_producto,$cantidad,$total)"); 
        }
      }

    function editar($id,$cantidad,$precio,$descuento) {
        $precio = (int)$precio-(($precio/100)*$descuento);
        $cantidad = (int)$cantidad;
        $total = $cantidad*$precio;
        
        $this->db->query("UPDATE carrito SET cantidad_carrito = $cantidad, total = $total WHERE id_carrito = $id");
     }

      
	 function eliminar ($carrito,$producto,$cantidad){   
        $car  = $this->db->query("DELETE FROM carrito WHERE id_carrito = '$carrito'");
        $this->db->query("UPDATE productos SET cantidad = cantidad + $cantidad WHERE id_producto = $producto");
        
        return $car;
    }
    
    function terminar_compra(){
        $stand = $this->session->userdata['stand']->id_stand;
        $query = $this->db->query("SELECT * FROM carrito 
                                    INNER JOIN productos ON productos.id_producto = carrito.id_producto
                                    WHERE carrito.stand = '$stand'");
        
        foreach ($query->result() as $row){
            $id = $row->id_carrito;
            $feria = $row->feria;
            $stand = $row->stand;
            $producto = $row->id_producto;
            $precio_p = $row->precio_total-(($row->precio_total/100)*$row->descuento);
            $cantidad = $row->cantidad_carrito;
            $total = $row->total;

            $this->db->query("INSERT INTO ventas (stand,feria,producto,precio_producto_v,cantidad_venta,total)
                          VALUES ($stand,$feria,$producto,$precio_p,$cantidad,$total)");
        }

        $this->db->query("DELETE FROM carrito WHERE stand = '$stand'");
    }
    
}
