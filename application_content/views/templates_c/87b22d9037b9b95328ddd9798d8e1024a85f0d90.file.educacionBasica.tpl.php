<?php /* Smarty version Smarty-3.1.13, created on 2016-04-19 04:26:11
         compiled from "application_content\views\templates\educacionBasica.tpl" */ ?>
<?php /*%%SmartyHeaderCode:775713ab7803c360-19218099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87b22d9037b9b95328ddd9798d8e1024a85f0d90' => 
    array (
      0 => 'application_content\\views\\templates\\educacionBasica.tpl',
      1 => 1460913596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '775713ab7803c360-19218099',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5713ab7806b371_98808721',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5713ab7806b371_98808721')) {function content_5713ab7806b371_98808721($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="resources/css/animate.css" rel="stylesheet">
<br/>

<div class="container">
    <div class="row">		
        <div id="bc1" class="btn-group btn-breadcrumb">
            <a href="inicio" title="Inicio" class="btn btn-default"><i class="icon icon-home"></i></a>            
            <a href="#" class="btn btn-default disabled"><div>Perfil Docente de Educación Básica</div></a>            
        </div>
	</div>
</div>
<br/>

<div class="container gray-bg">
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="offer offer-radius offer-warning">
					<div class="shape">
						<div class="shape-text"></div>
					</div>
					<div class="offer-content center">
						<a href="preescolar" class="stda"><h1 class="lead" style="color: #8a6d3b !important;font-size:40px;"><strong>Preescolar</strong></h1></a>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="offer offer-radius offer-success">
					<div class="shape">
						<div class="shape-text"></div>
					</div>
					<div class="offer-content center">
						<a href="primaria" class="stda"><h1 class="lead" style="color: #3c763d !important;font-size:40px;"><strong>Primaria</strong></h1></a>
					</div>
				</div>
			</div>

			<div class="clear"></div>
			
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="offer offer-radius offer-info">
					<div class="shape">
						<div class="shape-text"></div>
					</div>
					<div class="offer-content center">
						<a href="indigena" class="stda"><h1 class="lead" style="color: #31708f !important;font-size:40px;"><strong>Índigena</strong></h1></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="offer offer-radius offer-danger">
					<div class="shape">
						<div class="shape-text"></div>
					</div>
					<div class="offer-content center">
						<a href="secundaria" class="stda"><h1 class="lead" style="color: #a94442 !important;font-size:40px;"><strong>Secundaria</strong></h1></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<br/><br/>
<script src="resources/plugs/pace/pace.min.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>