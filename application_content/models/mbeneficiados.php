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
    $idUsuario = $this->session->userdata('sep_idUsuario');
    $this->db->select("b.*",FALSE);
    $this->db->from("s_beneficiados AS b");
    switch ($tipoListado) {
      case '1'://ALUMNOS
        $this->db->select("p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, p.codpos, p.municipio, p.localidad, b.clavecct,p.nombre_tuto, p.ap_paterno_tuto, p.ap_materno_tuto",FALSE);
        $this->db->join('s_personas AS p','p.idPersona = b.idPersona AND p.tipo = "Alumno"');
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',1);
      break;
      case '2'://DOCENTES
        $this->db->select("p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, p.codpos, p.municipio, p.localidad, b.clavecct",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "Docente"');
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',2);
      break;
      case '3'://ESCUELAS
        $this->db->select("a.CLAVECCT, TRIM(a.NOMBRECT) AS NOMBRECT,CASE WHEN a.TURNO = '100' THEN 'MATUTINO' WHEN a.TURNO = '120' THEN 'MAT Y VESP' WHEN a.TURNO = '123' THEN 'MAT, VESP Y NOCT' WHEN a.TURNO = '130' THEN 'MAT Y NOCT' WHEN a.TURNO = '200' THEN 'VESP Y NOCT' WHEN a.TURNO = '230' THEN 'VESPERTINO' WHEN a.TURNO = '300' THEN 'NOCTURNO' WHEN a.TURNO = '400' THEN 'DISCONTINUO' WHEN a.TURNO = '800' THEN 'DISCONTINUO' END AS turno,TRIM(m.NOM) AS municipio,TRIM(i.NOMBRELOC) AS localidad",FALSE);
        $this->db->join('a_ctba AS a', 'a.CLAVECCT = b.clavecct');
        $this->db->join('catmun AS m', 'm.MUNICIPIO = a.MUNICIPIO');
        $this->db->join('a_itba AS i', 'i.MUNICIPIO = a.MUNICIPIO AND a.LOCALIDAD = i.LOCALIDAD');
        $this->db->where('b.tipoBene',1);
        $this->db->where('b.idTipo',3);
      break;
      case '4'://PADRES DE FAMILIA
        $this->db->select("p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, p.codpos, p.municipio, p.localidad, b.clavecct",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "PadreDeFamilia"');
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',4);
      break;
    }
    $this->db->where('b.idUsuario',$idUsuario);
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
    $x = 0;
    set_time_limit(0);
    ini_set('memory_limit', '4048M');
    switch ($catalogo) {
      case 'beneficiados':
        switch ($idTipoPrograma) {
          case '1'://ALUMNOS
            $this->db->select("p.idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, CONCAT_WS(' ', p.curp, '-', p.nombre, p.apellidop, p.apellidom) AS value, p.municipio, p.localidad, b.clavecct AS claveCT, p.codpos,p.nombre_tuto AS nombreTuto, p.ap_paterno_tuto AS apellidopTuto, p.ap_materno_tuto AS apellidomTuto",FALSE);
            $this->db->from('s_personas AS p');
            $this->db->join('s_beneficiados AS b' , 'b.idPersona = p.idPersona','LEFT');
            $this->db->where('p.tipo',"Alumno");
            $this->db->where("( CONCAT_WS(' ', p.apellidop, p.apellidom,p.nombre) LIKE '%{$termino}%' OR CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
            $this->db->group_by('p.curp');
            $this->db->limit(15);
            $query1 = $this->db->get()->result();

            $this->db->select("0 AS idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.ap_paterno, p.ap_materno) AS nombreCompleto, '' AS correo, '' AS telefono, '' AS direccion, p.nombre, p.ap_paterno AS apellidop, p.ap_materno AS apellidom, CONCAT_WS(' ', p.curp, '-', p.nombre, p.ap_paterno, p.ap_materno) AS value, p.municipio, p.localidad, p.clavecct AS claveCT, p.codpos,p.nombre_tuto AS nombreTuto, p.ap_paterno_tuto AS apellidopTuto, p.ap_materno_tuto AS apellidomTuto",FALSE);
            $this->db->from('siceey AS p');
            $this->db->where("( CONCAT_WS(' ',p.ap_paterno, p.ap_materno,p.nombre) LIKE '%{$termino}%' OR CONCAT_WS(' ', p.nombre, p.ap_paterno, p.ap_materno) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
            $this->db->group_by('p.curp');
            $this->db->limit(15);
            $query2 = $this->db->get()->result();

            //echo "<pre>";print_r($query1);
            //print_r($query1);die();
            foreach ($query1 as $key1 => $arr1) {
              foreach ($query2 as $key2 => $arr2) {
                if($arr2->curp == $arr1->curp){
                  unset($query2[$key2]);
                }
              }
            }

             $data = array_slice(array_merge($query2, $query1),0,15);
            $x = 1;

            //$this->_reset_select();
          break;
          case '2'://DOCENTES
            $this->db->select("p.idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, CONCAT_WS(' ', p.curp, '-', p.nombre, p.apellidop, p.apellidom) AS value, p.municipio, p.localidad, '' AS claveCT, p.codpos, '' AS nombreTuto,'' AS apellidopTuto,'' AS apellidomTuto",FALSE);
            $this->db->from('s_personas AS p');
            $this->db->where('p.tipo',"Docente");
            $this->db->where("( CONCAT_WS(' ', p.apellidop, p.apellidom,p.nombre) LIKE '%{$termino}%' OR CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
            $this->db->group_by('p.curp');
            $this->db->limit(15);
            $query1 = $this->db->get()->result();

            $this->db->select("0 AS idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, CONCAT_WS(' ', p.curp, '-', p.nombre, p.apellidop, p.apellidom) AS value, p.municipio, p.localidad, p.clavect AS claveCT, p.codpos, '' AS nombreTuto,'' AS apellidopTuto,'' AS apellidomTuto",FALSE);
            $this->db->from('personas_plantilla AS p');
            $this->db->where("( CONCAT_WS(' ', p.apellidop, p.apellidom,p.nombre) LIKE '%{$termino}%' OR CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
            $this->db->group_by('p.curp');
            $this->db->limit(15);
            $query2 = $this->db->get()->result();
            foreach ($query1 as $key1 => $arr1) {
              foreach ($query2 as $key2 => $arr2) {
                if($arr2->curp == $arr1->curp){
                  unset($query2[$key2]);
                }
              }
            }

            $data = array_slice(array_merge($query2, $query1),0,15);
            $x = 1;
          break;
          case '3'://ESCUELAS
            $this->db->select("a.CLAVECCT AS claveCT, CONCAT(a.CLAVECCT, ' - ', a.NOMBRECT) AS value, '' AS correo, '' AS telefono, '' AS direccion, '' AS nombre, '' AS apellidop, '' AS apellidom, '' AS municipio, '' AS localidad, '' AS idPersona, '' AS curp, '' AS nombreTuto,'' AS apellidopTuto,'' AS apellidomTuto",FALSE);
            $this->db->from('a_ctba AS a');
            $this->db->where("( a.NOMBRECT LIKE '%{$termino}%' OR a.CLAVECCT LIKE '%{$termino}%')");
          break;
          case '4'://PADRES DE FAMILIA
             $this->db->select("p.idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, CONCAT_WS(' ', p.curp, '-', p.nombre, p.apellidop, p.apellidom) AS value, p.municipio, p.localidad, '' AS claveCT, p.codpos, '' AS nombreTuto,'' AS apellidopTuto,'' AS apellidomTuto",FALSE);
            $this->db->from('s_personas AS p');
            $this->db->where('p.tipo',"PadreDeFamilia");
            $this->db->where("( CONCAT_WS(' ',p.apellidop, p.apellidom,p.nombre) LIKE '%{$termino}%' OR CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
            $this->db->group_by('p.curp');
            $this->db->limit(15);
            $query1 = $this->db->get()->result();

            $this->db->select("0 AS idPersona, p.curp, CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) AS nombreCompleto, p.correo, p.telefono, p.direccion, p.nombre, p.apellidop, p.apellidom, CONCAT_WS(' ', p.curp, '-', p.nombre, p.apellidop, p.apellidom) AS value, p.municipio, p.localidad, p.clavect AS claveCT, p.codpos, '' AS nombreTuto,'' AS apellidopTuto,'' AS apellidomTuto",FALSE);
            $this->db->from('personas_plantilla AS p');
            $this->db->where("( CONCAT_WS(' ', p.apellidop, p.apellidom,p.nombre) LIKE '%{$termino}%' OR  CONCAT_WS(' ', p.nombre, p.apellidop, p.apellidom) LIKE '%{$termino}%' OR p.curp LIKE '%{$termino}%')");
            $this->db->group_by('p.curp');
            $this->db->limit(15);
            $query2 = $this->db->get()->result();
            foreach ($query1 as $key1 => $arr1) {
              foreach ($query2 as $key2 => $arr2) {
                if($arr2->curp == $arr1->curp){
                  unset($query2[$key2]);
                }
              }
            }
             $data = array_slice(array_merge($query2, $query1),0,15);
            $x = 1;
          break;
        }
        $this->db->limit(15);

        if ($x == 0){
          $query = $this->db->get();
          $res = $query->num_rows();
          if ($res>0){
            $data  =  $query->result();
          }
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

    $tipoPersona = "";
    switch ($session['st_idTipo']) {
      case '1'://ALUMNOS
        $tipoPersona = "Alumno";break;
      case '2'://DOCENTES
        $tipoPersona = "Docente";break;
      case '4'://PADRES DE FAMILIA
        $tipoPersona = "PadreDeFamilia";break;
    }

    switch ($session['st_idTipo']) {
      case '1'://ALUMNOS
      case '2'://DOCENTES
      case '4'://PADRES DE FAMILIA
        if(/*($datos['idPersona'] == 0 || $datos['idPersona'] == '') && */$datos['curp'] != ''){
          $siPersonaCurp = $this->db->query("SELECT IFNULL((SELECT idPersona FROM s_personas WHERE curp = '".$datos['curp']."' AND tipo = '".$tipoPersona."' LIMIT 1),0) AS idPersona")->row()->idPersona;

          if($siPersonaCurp == 0){//NO EXISTE EN PERSONA CON EL MISMO TIPO
            $dataPersona = array(
              'tipo'=> $tipoPersona,
              'curp'=> $datos['curp'],
              'estatus' => 1,
              'localidad' => $datos['localidad'],
              'municipio' => $datos['municipio'],
              'nombre'=> $datos['nombre'],
              'apellidop'=> $datos['apellidop'],
              'apellidom'=> $datos['apellidom'],
              'correo'=> $datos['correo'],
              'telefono'=> $datos['telefono'],
              'direccion'=> $datos['direccion'],
              'codpos'=> $datos['codpos'],
              'nombre_tuto'=> $datos['nombreTuto'],
              'ap_paterno_tuto'=> $datos['apellidopTuto'],
              'ap_materno_tuto'=> $datos['apellidomTuto']);
            $this->db->insert('s_personas', $dataPersona);
            $datos['idPersona'] = $this->db->insert_id();
          }
          else{
            $dataPersona = array(
              'estatus' => 1,
              'localidad' => $datos['localidad'],
              'municipio' => $datos['municipio'],
              'nombre'=> $datos['nombre'],
              'apellidop'=> $datos['apellidop'],
              'apellidom'=> $datos['apellidom'],
              'correo'=> $datos['correo'],
              'telefono'=> $datos['telefono'],
              'direccion'=> $datos['direccion'],
              'codpos'=> $datos['codpos'],
              'nombre_tuto'=> $datos['nombreTuto'],
              'ap_paterno_tuto'=> $datos['apellidopTuto'],
              'ap_materno_tuto'=> $datos['apellidomTuto']);
            $this->db->where('idPersona',$siPersonaCurp);
            $this->db->update('s_personas', $dataPersona);
            $datos['idPersona'] = $siPersonaCurp;
          }

        }
      break;
      case '3'://ESCUELAS
        //$tipoBene = 1;
      break;
    }


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
          $siExisteMunicipio = $this->db->query("SELECT IFNULL((SELECT MUNICIPIO FROM catmun WHERE TRIM(NOM) = '".strtoupper($arrData['MUN'])."' LIMIT 1),0) AS MUNICIPIO")->row()->MUNICIPIO;
          if($siExisteMunicipio === '0'){//VER SI EXISTE EL MUNICIPIO CON EL TEXTO
            $arrPersonasSinMunicipio[] = $arrData;
          }
          else{
            $siExisteLocalidad = $this->db->query("SELECT IFNULL((SELECT LOCALIDAD FROM a_itba WHERE TRIM(NOMBRELOC) = '".strtoupper($arrData['LOCA'])."' AND MUNICIPIO = '".$siExisteMunicipio."' AND LOCALIDAD <> '0000' AND TRIM(NOMBRELOC) <> 'NINGUNO' LIMIT 1),0) AS LOCALIDAD")->row()->LOCALIDAD;
            if($siExisteLocalidad === '0'){//VER SI EXISTE LA LOCALIDAD CON EL TEXTO
              $arrPersonasSinLocalidad[] = $arrData;
            }
          }
          //echo "<pre>";
          //echo "MUN: ".$siExisteMunicipio;
          //echo " - LOCA: ".$siExisteLocalidad."<br>";
          /************************ SI EXISTE LA LOCALIDAD Y MUNICIPO END ***********/

          /*********** SI EXISTE LA LOCALIDAD Y MUNICIPO SE VERIFICA LA PERSONA ***********/
          if(strlen($siExisteMunicipio) == 3 && strlen($siExisteLocalidad) == 4){//VALIDA SI TIENE MUNICIPIO Y LOCALIDAD
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
                'direccion'=> $arrData['DIRECCION'],
                'codpos'=> $arrData['CP']);
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
                'codpos'=> $arrData['CP']
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

          }// FIN VALIDA SI TIENE MUNICIPIO Y LOCALIDAD
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
        $INFO .= '<b>Registros con Municipio Incorrecto - NO INSERTADO</b>
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
        $INFO .= '<b>Registros con Localidad Incorrecto - NO INSERTADO</b>
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
              <th>Clave CT</th>
              <th>Nombre CT</th>
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
              <th>Clave CT</th>
              <th>Nombre CT</th>
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
              <th>Clave CT</th>
              <th>Nombre CT</th>
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
              <th>Clave CT</th>
              <th>Nombre CT</th>
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
              <th>Clave CT</th>
              <th>Nombre CT</th>
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

  public function getCatalogo($catalogo, $tipo){
    $data = array();
    switch ($catalogo) {
      case 'MUNICIPIOS':
        $this->db->select("m.MUNICIPIO, TRIM(m.NOM) AS NOM",FALSE);
        $this->db->from('catmun AS m');
        $data = $this->db->get();
        $data = $data->result_array();
        switch ($tipo) {
          case 'SELECT':
            $html = "";
            foreach ($data as $key => $value) {
              $html .= '<option value="'.$value['MUNICIPIO'].'" >'.$value['NOM'].'</option>';
            }
            return $html;
            break;
          default:
            return $data;
            break;
        }

        break;
      case 'LOCALIDADES':
        $this->db->select("l.MUNICIPIO, l.LOCALIDAD, TRIM(l.NOMBRELOC) AS NOMBRELOC",FALSE);
        $this->db->from('a_itba AS l');
        $this->db->where("l.LOCALIDAD <> '0000'");
        $this->db->where("l.ENTIDAD = 31");
        $this->db->where("TRIM(l.NOMBRELOC) <> 'NINGUNO'");
        $this->db->where("l.STATUS = 1");
        $this->db->order_by('l.MUNICIPIO');
        $this->db->group_by('l.MUNICIPIO, l.LOCALIDAD');
        $data = $this->db->get();
        $data = $data->result_array();
        switch ($tipo) {
          case 'SELECT':
            $html = "";
            foreach ($data as $key => $value) {
              $html .= '<option value="'.$value['LOCALIDAD'].'" data-MUN = "'.$value['MUNICIPIO'].'">'.$value['NOMBRELOC'].'</option>';
            }
            return $html;
            break;
          default:
            return $data;
            break;
        }
        break;
    }
  }
  public function getBeneficiadosReporte($tipoListado){
    $res = array('STATUS' => FALSE, 'DATOS' => array());
    $idUsuario = $this->session->userdata('sep_idUsuario');
    #$this->db->select("b.*",FALSE);
    $this->db->from("s_beneficiados AS b");
    $this->db->join('s_usuarios AS u', 'u.idUsuario = b.idUsuario');
    switch ($tipoListado) {
      case '1'://ALUMNOS
        $this->db->select("u.observaciones AS programa,p.curp,p.nombre,p.apellidop,p.apellidom,p.correo,p.telefono,p.direccion,IFNULL(TRIM(m.NOM),'') AS municipio,IFNULL(TRIM(i.NOMBRELOC),'') AS localidad,p.codpos,CONCAT_WS(' ',p.nombre_tuto,p.ap_paterno_tuto,p.ap_materno_tuto) AS tutor",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "Alumno"');
        $this->db->join('catmun AS m', 'm.MUNICIPIO = p.municipio',LEFT);
        $this->db->join('a_itba AS i', 'i.MUNICIPIO = p.municipio AND p.localidad = i.LOCALIDAD',LEFT);
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',1);
      break;
      case '2'://DOCENTES
        $this->db->select("u.observaciones AS programa,p.curp,p.nombre,p.apellidop,p.apellidom,p.correo,p.telefono,p.direccion,IFNULL(TRIM(m.NOM),'') AS municipio,IFNULL(TRIM(i.NOMBRELOC),'') AS localidad,p.codpos",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "Docente"');
        $this->db->join('catmun AS m', 'm.MUNICIPIO = p.municipio',LEFT);
        $this->db->join('a_itba AS i', 'i.MUNICIPIO = p.municipio AND p.localidad = i.LOCALIDAD',LEFT);
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',2);
      break;
      case '3'://ESCUELAS
        $this->db->select("u.observaciones AS programa,b.clavecct,CASE WHEN a.TURNO = '100' THEN 'MATUTINO' WHEN a.TURNO = '120' THEN 'MAT Y VESP' WHEN a.TURNO = '123' THEN 'MAT, VESP Y NOCT' WHEN a.TURNO = '130' THEN 'MAT Y NOCT' WHEN a.TURNO = '200' THEN 'VESP Y NOCT' WHEN a.TURNO = '230' THEN 'VESPERTINO' WHEN a.TURNO = '300' THEN 'NOCTURNO' WHEN a.TURNO = '400' THEN 'DISCONTINUO' WHEN a.TURNO = '800' THEN 'DISCONTINUO' END AS turno,TRIM(a.NOMBRECT) AS nombrect,a.DOMICILIO AS domicilio,a.ZONAESCOLA AS zona,TRIM(m.NOM) AS municipio,TRIM(i.NOMBRELOC) AS localidad,a.CODPOST AS codpos",FALSE);
        $this->db->join('a_ctba AS a', 'a.CLAVECCT = b.clavecct');
        $this->db->join('catmun AS m', 'm.MUNICIPIO = a.MUNICIPIO');
        $this->db->join('a_itba AS i', 'i.MUNICIPIO = a.MUNICIPIO AND a.LOCALIDAD = i.LOCALIDAD');
        $this->db->where('b.tipoBene',1);
        $this->db->where('b.idTipo',3);
      break;
      case '4'://PADRES DE FAMILIA
        $this->db->select("u.observaciones AS programa,p.curp,p.nombre,p.apellidop,p.apellidom,p.correo,p.telefono,p.direccion,IFNULL(TRIM(m.NOM),'') AS municipio,IFNULL(TRIM(i.NOMBRELOC),'') AS localidad,p.codpos",FALSE);
        $this->db->join('s_personas AS p', 'p.idPersona = b.idPersona AND p.tipo = "PadreDeFamilia"');
        $this->db->join('catmun AS m', 'm.MUNICIPIO = p.municipio',LEFT);
        $this->db->join('a_itba AS i', 'i.MUNICIPIO = p.municipio AND p.localidad = i.LOCALIDAD',LEFT);
        $this->db->where('b.tipoBene',2);
        $this->db->where('b.idTipo',4);
      break;
    }
    $this->db->where('b.idUsuario',$idUsuario);
    $this->db->where('b.estatus',1);
    $query = $this->db->get();
    $tmp = $query->num_rows();
    if ($tmp > 0){
      $res["STATUS"] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }

  public function getListadoFiltro($tipoListado,$post){
    $res = array('STATUS' => FALSE, 'DATOS' => array());
    $idUsuario = $this->session->userdata('sep_idUsuario');
    switch ($tipoListado) {
      case '1'://ALUMNOS
            $this->db->select("0 AS idPersona, p.curp, CONCAT_WS(' ',p.ap_paterno, p.ap_materno,p.nombre) AS nombreCompleto, '' AS correo, '' AS telefono, '' AS direccion, p.nombre, p.ap_paterno AS apellidop, p.ap_materno AS apellidom,  p.municipio, p.localidad, p.clavecct AS claveCT, p.codpos,p.nombre_tuto AS nombreTuto, p.ap_paterno_tuto AS apellidopTuto, p.ap_materno_tuto AS apellidomTuto,p.grado,p.grupo",FALSE);
            $this->db->from('siceey AS p');
            if(trim($post['c']) != ""){
              $this->db->where('p.clavecct',trim($post['c']));
            }
            if($post['g'] != "null"){
              $this->db->where('p.grado',$post['g']);
            }
            if($post['gg'] != "null"){
              $this->db->where('p.grupo',$post['gg']);
            }
            $this->db->order_by("p.grado,p.grupo,nombreCompleto");
      break;
      case '2'://DOCENTES
           $this->db->select("0 AS idPersona, p.curp, CONCAT_WS(' ',p.apellidop,p.apellidom,p.nombre) AS nombreCompleto,correo, telefono, direccion, p.nombre, p.apellidop,p.apellidom,p.municipio,p.localidad,p.clavect AS claveCT, p.codpos,'' AS nombreTuto, '' AS apellidopTuto,'' AS apellidomTuto",FALSE);
            $this->db->from('personas_plantilla AS p');
            if(trim($post['c']) != "" && $post['s'] == 0){
              $this->db->where('p.clavect',trim($post['c']));
            }
            if(trim($post['nc']) != ""){
              $this->db->where("(  CONCAT_WS(' ',p.apellidop,p.apellidom,p.nombre) LIKE '%".$post['nc']."%' OR CONCAT_WS(' ',p.nombre,p.apellidop,p.apellidom) LIKE '%".$post['nc']."%' OR p.curp LIKE '%".$post['nc']."%')");
            }
            if($post['s'] == 1){
              $this->db->where('p.clavect = ""');
            }
      break;
      case '3'://ESCUELAS
        $this->db->select("a.CLAVECCT, TRIM(a.NOMBRECT) AS NOMBRECT,CASE WHEN a.TURNO = '100' THEN 'MATUTINO' WHEN a.TURNO = '120' THEN 'MAT Y VESP' WHEN a.TURNO = '123' THEN 'MAT, VESP Y NOCT' WHEN a.TURNO = '130' THEN 'MAT Y NOCT' WHEN a.TURNO = '200' THEN 'VESP Y NOCT' WHEN a.TURNO = '230' THEN 'VESPERTINO' WHEN a.TURNO = '300' THEN 'NOCTURNO' WHEN a.TURNO = '400' THEN 'DISCONTINUO' WHEN a.TURNO = '800' THEN 'DISCONTINUO' END AS turno,TRIM(m.NOM) AS municipio,TRIM(i.NOMBRELOC) AS localidad,a.ZONAESCOLA AS zona",FALSE);
        $this->db->from('a_ctba AS a', 'a.CLAVECCT = b.clavecct');
        $this->db->join('catmun AS m', 'm.MUNICIPIO = a.MUNICIPIO');
        $this->db->join('a_itba AS i', 'i.MUNICIPIO = a.MUNICIPIO AND a.LOCALIDAD = i.LOCALIDAD');
        $this->db->where('a.STATUS IN(1,4)');
        if(trim($post['z']) != ""){
          if(strlen(trim($post['z'])) < 3){
            $post['z'] = sprintf('%03d', trim($post['z']));
          }
          $this->db->where('a.ZONAESCOLA',trim($post['z']));
        }
        if($post['m'] != "null"){
          $this->db->where('a.MUNICIPIO',$post['m']);
        }
        if($post['l'] != "null"){
          $this->db->where('a.LOCALIDAD',$post['l']);
        }
      break;
      case '4'://PADRES DE FAMILIA
      break;
    }

    $query = $this->db->get();
    $tmp = $query->num_rows();
    if ($tmp > 0){
      $res["STATUS"] = TRUE;
      $res['DATOS'] = $query->result_array();
    }
    return $res;
  }

  public function saveBeneficiadosMasivo($session, $datos){
    try{
    $this->db->trans_start();
    $idTipoPrograma = $this->session->userdata('sep_idTipo');

    $tipoPersona = "";
    switch ($session['st_idTipo']) {
      case '1'://ALUMNOS
        $tipoPersona = "Alumno";break;
      case '2'://DOCENTES
        $tipoPersona = "Docente";break;
      case '4'://PADRES DE FAMILIA
        $tipoPersona = "PadreDeFamilia";break;
    }
    if($datos['t'] == 1){
      $this->db->select("'' AS idPersona, p.curp, CONCAT_WS(' ',p.ap_paterno, p.ap_materno,p.nombre) AS nombreCompleto, '' AS correo, '' AS telefono, '' AS direccion, p.nombre, p.ap_paterno AS apellidop, p.ap_materno AS apellidom,  p.municipio, p.localidad, p.clavecct AS claveCT, p.codpos,p.nombre_tuto AS nombreTuto, p.ap_paterno_tuto AS apellidopTuto, p.ap_materno_tuto AS apellidomTuto,p.grado,p.grupo",FALSE);
      $this->db->from('siceey AS p');
      $this->db->where_in("p.curp",$datos['curp']);
    }
     if($datos['t'] == 2){
      $this->db->select("'' AS idPersona,p.curp,CONCAT_WS(' ',p.apellidop,p.apellidom,p.nombre) AS nombreCompleto,correo, telefono, direccion, p.nombre, p.apellidop,p.apellidom,p.municipio,p.localidad,p.clavect AS claveCT, p.codpos,'' AS nombreTuto, '' AS apellidopTuto,'' AS apellidomTuto",FALSE);
      $this->db->from('personas_plantilla AS p');
      $this->db->where_in("p.curp",$datos['curp']);
    }

    switch ($session['st_idTipo']) {
      case '1'://ALUMNOS
      case '2'://DOCENTES
      case '4'://PADRES DE FAMILIA
          $query = $this->db->get();
          $resdatos = $query->result_array();
          foreach ($resdatos as $key => $d) {
          $siPersonaCurp = $this->db->query("SELECT IFNULL((SELECT idPersona FROM s_personas WHERE curp = '".$d['curp']."' AND tipo = '".$tipoPersona."' LIMIT 1),0) AS idPersona")->row()->idPersona;

          if($siPersonaCurp == 0){//NO EXISTE EN PERSONA CON EL MISMO TIPO
            $dataPersona = array(
              'tipo'=> $tipoPersona,
              'curp'=> $d['curp'],
              'estatus' => 1,
              'localidad' => $d['localidad'],
              'municipio' => $d['municipio'],
              'nombre'=> $d['nombre'],
              'apellidop'=> $d['apellidop'],
              'apellidom'=> $d['apellidom'],
              'correo'=> $d['correo'],
              'telefono'=> $d['telefono'],
              'direccion'=> $d['direccion'],
              'codpos'=> $d['codpos'],
              'nombre_tuto'=> $d['nombreTuto'],
              'ap_paterno_tuto'=> $d['apellidopTuto'],
              'ap_materno_tuto'=> $d['apellidomTuto']);
            $this->db->insert('s_personas', $dataPersona);
            $datos['idPersona'] = $this->db->insert_id();
          }
          else{
            $dataPersona = array(
              'estatus' => 1,
              'localidad' => $d['localidad'],
              'municipio' => $d['municipio'],
              'nombre'=> $d['nombre'],
              'apellidop'=> $d['apellidop'],
              'apellidom'=> $d['apellidom'],
              'correo'=> $d['correo'],
              'telefono'=> $d['telefono'],
              'direccion'=> $d['direccion'],
              'codpos'=> $d['codpos'],
              'nombre_tuto'=> $d['nombreTuto'],
              'ap_paterno_tuto'=> $d['apellidopTuto'],
              'ap_materno_tuto'=> $d['apellidomTuto']);
            $this->db->where('idPersona',$siPersonaCurp);
            $this->db->update('s_personas', $dataPersona);
            $datos['idPersona'] = $siPersonaCurp;
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
                2,
                ".($d['claveCT'] != '' ? "'".$d['claveCT']."'" : "''").",
                '".$this->now()."' ,
                1)
              ON DUPLICATE KEY UPDATE estatus = 1;");
        }

      break;
      case '3'://ESCUELAS
        //$tipoBene = 1;
      break;
    }
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
      if($datos['t'] == 3){
        foreach ($datos['claveCT'] as $key => $v){
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
                ".($v != '' ? "'".$v."'" : "''").",
                '".$this->now()."' ,
                1)
              ON DUPLICATE KEY UPDATE estatus = 1;");
        }
      }
    }
      $this->db->trans_complete();
      return array('error'=>false,'HTML'=>'Exito');
    }catch(Exception $ex){
      $this->db->trans_rollback();
      return array('error'=>true,'HTML'=>'Error');
    }
  }
  public function searchCCT($term){
    $data = array();
    $this->db->select("a.CLAVECCT AS id, CONCAT(a.CLAVECCT, ' - ', TRIM(a.NOMBRECT)) AS value,TRIM(a.NOMBRECT) AS nombre",FALSE);
    $this->db->from('a_ctba AS a');
    $this->db->like('a.CLAVECCT',$term);
    $this->db->or_like('a.NOMBRECT',$term);
    $this->db->limit("10");
    $query = $this->db->get();
    if ($query->num_rows() > 0){
      $data =  $query->result_array();
    }
    return $data;
  }
}
?>