<?php

class Agregar extends CI_Controller {

//public function index()
//	{
//            $session_accesLvl = $this->session->userdata('accesLvl');
//            if($session_accesLvl != 20){
//                  redirect('Welcome', 'refresh');
//            }
//            else
//                {
//                $data['titulo_pagina'] = "Menu Administrativo";
//		$this->load->view('view_MenuAdministrativo', $data);
//                $this->session->unset_userdata('accesLvl');
//                }
//                
//	}

    public function codigo() {
        $session_accesLvl = $this->session->userdata('accesLvl');
        if ($session_accesLvl != 30) {
            redirect('Welcome', 'refresh');
        } else {
            $data['titulo_pagina'] = "Crear Codigo nuevo";
            $this->load->view('view_AgregarCodigo', $data);
            // $this->session->unset_userdata('accesLvl');
        }
    }

    public function categoria() {
        $dataH = array();
        $dataH['archivoJS'] = "js";
        $dataH['titulo_pagina'] = "Nueva Categoria";
        $this->load->view('view_Head', $dataH);
        $idUsuario = $this->session->userdata('usuarioActivo');
        $this->load->model('Model_Categorias');
        $data['Categorias'] = $this->Model_Categorias->obtener_todos($idUsuario);
        $this->load->view('view_Agregar_Categoria', $data);
    }

    public function Nuevo() {
        //$form_data = $this->input->post();
        // or just the username:
        $idUsuario = $this->session->userdata('usuarioActivo');
        $this->load->model('Model_Categorias');
        
        $categoria = $this->input->post("categoria");
        $descripcion = $this->input->post("descripcion");
        $infoExtra = $this->input->post("infoExtra");


        $data['titulo_pagina'] = "nada";

        $this->load->model('Model_Categorias');
        $resultado = $this->Model_Categorias->guardar(0, $categoria, $descripcion, $infoExtra,$idUsuario);
        redirect('MenuAdministrativo', 'refresh');
    }

    public function data_ajax() {
        $idUsuario = $this->session->userdata('usuarioActivo');
        $data = array(
            'id' => $this->input->post('id'),
            'idUsuario' => $idUsuario,
            'descripcion' => $this->input->post('descripcion'),
            'gasto' => $this->input->post('gasto'),
            'idCategoria' => $this->input->post('idCategoria'),
            'cantidad' => $this->input->post('cantidad')          
          
        );

         $this->load->model('Model_Gastos');
         $resultado = $this->Model_Gastos->guardar($data);
 
    }
    
    public function borrarRegistro()
        {
        $data = array(
        'id' => $this->input->post('id')       
        );
        
        $this->load->model('Model_Gastos');
        $resultado = $this->Model_Gastos->eliminar($data['id']);
        
        }
}

?>