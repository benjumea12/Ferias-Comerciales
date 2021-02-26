<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stands extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
        $this->load->model('StandsModel');
        $this->load->model('FeriasModel');
        $this->load->model('UsuariosModel');
        $this->load->model('LoginModel');
	}

	public function inicio (){
        $this->LoginModel->validar_session_userferia();
        
        $feria = $_GET['id_feria'];
        $this->session->userdata['feria'] = $this->FeriasModel->get_ferias_id($feria);
                
		$this->load->view('general/head');
        $this->load->view('general/navegacion');
		$this->load->view('userferia/stands');
		$this->load->view('general/footer');
	}

	function obtener_stands(){
        $id_feria = $this->session->userdata['feria']->id_feria;
    	$stands = $this->StandsModel->otro_get_stands($id_feria);
    	echo json_encode($stands);
    }

    function verificar () {
        $email = $this->input->post('email');
        $usuario = $this->UsuariosModel->verificar_dos($email);
		echo json_encode($usuario);
    }

    function eliminar ($id_stand) {
        $this->StandsModel->eliminar($id_stand);
    }

    function editar_stands($id_stand){
        $nombre = $this->input->post('nombre');
        $slogan= $this->input->post('slogan');
    	
    	$data = array (	
    					'nombre' => $nombre,
                        'slogan' => $slogan
    				  );

    	$verificar = $this->StandsModel->edit_stands($id_stand, $data);	
    }
    
    function agregar_u () {
        $id_feria = $this->session->userdata['feria']->id_feria;
        $nombre = $this->input->post('nombre');

        if(null != $this->input->post('id_usuario')){
            $id_usuario = $this->input->post('id_usuario');
            $this->StandsModel->agregar_u($id_feria,$id_usuario,$nombre);
        }else{
            $nombre_usuario = $this->input->post('nombre_usuario');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $id_usuario = $this->UsuariosModel->agregar('userstand','Activo',$nombre_usuario,$email,'00',$password);
            $this->StandsModel->agregar_u($id_feria,$id_usuario,$nombre);
        }
    }

    function editar_u ($stand) {

        if(null != $this->input->post('id_usuario')){
            $data = array ('usuario_enc' => $this->input->post('id_usuario'));
            $this->StandsModel->editar_u($stand,$data);
        }else{
            $nombre_usuario = $this->input->post('nombre_usuario');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $id_usuario = $this->UsuariosModel->agregar('userstand','Activo',$nombre_usuario,$email,$password);
            $data = array ('usuario_enc' => $id_usuario);
            $this->StandsModel->editar_u($stand,$data);
        }
    }

    public function validar_session () {
		if(!isset($this->session->userdata['info_usuario']) || $this->session->userdata['info_usuario']->tipo_usuario != 'userferia'){
			redirect(base_url('index.php/login/logout'), 'refresh');
		}
	}
}
