<?php
class Minicio extends CI_Model{
  private $isPlanea = array(25,26,27,28,29,30,31,32,35);
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
  public function getInicial($id){
    if(empty($id) or $id == 0){return false;}
    return  $this->db->query("SELECT IFNULL((SELECT CONCAT(UPPER(LEFT(u.nombres,1)),IF(LOCATE(' ', TRIM(u.nombres)) = 0,'',SUBSTR(u.nombres,LOCATE(' ', TRIM(u.nombres)) + 1,1)),IFNULL(UPPER(LEFT(u.apePaterno,1)),''),IFNULL(UPPER(LEFT(u.apeMaterno,1)),'')) AS ini FROM sis_usuarios AS u WHERE idUsuario = {$id} LIMIT 1),'') AS inicial ")->row()->inicial;
  }
  public function getCiclo($tipo = 1){
    $data = $this->db->query("SELECT idciclo,curso FROM sis_ciclo WHERE estatus = 1 ORDER BY idciclo DESC LIMIT 1")->row();
    if(count($data) > 0){
      return ($tipo == 1) ? $data->idciclo : $data;
    }else{
      return ($tipo == 1) ? 1 : array("idciclo" => 1, "curso" => "");
    }
  }
  public function obtenerDatosCCT($idClaveCCT = ''){
    if(empty($idClaveCCT)){return FALSE;}
    $data = array();
    $modalidadesUsuario = $this->session->userdata('sys_modalidades');

    $this->db->select('a.CLAVECCT AS value, a.TURNO AS turno');
    $this->db->from('a_ctba AS a');
    $this->db->where(' ( a.STATUS = ', '1', FALSE);
    $this->db->or_where('a.STATUS ', '4 )', FALSE );
    if(count($modalidadesUsuario) > 0){
      $this->db->where_in('SUBSTR(a.CLAVECCT,3,3)', $modalidadesUsuario);
    }
    $this->db->like('a.CLAVECCT', $idClaveCCT);
    if($this->session->userdata('sys_idPerfilUsuario') == 12){//Solo para primaria estatal artisticas
      // $this->db->or_where("a.CLAVECCT = '31ADG0019G'");
      $this->db->or_like("a.CLAVECCT",'31ADG0019G');
    }
    $this->db->group_by('a.CLAVECCT');
    $this->db->limit("8");
    $query = $this->db->get();
    $res = $query->num_rows();
    if ($res>0){
      $data  =  $query->result();
    }
    return $data;
  }
  public function obtenerDatosCAT($idCAT = ''){
    if(empty($idCAT)){return FALSE;}
    $data = array();
    $this->db->select('c.equival AS value');
    $this->db->from('sis_cat_categorias AS c');
    $this->db->like('c.equival', $idCAT);
    $this->db->group_by('c.equival');
    $this->db->limit("8");
    $query = $this->db->get();
    $res = $query->num_rows();
    if ($res>0){
      $data  =  $query->result();
    }
    return $data;
  }
  public function changeEstadoSolCanCrea($id = ''){
    try{
      $this->db->trans_start();
      $idUsuario = $this->session->userdata('sys_Idusuario');
      /*Canceladas*/
      $this->db->where('idSol',$id);
      $this->db->where('estatusCan <> 3');
      $data = array("estatusCan" => 3,"idUsuarioValidoCan" =>  $idUsuario);
      $this->db->update('sis_solicitudes_canceladas', $data);
      /*Creadas*/
      $this->db->where('idSol',$id);
      $this->db->where('estatusCrea <> 3');
      $data = array("estatusCrea" => 3,"idUsuarioValidoCrea" =>  $idUsuario);
      $this->db->update('sis_solicitudes_creadas',$data);
      $this->db->trans_complete();
    }
    catch(Exception $ex){
      $this->db->trans_rollback();
    }
  }
  public function changeJustificaPlaza($table = '',$data = '', $where = '',$especial = ''){
    try{
      $this->db->trans_start();
      $this->db->where($where);
      if($especial <> ''){
        $this->db->where($especial);
      }
      $this->db->update($table,$data);
      $this->db->trans_complete();
    }
    catch(Exception $ex){
      $this->db->trans_rollback();
    }
  }
  public function changeEstadoSol($data = '', $id = ''){
    try{
      $this->db->trans_start();
      $this->db->where('idSol',$id);
      $this->db->update('sis_solicitudes',$data);
      $this->db->trans_complete();
    }
    catch(Exception $ex){
      $this->db->trans_rollback();
    }
  }
  public function getNivelEncabezado($idNivel = '', $idSubnivel = '' ){
    return $this->db->query("SELECT IFNULL((SELECT
                      CONCAT(n.nivel,' - ',s.subnivel) AS nivel
                      FROM sis_cat_niveles AS n
                      INNER JOIN sis_cat_subnivel AS s ON s.idNivel = n.idNivel
                      WHERE n.idNivel = {$idNivel} AND s.idSubnivel = {$idSubnivel}),'') AS nivel")->row()->nivel;
  }
  public function getBaliListado(){
    $res = array('STATUS' => FALSE, 'DATOS' => array());
    $modalidadesUsuario = $this->session->userdata('sys_modalidades');
    $this->db->select("b.claveCCT,TRIM(a.NOMBRECT) AS nombreCCT,SUBSTR(t.descripcion, 1, 1) AS turnoCCT,b.alum1t,b.gpo1,b.alum2t,b.gpo2,b.alum3t,b.gpo3,b.alum4t,b.gpo4,b.alum5t,b.gpo5,b.alum6t,b.gpo6,b.alum1t + b.alum2t + b.alum3t + b.alum4t + b.alum5t + b.alum6t AS alumt, b.gpo1 + b.gpo2 + b.gpo3 + b.gpo4 + b.gpo5 + b.gpo6 AS gpot,b.dirsgpo,b.dircgpo,b.sub_dir,b.docente",FALSE);
    $this->db->from("sis_bali AS b ");
    $this->db->join('a_ctba AS a', 'a.CLAVECCT = b.claveCCT');
    $this->db->join('sis_cat_turno AS t', 't.turno = b.turnoCCT');
    $this->db->not_like('b.claveCCT', '31P');
    if(count($modalidadesUsuario) > 0){
      $this->db->where_in('SUBSTR(b.claveCCT,3,3)', $modalidadesUsuario);
    }
    //$this->db->where("b.claveCCT NOT LIKE '%31P%'",FALSE);
    $query = $this->db->get();
    $tmp = $query->num_rows();
    if ($tmp > 0){
      $res["STATUS"] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }

  public function solicitudesListado(){
    $perfilUsuario = $this->session->userdata('sys_idPerfilUsuario');
    $idUsuario = $this->session->userdata('sys_Idusuario');
    $idNivel = $this->session->userdata('sys_idNivel');
    $idSubnivel = $this->session->userdata('sys_idSubNivel');
    $res = array('STATUS' => FALSE, 'DATOS' => 0);
    $this->db->select("u.idPerfilUsuario,s.folio,LPAD(s.idSol,7,0) AS idSolFor,s.idSol,s.oficio,n.nivel,sn.subnivel,DATE_FORMAT(s.fechaCaptura,'%d/%m/%Y %H:%i:%s') AS fechaCaptura,CONCAT(IF(u.apePaterno != '', CONCAT(u.apePaterno,' '),''),IF(u.apeMaterno != '', CONCAT(u.apeMaterno,' '),''),u.nombres) AS nombre,s.estatus,CASE WHEN s.estatus = 1 THEN '<span class=\"label label-info\">Iniciado</span>'WHEN s.estatus = 2 THEN '<span class=\"label label-success\">Enviado</span>'  WHEN s.estatus = 3 THEN '<span class=\"label label-primary\">Justifica</span>'WHEN s.estatus = 4 THEN '<span class=\"label label-warning\">No justifica</span>'WHEN s.estatus = 5 THEN '<span class=\"label label-danger\">Cancelado</span>'WHEN s.estatus = 6 THEN '<span class=\"label label-danger\">No Procede</span>'WHEN s.estatus = 7 THEN '<span class=\"label label-default\">Finalizado</span>'END AS estadoSol,",FALSE);
    $this->db->from("sis_solicitudes AS s ");
    $this->db->join('sis_usuarios AS u', 'u.idUsuario = s.idUsuario');
    $this->db->join('sis_cat_niveles AS n','n.idNivel = u.idNivel');
    $this->db->join('sis_cat_subnivel AS sn', 'sn.idNivel = u.idNivel AND sn.idSubnivel = u.idSubnivel');
    //echo $idNivel." => ".$idSubnivel;die();
    switch ($idNivel) {
      case '4'://Preescolar
           if($perfilUsuario == 5 || $perfilUsuario == 6){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
      break;
      case '7'://Primaria
           if($perfilUsuario == 11 || $perfilUsuario == 12){
              if($this->session->userdata('sys_Idusuario') == 14){//Silvia Valdez
                $this->db->where('s.idSubNivel',$idSubnivel);
              }else{
                $this->db->where('s.idUsuario', $idUsuario);
              }
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
      break;
      case '8'://Educación Física
           /*if($perfilUsuario == 34){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{*/
              $this->db->where('s.idNivel',$idNivel);
           //}
        break;
      case '9'://Secundaria
            if($idSubnivel == 10){//Telesecundaria
              if($perfilUsuario == 14 || $perfilUsuario == 15){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 11){//General
              if($perfilUsuario == 20 || $perfilUsuario == 21){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 12){//Estatal
              if($perfilUsuario == 23 || $perfilUsuario == 24){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 13){//Técnicas
              if($perfilUsuario == 17 || $perfilUsuario == 18){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
        break;
        case '10'://Media Superior
           if($perfilUsuario == 34){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
        break;
        case '13'://Indigena
           if($perfilUsuario == 8 || $perfilUsuario == 9){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
        break;
    }
    if(in_array($perfilUsuario,$this->isPlanea)){
      $this->db->where('s.estatus IN(2,3,4,6,7)');
      switch ($perfilUsuario) {
       case '25'://Preescolar
          $this->db->where('s.idPerfil IN(4,5,6)');
        break;
       case '26'://Indigena Rodolfo
          $this->db->where('s.idPerfil IN(7,8,9)');
        break;
        case '27'://Indigena Margarita y Genny
          $this->db->where('s.idPerfil IN(10,11,12)');
        break;
       case '28'://Secundaria Telesecundaria Alfonso Carrillo
          $this->db->where('s.idPerfil IN(13,14,15)');
        break;
       case '29'://Secundaria Técnicas Erendira
          $this->db->where('s.idPerfil IN(16,17,18)');
        break;
       case '30'://Secundaria Generales Gibsy
          $this->db->where('s.idPerfil IN(19,20,21)');
        break;
       case '31'://Secundaria Estatales Linyu y Lili Claudia
          $this->db->where('s.idPerfil IN(22,23,24)');
        break;
        case '32'://Media Superior Marcos
          $this->db->where('s.idPerfil IN(33,34)');
        break;
        case '35'://Educación Física Elizabeth Moreno y Maribel
          $this->db->where('s.idPerfil IN(36)');
        break;
      }
    }
    $this->db->order_by("s.fechaCaptura","DESC");
    $query = $this->db->get();
    $tmp = $query->num_rows();
    if ($tmp > 0){
      $res["STATUS"] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }

  public function ultimoFolio($sigla = 'SE-DPLAN'){
    if(empty($sigla)){return false;}
    $valor = $this->db->query("SELECT IFNULL((SELECT folio FROM sis_folios WHERE sigla = '{$sigla}' LIMIT 1),0) AS folio")->row()->folio;
    if(intval($valor) == 0){
      $this->db->query("INSERT INTO sis_folios (id,sigla,folio) VALUES(NULL,'{$sigla}',1)");
    }
    $fol = $this->db->query("SELECT IFNULL((SELECT CONCAT(sigla,LPAD(folio,6,'0')) FROM sis_folios WHERE sigla =  '{$sigla}' LIMIT 1),1) AS folio")->row()->folio;
    return ($fol == 1) ? $sigla."0000001" : $fol;
  }
  public function folioMas($sigla = 'SE-DPLAN'){
    $this->db->query("UPDATE sis_folios SET folio = folio +1 WHERE sigla = '{$sigla}'");
  }
  public function editaSolicitud($id){
    if(!empty($id)){
      $data = $this->db->query("SELECT
                                s.idSol,
                                s.idNivel,
                                s.idSubNivel,
                                s.folio,
                                s.idUsuario,
                                s.idUsuarioValido,
                                DATE_FORMAT(s.fechaCaptura,'%d/%m/%Y %H:%i:%s') AS fechaCaptura,
                                s.observaciones,
                                s.observacionesPlan,
                                s.estatus,
                                DATE_FORMAT(s.fechaModificacion,'%d/%m/%Y %H:%i:%s') AS fechaJustifica
                              FROM sis_solicitudes AS s
                              WHERE s.idSol = {$id} LIMIT 1")->row();
      if(count($data) > 0){
        return $data;
      }
    }
  }
  public function getGuiaSolicitud($id){
    if(!empty($id)){
      $data = $this->db->query("SELECT
                                s.guiaCan AS guia
                                FROM
                                sis_solicitudes_canceladas AS s
                                WHERE s.idSol = {$id}
                                GROUP BY s.guiaCan
                                ORDER BY s.guiaCan ASC");
      if(count($data->result_array()) > 0){
        return $data->result_array();
      }else{
        return array();
      }
    }
  }
  public function verificarEstatuSol($id){
    if(!empty($id)){
        return $this->db->query("SELECT IFNULL((SELECT estatus FROM sis_solicitudes WHERE idSol = '{$id}' LIMIT 1),1) AS estatus")->row()->estatus;
    }
    return 1;
  }
  public function validarPlazasCanceladas($plazas,$id){
    $res = array('STATUS' => FALSE, 'DATOS' => array());
    $_p = explode(",", $plazas);

    //echo "<pre>";print_r($_p);die();
    $this->db->select("s.folio,CONCAT(c.paCan,c.unCan,c.subCan,LPAD(c.categoriaCan,7,' '),LPAD(c.horasCan,2,'0'),'.0',c.plazaCan) AS cp,DATE_FORMAT(s.fechaCaptura,'%d/%m/%Y') AS fecha,CASE WHEN s.estatus = 1 THEN 'Iniciado' WHEN s.estatus = 2 THEN 'Enviado' WHEN s.estatus = 3 THEN 'Justifica' WHEN s.estatus = 4 THEN 'No justifica' WHEN s.estatus = 6 THEN 'No procede' WHEN s.estatus = 7 THEN 'Finalizado' END AS estatus",FALSE);
    $this->db->from("sis_solicitudes_canceladas AS c ");
    $this->db->join('sis_solicitudes AS s', 's.idSol = c.idSol');
    $this->db->where('s.estatus NOT IN (5,6)');
    if(intval($id) > 0){
      $this->db->where('s.idSol <>',$id);
    }
    $this->db->where_in("CONCAT(c.paCan,c.unCan,c.subCan,LPAD(c.categoriaCan,7,' '),LPAD(c.horasCan,2,'0'),'.0',c.plazaCan)",$_p);//(".implode(',',$myDeleteCan).")"
    $query = $this->db->get();
    $tmp = $query->num_rows();
    if ($tmp > 0){
      $res["STATUS"] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }
  public function editaSolicitudCanPDF($id){
    if(!empty($id)){
      $data = $this->db->query("SELECT
                                  c.idSolCan,
                                  c.idSol,
                                  c.claveCCTCan,
                                  SUBSTR(t.descripcion,1,1) AS turnoCCTCan,
                                  c.titularCan,
                                  c.motivoCan,
                                  DATE_FORMAT(c.vigenciaCan,'%d/%m/%Y') AS vigenciaCan,
                                  c.guiaCan,
                                  c.estatusCan,
                                  CONCAT(c.paCan,c.unCan,c.subCan,LPAD(c.categoriaCan,7,' '),LPAD(c.horasCan,2,'0'),'.0',c.plazaCan) AS cp,
                                  IF(c.horasCan = 0,c.horasCan,CONCAT(LPAD(c.horasCan,2,'0'),'.0'))AS horasCan,
                                  TRIM(a.NOMBRECT) AS nombreCt,
                                  a.ZONAESCOLA AS zona,
                                  TRIM(m.NOM) AS municipio,
                                  TRIM(i.NOMBRELOC) AS localidad,
                                  c.observacionesCan,
                                  c.observacionesPlanCan,
                                  c.categoriaCan
                              FROM
                              sis_solicitudes_canceladas AS c
                              INNER JOIN sis_cat_turno AS t ON t.turno = c.turnoCCTCan
                              INNER JOIN a_ctba AS a ON a.CLAVECCT = c.claveCCTCan
                              INNER JOIN catmun AS m ON a.MUNICIPIO = m. MUNICIPIO
                              INNER JOIN a_itba AS i ON a.MUNICIPIO = i.MUNICIPIO AND a.LOCALIDAD = i.LOCALIDAD
                              WHERE c.idSol = {$id}
                              ORDER BY c.idSolCan ASC");
      if(count($data->result_array()) > 0){
        return $data->result_array();
      }else{
        return array();
      }
    }
  }
  public function editaSolicitudCreaPDF($id){
    if(!empty($id)){
      $data = $this->db->query("SELECT
                              sc.idSolCrea,
                              sc.idSol,
                              sc.claveCCTCrea,
                              SUBSTR(t.descripcion,1,1) AS turnoCCTCrea,
                              sc.alumTotal1,
                              sc.grupoTotal1Base,
                              sc.grupoTotal1Contrato,
                              sc.alumTotal2,
                              sc.grupoTotal2Base,
                              sc.grupoTotal2Contrato,
                              sc.alumTotal3,
                              sc.grupoTotal3Base,
                              sc.grupoTotal3Contrato,
                              sc.alumTotal4,
                              sc.grupoTotal4Base,
                              sc.grupoTotal4Contrato,
                              sc.alumTotal5,
                              sc.grupoTotal5Base,
                              sc.grupoTotal5Contrato,
                              sc.alumTotal6,
                              sc.grupoTotal6Base,
                              sc.grupoTotal6Contrato,
                              sc.grupoCrea,
                              sc.asignaturaCrea,
                              sc.plazaCrea,
                              sc.horasCrea,
                              sc.motivoCrea,
                              DATE_FORMAT(sc.vigenciaCrea,'%d/%m/%Y') AS vigenciaCrea,
                              sc.guiaCrea,
                              sc.estatusCrea,
                              a.ZONAESCOLA AS zona,
                              TRIM(a.NOMBRECT) AS nombreCt,
                              TRIM(m.NOM) AS municipio,
                              TRIM(i.NOMBRELOC) AS localidad,
                              sc.observacionesCrea,
                              sc.observacionesPlanCrea
                          FROM
                          sis_solicitudes_creadas AS sc
                          INNER JOIN sis_cat_turno AS t ON t.turno = sc.turnoCCTCrea
                          INNER JOIN a_ctba AS a ON a.CLAVECCT = sc.claveCCTCrea
                          INNER JOIN catmun AS m ON a.MUNICIPIO = m. MUNICIPIO
                          INNER JOIN a_itba AS i ON a.MUNICIPIO = i.MUNICIPIO AND a.LOCALIDAD = i.LOCALIDAD
                          WHERE sc.idSol = {$id}
                          ORDER BY sc.idSolCrea ASC");
      if(count($data->result_array()) > 0){
        return $data->result_array();
      }else{
        return array();
      }
    }
  }
  public function editaSolicitudCan($id){
    if(!empty($id)){
      $data = $this->db->query("SELECT
                              c.idSolCan,
                              c.idSol,
                              c.claveCCTCan,
                              c.turnoCCTCan,
                              c.titularCan,
                              c.paCan,
                              c.unCan,
                              c.subCan,
                              c.categoriaCan,
                              c.horasCan,
                              c.plazaCan,
                              c.motivoCan,
                              DATE_FORMAT(c.vigenciaCan,'%d/%m/%Y') AS vigenciaCan,
                              c.guiaCan,
                              c.observacionesCan,
                              c.observacionesPlanCan,
                              c.estatusCan
                          FROM
                          sis_solicitudes_canceladas AS c
                          WHERE c.idSol = {$id}");
      if(count($data->result_array()) > 0){
        return $data->result_array();
      }else{
        return array();
      }
    }
  }
  public function editaSolicitudCrea($id){
    if(!empty($id)){
      $data = $this->db->query("SELECT
                              sc.idSolCrea,
                              sc.idSol,
                              sc.claveCCTCrea,
                              sc.turnoCCTCrea,
                              sc.alumTotal1,
                              sc.grupoTotal1Base,
                              sc.grupoTotal1Contrato,
                              sc.alumTotal2,
                              sc.grupoTotal2Base,
                              sc.grupoTotal2Contrato,
                              sc.alumTotal3,
                              sc.grupoTotal3Base,
                              sc.grupoTotal3Contrato,
                              sc.alumTotal4,
                              sc.grupoTotal4Base,
                              sc.grupoTotal4Contrato,
                              sc.alumTotal5,
                              sc.grupoTotal5Base,
                              sc.grupoTotal5Contrato,
                              sc.alumTotal6,
                              sc.grupoTotal6Base,
                              sc.grupoTotal6Contrato,
                              sc.grupoCrea,
                              sc.asignaturaCrea,
                              sc.plazaCrea,
                              sc.horasCrea,
                              sc.motivoCrea,
                              DATE_FORMAT(sc.vigenciaCrea,'%d/%m/%Y') AS vigenciaCrea,
                              sc.guiaCrea,
                              sc.observacionesCrea,
                              sc.observacionesPlanCrea,
                              sc.estatusCrea
                          FROM
                          sis_solicitudes_creadas AS sc
                          WHERE sc.idSol = {$id}");
      if(count($data->result_array()) > 0){
        return $data->result_array();
      }else{
        return array();
      }
    }
  }
  public function savePlazas($arrayData,$ids){
    if(empty($arrayData)){return false;}
    //echo "<pre>";print_r($arrayData);die();
    try{
      $_midsCancel = array();
      $_midsCrea = array();
      $_midsCancelCompara = array();
      $_midsCreaCompara = array();
      $this->db->trans_start();
      $idCiclo = $this->getCiclo();
      $idPerfil = $this->session->userdata('sys_idPerfilUsuario');
      $idUsuario = $this->session->userdata('sys_Idusuario');
      $sigla =  $this->session->userdata('sys_sigla');
      $idNivel =  $this->session->userdata('sys_idNivel');
      $idSubNivel =  $this->session->userdata('sys_idSubNivel');
      $oficio = '';
      $fechaCaptura = $this->now();
      $folio = ($ids == 0) ? $this->ultimoFolio($sigla) : "";
      $idSol = ($ids == 0) ? 'NULL' : $arrayData['idSol'];
      $datosInsertar = array(
        'idSol' => $idSol,
        'idCiclo' => $idCiclo,
        'idNivel' => $idNivel,
        'idSubNivel' => $idSubNivel,
        'idPerfil' => $idPerfil,
        'idUsuario' => $idUsuario,
        'folio' => $folio,
        'oficio' => $oficio,
        'fechaCaptura' => $fechaCaptura,
        'observaciones' => $arrayData['txtObservaciones'],
        'estatus' => 1
      );
      $sql = $this->db->insert_string('sis_solicitudes', $datosInsertar) . " ON DUPLICATE KEY UPDATE
                        observaciones = '{$datosInsertar['observaciones']}'";
      $this->db->query($sql);
      $idSolicitud = ($ids == 0) ? $this->db->insert_id() : $ids;

      if($ids > 0){//SE obtienen los ids que estaban antes de cualquier cambio
        $_midsCancel = $this->db->query("SELECT idSolCan FROM sis_solicitudes_canceladas WHERE idSol = {$ids}")->result_array();
        $_midsCrea = $this->db->query("SELECT idSolCrea FROM sis_solicitudes_creadas WHERE idSol = {$ids}")->result_array();
      }else{
        $this->folioMas($sigla);//se aumenta el folio según el nivel
      }
      /**
        Primero se recorren las guias
      */
      foreach($arrayData['guia'] as $k => $g){
        /**
        Plazas canceladas
        */
        foreach($arrayData['txtClaveCTCan'][$g] as $key => $cct){
          $idSolCan = ($arrayData['txtIdSolCan'][$g][$key] == 0) ? 'NULL' : $arrayData['txtIdSolCan'][$g][$key];
          $datosInsertarCancel = array(
            'idSolCan' => $idSolCan,
            'idSol' => $idSolicitud,
            'claveCCTCan' => $cct,
            'turnoCCTCan' => $arrayData['txtTurnoCCTCan'][$g][$key],
            'titularCan' => $arrayData['txtTitularCan'][$g][$key],
            'paCan' => $arrayData['txtPagoCan'][$g][$key],
            'unCan' => $arrayData['txtUnidadCan'][$g][$key],
            'subCan' => $arrayData['txtSubUniCan'][$g][$key],
            'categoriaCan' => $arrayData['txtCateCan'][$g][$key],
            'horasCan' => $arrayData['txtHorasCan'][$g][$key],
            'plazaCan' => $arrayData['txtPlazaCan'][$g][$key],
            'motivoCan' => $arrayData['txtMotivoCan'][$g][$key],
            'vigenciaCan' => $this->fechaMySQL($arrayData['txtVigenciaCan'][$g][$key]),
            'guiaCan' => $g,
            'fechaCapturaCan' => $fechaCaptura,
            'observacionesCan' => $arrayData['txtObservacionesCan'][$g][$key],
            'estatusCan' => 1
          );
          if($idSolCan != "NULL"){//Si ya existe lo agregamos al array para posteriormente compararlo
            $_midsCancelCompara[] = $idSolCan;
          }
          $_sql = $this->db->insert_string('sis_solicitudes_canceladas', $datosInsertarCancel) . " ON DUPLICATE KEY UPDATE
                        claveCCTCan = '{$datosInsertarCancel['claveCCTCan']}',
                        turnoCCTCan = '{$datosInsertarCancel['turnoCCTCan']}',
                        titularCan = '{$datosInsertarCancel['titularCan']}',
                        paCan = '{$datosInsertarCancel['paCan']}',
                        unCan = '{$datosInsertarCancel['unCan']}',
                        subCan = '{$datosInsertarCancel['subCan']}',
                        categoriaCan = '{$datosInsertarCancel['categoriaCan']}',
                        horasCan = '{$datosInsertarCancel['horasCan']}',
                        plazaCan = '{$datosInsertarCancel['plazaCan']}',
                        motivoCan = '{$datosInsertarCancel['motivoCan']}',
                        vigenciaCan = '{$datosInsertarCancel['vigenciaCan']}',
                        observacionesCan = '{$datosInsertarCancel['observacionesCan']}',
                        guiaCan = '{$datosInsertarCancel['guiaCan']}'";
          if(($idSolCan != "NULL" && $arrayData['txtEstatusCan'][$g][$key] == 1) || $idSolCan == "NULL"){
            $this->db->query($_sql);
          }

        }
        /**
        Plazas creadas
        */
        foreach($arrayData['txtClaveCT'][$g] as $kk => $ct){
          $idSolCrea = ($arrayData['txtIdSolCrea'][$g][$kk] == 0) ? 'NULL' : $arrayData['txtIdSolCrea'][$g][$kk];
          $datosInsertarCrea = array(
            'idSolCrea' => $idSolCrea,
            'idSol' => $idSolicitud,
            'claveCCTCrea' => $ct,
            'turnoCCTCrea' => $arrayData['txtTurnoCCT'][$g][$kk],
            'alumTotal1' => $arrayData['txtMat1'][$g][$kk],
            'grupoTotal1Base' => $arrayData['txtGB1'][$g][$kk],
            'grupoTotal1Contrato' => $arrayData['txtGC1'][$g][$kk],
            'alumTotal2' => $arrayData['txtMat2'][$g][$kk],
            'grupoTotal2Base' => $arrayData['txtGB2'][$g][$kk],
            'grupoTotal2Contrato' => $arrayData['txtGC2'][$g][$kk],
            'alumTotal3' => $arrayData['txtMat3'][$g][$kk],
            'grupoTotal3Base' => $arrayData['txtGB3'][$g][$kk],
            'grupoTotal3Contrato' => $arrayData['txtGC3'][$g][$kk],
            'alumTotal4' => $arrayData['txtMat4'][$g][$kk],
            'grupoTotal4Base' => $arrayData['txtGB4'][$g][$kk],
            'grupoTotal4Contrato' => $arrayData['txtGC4'][$g][$kk],
            'alumTotal5' => $arrayData['txtMat5'][$g][$kk],
            'grupoTotal5Base' => $arrayData['txtGB5'][$g][$kk],
            'grupoTotal5Contrato' => $arrayData['txtGC5'][$g][$kk],
            'alumTotal6' => $arrayData['txtMat6'][$g][$kk],
            'grupoTotal6Base' => $arrayData['txtGB6'][$g][$kk],
            'grupoTotal6Contrato' => $arrayData['txtGC6'][$g][$kk],
            'grupoCrea' => $arrayData['txtGrupo'][$g][$kk],
            'asignaturaCrea' => $arrayData['txtAsignatura'][$g][$kk],
            'plazaCrea' => $arrayData['txtPlaza'][$g][$kk],
            'horasCrea' => $arrayData['txtHoras'][$g][$kk],
            'motivoCrea' => $arrayData['txtMotivo'][$g][$kk],
            'vigenciaCrea' => $this->fechaMySQL($arrayData['txtVigencia'][$g][$kk]),
            'guiaCrea' => $g,
            'fechaCapturaCrea' => $fechaCaptura,
            'observacionesCrea' => $arrayData['txtObservacionesCrea'][$g][$kk],
            'estatusCrea' => 1
          );
          //echo "<pre>";print_r($datosInsertarCrea);
         if($idSolCrea != "NULL"){//Si ya existe lo agregamos al array para posteriormente compararlo
            $_midsCreaCompara[] = $idSolCrea;
          }
          $_sq = $this->db->insert_string('sis_solicitudes_creadas', $datosInsertarCrea) . " ON DUPLICATE KEY UPDATE
                        claveCCTCrea = '{$datosInsertarCrea['claveCCTCrea']}',
                        turnoCCTCrea = '{$datosInsertarCrea['turnoCCTCrea']}',
                        alumTotal1 = '{$datosInsertarCrea['alumTotal1']}',
                        grupoTotal1Base = '{$datosInsertarCrea['grupoTotal1Base']}',
                        grupoTotal1Contrato = '{$datosInsertarCrea['grupoTotal1Contrato']}',
                        alumTotal2 = '{$datosInsertarCrea['alumTotal2']}',
                        grupoTotal2Base = '{$datosInsertarCrea['grupoTotal2Base']}',
                        grupoTotal2Contrato = '{$datosInsertarCrea['grupoTotal2Contrato']}',
                        alumTotal3 = '{$datosInsertarCrea['alumTotal3']}',
                        grupoTotal3Base = '{$datosInsertarCrea['grupoTotal3Base']}',
                        grupoTotal3Contrato = '{$datosInsertarCrea['grupoTotal3Contrato']}',

                        alumTotal4 = '{$datosInsertarCrea['alumTotal4']}',
                        grupoTotal4Base = '{$datosInsertarCrea['grupoTotal4Base']}',
                        grupoTotal4Contrato = '{$datosInsertarCrea['grupoTotal4Contrato']}',
                        alumTotal5 = '{$datosInsertarCrea['alumTotal5']}',
                        grupoTotal5Base = '{$datosInsertarCrea['grupoTotal5Base']}',
                        grupoTotal5Contrato = '{$datosInsertarCrea['grupoTotal5Contrato']}',
                        alumTotal6 = '{$datosInsertarCrea['alumTotal6']}',
                        grupoTotal6Base = '{$datosInsertarCrea['grupoTotal6Base']}',
                        grupoTotal6Contrato = '{$datosInsertarCrea['grupoTotal6Contrato']}',

                        grupoCrea = '{$datosInsertarCrea['grupoCrea']}',
                        asignaturaCrea = '{$datosInsertarCrea['asignaturaCrea']}',
                        plazaCrea = '{$datosInsertarCrea['plazaCrea']}',
                        horasCrea = '{$datosInsertarCrea['horasCrea']}',
                        motivoCrea = '{$datosInsertarCrea['motivoCrea']}',
                        vigenciaCrea = '{$datosInsertarCrea['vigenciaCrea']}',
                        observacionesCrea = '{$datosInsertarCrea['observacionesCrea']}',
                        guiaCrea = '{$datosInsertarCrea['guiaCrea']}'";
          if(($idSolCrea != "NULL" && $arrayData['txtEstatusCrea'][$g][$kk] == 1) || $idSolCrea == "NULL"){
            $this->db->query($_sq);
          }
          // echo "<pre>";print_r($datosInsertarCrea);die();
        }
      }

      if($ids > 0){
        $myDeleteCan = array();
        $myDeleteCrea = array();
        if(count($_midsCancel) > 0){
          foreach ($_midsCancel as $k => $v) {
            if(!in_array($v['idSolCan'],$_midsCancelCompara)){
              $myDeleteCan[] = $v['idSolCan'];
            }
          }
        }
        if(count($_midsCrea) > 0){
          foreach ($_midsCrea as $k => $v) {
            if(!in_array($v['idSolCrea'],$_midsCreaCompara)){
              $myDeleteCrea[] = $v['idSolCrea'];
            }
          }
        }
        if(count($myDeleteCan) > 0){
          $this->db->query("DELETE FROM sis_solicitudes_canceladas WHERE idSolCan IN (".implode(',',$myDeleteCan).")");
        }
        if(count($myDeleteCrea) > 0){
          $this->db->query("DELETE FROM sis_solicitudes_creadas WHERE idSolCrea IN (".implode(',',$myDeleteCrea).")");
        }
      }
      if($ids == 0){
        $this->historicoEstatusSolicitud($idSolicitud,1);
      }
      $this->db->trans_complete();
      return $idSolicitud;
    }
    catch(Exception $ex){
      $this->db->trans_rollback();
      return null;
    }

  }
  /**
  Estos cambios son los que solicito Ivonne el día 14-Sep-2016
  **/
  public function historicoEstatusSolicitud($idSolicitud, $estatus){
    $idUsuario = $this->session->userdata('sys_Idusuario');
    $observaciones = "";
    if($this->input->post('txtComentarios')){
      $observaciones = $this->input->post('txtComentarios');
    }
    $mdata = array(
      'idSol' => $idSolicitud,
      'idUsuario' => $idUsuario,
      'estatus' => $estatus,
      'fecha' => $this->now(),
      'observaciones' => $observaciones
    );
    $this->db->insert('sis_solicitudes_historico_estatus', $mdata);
  }
  public function timeLine($datos){
    $data = array();
    $query = $this->db->query("SELECT
                                CASE
                                WHEN u.idPerfilUsuario IN(1,2,3,25,26,27,28,29,30,31,32,35) THEN
                                  'Planeación'
                                ELSE
                                  'Trámite y Control'
                                END AS tipo,
                                 CASE
                                WHEN h.estatus = 1 THEN
                                  'Iniciado'
                                WHEN h.estatus = 2 THEN
                                  'Enviado'
                                WHEN h.estatus = 3 THEN
                                  'Justifica'
                                WHEN h.estatus = 4 THEN
                                  'No Justifica'
                                WHEN h.estatus = 5 THEN
                                  'Cancelado'
                                WHEN h.estatus = 6 THEN
                                  'No Procede'
                                WHEN h.estatus = 7 THEN
                                  'Finalizado'
                                END AS estatus,
                                 CONCAT_WS(' ',UPPER(u.apePaterno),UPPER(u.apeMaterno),UPPER(u.nombres)) AS nombre ,
                                 DATE_FORMAT(h.fecha,'%d/%m/%Y') AS fecha,
                                 LOWER(DATE_FORMAT(h.fecha,'%h:%m:%s %p')) AS hora ,
                                 IFNULL(h.observaciones,'') AS observaciones
                                FROM
                                  sis_solicitudes_historico_estatus AS h
                                INNER JOIN sis_usuarios AS u ON u.idUsuario = h.idUsuario
                                WHERE
                                  h.idSol = {$datos['idSolicitud']}
                                  ORDER BY h.id_hist ASC");
    if ($query->num_rows() > 0){
      $data =  $query->result_array();
    }
    return $data;
  }
  public function buscarFolio($term){
    $folios = array();
    $perfilUsuario = $this->session->userdata('sys_idPerfilUsuario');
    $idUsuario = $this->session->userdata('sys_Idusuario');
    $idNivel = $this->session->userdata('sys_idNivel');
    $idSubnivel = $this->session->userdata('sys_idSubNivel');
    $this->db->select("s.idSol AS id, s.folio AS value",FALSE);
    $this->db->from("sis_solicitudes AS s ");
    $this->db->join('sis_usuarios AS u', 'u.idUsuario = s.idUsuario');
    $this->db->join('sis_cat_niveles AS n','n.idNivel = u.idNivel');
    $this->db->join('sis_cat_subnivel AS sn', 'sn.idNivel = u.idNivel AND sn.idSubnivel = u.idSubnivel');
    $this->db->like('s.folio',$term);
    switch ($idNivel) {
      case '4'://Preescolar
           if($perfilUsuario == 5 || $perfilUsuario == 6){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
      break;
      case '7'://Primaria
           if($perfilUsuario == 11 || $perfilUsuario == 12){
              if($this->session->userdata('sys_Idusuario') == 14){//Silvia Valdez
                $this->db->where('s.idSubNivel',$idSubnivel);
              }else{
                $this->db->where('s.idUsuario', $idUsuario);
              }
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
      break;
      case '8'://Educación Física
           /*if($perfilUsuario == 34){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{*/
              $this->db->where('s.idNivel',$idNivel);
           //}
        break;
      case '9'://Secundaria
            if($idSubnivel == 10){//Telesecundaria
              if($perfilUsuario == 14 || $perfilUsuario == 15){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 11){//General
              if($perfilUsuario == 20 || $perfilUsuario == 21){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 12){//Estatal
              if($perfilUsuario == 23 || $perfilUsuario == 24){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 13){//Técnicas
              if($perfilUsuario == 17 || $perfilUsuario == 18){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
        break;
        case '10'://Media Superior
           if($perfilUsuario == 34){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
        break;
        case '13'://Indigena
           if($perfilUsuario == 8 || $perfilUsuario == 9){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
        break;
    }
    if(in_array($perfilUsuario,$this->isPlanea)){
      $this->db->where('s.estatus IN(2,3,4,6,7)');
      switch ($perfilUsuario) {
       case '25'://Preescolar
          $this->db->where('s.idPerfil IN(4,5,6)');
        break;
       case '26'://Indigena Rodolfo
          $this->db->where('s.idPerfil IN(7,8,9)');
        break;
        case '27'://Indigena Margarita y Genny
          $this->db->where('s.idPerfil IN(10,11,12)');
        break;
       case '28'://Secundaria Telesecundaria Alfonso Carrillo
          $this->db->where('s.idPerfil IN(13,14,15)');
        break;
       case '29'://Secundaria Técnicas Erendira
          $this->db->where('s.idPerfil IN(16,17,18)');
        break;
       case '30'://Secundaria Generales Gibsy
          $this->db->where('s.idPerfil IN(19,20,21)');
        break;
       case '31'://Secundaria Estatales Linyu y Lili Claudia
          $this->db->where('s.idPerfil IN(22,23,24)');
        break;
        case '32'://Media Superior Marcos
          $this->db->where('s.idPerfil IN(33,34)');
        break;
        case '35'://Educación Física Elizabeth Moreno y Maribel
          $this->db->where('s.idPerfil IN(36)');
        break;
      }
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $folios =  $query->result_array();
    }
    return $folios;
  }
  public function getDbNotify($tipo = "",$count = ""){
    $folios = array();
    $perfilUsuario = $this->session->userdata('sys_idPerfilUsuario');
    $idUsuario = $this->session->userdata('sys_Idusuario');
    $idNivel = $this->session->userdata('sys_idNivel');
    $idSubnivel = $this->session->userdata('sys_idSubNivel');
    $this->db->select("h.id_hist,s.idSol,c.idEstatus,CONCAT_WS(' ', u.apePaterno,u.apeMaterno,u.nombres) AS nombre,s.folio,c.estatus,DATE_FORMAT(h.fecha,'%d/%m/%Y') AS fecha,DATE_FORMAT(h.fecha,'%H:%i:%s') AS hora,h.fecha AS timestamp,h.fechaRead AS timestampCount",FALSE);
    $this->db->from("sis_solicitudes_historico_estatus AS h");
    $this->db->join('sis_solicitudes AS s ','h.idSol = s.idSol');
    $this->db->join('sis_cat_estatus AS c ','c.idEstatus = h.estatus');
    $this->db->join('sis_usuarios AS u', 'h.idUsuario = u.idUsuario');
    $this->db->join('sis_cat_niveles AS n','n.idNivel = u.idNivel');
    $this->db->join('sis_cat_subnivel AS sn', 'sn.idNivel = u.idNivel AND sn.idSubnivel = u.idSubnivel');
    switch ($idNivel) {
      case '4'://Preescolar
           if($perfilUsuario == 5 || $perfilUsuario == 6){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
      break;
      case '7'://Primaria
           if($perfilUsuario == 11 || $perfilUsuario == 12){
              if($this->session->userdata('sys_Idusuario') == 14){//Silvia Valdez
                $this->db->where('s.idSubNivel',$idSubnivel);
              }else{
                $this->db->where('s.idUsuario', $idUsuario);
              }
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
      break;
      case '8'://Educación Física
           /*if($perfilUsuario == 34){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{*/
              $this->db->where('s.idNivel',$idNivel);
           //}
        break;
      case '9'://Secundaria
            if($idSubnivel == 10){//Telesecundaria
              if($perfilUsuario == 14 || $perfilUsuario == 15){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 11){//General
              if($perfilUsuario == 20 || $perfilUsuario == 21){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 12){//Estatal
              if($perfilUsuario == 23 || $perfilUsuario == 24){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
            if($idSubnivel == 13){//Técnicas
              if($perfilUsuario == 17 || $perfilUsuario == 18){
                $this->db->where('s.idUsuario', $idUsuario);
              }else{
                $this->db->where('s.idSubNivel',$idSubnivel);
              }
            }
        break;
        case '10'://Media Superior
           if($perfilUsuario == 34){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
        break;
        case '13'://Indigena
           if($perfilUsuario == 8 || $perfilUsuario == 9){
              $this->db->where('s.idUsuario', $idUsuario);
           }else{
              $this->db->where('s.idNivel',$idNivel);
           }
        break;
    }
    if(in_array($perfilUsuario,$this->isPlanea)){
      $this->db->where('h.estatus IN(2)');
      $this->db->where('h.estatusRead IS NULL');
      switch ($perfilUsuario) {
       case '25'://Preescolar
          $this->db->where('s.idPerfil IN(4,5,6)');
        break;
       case '26'://Indigena Rodolfo
          $this->db->where('s.idPerfil IN(7,8,9)');
        break;
        case '27'://Indigena Margarita y Genny
          $this->db->where('s.idPerfil IN(10,11,12)');
        break;
       case '28'://Secundaria Telesecundaria Alfonso Carrillo
          $this->db->where('s.idPerfil IN(13,14,15)');
        break;
       case '29'://Secundaria Técnicas Erendira
          $this->db->where('s.idPerfil IN(16,17,18)');
        break;
       case '30'://Secundaria Generales Gibsy
          $this->db->where('s.idPerfil IN(19,20,21)');
        break;
       case '31'://Secundaria Estatales Linyu y Lili Claudia
          $this->db->where('s.idPerfil IN(22,23,24)');
        break;
        case '32'://Media Superior Marcos
          $this->db->where('s.idPerfil IN(33,34)');
        break;
        case '35'://Educación Física Elizabeth Moreno y Maribel
          $this->db->where('s.idPerfil IN(36)');
        break;
      }
    }else{
      $this->db->where('h.estatus IN(3,4,6,7)');
    }
    if($count == ""){
      $this->db->where('h.estatusRead IS NULL');
    }else{
      $this->db->where('h.fechaRead IS NOT NULL');
    }
   // $this->db->group_by("s.idSol");
    if($count == ""){
      $this->db->order_by("h.fecha","DESC");
    }else{
      $this->db->order_by("h.fechaRead","DESC");
    }
    if($tipo != ""){
      $this->db->limit(1);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $folios =  $query->result_array();
    }
    return $folios;
  }
}
?>