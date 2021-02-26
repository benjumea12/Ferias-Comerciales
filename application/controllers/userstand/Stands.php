<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stands extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('LoginModel');
		$this->load->model('StandsModel');
	}

	public function index (){
		$this->LoginModel->validar_session_userstand();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userstand/stands');
		$this->load->view('general/footer');
	}
	
	function obtener_stands(){
    	$ferias = $this->StandsModel->get_stands();
    	echo json_encode($ferias);
	}
	
	function editar_stand($id_stand){
        $nombre = $this->input->post('nombre');
        $slogan= $this->input->post('slogan');
    	
    	$data = array (	
    					'nombre' => $nombre,
                        'slogan' => $slogan
    				  );

    	$verificar = $this->StandsModel->edit_stands($id_stand, $data);	
	}
	
	public function validar_session () {
		if(!isset($this->session->userdata['info_usuario']) || $this->session->userdata['info_usuario']->tipo_usuario != 'userstand'){
			redirect(base_url('index.php/login/logout'), 'refresh');
		}
	}
}
