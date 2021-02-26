<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ferias extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('FeriasModel');
		$this->load->model('LoginModel'); 
	}

	public function index (){
		$this->LoginModel->validar_session_admin();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('admin/ferias');
		$this->load->view('general/footer');
	}

	function obtener_ferias(){
    	$ferias = $this->FeriasModel->get_ferias();
    	echo json_encode($ferias);
    }

    function agregar_ferias(){
		$estado = 'creada';
		$nombre = $this->input->post('nombre');
		$fecha = $this->input->post('fecha');
		$lugar = $this->input->post('lugar');
		$descripcion = $this->input->post('descripcion');
		$usuario_enc = $this->input->post('usuario_enc');

    	$data = array ('estado' => $estado,
						'nombre_feria' => $nombre,
						'fecha' => $fecha,
						'lugar' => $lugar,
						'descripcion' => $descripcion,
						'usuario_enc' => $usuario_enc);
		$res_insert = $this->FeriasModel->insert_ferias($data);
	}
	
	function editar_ferias($id){
    $nombre = $this->input->post('nombre');
		$fecha = $this->input->post('fecha');
		$lugar = $this->input->post('lugar');
		$descripcion = $this->input->post('descripcion');
		$usuario_enc = $this->input->post('encargado');

    	$data = array (	
						'nombre_feria' => $nombre,
						'fecha' => $fecha,
						'lugar' => $lugar,
						'descripcion' => $descripcion,
						'usuario_enc' => $usuario_enc
    				  );

    	$verificar = $this->FeriasModel->edit_ferias($id, $data);
    }

    function eliminar_ferias($id){
    	$resultado = $this->FeriasModel->delete_ferias($id);
	}
	
	function editar_estado($id){
		$estado = $this->input->post('estado');

		$data = array ('estado' => $estado);

		$verificar = $this->FeriasModel->edit_ferias($id, $data);
	}
}
