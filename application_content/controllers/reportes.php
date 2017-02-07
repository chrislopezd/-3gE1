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
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00' || $this->session->userdata('sep_UltimoAcceso') == '') ? "N/D" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
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
		set_time_limit(0);
    	ini_set('memory_limit', '4048M');
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
				if($_POST['localidad'] != 'null'){
					if($tipo == 3){
						$where .= " AND ii.LOCALIDAD = '{$_POST['localidad']}'";
					}elseif ($tipo == 1 || $tipo == 2 || $tipo == 4){
						$where .= " AND i.LOCALIDAD = '{$_POST['localidad']}'";
					}else{
						$where .= " AND (ii.LOCALIDAD = '{$_POST['localidad']}' OR i.LOCALIDAD = '{$_POST['localidad']}')";
					}
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
	public function dowloadExcelReporte(){
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
		$this->excel->getActiveSheet()->setTitle('REPORTE');
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
		$fecha = explode(" ",$this->mreportes->now());

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
			if($_POST['municipio'] != 'null'){
				if($tipo == 3){
					$where .= " AND cc.MUNICIPIO = '{$_POST['municipio']}'";
				}elseif ($tipo == 1 || $tipo == 2 || $tipo == 4){
					$where .= " AND c.MUNICIPIO = '{$_POST['municipio']}'";
				}else{
					$where .= " AND (c.MUNICIPIO = '{$_POST['municipio']}' OR cc.MUNICIPIO = '{$_POST['municipio']}')";
				}
			}
		}
		if(isset($_POST['localidad']) and strlen($_POST['localidad']) > 0){
			if($_POST['localidad'] != 'null'){
				if($tipo == 3){
					$where .= " AND ii.LOCALIDAD = '{$_POST['localidad']}'";
				}elseif ($tipo == 1 || $tipo == 2 || $tipo == 4){
					$where .= " AND i.LOCALIDAD = '{$_POST['localidad']}'";
				}else{
					$where .= " AND (ii.LOCALIDAD = '{$_POST['localidad']}' OR i.LOCALIDAD = '{$_POST['localidad']}')";
				}
			}
		}
		$valores_excel = $this->mreportes->getListado('r',$w,$where,"","","");
		//echo "<pre>";print_r($valores_excel);die();
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('Logo');
		$objDrawing->setDescription('Logo');
		$objDrawing->setPath('resources/images/logon.png');
		$objDrawing->setHeight(80);
		$objDrawing->setWorksheet($this->excel->getActiveSheet());
		$ii = 0;
		if(count($valores_excel) > 0){
			foreach($valores_excel as $k => $v){
				$i=0;
				foreach($v as $kk => $value){
					if($kk == "idTipo" and $value == 1){
						$ii++;
					}
					if($kk != 'idSol' and $kk != "tipoBene" and $kk != "idTipo"){
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i,$k+ 8,$value);
						$i++;
					}
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
			$this->excel->getActiveSheet()->mergeCells('E2:J2');//MERGE
			$this->excel->getActiveSheet()->setCellValue("E2", 'REPORTE');
			$this->excel->getActiveSheet()->getStyle("E2")->applyFromArray($styleArray6);
			$this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E2')->getFont()->setColor(new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_GRAY));
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setItalic(true);
		}
		else{
			$this->excel->getActiveSheet()->mergeCells('E2:J2');//MERGE
			$this->excel->getActiveSheet()->setCellValue("E2", 'NO HAY REGISTROS');
			$this->excel->getActiveSheet()->getStyle("E2")->applyFromArray($styleArray6);
			$this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E2')->getFont()->setColor(new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_GRAY));
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle("E2")->getFont()->setItalic(true);
		}
		$titulos_excel = array("Programa","Tipo","Curp","Nombre","Correo","Teléfono","Dirección","CodPos","Municipio","Localidad");
		$letras_excel = array("A","B","C","D","E","F","G","H","I","J");
		$width_excel = array("25","15","25","50","35","20","45","10","30","30");
		if($ii > 0){
			$titulos_excel[] = "Nombre del tutor";
			$letras_excel[] = "K";
			$width_excel[] = "45";
		}
		foreach($titulos_excel as $mk => $v){
			$this->excel->getActiveSheet()->getColumnDimension("{$letras_excel[$mk]}")->setWidth($width_excel[$mk]);
			$this->excel->getActiveSheet()->getStyle("{$letras_excel[$mk]}7")->applyFromArray($style);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($mk, "7", $v);
		}
  		ob_end_clean();
  		$_nombre = "REPORTE[ ".str_replace("/","_",$this->fechaPhp($fecha[0]))." ".str_replace(":","_",$fecha[1])." ].xls";
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$_nombre.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}
}
?>