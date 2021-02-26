<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('FacturacionModel');
		$this->load->model('FeriasModel');
		$this->load->model('LoginModel');
	}

	public function index (){
		$this->LoginModel->validar_session_userstand();

		$this->load->view('general/head');
		$this->load->view('userstand/facturacion');
		$this->load->view('general/footer');
	}

	function productos(){
		$prod = $this->FacturacionModel->get_productos();
		echo json_encode($prod);
	}

	function agregar($producto){
		$cantidad = $this->input->post('cantidad');
		$feria = $this->session->userdata['feria']->id_feria;
	  
		$verificacion = $this->FeriasModel->verificar_estado_feria($feria);

		if($verificacion){
			$this->FacturacionModel->agregar_carrito($producto,$cantidad);
		}else{
			echo 'false';
		}
	}
	  
	function consultar(){
		$carrito = $this->FacturacionModel->consulta_carrito();
		echo json_encode($carrito);  
	}

  	function editar($id){
		$cantidad = $this->input->post('cantidad');
		$precio = $this->input->post('precio');
		$descuento = $this->input->post('descuento');

		$this->FacturacionModel->editar($id,$cantidad,$precio,$descuento);
  	}

	function eliminar($carrito,$producto,$cantidad){
		$eliminar = $this->FacturacionModel->eliminar($carrito,$producto,$cantidad);
	}

	function terminar_compra(){
        $carrito = $this->FacturacionModel->terminar_compra();
          
	}
	
	function total_caja () {
		$stand = $this->session->userdata['stand']->id_stand;
		$total = $this->FacturacionModel->total_caja($stand);
		echo $total;
    }
}
