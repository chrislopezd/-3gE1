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

  public function importBeneficiarios($session, $data){
    $this->db->trans_begin();

    $arrPersonasRepetidas = array();
    $arrPersonasYaBeneficiario = array();
    $arrPersonasSinMunicipio = array();
    $arrPersonasSinLocalidad = array();
    $arrPersonasNuevas = array();

    $arrCentrosRepetidas = array();
    $arrCentrosYaBeneficiario = array();
    $arrCentrosSinMunicipio = array();
    $arrCentrosSinLocalidad = array();
    $arrCentrosNuevas = array();

    foreach ($data as $key => $arrData) {
      $tipoPersona = "";
      $tipoBene = 1;
      switch ($session['st_idTipo']) {
        case '1'://ALUMNOS
          $tipoPersona = "Alumno";$tipoBene = 2;break;
        case '2'://DOCENTES
          $tipoPersona = "Docente";$tipoBene = 2;break;
        case '4'://PADRES DE FAMILIA
          $tipoPersona = "PadreDeFamilia";$tipoBene = 2;break;
      }

      switch ($session['st_idTipo']) {
        case '1'://ALUMNOS
        case '2'://DOCENTES
        case '4'://PADRES DE FAMILIA
          /************************ SI EXISTE LA LOCALIDAD Y MUNICIPO ***********/
          $siExisteLocalidad = 0;
          $siExisteMunicipio = $this->db->query("SELECT IFNULL((SELECT MUNICIPIO FROM catmun WHERE TRIM(NOM) = '".$arrData['MUN']."' LIMIT 1),0) AS MUNICIPIO")->row()->MUNICIPIO;
          if($siExisteMunicipio === '0'){//VER SI EXISTE EL MUNICIPIO CON EL TEXTO
            $arrPersonasSinMunicipio[] = $arrData;
          }
          else{
            $siExisteLocalidad = $this->db->query("SELECT IFNULL((SELECT LOCALIDAD FROM a_itba WHERE TRIM(NOMBRELOC) = '".$arrData['LOCA']."' AND MUNICIPIO = '".$siExisteMunicipio."' LIMIT 1),0) AS LOCALIDAD")->row()->LOCALIDAD;
            if($siExisteLocalidad === '0'){//VER SI EXISTE LA LOCALIDAD CON EL TEXTO
              $arrPersonasSinLocalidad[] = $arrData;
            }
          }
          //echo "<pre>";
          //echo "MUN: ".$siExisteMunicipio;
          //echo " - LOCA: ".$siExisteLocalidad."<br>";
          /************************ SI EXISTE LA LOCALIDAD Y MUNICIPO END ***********/

          /*********** SI EXISTE LA LOCALIDAD Y MUNICIPO SE VERIFICA LA PERSONA ***********/
          //if($siExisteMunicipio != '0' && $siExisteLocalidad !== '0'){//VALIDA SI TIENE MUNICIPIO Y LOCALIDAD
            $siExisteBene =  0;
            $siPersonaCurp = $this->db->query("SELECT IFNULL((SELECT idPersona FROM s_personas WHERE curp = '".$arrData['CURP']."' AND tipo = '".$tipoPersona."' LIMIT 1),0) AS idPersona")->row()->idPersona;
            //echo "PERSONA: ".$siPersonaCurp."<br>";
            if($siPersonaCurp != 0){//PERSONAS QUE YA TENEMOS EN LA BASE
              $arrPersonasRepetidas[] = $arrData;

              $dataActualizar = array(
                'estatus' => 1,
                'localidad' => $siExisteLocalidad,
                'municipio' => $siExisteMunicipio,
                'nombre'=> $arrData['NOMBRES'],
                'apellidop'=> $arrData['APEPAT'],
                'apellidom'=> $arrData['APEMAT'],
                'correo'=> $arrData['CORREO'],
                'telefono'=> $arrData['TELEFONO'],
                'direccion'=> $arrData['DIRECCION']);
              $this->db->where('idPersona', $siPersonaCurp);
              $this->db->update('s_personas', $dataActualizar);

              $siExisteBene = $this->db->query("SELECT IFNULL((SELECT idSol FROM s_beneficiados WHERE idPersona = '".$siPersonaCurp."' AND idTipo = '".$session['st_idTipo']."' AND tipoBene = 2 LIMIT 1),0) AS idSol")->row()->idSol;
              //echo "BENE: ".$siExisteBene."<br>";
              if($siExisteBene != 0){//PERSONAS QUE YA ESTAN COMO BENEFICIARIOS EN EL MISMO PROGRAMA
                $arrPersonasYaBeneficiario[] = $arrData;
                $dataActualizar= array('estatus' => 1);
                $this->db->where('idSol', $siExisteBene);
                $this->db->update('s_beneficiados', $dataActualizar);
              }
              else{// SE INSERTA COMO BENEFICIARIO
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
                    ".$siPersonaCurp.",
                    ".$tipoBene.",
                    '',
                    '".$this->now()."' ,
                    1)
                  ON DUPLICATE KEY UPDATE estatus = 1;");
              }
            }
            else{// SE INSERTA A PERSONA NUEVA
              $arrPersonasNuevas[] = $arrData;

              $dataPersona = array(
                'tipo'=> $tipoPersona,
                'curp'=> $arrData['CURP'],
                'nombre'=> $arrData['NOMBRES'],
                'apellidop'=> $arrData['APEPAT'],
                'apellidom'=> $arrData['APEMAT'],
                'correo'=> $arrData['CORREO'],
                'telefono'=> $arrData['TELEFONO'],
                'direccion'=> $arrData['DIRECCION'],
                'municipio'=> $siExisteMunicipio,
                'localidad'=> $siExisteLocalidad,
                'estatus'=> 1,
              );
              $this->db->insert('s_personas', $dataPersona);
              $idPersona = $this->db->insert_id();

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
                  ".$idPersona.",
                  ".$tipoBene.",
                  '',
                  '".$this->now()."' ,
                  1)
                ON DUPLICATE KEY UPDATE estatus = 1;");

            }

          //} FIN VALIDA SI TIENE MUNICIPIO Y LOCALIDAD
          /*********** SI EXISTE LA LOCALIDAD Y MUNICIPO SE VERIFICA LA PERSONA END ***********/
        break;
        case '3'://ESCUELAS
          /************************ SI EXISTE LA LOCALIDAD Y MUNICIPO ***********/
          $siExisteLocalidad = 0;
          $siExisteMunicipio = $this->db->query("SELECT IFNULL((SELECT MUNICIPIO FROM catmun WHERE TRIM(NOM) = '".$arrData['MUN']."' LIMIT 1),0) AS MUNICIPIO")->row()->MUNICIPIO;
          if($siExisteMunicipio === '0'){//VER SI EXISTE EL MUNICIPIO CON EL TEXTO
            $arrCentrosSinMunicipio[] = $arrData;
          }
          else{
            $siExisteLocalidad = $this->db->query("SELECT IFNULL((SELECT LOCALIDAD FROM a_itba WHERE TRIM(NOMBRELOC) = '".$arrData['LOCA']."' AND MUNICIPIO = '".$siExisteMunicipio."' LIMIT 1),0) AS LOCALIDAD")->row()->LOCALIDAD;
            if($siExisteLocalidad === '0'){//VER SI EXISTE LA LOCALIDAD CON EL TEXTO
              $arrCentrosSinLocalidad[] = $arrData;
            }
          }
          //echo "<pre>";
          //echo "MUN: ".$siExisteMunicipio;
          //echo " - LOCA: ".$siExisteLocalidad."<br>";
          /************************ SI EXISTE LA LOCALIDAD Y MUNICIPO END ***********/

          /*********** SI EXISTE LA LOCALIDAD Y MUNICIPO SE VERIFICA LA PERSONA ***********/
          //if($siExisteMunicipio != '0' && $siExisteLocalidad !== '0'){//VALIDA SI TIENE MUNICIPIO Y LOCALIDAD
            $siExisteBene =  0;
            $siCLAVECCT = $this->db->query("SELECT IFNULL((SELECT CLAVECCT FROM a_ctba WHERE CLAVECCT = '".$arrData['CLAVECT']."' LIMIT 1),'') AS CLAVECCT")->row()->CLAVECCT;
            //echo "PERSONA: ".$siCLAVECCT."<br>";
            if($siCLAVECCT != ''){//CENTRO DE TRABAJO QUE YA TENEMOS EN LA BASE
              $arrCentrosRepetidas[] = $arrData;

              $dataActualizar = array(
                /*'CLAVECCT' => $siCLAVECCT,
                'NOMBRECT'=> $arrData['NOMBRECT'],*/
                'LOCALIDAD'=> $siExisteLocalidad,
                'MUNICIPIO'=> $siExisteMunicipio);
              $this->db->where('CLAVECCT', $siCLAVECCT);
              $this->db->update('a_ctba', $dataActualizar);

              $siExisteBene = $this->db->query("SELECT IFNULL((SELECT idSol FROM s_beneficiados WHERE clavecct = '".$siCLAVECCT."' AND idTipo = '".$session['st_idTipo']."' AND tipoBene = 1 LIMIT 1),0) AS idSol")->row()->idSol;
              //echo "BENE: ".$siExisteBene."<br>";
              if($siExisteBene != 0){//PERSONAS QUE YA ESTAN COMO BENEFICIARIOS EN EL MISMO PROGRAMA
                $arrCentrosYaBeneficiario[] = $arrData;
                $dataActualizar= array('estatus' => 1);
                $this->db->where('idSol', $siExisteBene);
                $this->db->update('s_beneficiados', $dataActualizar);
              }
              else{// SE INSERTA COMO BENEFICIARIO
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
                    0,
                    ".$tipoBene.",
                    '".$siCLAVECCT."',
                    '".$this->now()."' ,
                    1)
                  ON DUPLICATE KEY UPDATE estatus = 1;");
              }
            }
            else{// SE INSERTA A PERSONA NUEVA
              $arrCentrosNuevas[] = $arrData;

              $dataCentro = array(
                'CLAVECCT'=> $arrData['CLAVECT'],
                'NOMBRECT'=> $arrData['NOMBRECT'],
                'MUNICIPIO'=> $siExisteMunicipio,
                'LOCALIDAD'=> $siExisteLocalidad
              );
              $this->db->insert('a_ctba', $dataCentro);
              //$idPersona = $this->db->insert_id();

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
                  0,
                  ".$tipoBene.",
                  '".$arrData['CLAVECT']."',
                  '".$this->now()."' ,
                  1)
                ON DUPLICATE KEY UPDATE estatus = 1;");

            }

          //} FIN VALIDA SI TIENE MUNICIPIO Y LOCALIDAD
          /*********** SI EXISTE LA LOCALIDAD Y MUNICIPO SE VERIFICA LA PERSONA END ***********/
        break;
      }
    }

    if ($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return array('error'=>true,'HTML'=>'Ocurrio algún error al subir la información');
    }
    else{
      $this->db->trans_commit();
      /*
      $arrPersonasRepetidas = array();
      $arrPersonasYaBeneficiario = array();
      $arrPersonasSinMunicipio = array();
      $arrPersonasSinLocalidad = array();
      $arrPersonasNuevas = array();
      */
      $INFO = "";
      if(count($arrPersonasNuevas) > 0){
        $INFO .= '<b>Registros Insertados como Persona y Beneficiado</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CURP</th>
              <th>Nombre</th>
              <th>Correo</th>
          </tr>';
        foreach ($arrPersonasNuevas as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CURP"].'</td>
            <td>'.$arrData["NOMBRES"]." ".$arrData["APEPAT"]." ".$arrData["APEMAT"].'</td>
            <td>'.$arrData["CORREO"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }
      if(count($arrPersonasRepetidas) > 0){
        $INFO .= '<b>Personas que ya existian</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CURP</th>
              <th>Nombre</th>
              <th>Correo</th>
          </tr>';
        foreach ($arrPersonasRepetidas as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CURP"].'</td>
            <td>'.$arrData["NOMBRES"]." ".$arrData["APEPAT"]." ".$arrData["APEMAT"].'</td>
            <td>'.$arrData["CORREO"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }
      if(count($arrPersonasYaBeneficiario) > 0){
        $INFO .= '<b>Personas que ya existian como Beneficiados</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CURP</th>
              <th>Nombre</th>
              <th>Correo</th>
          </tr>';
        foreach ($arrPersonasYaBeneficiario as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CURP"].'</td>
            <td>'.$arrData["NOMBRES"]." ".$arrData["APEPAT"]." ".$arrData["APEMAT"].'</td>
            <td>'.$arrData["CORREO"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }

      if(count($arrPersonasSinMunicipio) > 0){
        $INFO .= '<b>Registros con Municipio Incorrecto</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CURP</th>
              <th>Nombre</th>
              <th>Correo</th>
          </tr>';
        foreach ($arrPersonasSinMunicipio as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CURP"].'</td>
            <td>'.$arrData["NOMBRES"]." ".$arrData["APEPAT"]." ".$arrData["APEMAT"].'</td>
            <td>'.$arrData["CORREO"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }

      if(count($arrPersonasSinLocalidad) > 0){
        $INFO .= '<b>Registros con Localidad Incorrecto</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CURP</th>
              <th>Nombre</th>
              <th>Correo</th>
          </tr>';
        foreach ($arrPersonasSinLocalidad as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CURP"].'</td>
            <td>'.$arrData["NOMBRES"]." ".$arrData["APEPAT"]." ".$arrData["APEMAT"].'</td>
            <td>'.$arrData["CORREO"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }

//PARA LOS CENTROS DE TRABAJO&/////////////////////////////////////////////////////////////
//PARA LOS CENTROS DE TRABAJO&/////////////////////////////////////////////////////////////
//PARA LOS CENTROS DE TRABAJO&/////////////////////////////////////////////////////////////

      if(count($arrCentrosNuevas) > 0){
        $INFO .= '<b>Centros de Trabajo Nuevos</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CLAVE CT</th>
              <th>NOMBRE CT</th>
          </tr>';
        foreach ($arrCentrosNuevas as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CLAVECT"].'</td>
            <td>'.$arrData["NOMBRECT"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }

      if(count($arrCentrosRepetidas) > 0){
        $INFO .= '<b>Registros que ya existian</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CLAVE CT</th>
              <th>NOMBRE CT</th>
          </tr>';
        foreach ($arrCentrosRepetidas as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CLAVECT"].'</td>
            <td>'.$arrData["NOMBRECT"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }
      if(count($arrCentrosYaBeneficiario) > 0){
        $INFO .= '<b>Registros que ya existian como Beneficiados</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CLAVE CT</th>
              <th>NOMBRE CT</th>
          </tr>';
        foreach ($arrCentrosYaBeneficiario as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CLAVECT"].'</td>
            <td>'.$arrData["NOMBRECT"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }
      if(count($arrCentrosSinMunicipio) > 0){
        $INFO .= '<b>Centros de Trabajo con Municipio incorrecto</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CLAVE CT</th>
              <th>NOMBRE CT</th>
          </tr>';
        foreach ($arrCentrosSinMunicipio as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CLAVECT"].'</td>
            <td>'.$arrData["NOMBRECT"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }
      if(count($arrCentrosSinLocalidad) > 0){
        $INFO .= '<b>Centros de Trabajo con Localidad incorrecto</b>
        <table class="tablaEstructura table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
              <th>#</th>
              <th>CLAVE CT</th>
              <th>NOMBRE CT</th>
          </tr>';
        foreach ($arrCentrosSinLocalidad as $key => $arrData) {
          $INFO .= '<tr>
            <td>'.($key +1).'</td>
            <td>'.$arrData["CLAVECT"].'</td>
            <td>'.$arrData["NOMBRECT"].'</td></tr>
          ';
        }
        $INFO .= '</table>';
      }
      return array('error'=>false,'HTML'=>'Se subio correcctamente la información', 'INFO' =>$INFO);
    }

  }

}
?>