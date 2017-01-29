<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = "acceso";
$route['(:any)'] = 'acceso';

#CONTROLLER INICIO
$route['inicio'] = 'inicio';

####USUARIOS
$route['usuarios'] = 'inicio/users';
$route['nuevoUsuario'] = 'inicio/newUsuario';
$route['editaUsuario'] = 'inicio/editUsuario';
$route['ajax/valiUsuario'] = 'inicio/validUsuario';
$route['ajax/guardarUsuario'] = 'inicio/saveUsuarioData';
$route['ajax/editarUsuario'] = 'inicio/editUsuarioData';
$route['ajax/listadoUsuarios'] = 'inicio/listUsuarios';
$route['ajax/cambiarEstatusUsuario'] = 'inicio/delUpUsuario';
$route['ajax/cambiarContrasena'] = 'inicio/changeContrasena';




//$route['beneficiados'] = 'inicio/listBeneficiados';
$route['ciclos'] = 'inicio/listCiclos';

########PROGRAMAS
$route['beneficiados'] = 'beneficiados';
$route['ajax/autocomplete/beneficiadoSearch'] = 'beneficiados/autocomplete/beneficiados';
$route['ajax/listadoBeneficiados'] = 'beneficiados/listBeneficiados';
$route['ajax/guardarBeneficiario'] = 'beneficiados/saveBeneficiados';
$route['ajax/eliminarBeneficiario'] = 'beneficiados/deleteBeneficiado';
$route['ajax/importarBeneficiarios'] = 'beneficiados/importBeneficiarios';

########END PROGRAMAS

########LOGIN
$route['captcha'] = 'acceso/verCaptcha';
$route['iniciarSession'] = 'acceso/validarInicioSession';
$route['cerrarSession'] = 'acceso/logout';
########END LOGIN

$route['404_override'] = '';
/* End of file routes.php */
/* Location: ./application/config/routes.php */