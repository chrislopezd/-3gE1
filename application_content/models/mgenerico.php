<?php
class Mgenerico extends CI_Model {
  const TBL_PERFILES_MODALIDADES = 's_perfiles';
  const TBL_MODALIDADES = 's_cat_tipos';
	public function __construct(){
		$this->load->database();
	}
	public function now(){
       return  $this->db->query("SELECT NOW() AS fecha")->row()->fecha;
    }
    public function hora(){
    	return $this->db->query("SELECT DATE_FORMAT(NOW(),' %H:%i:%s') AS hora")->row()->hora;
    }
    public function now2(){
       return  $this->db->query("SELECT DATE_FORMAT(NOW(),'%d/%m/%Y') AS fecha")->row()->fecha;
    }
    public function validarLogin($f = ''){
      if(empty($f)){return false;}
      $r = array();
      $this->db->select("u.idUsuario,u.idPerfilUsuario,u.idTipo,t.tipo,u.programa,u.observaciones,u.fechaAcceso",FALSE);
      $this->db->from("s_usuarios AS u");
      $this->db->join("s_cat_tipos AS t","t.idTipo = u.idTipo");
      $this->db->where('u.estatusUsuario',"1");
      if (!empty($f['usuario'])){
        $this->db->where('u.programa',$f['usuario']);
      }
      if(!empty($f['pass'])){
        $this->db->where('u.contrasena',md5(strtoupper($f['pass'])));
      }
      if(!empty($f['idUsuario'])){
        $this->db->where('u.idUsuario',$f['idUsuario']);
      }
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() > 0){
        return  $query->row_array();
      }
    }
    public function updateFechaInicio($idUsuario){
      if(empty($idUsuario)){return FALSE;}
      $this->db->query("UPDATE s_usuarios SET fechaAcceso = NOW() WHERE idUsuario = {$idUsuario}");
    }
}
?>