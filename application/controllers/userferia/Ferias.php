<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ferias extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('FeriasModel');
		$this->load->model('LoginModel');
	}

	public function index (){
		$this->LoginModel->validar_session_userferia();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userferia/ferias');
		$this->load->view('general/footer');
	}

	function obtener_ferias(){
    	$ferias = $this->FeriasModel->get_ferias_user();
    	echo json_encode($ferias);
	}
	
	public function validar_session () {
		if(!isset($this->session->userdata['info_usuario']) || $this->session->userdata['info_usuario']->tipo_usuario != 'userferia'){
			redirect(base_url('index.php/login/logout'), 'refresh');
		}
	}
}
