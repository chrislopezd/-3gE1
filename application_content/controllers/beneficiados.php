<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beneficiados extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->smarty->assign("lang", "spanish");
		$this->smarty->assign("raiz", INDEXURL);
		$this->smarty->assign("isActive", TRUE);
		$this->smarty->assign("title", 'Sistema');
		$this->load->model('mgenerico');
		$this->load->model('mbeneficiados');
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
		if($this->session->userdata('sep_idPerfilUsuario') == 1){
			redirect('','refresh');
		}
		$d['token'] = $this->utilidades->generaToken();
		//print_r($d['token']);die;
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		//echo $d['st_idPerfil'];die();
		$d['bread'] = "Catálogo beneficiados";
		$d['active'] = "beneficiados";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));

		$info = $this->mbeneficiados->getBeneficiadosListado($d['st_idTipo']);
		$d['LISTADO'] = $info['DATOS'];

		$d['MUNICIPIOS'] = $this->mbeneficiados->getCatalogo('MUNICIPIOS','SELECT');
		$d['LOCALIDADES'] = $this->mbeneficiados->getCatalogo('LOCALIDADES','SELECT');
		//echo "<pre>"; print_r($d);die();
		$this->smarty->assign("title", 'Catálogo beneficiados');
		$this->smarty->view("beneficiados.tpl",$d);
	}
	public function listBeneficiados(){
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');

		$info = $this->mbeneficiados->getBeneficiadosListado($d['st_idTipo']);
		$d['LISTADO'] = $info['DATOS'];

		echo json_encode(array('error'=>false, 'HTML' => $this->smarty->view("beneficiadosList.tpl",$d,TRUE)));
	}
	public function autocomplete($tipoBusqueda){
		switch ($tipoBusqueda) {
			case 'beneficiados':
				$termino = $this->input->get('q');
				if(empty($termino)){echo json_encode(FALSE);}
				$resMod = $this->mbeneficiados->autocomplete($tipoBusqueda, $termino);
				echo json_encode( $resMod );
				break;

			default:
				echo json_encode( array() );
				break;
		}
	}

	public function saveBeneficiados(){
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		$datos = $this->input->post();
		echo json_encode($this->mbeneficiados->saveBeneficiados($d, $datos));
	}

	public function deleteBeneficiado(){
		$datos = $this->input->post();
		echo json_encode($this->mbeneficiados->deleteBeneficiado($datos));
	}

	public function importBeneficiarios(){
		$idTipoBene = $this->session->userdata('sep_idTipo');

		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');

		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$HTML = $nombre = $ext = "";

		if(in_array($_FILES['fileCSV']['type'],$mimes)){
			if ($_FILES["fileCSV"]["error"] > 0) {
			} else {
				$nombre = explode('.', $_FILES["fileCSV"]["name"]);
				$ext = strtolower( end($nombre) );
			}
		} else {
			echo json_encode(array('error' => true, 'HTML' =>'El formato del archivo no es correcto.'));
			die();
		}

		$file = $_FILES["fileCSV"]["tmp_name"];
		if(empty($file)){return FALSE;}

		$estructura = array('CLAVECCT', 'TURNO', 'GRADO', 'GRUPO', 'TIPO DE GRUPO');
		$cct = $turno = $nivelGrado = $lastInsert = '';
		switch ($ext) {
			case 'csv':
			case "xls":
				echo json_encode(array('error' => true, 'HTML' =>'<h2>Por el momento este tipo de archivo no se acepta , guarde en version Office 2007 en adelante \'XLSX\'</h2>'));
				die();
				break;
			case 'xlsx':
				//include 'simplexlsx.class.php';
				$this->load->library('SimpleExcel');
				$xlsx = new SimpleXLSX($file);

				$arrayData = array();
				$c = 0;
				foreach ($xlsx->rows() as $key => $value) {
					if ($key > 0){
						switch ($idTipoBene) {
				            case '1'://ALUMNOS
				            case '2'://DOCENTES
				            case '4'://PADRES DE FAMILIA
								$curp = trim($value[0]);
								$nombres = trim($value[1]);
								$apellidoPaterno = trim($value[2]);
								$apellidoMaterno = trim($value[3]);
								$correo = trim($value[4]);
								$telefono = trim($value[5]);
								$direccion = trim($value[6]);
								$municipio = trim($value[7]);
								$localidad = trim($value[8]);
								$codigoPostal = trim($value[9]);

								$arrayData[$c]['CURP'] = $curp;
								$arrayData[$c]['NOMBRES'] = $nombres;
								$arrayData[$c]['APEPAT'] = $apellidoPaterno;
								$arrayData[$c]['APEMAT'] = $apellidoMaterno;
								$arrayData[$c]['CORREO'] = $correo;
								$arrayData[$c]['TELEFONO'] = $telefono;
								$arrayData[$c]['DIRECCION'] = $direccion;
								$arrayData[$c]['MUN'] = $municipio;
								$arrayData[$c]['LOCA'] = $localidad;
								$arrayData[$c]['CP'] = $codigoPostal;
				            break;
				            case '3'://ESCUELAS
								$claveCT = trim($value[0]);
								$nombreCT = trim($value[1]);
								$municipio = trim($value[2]);
								$localidad = trim($value[3]);

								$arrayData[$c]['CLAVECT'] = $claveCT;
								$arrayData[$c]['NOMBRECT'] = $nombreCT;
								$arrayData[$c]['MUN'] = $municipio;
								$arrayData[$c]['LOCA'] = $localidad;
				            break;
					    }
						$c++;
					}
				}

				//echo "<pre>";print_r($arrayData);
				echo json_encode($this->mbeneficiados->importBeneficiarios($d , $arrayData));

				break;
			default:
				echo json_encode(array('error' => true, 'HTML' =>'<h2>Por el momento este tipo de archivo no se acepta , guarde en version Office 2007 en adelante \'XLSX\'</h2>'));
				break;
		}

	}
}
?>