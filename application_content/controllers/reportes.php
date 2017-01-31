<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->smarty->assign("lang", "spanish");
		$this->smarty->assign("raiz", INDEXURL);
		$this->smarty->assign("isActive", TRUE);
		$this->smarty->assign("title", 'Sistema');
		$this->load->model('mgenerico');
		$this->load->model('mreportes');
		$this->load->helper('url');
		$this->load->helper('string');
		$logged = $this->session->userdata('sep_logged_in');
		if(!$logged){redirect('','refresh');}
	}
	/*FUNCIONES*/
	private $isActive = TRUE;
	public function Meses($m){
		$meses = array("Diciembre","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		return $meses[$m];
	}
	public function FormatoHora($f){
		list($fecha, $hora) = explode(" ", $f);
		list($hora, $min, $seg) = explode(":", $hora);
		if($hora >=12) {
			$texto = "pm";
			if($hora>12) { $hora -= 12; }
		} else {
			$texto = "am";
		}
		//echo $hora;die();
		$hh = sprintf("%02d",$hora).":".$min." ".$texto;
		return $hh;
	}
	public function FormatoFechaHoraFrase($f){
		list($fecha, $hora) = explode(" ", $f);
		list($anio, $mes, $dia) = explode("-", $fecha);
		list($hora, $min, $seg) = explode(":", $hora);
		$txt = ($hora == "13" || $hora == "01" || $hora == "1") ? " a la " : " a las ";
		$ff = $dia." de ".$this->Meses((int) $mes)." de ".$anio.$txt.$this->FormatoHora($f);
		return $ff;
	}
	public function removeText($txt){
 		return trim(str_replace('\\', '', str_replace("'","",str_replace('"','',trim($txt)))));
 	}
 	public function fechaPhp($fecha){
		if($fecha != ""){
			$_f = explode("-",$fecha);
			return $_f[2]."/".$_f[1]."/".$_f[0];
		}
	}
	public function mayus($str){
		$str = strtoupper($str);
		$str = str_replace("á", "Á", $str);
		$str = str_replace("é", "É", $str);
		$str = str_replace("í", "Í", $str);
		$str = str_replace("ó", "Ó", $str);
		$str = str_replace("ú", "Ú", $str);
		$str = str_replace("ñ", "Ñ", $str);
		return ($str);
	}
	public function fechaMysql($f){
 		$fr = explode("/",$f);
		return $fr[2]."-".$fr[1]."-".$fr[0];
 	}
 	/*END FUNCIONES*/
 	/*TPL'S*/
 	public function index(){
 		if($this->session->userdata('sep_idPerfilUsuario') > 1){
			redirect('','refresh');
		}
		$d['token'] = $this->utilidades->generaToken();
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		//echo $d['st_idPerfil'];die();
		$d['bread'] = "Reportes";
		$d['active'] = "reportes";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
		$info = $this->mreportes->getCatMunicipios();
		$d['MUNICIPIOS'] = $info['DATOS'];
		$info = $this->mreportes->getCatProgramas();
		$d['PROGRAMAS'] = $info['DATOS'];
		$info = $this->mreportes->getCatBeneficiados();
		$d['TIPOS'] = $info['DATOS'];

		//echo "<pre>"; print_r($d);die();
		$this->smarty->assign("title", 'Reportes');
		$this->smarty->view("reportes.tpl",$d);
	}
	public function getLocalidades(){
		if($this->input->is_ajax_request()){
			$municipio = $this->input->post("municipio");
			$info = $this->mreportes->getCatLocalidades($municipio);
			$d['LOCALIDADES'] = $info['DATOS'];
			echo json_encode(array('error' => 0,'HTML'=>$this->smarty->view('load/localidades.tpl', $d, TRUE)));
		}
	}
	public function getListadoReporte(){
		//$r = array();
		$page = isset($_POST['page'])?$_POST['page'] : 1;
		$limit = isset($_POST['rows'])?$_POST['rows'] : 100;
		$sidx = isset($_POST['sidx'])?$_POST['sidx'] : 't.programa';
		$sord = isset($_POST['sord'])?$_POST['sord'] : 'ASC';
		if(!$sidx) $sidx =1;
		$start = $limit * $page - $limit;
		$start = ($start < 0) ? 0 : $start;
		$_trigger = intval($_POST['trigger']);
		$r = array();
		if($_trigger > 0){
			$where = "";
			$w = "";
			$tipo = $_POST['tipo'];
			if(isset($_POST['nombre']) and strlen(trim($_POST['nombre'])) > 0){
				$_POST['nombre'] = $this->removeText($_POST['nombre']);
				if($tipo == 3){
					$where .= " AND ( a.NOMBRECT LIKE '%{$_POST['nombre']}%')";
				}else if ($tipo == 1 || $tipo == 2 || $tipo == 4){
					$where .= " AND ( CONCAT_WS(' ',p.apellidop,p.apellidom,p.nombre) LIKE '%{$_POST['nombre']}%')";
				}else{
					$where .= " AND (a.NOMBRECT LIKE '%{$_POST['nombre']}%' OR CONCAT_WS(' ',p.apellidop,p.apellidom,p.nombre) LIKE '%{$_POST['nombre']}%')";
				}
			}
			if(isset($_POST['cct']) and strlen(trim($_POST['cct'])) > 0){
				$_POST['cct'] = $this->removeText($_POST['cct']);
				$where .= " AND ( b.clavecct LIKE '%{$_POST['cct']}%')";
			}
			if(isset($_POST['programa']) and strlen($_POST['programa']) > 0){
				$where .= " AND b.idUsuario = '{$_POST['programa']}'";
			}
			if(isset($_POST['tipo']) and strlen($_POST['tipo']) > 0){
				$where .= " AND b.idTipo = '{$_POST['tipo']}'";
			}
			if(isset($_POST['municipio']) and strlen($_POST['municipio']) > 0){
				if($tipo == 3){
					$where .= " AND cc.MUNICIPIO = '{$_POST['municipio']}'";
				}elseif ($tipo == 1 || $tipo == 2 || $tipo == 4){
					$where .= " AND c.MUNICIPIO = '{$_POST['municipio']}'";
				}else{
					$where .= " AND (c.MUNICIPIO = '{$_POST['municipio']}' OR cc.MUNICIPIO = '{$_POST['municipio']}')";
				}
			}
			if(isset($_POST['localidad']) and strlen($_POST['localidad']) > 0){
				if($tipo == 3){
					$where .= " AND ii.LOCALIDAD = '{$_POST['localidad']}'";
				}elseif ($tipo == 1 || $tipo == 2 || $tipo == 4){
					$where .= " AND i.LOCALIDAD = '{$_POST['localidad']}'";
				}else{
					$where .= " AND (ii.LOCALIDAD = '{$_POST['localidad']}' OR i.LOCALIDAD = '{$_POST['localidad']}')";
				}
			}
			if($_POST['sidx'] == "programa"){$sidx = "programa";}
			if($_POST['sidx'] == "tipo"){$sidx = "tipo";}
			if($_POST['sidx'] == "curp"){$sidx = "curp";}
			if($_POST['sidx'] == "nombre"){$sidx = "nombre";}
			if($_POST['sidx'] == "correo"){$sidx = "correo";}
			if($_POST['sidx'] == "telefono"){$sidx = "telefono";}
			if($_POST['sidx'] == "direccion"){$sidx = "direccion";}
			if($_POST['sidx'] == "codpos"){$sidx = "codpos";}
			if($_POST['sidx'] == "muninicipio"){$sidx = "muninicipio";}
			if($_POST['sidx'] == "localidad"){$sidx = "localidad";}
			$count = $this->mreportes->getListado('c',$w,$where,"","","");
			$total_pages = ( $count > 0 ) ?	ceil($count/$limit) : 0;
			if($page > $total_pages){
				$page=$total_pages;
			}
			$orden = "ORDER BY {$sidx} {$sord} ";
			$data = $this->mreportes->getListado('r',$w,$where,$start,$limit,$orden);
			$r = new stdClass();
			$r->page = $page;
			$r->total = $total_pages;
			$r->records = $count;
			if(count($data) > 0){
				foreach($data as $k => $row){
					$id_ = $row['idSol'];
					$r->rows[$k]['id']= $id_;
					$r->rows[$k]['cell']=array($row['idSol'],$row['tipoBene'],$row['programa'],$row['tipo'],$row['curp'],$row['nombre'],$row['correo'],$row['telefono'],$row['direccion'],$row['codpos'],$row['muninicipio'],$row['localidad']);
				}
			}
		}
		echo json_encode($r);
	}
}
?>