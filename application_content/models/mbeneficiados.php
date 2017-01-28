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
    $data = $this->db->query("SELECT idciclo,curso FROM s_cat_ciclos WHERE status = 1 ORDER BY idciclo DESC LIMIT 1")->row();
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

  public function autocomplete($catalogo , $termino){
    $idTipoPrograma = $this->session->userdata('sep_idTipo');
    $data = array();
    switch ($catalogo) {
      case 'beneficiados':
        switch ($idTipoPrograma) {
          case '1'://ALUMNOS
            $this->db->select("p.idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS value",FALSE);
            $this->db->from('s_personas AS p');
            $this->db->where('p.tipo',"Alumno");
            $this->db->where("( CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
          break;
          case '2'://DOCENTES
            $this->db->select("p.idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS value",FALSE);
            $this->db->from('s_personas AS p');
            $this->db->where('p.tipo',"Docente");
            $this->db->where("( CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
          break;
          case '3'://ESCUELAS
            $this->db->select("a.CLAVECCT AS claveCT, CONCAT(a.CLAVECCT, ' - ', a.NOMBRECT) AS value",FALSE);
            $this->db->from('a_ctba AS a');
            $this->db->where("( a.NOMBRECT LIKE '%{$termino}%' OR a.CLAVECCT LIKE '%{$termino}%')");
          break;
          case '4'://PADRES DE FAMILIA
            $this->db->select("p.idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS value",FALSE);
            $this->db->from('s_personas AS p');
            $this->db->where('p.tipo',"PadreDeFamilia");
            $this->db->where("( CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
          break;
        }
        $this->db->limit(15);

        $query = $this->db->get();
        $res = $query->num_rows();
        if ($res>0){
          $data  =  $query->result();
        }
        break;
      default:
        return array();
        break;
    }
    return $data;
  }

  public function saveBeneficiados($session, $datos){
    $this->db->trans_start();
    $idTipoPrograma = $this->session->userdata('sep_idTipo');

    if(($datos['idPersona'] != '' && $datos['idPersona'] != '0') || $datos['claveCT'] != ''){
      $tipoBene = 1;
      switch ($session['st_idTipo']) {

            case '1'://ALUMNOS
            case '2'://DOCENTES
            case '4'://PADRES DE FAMILIA
              $tipoBene = 2;
            break;
            case '3'://ESCUELAS
              $tipoBene = 1;
            break;
      }

        $this->db->query("
            INSERT INTO s_beneficiados (
              idUsuario,
              idTipo,
              idCiclo,
              idPersona,
              tipoBene,
              clavecct,
              fechaRegistro,
              estatus)
            VALUES (
              ".$session['st_idUsuario'].",
              ".$session['st_idTipo'].",
              ".$this->getCiclo(1).",
              ".($datos['idPersona'] != '' && $datos['idPersona'] > 0 ? $datos['idPersona'] : 0).",
              ".$tipoBene.",
              ".($datos['claveCT'] != '' ? "'".$datos['claveCT']."'" : "''").",
              '".$this->now()."' ,
              1)
            ON DUPLICATE KEY UPDATE estatus = 1;");
    }
    $this->db->trans_complete();

    return array('error'=>false,'HTML'=>'Exito');
  }

  public function deleteBeneficiado($datos){
    //echo "<pre>";print_r($data);
    $this->db->trans_start();
      $data = array(
        'estatus'=> 0
      );
      $this->db->where('idSol',$datos['idSol']);
      $this->db->update('s_beneficiados', $data);
    $this->db->trans_complete();
    return array('error'=>false,'HTML'=>'Exito');
  }

}
?>