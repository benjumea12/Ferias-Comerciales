<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('UsuariosModel');
		$this->load->model('LoginModel');
	}

	function index (){
		$this->LoginModel->validar_session_admin();

		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('admin/usuarios');
		$this->load->view('general/footer');
	}

	function agregar(){
		$tipo = "userferia";
		$estado = "Activo";
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$telefono = $this->input->post('telefono');
		$password = $this->input->post('password');

		$this->UsuariosModel->agregar($tipo,$estado,$nombre,$email,$telefono,$password);

	}

	function  consultar (){
		$usuario = $this->UsuariosModel-> consultar();
		echo json_encode($usuario);
	}

	function editar ($usuario){
		$estado = "Activo";
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$telefono = $this->input->post('telefono');

		$this->UsuariosModel->editar($usuario,$estado,$nombre,$email,$telefono);
	}

	function eliminar ($usuario){
		$this->UsuariosModel->eliminar($usuario);
	}

	function verificar () {
		$email = $this->input->post('email');
		echo $this->UsuariosModel->verificar($email);
	}
}
