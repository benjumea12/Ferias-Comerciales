<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class NavegacionModel extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        public function navegacion() {
            $navegacion =   '<header class="header_area">
                                <div class="main_menu">
                                    <nav class="navbar navbar-expand-lg navbar-light">
                                        <div class="container">
                                            <!-- Brand and toggle get grouped for better mobile display -->
                                            <a class="navbar-brand logo_h" href="'.base_url('tienda/inicio').'">
                                                <img class="logo-1" src="'.base_url('recursos/img/logo.png').'" alt="">
                                                <img class="logo-2" src="'.base_url('recursos/img/logo-2.png').'" alt="">
                                            </a>
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <!-- Collect the nav links, forms, and other content for toggling -->
                                            <div class="collapse navbar-collapse offset pr-5 mr-5" id="navbarSupportedContent">
                                                <ul class="nav navbar-nav menu_nav ml-auto">
                                                    <li class="nav-item"><a class="nav-link" href="'.base_url('index.php/admin/ferias').'">Ferias</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="'.base_url('admin/vetas').'">Ventas</a></li>
                                                    <li class="nav-item"><a class="nav-link">|</a></li>
                                                    <li class="nav-item submenu dropdown">
                                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
                                                        <ul class="dropdown-menu">
                                                            <li class="nav-item"><a class="nav-link" href="blog.html">Mis Datos</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="single-blog.html">Compras</a></li>
                                                            <li class="nav-item"><a class="genric-btn danger-border btn-block" href="#">Salir</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </header>';


            return $navegacion;
        }
    }
?>