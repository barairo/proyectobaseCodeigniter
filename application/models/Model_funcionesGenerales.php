<?php
class model_funcionesGenerales extends CI_Model { 
   public function __construct() {
      parent::__construct();
   }
   public function guardar($titulo, $descripcion, $prioridad, $id=null){
      $data = array(
         'titulo' => $titulo,
         'descripcion' => $descripcion,
         'prioridad' => $prioridad
      );
      if($id){
         $this->db->where('id', $id);
         $this->db->update('informes', $data);
      }else{
         $this->db->insert('informes', $data);
      } 
   }
   public function eliminar($id){
      $this->db->where('id', $id);
      $this->db->delete('informes');
   }
   public function obtener_por_id($user,$password){
      $this->db->select('id, user, password, email');
      $this->db->from('kanrisha');
      $this->db->where('user', $user);
      $this->db->where('password',$password);
      $consulta = $this->db->get();
      //$resultado = $consulta->row();
      return $consulta;
   }
   public function obtener_todos(){
      $this->db->select('id, titulo, descripcion, prioridad');
      $this->db->from('informes');
      $this->db->order_by('prioridad, titulo', 'asc');
      $consulta = $this->db->get();
      $resultado = $consulta->result();
      return $resultado;
   }
}