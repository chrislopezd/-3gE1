<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 20:20:47
         compiled from "application_content\views\templates\design\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18903573f4d18d5ba53-90262891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '273dd499bcaa7e8d7cfb1543a9f3f0075ce89f64' => 
    array (
      0 => 'application_content\\views\\templates\\design\\header.tpl',
      1 => 1466644844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18903573f4d18d5ba53-90262891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_573f4d18d869d0_20453954',
  'variables' => 
  array (
    'title' => 0,
    'raiz' => 0,
    '_isUV' => 0,
    'st_usuario' => 0,
    'perfil' => 0,
    'isActive' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573f4d18d869d0_20453954')) {function content_573f4d18d869d0_20453954($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
    	<meta http-equiv="Content-type" value="text/html; charset=utf-8">
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link rel="shortcut icon" media="all" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/favicon.ico" />
   		<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/apple-touch-icon.png" />
    	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/apple-touch-icon-72x72.png" />
    	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/apple-touch-icon-114x114.png" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/css/admin.min.css" rel="stylesheet">
		<link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/css/prettify-tomorrow.css" rel="stylesheet" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/css/animate.css" rel="stylesheet">
		<link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/js/jquery-ui.min.css" rel="stylesheet">
		<link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/css/mcss.css" rel="stylesheet">		
		<script type="text/javascript">var _raizS = '<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
';var _isUV = '<?php echo $_smarty_tpl->tpl_vars['_isUV']->value;?>
';</script>
	</head>
<body class="container-fluid">
	<div id="page-wrapper">
		<section id="right-content">
			<header class="header-container">
				<div class="header-wrapper">
					<div id="header-toolbar" style="width: 100%">
						<ul class="toolbar toolbar-left">
							<li style="padding:5px;margin-top: -5px;">
								<a href="inicio">
								<img src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/images/logoSegey.png" width="120px" title="SEGEY">
								</a>
							</li>
						</ul>
						<div id="searchbox">
							<div class="mTitle">
								<h3 class="txtHeader">Sistema de validación para la Cancelación / Creación / Conversión de claves presupuestales</h3>
							</div>
						</div>
						<ul class="toolbar toolbar-right">
							
							<li id="user-profile" class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<div class="avatar">
										<img src="resources/img/avatar.png" class="img-circle img-responsive" />
									</div>
									<div class="user">
										<span class="username"><?php echo $_smarty_tpl->tpl_vars['st_usuario']->value;?>
</span>
									</div>
									<span class="expand-ico"><i class="material-icons">expand_more</i></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="inicio"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
									<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['isActive']->value){?>
									<li><a href="nuevoRegistro"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo registro</a></li>
									<?php }?>
									<li><a href="cerrarSession" id="cloedSession"><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar sesión</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</header><?php }} ?>