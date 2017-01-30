<?php /* Smarty version Smarty-3.1.13, created on 2017-01-30 15:11:17
         compiled from "application_content\views\templates\design\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20832588ac51e154d71-03379426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '273dd499bcaa7e8d7cfb1543a9f3f0075ce89f64' => 
    array (
      0 => 'application_content\\views\\templates\\design\\header.tpl',
      1 => 1485785414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20832588ac51e154d71-03379426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_588ac51e19c559_25594241',
  'variables' => 
  array (
    'title' => 0,
    'raiz' => 0,
    'st_programa' => 0,
    'active' => 0,
    'st_idPerfil' => 0,
    'st_fechaUA' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ac51e19c559_25594241')) {function content_588ac51e19c559_25594241($_smarty_tpl) {?><!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" value="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" media="all" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/favicon/apple-touch-icon-114x114.png" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/css/material-dashboard.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/css/estilo.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/captcha.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/css/css.css?family=Roboto:300,400,500,700|Material+Icons" />
</head>
<body class="sidebar-mini">
<div class="wrapper">
        <div class="sidebar" data-active-color="green" data-background-color="black" data-image="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/img/sidebar-3.jpg">
           
            <div class="logo">
                <a href="javascript:void(0);" class="simple-text">
                  SEGEY
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="javascript:void(0);" class="simple-text">
                    SEGEY
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/img/faces/logo.png" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <?php echo $_smarty_tpl->tpl_vars['st_programa']->value;?>

                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="">
                                    <a href="javascript:void(0)" class="editPass">
                                        Cambiar contraseña
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value=='inicio'){?>active<?php }?>">
                        <a href="inicio">
                            <i class="material-icons">home</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value=='beneficiados'){?>active<?php }?>">
                        <a href="beneficiados">
                            <i class="material-icons">assignment</i>
                            <p>Beneficiados</p>
                        </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['active']->value=='usuarios'){?>active<?php }?>">
                        <a href="usuarios">
                            <i class="material-icons">account_box</i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <?php }?>
                    
                    <li class="">
                        <a href="cerrarSession">
                            <i class="material-icons">exit_to_app</i>
                            <p>Salir</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-toggle">
                                <i class="material-icons">access_time</i> Último acceso: <?php echo $_smarty_tpl->tpl_vars['st_fechaUA']->value;?>

                                <p class="hidden-lg hidden-md"></p>
                            </a>
                        </li>
                        <li>
                            <a href="inicio" class="dropdown-toggle" data-toggle="tooltip" title="Inicio">
                                <i class="material-icons">home</i>
                                <p class="hidden-lg hidden-md">Inicio</p>
                            </a>
                        </li>
                        <li>
                            <a href="cerrarSession" class="dropdown-toggle" data-toggle="tooltip" title="Salir" data-toggle="dropdown">
                                <i class="material-icons">exit_to_app</i>
                                <p class="hidden-lg hidden-md">Salir</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav><?php }} ?>