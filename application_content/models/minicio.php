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
    $this->db->select("u.idUsuario,u.programa,u.observaciones,u.contrasena,p.nombrePerfilUsuario,u.idPerfilUsuario,t.tipo,IF(u.estatusUsuario = 1,'Activo','Inactivo') AS estatusUsuario,u.estatusUsuario AS idEstatus",FALSE);
    $this->db->from("s_usuarios AS u");
    $this->db->join('s_perfiles AS p', 'p.idPerfilUsuario = u.idPerfilUsuario');
    $this->db->join('s_cat_tipos AS t', 't.idTipo = u.idTipo');
    $this->db->where("u.estatusUsuario IN(0,1)");
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
  public function getUSerName($user){
    if(!empty($user)){
      $this->db->select("u.programa",false);
      $this->db->from("s_usuarios AS u");
      $this->db->where("u.programa", $user);
      $this->db->where("u.estatusUsuario IN(0,1)");
      $query = $this->db->get();
      return $query->num_rows();
    }
  }
  public function editaUsuario($id){
    if(!empty($id)){
        $data = $this->db->query("SELECT
                                u.idUsuario,
                                u.idPerfilUsuario,
                                u.idTipo,
                                u.programa,
                                u.observaciones,
                                u.estatusUsuario,
                                u.fechaModificacion,
                                u.fechaAcceso,
                                u.fechaCreacion
                                FROM s_usuarios AS u
                                WHERE u.idUsuario = {$id} LIMIT 1")->row();
        if(count($data) > 0){
          return $data;
        }
    }
  }
  public function saveUsuarioData($arrayData,$id){
      if(empty($arrayData)){return false;}
      //echo "<pre>";print_r($arrayData);die();
      try{
        $this->db->trans_start();
        $fechaCaptura = $this->now();
        $idUsuario = ($id == 0) ? 'NULL' : $arrayData['id'];
        $datosInsertar = array(
          'idUsuario' => $idUsuario,
          'idPerfilUsuario' => $arrayData['perfil'],
          'idTipo' => $arrayData['tipo'],
          'programa' => strtoupper($arrayData['usuario']),
          'contrasena' => md5($arrayData['pass']),
          'observaciones' => $arrayData['observaciones'],
          'fechaCreacion' => $fechaCaptura,
          'estatusUsuario' => 1
        );
        $update = "";
        if($arrayData['is'] == 1){
          $update = ", contrasena = '".md5($arrayData['pass'])."'";
        }
        $sql = $this->db->insert_string('s_usuarios', $datosInsertar) . " ON DUPLICATE KEY UPDATE
                          idPerfilUsuario = '{$datosInsertar['idPerfilUsuario']}',
                          idTipo = '{$datosInsertar['idTipo']}',
                          observaciones = '{$datosInsertar['observaciones']}',
                          programa = '{$datosInsertar['programa']}'".$update;
        $this->db->query($sql);
        $idUsuario = ($id == 0) ? $this->db->insert_id() : $id;
        $this->db->trans_complete();
        return $idUsuario;
      }
      catch(Exception $ex){
        $this->db->trans_rollback();
        return null;
      }
    }
    public function delUpUsuario($id,$estatus){
    //echo "<pre>";print_r($data);
      try{
        $this->db->trans_start();
        $data = array('estatusUsuario'=> $estatus);
        $this->db->where('idUsuario',$id);
        $this->db->update('s_usuarios', $data);
        $this->db->trans_complete();
        return array('error'=>false,'HTML'=>'ok');
      }
      catch(Exception $ex){
        $this->db->trans_rollback();
        return array('error'=>true,'HTML'=>'');
      }
  }
   public function changePass($pass){
    //echo "<pre>";print_r($data);
      try{
        $this->db->trans_start();
        $id = $this->session->userdata('sep_idUsuario');
        $data = array('contrasena'=> md5($pass));
        $this->db->where('idUsuario',$id);
        $this->db->update('s_usuarios', $data);
        $this->db->trans_complete();
        return array('error'=>false,'HTML'=>'ok');
      }
      catch(Exception $ex){
        $this->db->trans_rollback();
        return array('error'=>true,'HTML'=>'');
      }
  }


}
?>