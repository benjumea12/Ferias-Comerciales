<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class LoginModel extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        // metodo para validar los datos de ingreso del usuario
        public function ingresar($email, $password) {

            // Escapar los datos datos de ingreso del usuario
            $email = $this->db->escape($email);
            
            // Consulta en la base de datos
            $query  = $this->db->query("SELECT * FROM usuarios 
                                        WHERE email = $email");                                      

            // Verificacion de resultado
            foreach ($query->result() as $user){
                if($this->encryption->decrypt($user->password) == $password){
                    if($user->estado == 'Activo'){
                        return $user; // Usuario encontrado activo
                    }else{
                        return $this->output->set_status_header(403); // Usuario encontrado inactivo
                    }
                };
            }

            // Usuario no encontrado
            return $this->output->set_status_header(401);
        }

        public function select() {
            $sql = "SELECT * FROM usuarios 
                    WHERE email = 'benju@' 
                    AND password = '300'";
                    
            $data = $this->db->query($sql)->result();
            return  $data;
        }

        // Metodo para cambiar contraseña
        function cambiar_passw($id, $data){
            $this->db->where('email', $id);
        
            if ($this->db->update('usuarios', $data)){
                return true;
            }else{
                return false;
            }
        }

        // Metodo para cerrar sesion
        public function logout (){
            $this->session->unset_userdata('info_usuario');
            $this->session->sess_destroy();
            $this->output->set_status_header();
    
            redirect(base_url(), 'refresh');
        }

        // Metodo para validar sesion admin
        public function validar_session_admin () {
            if(!isset($this->session->userdata['info_usuario']) || $this->session->userdata['info_usuario']->tipo_usuario != 'admin'){
                $this->logout();
            }
        }

        // Metodo para validar sesion userferia
        public function validar_session_userferia () {
            if(!isset($this->session->userdata['info_usuario']) || $this->session->userdata['info_usuario']->tipo_usuario != 'userferia'){
                $this->logout();
            }
        }

        // Metodo para validar sesion userstand
        public function validar_session_userstand () {
            if(!isset($this->session->userdata['info_usuario']) || $this->session->userdata['info_usuario']->tipo_usuario != 'userstand'){
                $this->logout();
            }
        }
    }
?>