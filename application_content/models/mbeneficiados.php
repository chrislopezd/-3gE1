<?php
class Mbeneficiados extends CI_Model{
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

  public function getCiclo($tipo = 1){
    $data = $this->db->query("SELECT idciclo,curso FROM s_cat_ciclos WHERE estatus = 1 ORDER BY idciclo DESC LIMIT 1")->row();
    if(count($data) > 0){
      return ($tipo == 1) ? $data->idciclo : $data;
    }else{
      return ($tipo == 1) ? 1 : array("idciclo" => 1, "curso" => "");
    }
  }

  public function getBeneficiadosListado($tipoListado){
    $res = array('STATUS' => FALSE, 'DATOS' => array());
    $this->db->select("b.*",FALSE);
    $this->db->from("s_beneficiados AS b");
    switch ($tipoListado) {
      case '1'://ALUMNOS
        $this->db->select("p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "Alumno"');
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',1);
      break;
      case '2'://DOCENTES
        $this->db->select("p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "Docente"');
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',2);
      break;
      case '3'://ESCUELAS
        $this->db->select("a.CLAVECCT, a.NOMBRECT",FALSE);
        $this->db->join('a_ctba AS a', 'a.CLAVECCT = b.clavecct');
        $this->db->where('b.tipoBene',1);
        $this->db->where('b.idTipo',3);
      break;
      case '4'://PADRES DE FAMILIA
        $this->db->select("p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "PadreDeFamilia"');
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',4);
      break;
    }

    $this->db->where('b.estatus',1);


    $query = $this->db->get();
    $tmp = $query->num_rows();
    if ($tmp > 0){
      $res["STATUS"] = TRUE;
      $res['DATOS'] = $query->result_array();
    }

    return $res;

  }


}
?>