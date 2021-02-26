<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('GastosModel');
		$this->load->model('LoginModel');
	}

	function index (){
		$this->LoginModel->validar_session_userferia();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userferia/gastos');
	}

	function consultar_feria () {
		$feria = $this->session->userdata['feria']->id_feria;
		$gastos = $this->GastosModel->consultar_feria($feria);
		echo json_encode($gastos);
	}
}

