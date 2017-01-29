<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->smarty->assign("lang", "spanish");
		$this->smarty->assign("raiz", INDEXURL);
		$this->smarty->assign("isActive", TRUE);
		$this->smarty->assign("title", 'Sistema');
		$this->load->model('mgenerico');
		$this->load->model('minicio');
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
		$token = $this->utilidades->generaToken();
		$d['token'] = $token['token'];
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		//echo $d['st_idPerfil'];die();
		$d['bread'] = "Inicio";
		$d['active'] = "inicio";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
		//echo "<pre>"; print_r($d);die();
		$this->smarty->assign("title", 'Inicio');
		$this->smarty->view("inicio.tpl",$d);
	}
	public function users(){
		$token = $this->utilidades->generaToken();
		$d['token'] = $token['token'];
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		//echo $d['st_idPerfil'];die();
		$d['bread'] = "Catálogo usuarios";
		$d['active'] = "usuarios";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
		//echo "<pre>"; print_r($d);die();
		$this->smarty->assign("title", 'Catálogo usuarios');
		$this->smarty->view("usuarios.tpl",$d);
	}
	public function newUsuario(){
		$token = $this->utilidades->generaToken();
		$d['token'] = $token['token'];
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		$d['edit'] = 0;
		$d['idUsuario'] = 0;
		$d['idPerfil'] = 0;
		$d['idTipo'] = 0;
		$d['usuario'] = '';
		$d['observaciones'] = '';
		$d['url'] = 'guardarUsuario';
		$d['bread'] = "Nuevo usuario";
		$d['active'] = "usuarios";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
		$info = $this->minicio->getCatPerfiles();
		$d['PERFILES'] = $info['DATOS'];
		$info = $this->minicio->getCatBeneficiados();
		$d['BENEFICIADOS'] = $info['DATOS'];
		//echo "<pre>"; print_r($d);die();
		$this->smarty->assign("title", 'Nuevo usuario');
		$this->smarty->view("forms/usuarios.tpl",$d);
	}
	public function editUsuario(){
		//echo "<pre>";print_r($_POST);die();
		if(!isset($_POST['id'])){redirect('usuarios','');}
		$id = (int) $this->input->post("id");
		if($id > 0){
			$token = $this->utilidades->generaToken();
			$d['token'] = $token['token'];
			$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
			$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
			$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
			$d['st_tipo'] = $this->session->userdata('sep_tipo');
			$d['st_programa'] = $this->session->userdata('sep_programa');
			$d['DATA'] = $this->minicio->editaUsuario($id);
			$d['edit'] = 1;
			$d['idUsuario'] = $d['DATA']->idUsuario;
			$d['idPerfil'] = $d['DATA']->idPerfilUsuario;
			$d['idTipo'] = $d['DATA']->idTipo;
			$d['usuario'] = $d['DATA']->programa;
			$d['observaciones'] = $d['DATA']->observaciones;
			$d['url'] = 'editarUsuario';
			$d['bread'] = "Edita usuario";
			$d['active'] = "usuarios";
			$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
			$info = $this->minicio->getCatPerfiles();
			$d['PERFILES'] = $info['DATOS'];
			$info = $this->minicio->getCatBeneficiados();
			$d['BENEFICIADOS'] = $info['DATOS'];
			//echo "<pre>"; print_r($d);die();
			$this->smarty->assign("title", 'Edita usuario');
			$this->smarty->view("forms/usuarios.tpl",$d);
		}
	}
	public function listBeneficiados(){
		$d['token'] = $this->utilidades->generaToken();
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		//echo $d['st_idPerfil'];die();
		$d['bread'] = "Catálogo beneficiados";
		$d['active'] = "beneficiados";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
		//echo "<pre>"; print_r($d);die();
		$this->smarty->assign("title", 'Catálogo beneficiados');
		$this->smarty->view("beneficiados.tpl",$d);
	}
	public function listCiclos(){
		$d['token'] = $this->utilidades->generaToken();
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		//echo $d['st_idPerfil'];die();
		$d['bread'] = "Catálogo ciclos";
		$d['active'] = "ciclos";
		$d['st_fechaUA'] = ($this->session->userdata('sep_UltimoAcceso') == '0000-00-00 00:00:00') ? "" : "".$this->FormatoFechaHoraFrase($this->session->userdata('sep_UltimoAcceso'));
		//echo "<pre>"; print_r($d);die();
		$this->smarty->assign("title", 'Catálogo ciclos');
		$this->smarty->view("ciclos.tpl",$d);
	}
	public function listUsuarios(){
		$info = $this->minicio->getUsuariosListado();
		$d['LISTADO'] = $info['DATOS'];
		echo json_encode(array('error'=>false, 'HTML' => $this->smarty->view("load/listadoUsuarios.tpl",$d,TRUE)));
	}
	public function validUsuario(){
		if($this->input->is_ajax_request()){
			$user = trim($this->input->post("user"));
			if(isset($_POST['user']) and strlen($user) > 2){
				echo $this->minicio->getUSerName($user);
			}
		}
	}
	public function saveUsuarioData(){
	    if($this->input->is_ajax_request()){
	      $id = $this->minicio->saveUsuarioData($_POST,0);
	      echo $id;
	    }
  	}
  	public function editUsuarioData(){
		if($this->input->is_ajax_request()){
		  $id = (int)$this->input->post("id");
		  //echo "<pre>";print_r($_POST);die();
		  $id = $this->minicio->saveUsuarioData($_POST,$id);
		  echo $id;
		}
  	}
  	public function delUpUsuario(){
  		if($this->input->is_ajax_request()){
			$id = (int)$this->input->post("id");
			if($id > 0){
				$estatus = $this->input->post("estatus");
				echo json_encode($this->minicio->delUpUsuario($id,$estatus));
			}
		}
	}
	public function changeContrasena(){
  		if($this->input->is_ajax_request()){
			$pass = $this->input->post("pass");
			if($pass != ""){
				echo json_encode($this->minicio->changePass($pass));
			}
		}
	}
}
?>