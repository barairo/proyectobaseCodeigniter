<?php

class IndexAdministrativo extends CI_Controller {

    public function index() {
        $dataH = array();
        $dataH['archivoJS'] = "js";
        $this->load->view('view_IndexAdministrativo', $dataH);
        $newdata = array(
                   'accesLvl'  => 10 /*,
                   'email'     => 'johndoe@some-site.com',
                   'logged_in' => TRUE*/
               );

$this->session->set_userdata($newdata);
    }

    public function valida() {
        $form_data = $this->input->post();
        // or just the username:
        $username = $this->input->post("Nombre");
        $password = $this->input->post("Password");
        $dataH['titulo_pagina'] = "nada";

        $this->load->model('model_funcionesGenerales');
        $resultado = $this->model_funcionesGenerales->obtener_por_id($username, $password);
        if (  $resultado->num_rows() > 0 ) {
            $row = $resultado->row();
            
            /*echo $row->user;
            echo $row->password;
            echo $row->id;*/
            
                    $newdata = array(
                   'usuarioActivo'  => $row->id  
               );

$this->session->set_userdata($newdata);
            
            redirect('MenuAdministrativo', 'refresh');
            //$this->load->view('view_MenuAdministrativo');
        }
        else
        {
            echo "Error con el nombre de usuario o contraseña";
            //redirect('Error', 'refresh');
            
            
        }
       
    }

}

?>