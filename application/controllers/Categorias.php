<?php

class Categorias extends CI_Controller {

public function index()
	{
            $dataH = array();
            $dataH['archivoJS'] = "js";   
            $data = array();
            $idUsuario = $this->session->userdata('usuarioActivo');           
                $this->load->view('view_Head',$dataH);                
                $this->load->model('Model_Categorias');             
                $data['Categoria'] = $this->Model_Categorias->obtener_todos($idUsuario);          
                $this->load->view('view_Categorias',$data);
                
	}
   
        public function categoria($categoria)
	{   $dataH = array();
            $dataH['archivoJS'] = "js";   
            $data = array();
            $idUsuario = $this->session->userdata('usuarioActivo'); 
                $this->load->view('view_Head',$dataH);
                
                $this->load->model('Model_Categorias');
                $this->load->model('Model_Gastos');
                $data['Categoria'] = $this->Model_Categorias->obtener_por_id($categoria);
                $data['Gastos'] = $this->Model_Gastos->obtener_gastos($categoria,$idUsuario);
                $this->load->view('view_Ver',$data);
                      
	}
        
        public function categoriCategogaxDia($categoria)
	{   $dataH = array();
            $dataH['archivoJS'] = "js";   
            $data = array();
        
                $this->load->view('view_Head',$dataH);
                
                $this->load->model('Model_Categorias');
                $this->load->model('Model_Gastos');
                $data['Categoria'] = $this->Model_Categorias->obtener_por_id($categoria);
                $data['Gastos'] = $this->Model_Gastos->obtener_gastos($categoria,1);
                $this->load->view('view_Categorias',$data);
                      
	}
        
      
}
?>