<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Acceso extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->smarty->assign("lang", "spanish");
		$this->smarty->assign("raiz", INDEXURL);
		$this->smarty->assign("title", 'Iniciar sesión');
		$this->load->model('mgenerico');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('string');
	}
	/*FUNCIONES*/
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
		if($this->session->userdata('sep_idUsuario') != false){
			redirect('inicio','');
		}
		$token = $this->utilidades->generaToken();
		$d['token'] = $token['token'];
		$d['msg'] = '';
		$d['rem'] = 0;
		$this->smarty->assign("title", 'Iniciar sesión');
		$this->smarty->view("loggin.tpl",$d);
	}
	public function checkSessions(){
		$logged = $this->session->userdata('sep_logged_in');
		$sesion = (!$logged) ? 0 : 1;
		echo json_encode(array("isTrue" => $sesion, "isExist" => (!$logged) ? -1 : $this->session->userdata('sep_idUsuario') ));
		die();
	}
	public function activarSessions(){
		$idUsuario = $this->input->post("idU");
		$filtrosUser = array('idUsuario' => $idUsuario);
		$data = $this->mgenerico->validarLogin($filtrosUser);
		if(count($data) > 0){//El usuario existe y está activo
			$_sesion = array(
			'sep_idUsuario' => $data['idUsuario'],
			'sep_idPerfilUsuario' => $data['idPerfilUsuario'],
			'sep_idTipo' => $data['idTipo'],
			'sep_tipo' => $data['tipo'],
			'sep_iprograma' => $data['programa'],
			'sep_programa' => $data['programa'],
			'sep_UltimoAcceso' => $data['fechaAcceso'],
			'sep_logged_in' => true);
			$this->session->set_userdata($_sesion);
		}
	}
	public function inicio(){
		if($this->session->userdata('sep_idUsuario') == false){
			redirect('loggin','refresh');
		}
		$token = $this->utilidades->generaToken();
		$d['token'] = $token['token'];
		$d['st_idUsuario'] = $this->session->userdata('sep_idUsuario');
		$d['st_idPerfil'] = $this->session->userdata('sep_idPerfilUsuario');
		$d['st_idTipo'] = $this->session->userdata('sep_idTipo');
		$d['st_tipo'] = $this->session->userdata('sep_tipo');
		$d['st_programa'] = $this->session->userdata('sep_programa');
		$d['active'] = 'inicio';
		$this->smarty->assign("title", 'Inicio');
		$this->smarty->view("inicio.tpl",$d);
	}
	public function verCaptcha(){
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['captcha']) && $_POST['captcha'] == $this->session->userdata('st_Captcha')){
			echo "Passed!";
			$this->session->unset_userdata(array('st_Captcha'=> NULL,));
		}
		else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['captcha'])){
			echo "Failed!";
		}
		else{
			$rand = rand(0,4);
			$this->session->set_userdata(array('st_Captcha' => $rand));
			echo $rand;
		}
	}
	public function getHora(){
		if($_POST['id'] == 1){
			echo $this->mgenerico->now();
		}
	}
	public function c(){
		$pass = $this->input->get("c");
		echo md5($pass)." => ".$pass;
		die();
	}
	public function validarInicioSession(){
		$token = $this->utilidades->generaToken();
		$d = array();
		$d['token'] = $token['token'];
		//echo "<pre>";print_r($_POST);die();
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['captcha']) && $_POST['captcha'] == $this->session->userdata('st_Captcha')){
			$this->session->unset_userdata(array('st_Captcha'=> NULL,));
			$user = trim($this->input->post('txtUsuario', TRUE));
			$pass = trim($this->input->post('txtPass', TRUE));
			if(strlen($user) > 2 && strlen($pass) > 2){
				$filtrosUser = array('usuario' => $user, 'pass' => $pass);
				$data = array();
				$data = $this->mgenerico->validarLogin($filtrosUser);
				if(count($data) > 0){//El usuario existe y está activo
					//Actualizar fecha de acceso
					$this->mgenerico->updateFechaInicio($data['idUsuario']);
					$_sesion = array(
					'sep_idUsuario' => $data['idUsuario'],
					'sep_idPerfilUsuario' => $data['idPerfilUsuario'],
					'sep_idTipo' => $data['idTipo'],
					'sep_tipo' => $data['tipo'],
					'sep_programa' => $data['programa'],
					'sep_UltimoAcceso' => $data['fechaAcceso'],
					'sep_logged_in' => true);
					//echo "<pre>";print_r($_sesion);die();
					$this->session->set_userdata($_sesion);
					redirect("inicio",'');
				}
				else{//No existe o está inactivo
					$d['msg'] = '<span class="glyphicon glyphicon-exclamation-sign"></span> El Usuario o Contraseña no son válidos.';
				}
			}
			else{//Entró mal el formulario
				$d['msg'] = '<span class="glyphicon glyphicon-exclamation-sign"></span> El Usuario o Contraseña no son válidos.';
			}
		}
		else{
			$d['msg'] = '<span class="glyphicon glyphicon-exclamation-sign"></span> La imagen del captcha es incorrecta.';
		}
		$d['rem'] = 1;
		$this->smarty->assign("title", 'Iniciar sesión');
		$this->smarty->view('loggin.tpl',$d);
	}
	/*END ADMIN*/
	public function errorCsrf(){
		$token = $this->utilidades->generaToken();
		$d = array();
		$d['token'] = $token['token'];
		$d['rem'] = 1;
		$d['msg'] = '<span class="glyphicon glyphicon-exclamation-sign"></span> <strong> El token de seguridad ha caducado:</strong><br/>Esto se puede deber a que el tiempo de inactividad fue prolongado. Para continuar vuelva a ingresar sus datos.';
		$this->smarty->view('loggin.tpl',$d);
	}
	public function logout(){
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('', 'refresh');
    }
}
?>