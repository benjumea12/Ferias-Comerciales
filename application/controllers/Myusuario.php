<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myusuario extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->model('UsuariosModel');
	}

	public function index(){
		$this->validar_session();

        $this->load->view('general/head');
        $this->load->view('general/navegacion');
		$this->load->view('myusuario');
    }
    
    public function validar_session () {
		if(!isset($this->session->userdata['info_usuario'])){
			redirect(base_url('index.php/login/logout'), 'refresh');
		}
	}

	//===============================================

	function editar_datos(){
        $nombre = $this->input->post('my_nombre');
        $email= $this->input->post('my_email');
    	
    	$data = array (	
    					'nombre_usuario' => $nombre,
                        'email' => $email
    				  );

		 $this->UsuariosModel->edit_datos($data);
		 $this->actualizar_session();
	}
	
	function validar_password () {
		$pass = $this->input->post('password'); 
		$pass_actual = $this->encryption->decrypt($this->session->userdata['info_usuario']->password);

		if($pass == $pass_actual){ echo 'true'; }else{ echo 'false'; }
	}

	function validar_email () {
		$email = $this->input->post('email'); 
		$verificacion = $this->UsuariosModel->verificar($email);

		echo $verificacion;
	}

    function editar_pass(){
        $pass = $this->encryption->encrypt($this->input->post('password')); 
        $data = array ('password' => $pass );

		$this->UsuariosModel->cambio_password($data);
		$this->actualizar_session();
	}
	
	function actualizar_session(){
		$this->session->userdata['info_usuario'] = $this->UsuariosModel->actualizar_session();
        echo json_encode($this->session->userdata['info_usuario']);
    }
}
