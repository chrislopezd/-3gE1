<?php
class Utilidades extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function generaToken(){
		$res = array();
		//TOKENS CORRESPONDING TO csrf SECURITY
		$res['token_name'] = $this->security->get_csrf_token_name();
		$res['token'] = $this->security->get_csrf_hash();
		return $res;
	}
	public function noSession(){
		$d['alert'] = 'success';
		$d['msg'] = 'BIENVENIDO';
		$token = $this->utilidades->generaToken();
		$d['token'] = $token['token'];
		return $d;
	}
}
?>