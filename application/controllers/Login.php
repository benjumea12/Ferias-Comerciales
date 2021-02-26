<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();

		// Modelo de login
		$this->load->model('LoginModel');
		// Modelo de usuarios
		$this->load->model('UsuariosModel');
		// Libreria email de codeigniter
		$this->load->library('email');
	}

	public function index(){

		// Metodo para verificar si hay una sesion activa
		$this->redirigir();

		// Aqui se cargan los fragmentos de las vistas del login si no hay una sesion activa
		$this->load->view('general/head');
		$this->load->view('login');
		$this->load->view('general/footer');
	}

	// metodo para validar los datos de ingreso del usuario
	public function validar(){

		// Captura de datos del formulario del login
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Verificacion dedatos de ingreso en la base de datos
		$result = $this->LoginModel->ingresar($email,$password);

		// Repuesta
		switch (http_response_code()) {
			case 200: // Cliente encontrado
				$this->session->userdata['info_usuario'] = $result;

				// Metodo para verificar que tipo de sesion esta activa
				$this->redirigir();
			break;
			case 401: // Cliente no encontrado
				$this->output->set_status_header(401);
			break;
			case 403: // Cliente inactivo
				$this->output->set_status_header(403);
			break;
		}		
	}

	function redirigir () {
		if(isset($this->session->userdata['info_usuario'])){
			switch ($this->session->userdata['info_usuario']->tipo_usuario) {
				case 'admin': // Sesion admin activa, se redirige al home del admin
					redirect(base_url('index.php/admin/ferias'), 'refresh');
				break;
				case 'userferia': // Sesion userferia activa, se redirige al home del userferia
					redirect(base_url('index.php/userferia/ferias'), 'refresh');
				break;
				case 'userstand': // Sesion userstand activa, se redirige al home del userstand
					redirect(base_url('index.php/userstand/stands'), 'refresh');
				break;
			}
		}
	}

	// Metodo para cerrar sesion
	public function logout (){
		$this->LoginModel->logout();
	}

	// Metodo para cambiar contraseña
	function cambiar_pass(){

		// Captura de datos del formulario de recuperar contraseña
		$email = $this->input->post('email');

		// Verificar la existencia del usurio
		$res = $this->UsuariosModel->verificar($email);

		// Condicion esistencia del usurio
		if ($res == 'true'){

			// Creacion de la contraseña temporal
			$n_1 = rand(0,9); $n_2 = rand(0,9); $n_3 = rand(0,9); $n_4 = rand(0,9);
			$codigo = $n_1.$n_2.$n_3.$n_4;
			$codigo2 = $this->encryption->encrypt($codigo);
	
			// Registrar la contraseña temporal en la base de datos
			$data = array( 'password' => $codigo2 );
			$this->LoginModel->cambiar_passw($email, $data);
	
			// Formato de email de recuperacion de contraseña
			$html = 'CODIGO: '.$codigo.'   -Debes ingresar a FERIAS del SENA con este codigo provicional, recuerda cambiar la contraseña por la que desees depues de ingresar';
		
			$this->email->from('feriassena@gmail.com', 'Frias Sena');
			$this->email->to($email);
			$this->email->subject('Codigo de ingreso temporal a Feris Comerciales del SENA');
			$this->email->message($html);
	
			// Enviar email de recuperacion de contraseña
			$this->email->send();
		}else{
			// Ususario no existente
			echo '!existe';
		};
	}
}
