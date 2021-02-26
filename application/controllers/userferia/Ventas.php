<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('VentasModel');
		$this->load->model('GastosModel');
		$this->load->model('LoginModel');
	}

	function index (){
		$this->LoginModel->validar_session_userferia();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userferia/ventas');
	}

	function consultar_ventas_feria () {
		$feria = $this->session->userdata['feria']->id_feria;
		$ventas = $this->VentasModel->consultar_feria($feria);
		echo json_encode($ventas);
	}

	function consultar_gastos_feria () {
		$feria = $this->session->userdata['feria']->id_feria;
		$gastos = $this->GastosModel->consultar_feria($feria);
		echo json_encode($gastos);
	}
}

