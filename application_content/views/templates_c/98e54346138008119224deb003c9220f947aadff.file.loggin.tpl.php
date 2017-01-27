<?php /* Smarty version Smarty-3.1.13, created on 2017-01-27 02:35:19
         compiled from "application_content\views\templates\loggin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11848573e3c3b3e55a2-54293964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98e54346138008119224deb003c9220f947aadff' => 
    array (
      0 => 'application_content\\views\\templates\\loggin.tpl',
      1 => 1485480827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11848573e3c3b3e55a2-54293964',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_573e3c3b790b15_12970073',
  'variables' => 
  array (
    'title' => 0,
    'raiz' => 0,
    'token' => 0,
    'rem' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573e3c3b790b15_12970073')) {function content_573e3c3b790b15_12970073($_smarty_tpl) {?><!DOCTYPE html>
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
<body>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="green" data-image="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/img/bg-profile.png">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form name="loginform" id="loginform" method="post" action="iniciarSession" class="form-horizontal animated fadeInUp" role="form">
                                <input type="hidden" name="csrf_segey_tok_name" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="green">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/img/logo.png" style="max-width:250px;">
                                    </div>
                                   <div id="login-alert" class="alert alert-danger animated flash col-sm-12 <?php if ($_smarty_tpl->tpl_vars['rem']->value==0){?>hide<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating has-success">
                                                <label class="control-label">Usuario</label>
                                                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control upper" autofocus autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating has-success">
                                                <label class="control-label">Contraseña</label>
                                                <input type="password" name="txtPass" id="txtPass" class="form-control"  autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="input-group text-center" style="margin-left:20px;">
                                            <div class="ajax-fc-container"></div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" id="btnLogIn" class="btn btn-success btn-round">
                                        <span class="btn-label"><i class="material-icons">check</i></span> Ingresar al sistema</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <p class="copyright text-center">
                        &copy;
                        2017
                        <a href="http://www.educacion.yucatan.gob.mx/" target="_blank">Secretaría de Educación del Gobierno del Estado de Yucatán</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
<script type="text/javascript">var _raiz = '<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
';</script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery.validate.min.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/moment.min.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/chartist.min.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery.bootstrap-wizard.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/bootstrap-notify.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery.sharrre.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/bootstrap-datetimepicker.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery-jvectormap.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/nouislider.min.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery.select-bootstrap.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery.datatables.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jasny-bootstrap.min.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/jquery.tagsinput.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/material-dashboard.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/theme/js/js.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/pace/pace.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/jquery.touch.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/jquery.captcha.js"></script>
<script type="text/javascript">$().ready(function(){$("#captcha").show();$(".ajax-fc-container").captcha();});</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/js/web/loggin.js"></script>
</body>
</html><?php }} ?>