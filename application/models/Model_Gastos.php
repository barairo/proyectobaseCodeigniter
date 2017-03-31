<?php
class Model_Gastos extends CI_Model { 
   public function __construct() {
      parent::__construct();
   }
   public function guardar($data){
       
      $data = array(
         'id' => $data['id'],
         'idUsuario' => $data['idUsuario'],
         'descripcion' => $data['descripcion'],
         'gasto' => $data['gasto'],
         'idCategoria' => $data['idCategoria'],
         'cantidad' => $data['cantidad'],
         
      );
      if($id){
        $this->db->where('id', $id);
         $this->db->update('gastos', $data);
          
      }else{
         $this->db->insert('gastos', $data);
      } 
   }
   public function eliminar($id){
      $this->db->where('id', $id);
      $this->db->delete('gastos');
   }
   public function obtener_por_id($id){
      $this->db->select('id, nombreCategoria, descripcion, infoExtra');
      $this->db->from('categorias');
      $this->db->where('id', $id);
      $consulta = $this->db->get();
      $resultado = $consulta->row_array();
      return $resultado;
   }
   public function obtener_todos(){///no ocupada
      $this->db->select('id, idUsuario, descripcion, gasto, idCategoria,cantidad');
      $this->db->from('gastos');
      $this->db->where('idUsuario = 1');
      $this->db->where('idCategoria = 1');
      $this->db->order_by('id', 'asc');
      $consulta = $this->db->get();
      $resultado = $consulta->result();
      return $resultado;
   }
   
   function obtener_gastos($idCategoria, $idUsuario)
{

   $sql='SELECT * FROM gastos WHERE MONTH(fecha) = MONTH(CURRENT_DATE())  AND  idCategoria=? AND idUsuario=? order by id';
   $query=$this->db->query($sql, array($idCategoria,$idUsuario));
   return $query->result_array();     

}
   
 function obtener_gastosPorDia($mes,$año,$idUsuario)
{

   $sql='SELECT DISTINCT  
        DAY(fecha) as dias,      
        MAX(idUsuario)
        FROM gastos 
        WHERE MONTH(fecha) = ? AND YEAR(fecha) = ?  AND idUsuario=? 
        group by   
            dias
        order by idUsuario';
   $query=$this->db->query($sql, array($mes,$año,$idUsuario));
   return $query->result_array();     

}   
     
}