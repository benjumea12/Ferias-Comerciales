<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('LoginModel');
		$this->load->model('VentasModel');
		$this->load->model('GastosModel');
	}

	function index (){
		$this->LoginModel->validar_session_userstand();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userstand/ventas');
	}

	function consultar_ventas_stand () {
		$stand = $this->session->userdata['stand']->id_stand;
		$ventas = $this->VentasModel->consultar_stand($stand);
		echo json_encode($ventas);
	}

	function consultar_gastos_stand(){
		$stand = $this->session->userdata['stand']->id_stand;
		$gasto = $this->GastosModel->consultar_stand($stand);
		echo json_encode($gasto);  
	}
}

