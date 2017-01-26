<?php
class Minicio extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
  public function getNow(){
    return $this->db->query("SELECT DATE_FORMAT(NOW(),'%d-%m-%Y__%H:%i:%s') AS fecha")->row()->fecha;
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
  public function fechaMySQL($f){
    if($f != ""){
      $fr = explode("/",$f);
      return $fr[2]."-".$fr[1]."-".$fr[0];
    }
  }
  public function getUsuariosListado(){
    $res = array('STATUS' => FALSE, 'DATOS' => array());
    $this->db->select("u.idUsuario,u.programa,u.observaciones,u.contrasena,p.nombrePerfilUsuario,u.idPerfilUsuario,t.tipo,IF(u.estatusUsuario = 1,'Activo','Inactivo') AS estatusUsuario",FALSE);
    $this->db->from("s_usuarios AS u");
    $this->db->join('s_perfiles AS p', 'p.idPerfilUsuario = u.idPerfilUsuario');
    $this->db->join('s_cat_tipos AS t', 't.idTipo = u.idTipo');
    $query = $this->db->get();
    $tmp = $query->num_rows();
    if ($tmp > 0){
      $res["STATUS"] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }
  public function getCiclo($tipo = 1){
    $data = $this->db->query("SELECT idciclo,curso FROM s_cat_ciclos WHERE estatus = 1 ORDER BY idciclo DESC LIMIT 1")->row();
    if(count($data) > 0){
      return ($tipo == 1) ? $data->idciclo : $data;
    }else{
      return ($tipo == 1) ? 1 : array("idciclo" => 1, "curso" => "");
    }
  }

  public function getCatPerfiles($id = 0){
    $res = array('RES' => FALSE, 'DATOS' => '');

    $this->db->select("idPerfilUsuario,nombrePerfilUsuario");
    $this->db->from("s_perfiles");
    $this->db->where("estatusPerfilUsuario = 1");
    if($id > 0){
      $this->db->where("idPerfilUsuario",$id);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $res['RES'] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }
  public function getCatBeneficiados($id = 0){
    $res = array('RES' => FALSE, 'DATOS' => '');
    $this->db->select("idTipo,tipo");
    $this->db->from("s_cat_tipos");
    $this->db->where("estatus = 1");
    if($id > 0){
      $this->db->where("idTipo",$id);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $res['RES'] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }


}
?>