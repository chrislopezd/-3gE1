<?php
class Mreportes extends CI_Model{
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
  public function getCatProgramas($id = 0){
    $res = array('RES' => FALSE, 'DATOS' => '');
    $this->db->select("idUsuario,programa");
    $this->db->from("s_usuarios");
    $this->db->where("estatusUsuario = 1");
    $this->db->where("idPerfilUsuario = 2");
    if($id > 0){
      $this->db->where("idUsuario",$id);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $res['RES'] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }
  public function getCatMunicipios($id = 0){
    $res = array('RES' => FALSE, 'DATOS' => '');
    $this->db->select("MUNICIPIO,TRIM(NOM) AS NOM");
    $this->db->from("catmun");
    if($id > 0){
      $this->db->where("MUNICIPIO",$id);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $res['RES'] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }
  public function getCatLocalidades($municipio = ''){
    $res = array('RES' => FALSE, 'DATOS' => '');
    $this->db->select("LOCALIDAD,TRIM(NOMBRELOC) AS NOMBRELOC");
    $this->db->from("a_itba");
    $this->db->where("LOCALIDAD <> '0000'");
    $this->db->where("ENTIDAD = 31");
    $this->db->where("TRIM(NOMBRELOC) <> 'NINGUNO'");
    $this->db->where("STATUS = 1");
    if($municipio != ''){
      $this->db->where("MUNICIPIO",$municipio);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $res['RES'] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }
  public function getListado($label,$w,$where,$start,$limit,$orden){
    //if(!empty($w)){
      if($limit !=0){
        $limit = "LIMIT ".$start.",".$limit;
      }
      $data = $this->db->query("SELECT t.* FROM(SELECT
                                b.idSol,
                                b.tipoBene,
                                b.idTipo,
                                u.programa,
                                t.tipo,
                                IFNULL(p.curp,'') AS curp,
                                IF(b.tipoBene = 1,CONCAT(a.CLAVECCT,' - ',TRIM(a.NOMBRECT)),CONCAT_WS(' ',p.apellidop,p.apellidom,p.nombre)) AS nombre,
                                IFNULL(p.correo,'') AS correo,
                                IF(b.tipoBene = 1,CONCAT(a.LADA,a.TELEFONO),p.telefono) AS telefono,
                                IF(b.tipoBene = 1,TRIM(a.DOMICILIO),p.direccion) AS direccion,
                                IF(b.tipoBene = 1,a.CODPOST,p.codpos) AS codpos,
                                IF(b.tipoBene = 1, TRIM(cc.NOM), TRIM(c.NOM)) AS muninicipio,
                                IF(b.tipoBene = 1, TRIM(ii.NOMBRELOC), TRIM(i.NOMBRELOC)) AS localidad,
                                IF(b.idTipo = 1, CONCAT_WS(' ',p.ap_paterno_tuto,p.ap_materno_tuto,p.nombre_tuto),'') AS nombreTutor
                              FROM s_beneficiados AS b
                              INNER JOIN s_usuarios AS u ON u.idUsuario = b.idUsuario
                              INNER JOIN s_cat_tipos AS t ON t.idTipo = b.idTipo
                              LEFT JOIN s_personas AS p ON b.idPersona = p.idPersona
                              LEFT JOIN a_ctba AS a ON b.clavecct = a.CLAVECCT
                              LEFT JOIN catmun AS c ON c.MUNICIPIO = p.municipio
                              LEFT JOIN a_itba AS i ON i.MUNICIPIO = p.municipio AND i.LOCALIDAD = p.localidad
                              LEFT JOIN catmun AS cc ON cc.MUNICIPIO = a.MUNICIPIO
                              LEFT JOIN a_itba AS ii ON ii.MUNICIPIO = a.MUNICIPIO AND ii.LOCALIDAD = a.LOCALIDAD
                              WHERE b.estatus = 1 {$w} {$where}
                             {$orden} {$limit}) AS t");
      if($label  == 'c'){
        return $data->num_rows();
      }
      if($label  == 'r'){
        return $data->result_array();
      }
   // }
  }
}
?>