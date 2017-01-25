<?php /* Smarty version Smarty-3.1.13, created on 2016-06-02 14:49:37
         compiled from "application_content\views\templates\loggin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11848573e3c3b3e55a2-54293964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98e54346138008119224deb003c9220f947aadff' => 
    array (
      0 => 'application_content\\views\\templates\\loggin.tpl',
      1 => 1464896975,
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
    'rem' => 0,
    'msg' => 0,
    'token' => 0,
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
resources/js/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/dist/css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/css/loggin.css" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/css/animate.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/captcha.css" rel="stylesheet" />
    <script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/js/jquery.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/js/jquery-ui.min.js"></script>    
    <script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/pace/pace.min.js"></script>
     <!--[if lt IE 9]>
      <script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/dist/js/html5shiv.min.js"></script>
      <script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/dist/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">        
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 animated fadeInUp">
        <div class="panel panel-success">
            <div class="panel-heading animated fadeIn">
                <div class="panel-title center" style="font-size: 22pt;font-weight: bold;">BIENVENIDO</div>
            </div>
            <div style="padding-top:30px" class="panel-body animated fadeIn">
            	<div class="row mbot10">
            	<div class="col-md-6 col-md-offset-3 center">
            		<img class="" src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/images/logon.png" width="180px" alt="SEGEY">
            	</div>
            	</div>
                <div id="login-alert" class="alert alert-danger animated flash col-sm-12 <?php if ($_smarty_tpl->tpl_vars['rem']->value==0){?>hiden<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
                <form name="loginform" id="loginform" method="post" action="iniciarSession" class="form-horizontal animated fadeInUp" role="form">
                	<input type="hidden" name="csrf_sistem_tok_name" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="user" id="user" type="text" class="form-control" placeholder="USUARIO" autocomplete="off" autofocus>
                        <label for="user"></label>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="pass" id="pass" type="password" class="form-control" placeholder="CONTRASEÑA">
                        <label for="pass"></label>
                    </div>
					<div class="row" style="margin:0px">
        				<div class="ajax-fc-container"></div>
    				</div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">                            
                           
                            <button type="submit" id="btnLog" class="btn3d btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok-circle"></span> Iniciar sesión</button>
                        </div>
                    </div>
                    <div class="form-group center">
                        <div class="col-md-12 width100 center">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%;margin-bottom:-25px;" class="center">
                                <p class="text-muted white space">© Derechos Reservados 2016</p>
    							<a href="http://www.educacion.yucatan.gob.mx" target="_blank" class="mLink"><p class="text-muted white">Secretaría de Educación del Gobierno del Estado de Yucatán</p></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>    
</div>
<script type="text/javascript">var _raiz = '<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
';</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/jquery.touch.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/plugs/jquery.captcha.js"></script>
<script type="text/javascript">$().ready(function(){$("#captcha").show();$(".ajax-fc-container").captcha();});</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/js/web/loggin.js"></script>
</body>
</html><?php }} ?>