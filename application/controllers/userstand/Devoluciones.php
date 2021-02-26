<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devoluciones extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('DevolucionesModel');
		$this->load->model('LoginModel');
		$this->load->model('VentasModel');
	}

	function index (){
		$this->LoginModel->validar_session_userstand();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userstand/devoluciones');
	}

	function consultar_stand () {
		$stand = $this->session->userdata['stand']->id_stand;
		$ventas = $this->VentasModel->consultar_stand($stand);
		echo json_encode($ventas);
	}

    function devolver ($venta){
		$cantidad = $this->input->post('cantidad');
        $dinero = $this->DevolucionesModel->devolver($venta,$cantidad);
        echo $dinero;
    }
}
