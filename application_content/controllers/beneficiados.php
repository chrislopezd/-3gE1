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
		$d['active'] = "beneficiarios";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00' || $this->session->userdata('sep_UltimoAcceso') == '') ? "N/D" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));

		$info = $this->mbeneficiados->getBeneficiadosListado($d['st_idTipo']);
		$d['LISTADO'] = $info['DATOS'];

		$d['MUNICIPIOS'] = $this->mbeneficiados->getCatalogo('MUNICIPIOS','SELECT');
		$d['LOCALIDADES'] = $this->mbeneficiados->getCatalogo('LOCALIDADES','SELECT');
		$info = $this->mreportes->getCatMunicipios();
		$d['MUNICIPIOSF'] = $info['DATOS'];
		$d['GRADOS'] = array(1,2,3,4,5,6);
		$d['GRUPOS'] = array('A','B','C','D','E','F','G');
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
		//echo "<pre>";print_r($d['LISTADO']);die();
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
		//echo "<pre>";print_r($datos);die();
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
		//echo $_FILES['fileCSV']['type'];die();
		if(in_array($_FILES['fileCSV']['type'],$mimes)){
			if ($_FILES["fileCSV"]["error"] > 0) {
			}else{
				$nombre = explode('.', $_FILES["fileCSV"]["name"]);
				$ext = strtolower( end($nombre) );
			}
		}else{
			echo json_encode(array('error' => true, 'HTML' =>'El formato del archivo no es correcto.'));
			die();
		}

		$file = $_FILES["fileCSV"]["tmp_name"];
		if(empty($file)){
			return FALSE;
		}
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
	public function downloadProgramasExcel(){
		set_time_limit(0);
    	ini_set('memory_limit', '4048M');
		$this->load->library('excel');
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$this->excel->getProperties()->setCreator("SISTEMAS")
				->setLastModifiedBy("SISTEMAS SEGEY")
				->setTitle("REPORTE")
				->setSubject("REPORTE")
				->setDescription("REPORTE")
				->setKeywords("office 2007 openxml php")
				->setCategory("Archivo");
		$this->excel->getActiveSheet()->setTitle('REPORTE BENEFICIARIOS');
  		$this->excel->getDefaultStyle()->getFont()->setName('Helvetica');
		$this->excel->getDefaultStyle()->getFont()->setSize(8);
		$_styleArray = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,),);
		$style = array('font' => array('bold' => true,'color' => array('rgb' => 'FFFFFF'),),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => '000000')),
		'borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('rgb' => '8C8C8C'),),),);
		$styleArray2 = array('font' => array('normal' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,),
		'borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('rgb' => '8C8C8C'),),),);
		$styleArray5 = array('borders' => array('bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('rgb' => '8C8C8C'),),),);
		$styleArray6= array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,),);
		$styleArray7= array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,),);
		$fecha = explode(" ",$this->mbeneficiados->now());
		$idTipo = $this->session->userdata('sep_idTipo');
		$titulos_excel = array();
		$letras_excel = array();
		$width_excel = array();
		switch ($idTipo) {
	      case '1'://ALUMNOS
	       	$titulos_excel = array("Programa","CURP","Nombres","Apellido Paterno","Apellido Materno","Correo Electrónico","Teléfono","Dirección","Municipio","Localidad","Código Postal","Tutor");
	       	$letras_excel = array("A","B","C","D","E","F","G","H","I","J","K","L");
	       	$width_excel = array("20","25","25","20","20","35","20","45","35","35","15","45");
	      break;
	      case '2'://DOCENTES
	      	$titulos_excel = array("Programa","CURP","Nombres","Apellido Paterno","Apellido Materno","Correo Electrónico","Teléfono","Dirección","Municipio","Localidad","Código Postal");
	       	$letras_excel = array("A","B","C","D","E","F","G","H","I","J","K");
	       	$width_excel = array("20","25","25","20","20","35","20","45","35","35","15");
	      break;
	      case '3'://ESCUELAS
			$titulos_excel = array("Programa","Clave CT","Turno","Nombre CT","Dirección","Zona","Municipio","Localidad","Código Postal");
	      	$letras_excel = array("A","B","C","D","E","F","G","H","I");
	       	$width_excel = array("20","20","20","35","45","10","35","35","15");
	      break;
	      case '4'://PADRES DE FAMILIA
	      	$titulos_excel = array("Programa","CURP","Nombres","Apellido Paterno","Apellido Materno","Correo Electrónico","Teléfono","Dirección","Municipio","Localidad","Código Postal");
	       	$letras_excel = array("A","B","C","D","E","F","G","H","I","J","K");
	       	$width_excel = array("20","25","25","20","20","35","20","45","35","35","15");
	      break;
	    }
		foreach($titulos_excel as $mk => $v){
			$this->excel->getActiveSheet()->getColumnDimension("{$letras_excel[$mk]}")->setWidth($width_excel[$mk]);
			$this->excel->getActiveSheet()->getStyle("{$letras_excel[$mk]}1")->applyFromArray($style);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($mk, "1", $v);
		}
		$info = $this->mbeneficiados->getBeneficiadosReporte($idTipo);
		$valores_excel = $info['DATOS'];
		/*$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('Logo');
		$objDrawing->setDescription('Logo');
		$objDrawing->setPath('resources/images/logon.png');
		$objDrawing->setHeight(80);
		$objDrawing->setWorksheet($this->excel->getActiveSheet());*/
		$ii = 0;
		if(count($valores_excel) > 0){
			foreach($valores_excel as $k => $v){
				$i=0;
				foreach($v as $kk => $value){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i,$k+ 2,$value);
					$i++;
				}
			}
			/*CONFIGURACION EXTRA*/
			$this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			$this->excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);
			$this->excel->getActiveSheet()->getPageMargins()->setTop(1);
			$this->excel->getActiveSheet()->getPageMargins()->setRight(0.75);
			$this->excel->getActiveSheet()->getPageMargins()->setLeft(0.75);
			$this->excel->getActiveSheet()->getPageMargins()->setBottom(1);
			/*MARGENES DE IMPRESION*/
			$sheet = $this->excel->setActiveSheetIndex(0);
			$pageMargins = $sheet->getPageMargins();
			$margin = 0.5 / 2.54;
			$pageMargins->setTop($margin);
			$pageMargins->setBottom($margin);
			$pageMargins->setLeft(0.5);
			$pageMargins->setRight($margin);
			/*TITULO 1*/
			/*
			$this->excel->getActiveSheet()->mergeCells('E2:J2');//MERGE
			$this->excel->getActiveSheet()->setCellValue("E2", 'REPORTE BENEFICIARIOS');
			$this->excel->getActiveSheet()->getStyle("E2")->applyFromArray($styleArray6);
			$this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E2')->getFont()->setColor(new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_GRAY));
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setItalic(true);*/
		}
		else{
			$this->excel->getActiveSheet()->mergeCells('E2:I2');//MERGE
			$this->excel->getActiveSheet()->setCellValue("E2", 'NO HAY REGISTROS');
			$this->excel->getActiveSheet()->getStyle("E2")->applyFromArray($styleArray6);
			$this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E2')->getFont()->setColor(new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_GRAY));
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setItalic(true);
		}

  		ob_end_clean();
  		$_nombre = "REPORTE_BENEFICIARIOS[ ".str_replace("/","_",$this->fechaPhp($fecha[0]))." ".str_replace(":","_",$fecha[1])." ].xlsx";
  		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		//header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$_nombre.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel,'Excel2007');//'Excel5'
		$objWriter->save('php://output');
	}
	public function loadListadoFiltro(){
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		$mpost = $this->input->post();
		$tipo = $this->input->post("t");
		//echo "<pre>";print_r($mpost);die();
		$info = $this->mbeneficiados->getListadoFiltro($d['st_idTipo'],$mpost);
		$d['LISTADO'] = $info['DATOS'];
		//echo "<pre>";print_r($d['LISTADO']);die();
		if($tipo == 1){
			echo json_encode(array('error'=>false, 'HTML' => $this->smarty->view("load/listadoAlumnos.tpl",$d,TRUE)));
		}
		if($tipo == 2){
			echo json_encode(array('error'=>false, 'HTML' => $this->smarty->view("load/listadoDocentes.tpl",$d,TRUE)));
		}
		if($tipo == 3){
			echo json_encode(array('error'=>false, 'HTML' => $this->smarty->view("load/listadoEscuelas.tpl",$d,TRUE)));
		}
	}
	public function saveBeneficiadosMasivo(){
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		$datos = $this->input->post();
		echo json_encode($this->mbeneficiados->saveBeneficiadosMasivo($d, $datos));
	}
	public function searchCCT(){
		$busquedaTotal = array();
		if (isset($_GET['term']) and strlen($_GET['term']) >= 3){
			$q = strtoupper($_GET['term']);
			$busquedaTotal = $this->mbeneficiados->searchCCT($q);
		}
		echo json_encode($busquedaTotal);
	}
}
?>