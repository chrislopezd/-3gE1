<?php /* Smarty version Smarty-3.1.13, created on 2016-09-26 22:46:28
         compiled from "application_content/views/templates/formulario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15968820895751c9f43536b6-67160527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d699e0ac5fa39881b084447c5504a120d868037' => 
    array (
      0 => 'application_content/views/templates/formulario.tpl',
      1 => 1474678107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15968820895751c9f43536b6-67160527',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5751c9f5a9a556_68144043',
  'variables' => 
  array (
    'edit' => 0,
    'perfil' => 0,
    'estatus' => 0,
    'esconderA' => 0,
    'esconderG' => 0,
    'esconderH' => 0,
    'esconderBCM' => 0,
    'bread' => 0,
    'token' => 0,
    'idSol' => 0,
    'idSolTxt' => 0,
    'observaciones' => 0,
    'observacionesPlan' => 0,
    'st_idPerfil' => 0,
    'GUIA' => 0,
    'g' => 0,
    'guia' => 0,
    'tmpVal' => 0,
    'DATAPLAZACAN' => 0,
    'kc' => 0,
    'p' => 0,
    'DATAPLAZACREA' => 0,
    'k' => 0,
    'pc' => 0,
    'raiz' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751c9f5a9a556_68144043')) {function content_5751c9f5a9a556_68144043($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("design/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
.btnDial{
    position: fixed;
    top: 50%;
    right: 0;
}
<?php if ($_smarty_tpl->tpl_vars['edit']->value==1&&$_smarty_tpl->tpl_vars['perfil']->value>1){?>
.table>tbody>tr>td {
	height: 20px !important;
}
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['edit']->value==1&&$_smarty_tpl->tpl_vars['perfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['estatus']->value==4)){?>
.table>tbody>tr>td {
	height: 20px !important;
}
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['esconderA']->value){?>
.esconderA{
	display: none;
}
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['esconderG']->value){?>
.esconderG{
	display: none;
}
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['esconderH']->value){?>
.esconderH{
	display: none;
}
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['esconderBCM']->value){?>
.esconderBCM{
	display: none;
}
<?php }?>
.table>thead>tr>th{
	height: 30px;
	line-height: 30px;
    text-align: center;
    padding: 0px;
}
.table>tbody>tr>td:first-child {
    padding: 8px;
    text-align: center;
}
.table>tbody>tr>td {
	padding: 8px;
}
.table .form-control{
	border-left: inherit;
    border-right: inherit;
    border-top: inherit;
}
.td{
    padding: 8px;
    line-height: 1.428571429;
    vertical-align: top;
}
</style>
<button type="button" id="btnMsg" class="btn btn-raised btn-default-bright hide" data-toggle="modal" data-target="#modalDialog"></button>
<section id="right-content-wrapper">
	<section class="page-content animated fadeInUp">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li><a href="inicio" data-toggle="tooltip" data-placement="right" title="Inicio"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href="#" class="disabled"><?php echo $_smarty_tpl->tpl_vars['bread']->value;?>
</a></li>
				</ol>
			</div>
		</div>
		<form name="mForm" id="mForm" class="form" method="post">
		<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['token']->value['token_name'];?>
" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value['token'];?>
">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="right" style="float: right;margin-top: -30px;margin-right: -24px;">
							<button type="button" name="btnQuery" id="btnQuery" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalDialogBali"><i class="fa fa-search"></i> Buscar información CCT</button>
						</div>
						<div class="form-group floating-label col-md-6">
							<input type="hidden" name="idSol" id="idSol"  class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idSol']->value;?>
" readonly />
							<label for="txtOficio">Folio:</label><br/>
							<?php echo $_smarty_tpl->tpl_vars['idSolTxt']->value;?>

						</div>
						<?php if ($_smarty_tpl->tpl_vars['edit']->value==1){?>
						<div class="form-group floating-label col-md-6">
							<label for="txtOficio">Estatus:</label><br/>
							<?php if ($_smarty_tpl->tpl_vars['estatus']->value==1){?>
							<span class="label label-info">Iniciado</span>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2){?>
							<span class="label label-success">Enviado</span>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['estatus']->value==3){?>
							<span class="label label-primary">Justifica</span>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['estatus']->value==4){?>
							<span class="label label-warning">No Justifica</span>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['estatus']->value==5){?>
							<span class="label label-danger">Canceldo</span>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['estatus']->value==6){?>
							<span class="label label-danger">No Procede</span>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['estatus']->value==7){?>
							<span class="label label-default">Finalizado</span>
							<?php }?>
						</div>
						<?php }?>
						<div class="form-group floating-label col-md-12">
							<textarea name="txtObservaciones" id="txtObservaciones" class="form-control" rows="2"><?php echo $_smarty_tpl->tpl_vars['observaciones']->value;?>
</textarea>
							<label for="txtObservaciones">Observaciones:</label>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['estatus']->value==3||$_smarty_tpl->tpl_vars['estatus']->value==4||$_smarty_tpl->tpl_vars['estatus']->value==6||$_smarty_tpl->tpl_vars['estatus']->value==7){?>
						<div class="form-group floating-label col-md-12">
							
							<label for="txtObservaciones">Observaciones Planeación:</label><br/>
							<?php echo $_smarty_tpl->tpl_vars['observacionesPlan']->value;?>

						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<header>
			<?php if (($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==1)||($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['edit']->value==0)||($_smarty_tpl->tpl_vars['st_idPerfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4||$_smarty_tpl->tpl_vars['edit']->value==0))||($_smarty_tpl->tpl_vars['st_idPerfil']->value==2&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4||$_smarty_tpl->tpl_vars['edit']->value==0))){?>
			<div class="col-sm-12">
				<a href="javascript:void(0)" id="btnNuevaPlaza" class="btn btn-floating-action btn-primary btn-sm btnFixed" data-toggle="tooltip" data-placement="right" title="Agregar plaza">
					<i class="material-icons">add</i>
				</a>
			</div>
			<?php }?>
		</header>
		<div class="row" id="PLAZASDIV">
			<?php if (count($_smarty_tpl->tpl_vars['GUIA']->value)>0&&$_smarty_tpl->tpl_vars['edit']->value==1){?>
				<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_smarty_tpl->tpl_vars['_kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['GUIA']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['_kk']->value = $_smarty_tpl->tpl_vars['g']->key;
?>
					<?php if (isset($_smarty_tpl->tpl_vars["guia"])) {$_smarty_tpl->tpl_vars["guia"] = clone $_smarty_tpl->tpl_vars["guia"];
$_smarty_tpl->tpl_vars["guia"]->value = $_smarty_tpl->tpl_vars['g']->value['guia']; $_smarty_tpl->tpl_vars["guia"]->nocache = null; $_smarty_tpl->tpl_vars["guia"]->scope = 0;
} else $_smarty_tpl->tpl_vars["guia"] = new Smarty_variable($_smarty_tpl->tpl_vars['g']->value['guia'], null, 0);?>
					<div class="col-lg-12 divForm">
						<div class="panel panel-default">
							<div class="panel-heading" style="padding: 1px !important;margin-right: 20px;">
								<header>
									<span class="badge badge-success badgeHeader"></span>
									<div style="text-align: center;margin-top: -28px;width: 100%;position: absolute;font-weight: bold;">Cancelación</div>
								</header>
								<div class="btn-group divDel<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
">
									<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['tmpVal']->value[$_smarty_tpl->tpl_vars['guia']->value]==0){?>
									<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-danger btnRemove" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Eliminar">
										<i class="material-icons">remove</i>
									</a>
									<?php }?>
								</div>
							</div>
							<div class="panel-body">
								<div class="panel-table-inner-offset">
									<?php if (($_smarty_tpl->tpl_vars['perfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4))||($_smarty_tpl->tpl_vars['st_idPerfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4))){?>
									<div class=" text-center">
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
											<i class="material-icons">add</i>
										</a>
										<?php if ($_smarty_tpl->tpl_vars['estatus']->value==1){?>
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
											<i class="fa fa-clone"></i>
										</a>
										<?php }?>
									</div>
									<?php }?>
									<div class="table-responsive">
										<input type="hidden" name="guia[]" class="form-control f8 upper" value="<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
" autocomplete="off">
										<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1){?>
										<div class="panel panel-primary myPanel">
											<div class="panel-heading" style="min-height: 30px;line-height: 30px;padding: 0px">
												<h3 class="panel-title">&nbsp;&nbsp;&nbsp;</h3>
												<div class="pull-right" style="font-size: 15px;">
													<span class="clickable filter" data-toggle="tooltip" title="Filtrar Datos" data-container="body" style="margin-left:5px;cursor: pointer;">
														Filtro <i class="fa fa-filter"></i>
													</span>
												</div>
											</div>
											<div class="panel-body divPanel" style="display: none;">
												<input type="text" class="form-control tableInput" name="tableCancelaciones-filter[]" data-action="filter" data-filters=".tableCancelaciones" placeholder="Filtrar" />
											</div>
										<?php }?>
										<table class="table table-bordered tableCancelaciones" style="width:100%;">
											<thead>
												<tr>
													<th class="text-left alert-success width3">No</th>
													<th class="text-left alert-success width10">Clave Ct</th>
													<th class="text-left alert-success width10">Turno</th>
													<th class="text-left alert-success width15">Titular</th>
													<th class="text-left alert-success width7">Pago</th>
													<th class="text-left alert-success width7">Unidad</th>
													<th class="text-left alert-success width7">Sub-unidad</th>
													<th class="text-left alert-success width9">Categoria</th>
													<th class="text-left alert-success width7">horas</th>
													<th class="text-left alert-success width9">plaza</th>
													<th class="text-left alert-success width15">Motivo</th>
													<th class="text-left alert-success width12">Vigencia</th>
													<th class="text-left alert-success width20">Observaciones</th>
													<?php if ($_smarty_tpl->tpl_vars['idSol']->value>=45){?>
													<th class="text-left alert-success width20">Observaciones Plan</th>
													<?php }?>
													<?php if (($_smarty_tpl->tpl_vars['perfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4))||$_smarty_tpl->tpl_vars['perfil']->value>1){?>
													<th rowspan="2" class="text-left alert-success width5"> </th>
													<?php }?>
												</tr>
											</thead>
											<tbody class="tbodyFirstAppend">
												<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_smarty_tpl->tpl_vars['kc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['DATAPLAZACAN']->value[$_smarty_tpl->tpl_vars['guia']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['kc']->value = $_smarty_tpl->tpl_vars['p']->key;
?>
												<tr class="text-left">
													<td><?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
</td>
													<td class="td">
													<input type="hidden" name="txtIdSolCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['idSolCan'];?>
" autocomplete="off">
													<input type="hidden" name="txtEstatusCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['estatusCan'];?>
" autocomplete="off">
													<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtClaveCTCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtClaveCTCan" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['claveCCTCan'];?>
" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['claveCCTCan'];?>

													<?php }?>
													</td>
													<td class="td turnoCmb">
														<select name="txtTurnoCCTCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" style="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>display:none;<?php }?>">
															<option value="NA" class="form-control option">-Seleccione-</option>
															<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==1){?>
															<option value="1" class="form-control option" selected>Matutino</option>
															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==2){?>
															<option value="2" class="form-control option" selected>Vespertino</option>
															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==3){?>
															<option value="3" class="form-control option" selected>Nocturno</option>
															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==4){?>
															<option value="4" class="form-control option" selected>Discontinuo</option>
															<?php }?>
														</select>
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==1){?>
														Matutino
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==2){?>
														Vespertino
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==3){?>
														Nocturno
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['p']->value['turnoCCTCan']==4){?>
														Discontinuo
														<?php }?>
													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtTitularCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['titularCan'];?>
" maxlength="160" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['titularCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtPagoCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['paCan'];?>
" maxlength="2" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['paCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtUnidadCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['unCan'];?>
" maxlength="2" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['unCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtSubUniCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['subCan'];?>
" maxlength="2" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['subCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtCateCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtCateCan" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['categoriaCan'];?>
" maxlength="7" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['categoriaCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtHorasCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['horasCan'];?>
" maxlength="2" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['horasCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtPlazaCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8  myNum" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['plazaCan'];?>
" maxlength="6" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['plazaCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<textarea name="txtMotivoCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" style="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>display:none;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['p']->value['motivoCan'];?>
</textarea>
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['motivoCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtVigenciaCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['vigenciaCan'];?>
" maxlength="10" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['vigenciaCan'];?>

													<?php }?>
													</td>
													<td class="td">
														<textarea name="txtObservacionesCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" style="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>display:none;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['p']->value['observacionesCan'];?>
</textarea>
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['p']->value['observacionesCan'];?>

													<?php }?>
													</td>
													<?php if ($_smarty_tpl->tpl_vars['idSol']->value>=45){?>
													<td class="td">
														<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['estatus']->value==2){?>
														<textarea name="txtObservacionesPlanCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper"><?php echo $_smarty_tpl->tpl_vars['p']->value['observacionesPlanCan'];?>
</textarea>
														<?php }else{ ?>
														<?php echo $_smarty_tpl->tpl_vars['p']->value['observacionesPlanCan'];?>

														<?php }?>
													</td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==1){?>
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==4&&$_smarty_tpl->tpl_vars['p']->value['estatusCan']==1){?>
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==4&&$_smarty_tpl->tpl_vars['p']->value['estatusCan']==3){?>
													<td>
														<button type="button" name="success[]" class="btn btn-success" style="min-width:20px;cursor:default;">
															<i class="fa fa-check-square-o" title="Validado"></i>
														</button>
													</td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['estatus']->value>1){?>
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==4&&$_smarty_tpl->tpl_vars['p']->value['estatusCan']==1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													<?php }else{ ?>
													<td>
														<div class="list-icon">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==3||$_smarty_tpl->tpl_vars['estatus']->value==4||$_smarty_tpl->tpl_vars['estatus']->value==6||$_smarty_tpl->tpl_vars['estatus']->value==7){?>
															<ul class="list">
																<?php if ($_smarty_tpl->tpl_vars['p']->value['estatusCan']==3||$_smarty_tpl->tpl_vars['p']->value['estatusCan']==7){?>
																<li><i class="fa fa-check-square" aria-hidden="true" style="color:#009688;font-size:11pt;"></i></li>
																<?php }else{ ?>
																<li><i class="fa fa-ban" aria-hidden="true" style="color:#F22314;font-size:11pt;"></i></li>
																<?php }?>
  															</ul>
  														<?php }else{ ?>
															<input class="checkbox checkbox-primary myCheck" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['p']->value['estatusCan']==3){?>checked<?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['p']->value['idSolCan'];?>
" data-tipo="can" data-g="<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['estatusCan'];?>
" />
														<?php }?>
														</div>
													</td>
													<?php }?>
													<?php }elseif($_smarty_tpl->tpl_vars['perfil']->value>1){?>
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													<?php }?>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1){?>
										</div>
										<?php }?>
									</div>
									<div style="text-align: center;width: 100%;font-weight: bold;font-size: 20px;margin-top: 20px;margin-bottom: 15px;">Creación / Conversión</div>
									<?php if (($_smarty_tpl->tpl_vars['perfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4))||($_smarty_tpl->tpl_vars['st_idPerfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4))){?>
									<div class=" text-center">
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
										<i class="material-icons">add</i>
										</a>
										<?php if ($_smarty_tpl->tpl_vars['estatus']->value==1){?>
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
											<i class="fa fa-clone"></i>
										</a>
										<?php }?>
									</div>
									<?php }else{ ?>
									<hr/>
									<?php }?>
									<div class="table-responsive">
										<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1){?>
										<div class="panel panel-primary myPanel">
											<div class="panel-heading" style="min-height: 30px;line-height: 30px;padding: 0px">
												<h3 class="panel-title">&nbsp;&nbsp;&nbsp;</h3>
												<div class="pull-right" style="font-size: 15px;">
													<span class="clickable filter" data-toggle="tooltip" title="Filtrar Datos" data-container="body" style="margin-left:5px;cursor: pointer;">
														Filtro <i class="fa fa-filter"></i>
													</span>
												</div>
											</div>
											<div class="panel-body divPanel" style="display: none;">
												<input type="text" class="form-control tableInput" name="tableCreaciones-filter[]" data-action="filter" data-filters=".tableCreaciones" placeholder="Filtrar" />
											</div>
										<?php }?>
										<table class="table table-bordered tableCreaciones" style="width:100%;">
											<thead>
												<tr>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width3">No</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width12">Clave Ct</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width10">Turno</th>
													<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>
													<th colspan="<?php if ($_smarty_tpl->tpl_vars['esconderBCM']->value){?>3<?php }else{ ?>6<?php }?>" class="text-left alert-success">Grupos base</th>
													<th colspan="<?php if ($_smarty_tpl->tpl_vars['esconderBCM']->value){?>3<?php }else{ ?>6<?php }?>" class="text-left alert-success">Grupos contrato</th>
													<th colspan="<?php if ($_smarty_tpl->tpl_vars['esconderBCM']->value){?>3<?php }else{ ?>6<?php }?>" class="text-left alert-success">Matrícula</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width7 esconderG">Grupo</th>
													<?php }?>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width9 esconderA">Asignatura</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width9">Categoría</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width6 esconderH">Horas</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width20">Motivo</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width12">Vigencia</th>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width20">Observaciones</th>
													<?php if ($_smarty_tpl->tpl_vars['idSol']->value>=45){?>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width20">Observaciones Plan</th>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4)||$_smarty_tpl->tpl_vars['perfil']->value>1){?>
													<th rowspan="<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>2<?php }else{ ?>1<?php }?>" class="text-left alert-success width5"> </th>
													<?php }?>
												</tr>
												<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>
												<tr>
													<th class="text-left alert-success width6" style="padding: 0px;">1°</th>
													<th class="text-left alert-success width6">2°</th>
													<th class="text-left alert-success width6">3°</th>
													<th class="text-left alert-success width6 esconderBCM">4°</th>
													<th class="text-left alert-success width6 esconderBCM">5°</th>
													<th class="text-left alert-success width6 esconderBCM">6°</th>
													<th class="text-left alert-success width6">1°</th>
													<th class="text-left alert-success width6">2°</th>
													<th class="text-left alert-success width6">3°</th>
													<th class="text-left alert-success width6 esconderBCM">4°</th>
													<th class="text-left alert-success width6 esconderBCM">5°</th>
													<th class="text-left alert-success width6 esconderBCM">6°</th>
													<th class="text-left alert-success width6">1°</th>
													<th class="text-left alert-success width6">2°</th>
													<th class="text-left alert-success width6">3°</th>
													<th class="text-left alert-success width6 esconderBCM">4°</th>
													<th class="text-left alert-success width6 esconderBCM">5°</th>
													<th class="text-left alert-success width6 esconderBCM">6°</th>
												</tr>
												<?php }?>
											</thead>
											<tbody  class="tbodyAppend">
												<?php  $_smarty_tpl->tpl_vars['pc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pc']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['DATAPLAZACREA']->value[$_smarty_tpl->tpl_vars['guia']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pc']->key => $_smarty_tpl->tpl_vars['pc']->value){
$_smarty_tpl->tpl_vars['pc']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['pc']->key;
?>
												<tr class="text-left">
													<td class="td"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
													<td class="td">
													<input type="hidden" name="txtIdSolCrea[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['idSolCrea'];?>
" autocomplete="off">
													<input type="hidden" name="txtEstatusCrea[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['estatusCrea'];?>
" autocomplete="off">
													<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtClaveCT[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtClaveCT" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['claveCCTCrea'];?>
" autocomplete="off">
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
													<?php echo $_smarty_tpl->tpl_vars['pc']->value['claveCCTCrea'];?>

													<?php }?>
													</td>
													<td class="td turnoCmb">
														<select name="txtTurnoCCT[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" style="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>display:none;<?php }?>">
															<option value="NA" class="form-control option">-Seleccione-</option>
															<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==1){?>
															<option value="1" class="form-control option" selected>Matutino</option>
															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==2){?>
															<option value="2" class="form-control option" selected>Vespertino</option>
															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==3){?>
															<option value="3" class="form-control option" selected>Nocturno</option>
															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==4){?>
															<option value="4" class="form-control option" selected>Discontinuo</option>
															<?php }?>
														</select>
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==1){?>
														Matutino
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==2){?>
														Vespertino
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==3){?>
														Nocturno
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['pc']->value['turnoCCTCrea']==4){?>
														Discontinuo
														<?php }?>
													<?php }?>
													</td>
													<?php if ($_smarty_tpl->tpl_vars['idSol']->value<45){?>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGB1[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal1Base'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal1Base'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGB2[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal2Base'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal2Base'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGB3[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal3Base'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal3Base'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGB4[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal4Base'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal4Base'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGB5[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal5Base'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal4Base'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGB6[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal6Base'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal6Base'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGC1[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal1Contrato'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal1Contrato'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGC2[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal2Contrato'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal2Contrato'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGC3[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal3Contrato'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal3Contrato'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGC4[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal4Contrato'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal4Contrato'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGC5[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal5Contrato'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal5Contrato'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGC6[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal6Contrato'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoTotal6Contrato'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtMat1[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal1'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal1'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtMat2[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal2'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal2'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtMat3[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal3'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal3'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtMat4[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal4'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal4'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtMat5[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal5'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal5'];?>

														<?php }?>
													</td>
													<td class="td esconderBCM">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtMat6[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal6'];?>
" maxlength="3" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['alumTotal6'];?>

														<?php }?>
													</td>
													<td class="td esconderG">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtGrupo[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoCrea'];?>
" maxlength="25" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['grupoCrea'];?>

														<?php }?>
													</td>
													<?php }?>
													<td class="td esconderA">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtAsignatura[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['asignaturaCrea'];?>
" maxlength="30" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['asignaturaCrea'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtPlaza[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtPlaza" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['plazaCrea'];?>
" maxlength="6" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['plazaCrea'];?>

														<?php }?>
													</td>
													<td class="td esconderH">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['esconderH']->value||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtHoras[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['horasCrea'];?>
" maxlength="2" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['horasCrea'];?>

														<?php }?>
													</td>
													<td class="td">
														<textarea name="txtMotivo[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" style="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>display:none;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['pc']->value['motivoCrea'];?>
</textarea>
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['motivoCrea'];?>

														<?php }?>
													</td>
													<td class="td">
														<input type="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>hidden<?php }else{ ?>text<?php }?>" name="txtVigencia[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['vigenciaCrea'];?>
" maxlength="10" autocomplete="off">
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['vigenciaCrea'];?>

														<?php }?>
													</td>
													<td class="td">
														<textarea name="txtObservacionesCrea[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" style="<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>display:none;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['pc']->value['observacionesCrea'];?>
</textarea>
														<?php if ($_smarty_tpl->tpl_vars['estatus']->value==2||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['observacionesCrea'];?>

														<?php }?>
													</td>
													<?php if ($_smarty_tpl->tpl_vars['idSol']->value>=45){?>
													<td class="td">
														<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['estatus']->value==2){?>
														<textarea name="txtObservacionesPlanCrea[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper"><?php echo $_smarty_tpl->tpl_vars['pc']->value['observacionesPlanCrea'];?>
</textarea>
														<?php }else{ ?>
														<?php echo $_smarty_tpl->tpl_vars['pc']->value['observacionesPlanCrea'];?>

														<?php }?>
													</td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==1){?>
													<td class="td"><button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px"><i
													 class="fa fa-times" title="Eliminar fila"></i></button></td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==4&&$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==1){?>
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['estatus']->value==4&&$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3){?>
													<td>
														<button type="button" name="success[]" class="btn btn-success" style="min-width:20px;cursor:default;">
															<i class="fa fa-check-square-o" title="Validado"></i>
														</button>
													</td>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['estatus']->value>1){?>
													<?php if ($_smarty_tpl->tpl_vars['estatus']->value==4&&$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													<?php }else{ ?>
													<td><div class="list-icon">
															<?php if ($_smarty_tpl->tpl_vars['estatus']->value==3||$_smarty_tpl->tpl_vars['estatus']->value==4||$_smarty_tpl->tpl_vars['estatus']->value==6||$_smarty_tpl->tpl_vars['estatus']->value==7){?>
															<ul class="list">
																<?php if ($_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3||$_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==7){?>
																<li><i class="fa fa-check-square" aria-hidden="true" style="color:#009688;font-size:11pt;"></i></li>
																<?php }else{ ?>
																<li><i class="fa fa-ban" aria-hidden="true" style="color:#F22314;font-size:11pt;"></i></li>
																<?php }?>
  															</ul>
  															<?php }else{ ?>
															<input class="checkbox checkbox-primary myCheck" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['pc']->value['estatusCrea']==3){?>checked<?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['pc']->value['idSolCrea'];?>
" data-tipo="crea" data-g="<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value['estatusCrea'];?>
" />
															<?php }?>
														</div>
													</td>
													<?php }?>
													<?php }elseif($_smarty_tpl->tpl_vars['perfil']->value>1){?>
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													<?php }?>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1){?>
										</div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php }?>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<?php if (($_smarty_tpl->tpl_vars['perfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4))||($_smarty_tpl->tpl_vars['perfil']->value==1&&$_smarty_tpl->tpl_vars['edit']->value==0)||($_smarty_tpl->tpl_vars['st_idPerfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4||$_smarty_tpl->tpl_vars['edit']->value==0))||($_smarty_tpl->tpl_vars['st_idPerfil']->value==2&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4||$_smarty_tpl->tpl_vars['edit']->value==0))){?>
				<button type="button" class="btn btn-lg btn-primary materialRipple-light materialRipple-btn btn-block" id="btnGuardar">
					<i class="fa fa-floppy-o"></i> Guardar
				</button>
				<?php }else{ ?>
				<a href="inicio" class="btn btn-info btn-block"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>
				<?php }?>
			</div>
		</div>
		</form>
		<?php if ($_smarty_tpl->tpl_vars['perfil']->value>1&&$_smarty_tpl->tpl_vars['estatus']->value==2){?>
		<div id="speed-dial" class="md-fab-speed-dial btnDial" data-toggle="speed-dial" data-mode="scale">
			<div class="md-fab-trigger" aria-expanded="false" aria-haspopup="true">
				<button type="button" class="btn btn-floating-action btn-default"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></button>
			</div>
			<ul class="md-fab-actions" aria-hidden="true">
				<li><a href="#" class="listaAccionJ btn btn-default-bright btn-floating-action btn-primary btn-sm" title="Justifica" data-estatus="3" data-folio="<?php echo $_smarty_tpl->tpl_vars['idSolTxt']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['idSol']->value;?>
" data-toggle="modal" data-target="#modalDialogAction">
				<i class="fa fa-check-square-o" aria-hidden="true"></i></a></li>
				<li><a href="#" class="listaAccionJ btn btn-default-bright btn-floating-action btn-warning btn-sm" title="No justifica" data-estatus="4" data-folio="<?php echo $_smarty_tpl->tpl_vars['idSolTxt']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['idSol']->value;?>
" data-toggle="modal" data-target="#modalDialogAction">
				<i class="fa fa-times" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['edit']->value==1&&$_smarty_tpl->tpl_vars['perfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4)||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1&&($_smarty_tpl->tpl_vars['estatus']->value==1||$_smarty_tpl->tpl_vars['estatus']->value==4)){?>
		<div id="speed-dial" class="md-fab-speed-dial btnDial" data-toggle="speed-dial" data-mode="scale">
			<div class="md-fab-trigger" aria-expanded="false" aria-haspopup="true">
				<button type="button" class="btn btn-floating-action btn-default"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></button>
			</div>
			<ul class="md-fab-actions" aria-hidden="true">
				<li><a href="#" class="listaAccionJ btn btn-default-bright btn-floating-action btn-sm" title="Enviar solicitud" data-estatus="2" data-folio="<?php echo $_smarty_tpl->tpl_vars['idSolTxt']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['idSol']->value;?>
" data-toggle="modal" data-target="#modalDialogAction" >
				<i class="fa fa-paper-plane" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<?php }?>
		<div id="modalDialog" class="modal fade" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="titleModal"></h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning alert-callout" role="alert">
							<strong id="msgModal"></strong>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-flat btn-ripple" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<div id="modalDialogAction" class="modal fade" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="alert alert-callout" role="alert">
							<strong id="titleModal"></strong>
						</div>
					</div>
					<div class="modal-body">
						<div id="error"></div>
						<form name="mform" id="mform" method="post" action="cambiarEstadoSol">
						<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['token']->value['token_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value['token'];?>
">
						<input type="hidden" name="ids" id="ids">
						<input type="hidden" name="estatus" id="estatus">
						<label for="txtComentarios">Observaciones:</label>
						<textarea class="form-control" name="txtComentarios" id="txtComentarios"></textarea>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-flat btn-ripple" id="btnAceptar">Aceptar</button>
						<button type="button" class="btn btn-primary btn-flat btn-ripple" id="btnCancelar" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>


<div id="modalDialogBali" class="modal fade" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-body">
				<div class="panel panel-default">
					<div class="panel-heading">
						<header>
							<div class="row" style="margin-bottom: -35px;">
					            <div class="col-xs-6 col-sm-4 form-group">
					            	<p id="txtFilterClaveCCT"></p>
					            </div>
					            <div class="col-xs-6 col-sm-5 form-group">
					            	<p id="txtFilterNombreCCT"></p>
						        </div>
					            <div class="col-xs-6 col-sm-3 form-group">
						        	<p id="txtFilterTurnoCCT"></p>
						        </div>
					        </div>
						</header>
					</div>
					<div class="panel-body mb20" id="AJAXLOADBALI"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-flat btn-ripple" data-dismiss="modal">Salir</button>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("design/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/js/jquery.blockUI.js"></script>
<script type="text/javascript">
    $.blockUI({ message: '<div class="alert alert-success"><h5> Cargando, por favor espere un momento...</h5></div><div><img src="resources/images/loadAjax.gif" /><br/><br/></div>',});
</script>

<script type="text/javascript">
var _edit = '<?php echo $_smarty_tpl->tpl_vars['edit']->value;?>
';
var _url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
var _raiz = '<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
';
var _perFil = '<?php echo $_smarty_tpl->tpl_vars['st_idPerfil']->value;?>
';
</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['raiz']->value;?>
resources/js/web/formulario.js"></script>
<?php }} ?>