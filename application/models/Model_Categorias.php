<?php
class Model_Categorias extends CI_Model { 
   public function __construct() {
      parent::__construct();
   }
   public function guardar($id = null,$categoria,$descripcion,$infoExtra,$idUsuario ){
      $data = array(
         'id' => $id,
         'nombreCategoria' => $categoria,
         'idUsuario' => $idUsuario,
         'descripcion' => $descripcion,
         'infoExtra' => $infoExtra
         
      );
      if($id){
        $this->db->where('id', $id);
         $this->db->update('categorias', $data);
          
      }else{
         $this->db->insert('categorias', $data);
      } 
   }
   public function eliminar($id){
      $this->db->where('id', $id);
      $this->db->delete('informes');
   }
   public function obtener_por_id($id){
      $this->db->select('id, nombreCategoria, descripcion, infoExtra');
      $this->db->from('categorias');
      $this->db->where('id', $id);
      $consulta = $this->db->get();
      $resultado = $consulta->row_array();
      return $resultado;
   }
   public function obtener_todos($idUsuario){
      $this->db->select('id, nombreCategoria, idUsuario, descripcion, infoExtra,fecha');
      $this->db->from('categorias');
      $this->db->where('idUsuario', $idUsuario);
      $this->db->order_by('fecha', 'asc');
      $consulta = $this->db->get();
      $resultado = $consulta->result();
      return $resultado;
   }
   
   
     
}