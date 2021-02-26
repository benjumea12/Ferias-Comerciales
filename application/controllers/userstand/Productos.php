<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('LoginModel');
		$this->load->model('ProductosModel');
		$this->load->model('StandsModel');
		$this->load->model('FeriasModel');
	}

	function inicio (){
		$this->LoginModel->validar_session_userstand();

		$stand = $_GET['id_stand'];

		$this->session->userdata['stand'] = $this->StandsModel->get_stands_user($stand);
		$this->session->userdata['feria'] = $this->FeriasModel->get_ferias_id($this->session->userdata['stand']->feria);
		
		$this->load->view('general/head');
		$this->load->view('general/navegacion');
		$this->load->view('userstand/productos');
	}

	public function agregar(){
		$stand = $this->session->userdata['stand']->id_stand;
		$nombre = $this->input->post('nombre');
		$cantidad = $this->input->post('cantidad');
		$precio = $this->input->post('precio');
		$descuento = $this->input->post('descuento');
		$iva = $this->input->post('iva');
		 echo('hola');

		$producto = $this->ProductosModel->agregar($stand,$nombre,$cantidad,$precio,$iva,$descuento);
		$img_name = 'producto'.$producto.'.jpg';


		$config['upload_path'] = 'recursos/img/productos';
		$config['allowed_types'] = 'gif|jpg|png|xlsx';
		$config['file_name'] = $img_name;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('campo_archivo')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			echo json_encode($data);
			$this->ProductosModel->agregar_img($producto,$img_name);
		}
	}

	public function  consultar (){
		$stand = $this->session->userdata['stand']->id_stand;

		$productos = $this->ProductosModel->consultar($stand);

		echo json_encode($productos);
	}

	public function cambiar_img ($producto) {
		$img_name = 'producto'.$producto.'.jpg';
		
		$config['upload_path'] = 'recursos/img/productos';
		$config['allowed_types'] = 'gif|jpg|png|xlsx';
		$config['file_name'] = $img_name;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('campo_archivo')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			echo json_encode($data);
			$this->ProductosModel->agregar_img($producto,$img_name);
		}
	}

	public function editar ($producto){
		$stand = $this->session->userdata['stand']->id_stand;
		$nombre = $this->input->post('nombre');
		$cantidad = $this->input->post('cantidad');
		$precio = $this->input->post('precio');
		$iva = $this->input->post('iva');
		$descuento = $this->input->post('descuento');
		$this->ProductosModel->editar($producto,$stand,$nombre,$cantidad,$precio,$iva,$descuento);
	}

	function eliminar ($producto){
		$this->ProductosModel->eliminar($producto);
	}

	public function validar_session () {
		if(!isset($this->session->userdata['info_usuario']) || $this->session->userdata['info_usuario']->tipo_usuario != 'userstand'){
			redirect(base_url('index.php/login/logout'), 'refresh');
		}
	}
}
