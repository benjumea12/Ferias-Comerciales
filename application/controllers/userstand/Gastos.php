<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('ProductosModel');
		$this->load->model('StandsModel');
		$this->load->model('FeriasModel');
		$this->load->model('GastosModel');
		$this->load->model('LoginModel');
	}

	function index (){
		$this->LoginModel->validar_session_userstand();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userstand/gastos');
	}

	public function agregar(){
		
		$descripcion = $this->input->post('descripcion');
		$valor = $this->input->post('valor');
		
		$this->GastosModel->agregar($descripcion,$valor);
	}

	function consultar(){
		$gasto = $this->GastosModel->consultar();
		echo json_encode($gasto);  
	}

	function eliminar ($gasto){

		$this->GastosModel->eliminar($gasto);
	}

	function editar($gasto){

		$descripcion = $this->input->post('descripcion1');
		$valor = $this->input->post('valor1');
		
		$this->GastosModel->editar($gasto,$descripcion,$valor);
	}
}

