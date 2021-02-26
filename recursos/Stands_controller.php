<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stands_controller extends CI_Controller {

	function __Construct() {
        parent::__Construct();
        $this->load->model('stands_model');
        $this->load->model('ferias_model');
        $this->load->model('usuarios_model');

        
    }

    function obtener_stands(){
    	$stands = $this->stands_model->otro_get_stands();
    	$data['stands'] = $stands;
    	$ferias = $this->ferias_model->get_ferias();
    	$data['ferias'] = $ferias;
        $usuarios = $this->usuarios_model->get_usuarios();
        $data['usuarios'] = $usuarios;

    	$this->load->view('informe_stands_view', $data);
    }

    function agregar_stands(){
        $feria = $this->input->post('feria');
        $usuario_enc = $this->input->post('usuario_enc');
        $nombre = $this->input->post('nombre');
        $slogan = $this->input->post('slogan');

        $data = array ('feria' => $feria,
                        'usuario_enc'=> $usuario_enc,
                        'nombre'=>$nombre,
                        'slogan'=>$slogan);
        $res_insert = $this->stands_model->insert_stands($data);
        if ($res_insert != false){
            $this->obtener_stands();
        }
    }

    function editar_stands(){
    	$id_stand = $this->input->post('input_id');
        $nombre = $this->input->post('input_nombre');
        $slogan= $this->input->post('input_slogan');
    	

    	$data = array (	
    					
    					'nombre' => $nombre,
                        'slogan' => $slogan

    				  );

    	$verificar = $this->stands_model->edit_stands($id_stand, $data);

    	if ($verificar){
    		$this->obtener_stands();
    	}	

    }

    function eliminar_stands($id){

    	$resultado = $this->stands_model->del_stands($id);

    	if($resultado){
    		$this->obtener_stands();
    	}
    
    }


}