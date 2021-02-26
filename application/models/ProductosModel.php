<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends  CI_Model {
    public function __construct() {
		parent::__construct();
	
	}

     function agregar($stand,$nombre,$cantidad,$precio,$iva,$descuento) {
		$precio_total = $precio-(($precio/100)*$iva);

        $stand = $this->db->escape($stand);
	    $nombre = $this->db->escape($nombre);
	    $cantidad = $this->db->escape($cantidad);
		$precio = $this->db->escape($precio);
		$iva = $this->db->escape($iva);
		$descuento = $this->db->escape($descuento);

        $this->db->query("INSERT INTO productos (stand,nombre_producto,cantidad,precio,iva,precio_total,estado_producto,descuento)
						VALUES ($stand,$nombre,$cantidad,$precio_total,$iva,$precio,'activo',$descuento)");
						
		return $this->db->insert_id();					
    }
	
	function consultar($stand){
		//$this->db->select('id_categoria','nom_categoria');
		$query = $this->db->query("SELECT * FROM productos WHERE stand = '$stand' AND estado_producto = 'activo'");

		return $query->result();
	}

    function editar($producto,$stand,$nombre,$cantidad,$precio,$iva,$descuento) {
		$precio_total = $precio-(($precio/100)*$iva);

     	$stand = $this->db->escape($stand);
	    $nombre = $this->db->escape($nombre);
	    $cantidad = $this->db->escape($cantidad);
	    $precio = $this->db->escape($precio);
		$producto = $this->db->escape($producto);
		$iva = $this->db->escape($iva);
		$descuento = $this->db->escape($descuento);
	   
	    $this->db->query("UPDATE productos SET  stand = $stand,
												nombre_producto = $nombre,
												cantidad = $cantidad,
												precio = $precio_total,	
												iva = $iva,
												precio_total = $precio,
												descuento = $descuento
												WHERE id_producto = $producto");
	}

	function agregar_img ($producto,$img) {
		$this->db->query("UPDATE productos SET img = '$img' WHERE id_producto = $producto");
	}

	function eliminar ($producto){   
		if($this->session->userdata['feria']->estado == 'creada'){
			$producto  = $this->db->query("DELETE FROM productos WHERE id_producto = '$producto'");
		}else{
			$this->db->query("UPDATE productos SET  estado_producto = 'inactivo'  WHERE id_producto = $producto");
		}
		
		return $producto;
	}
  }