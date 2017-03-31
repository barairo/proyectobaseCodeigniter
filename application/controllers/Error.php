<?php

class Error extends CI_Controller {

    public function index() {
        $data['titulo_pagina'] = "Error";
        $this->load->view('view_errorLogin');
    }

    

}

?>