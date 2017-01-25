<?php /* Smarty version Smarty-3.1.13, created on 2016-06-28 11:34:39
         compiled from "application_content\views\templates\load\plazas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169335743338f444cd3-94933239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccdf663058a352507617d1ec356f58c5bbfe7928' => 
    array (
      0 => 'application_content\\views\\templates\\load\\plazas.tpl',
      1 => 1467131675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169335743338f444cd3-94933239',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5743338f487697_26185560',
  'variables' => 
  array (
    'perfil' => 0,
    'st_idPerfil' => 0,
    'guia' => 0,
    'esconderBCM' => 0,
    'esconderH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5743338f487697_26185560')) {function content_5743338f487697_26185560($_smarty_tpl) {?><div class="col-lg-12 divForm">
	<div class="panel panel-default">
		<div class="panel-heading" style="padding: 1px !important;margin-right: 20px;">
			<header>
				<span class="badge badge-success badgeHeader"></span> 
				<div style="text-align: center;margin-top: -28px;width: 100%;position: absolute;font-weight: bold;">Cancelación</div>
			</header>
			<div class="btn-group">
				<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-danger btnRemove" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Eliminar">
					<i class="material-icons">remove</i>
				</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="panel-table-inner-offset">
				<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
				<div class=" text-center">
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
						<i class="material-icons">add</i>
					</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
						<i class="fa fa-clone"></i>
					</a>
				</div>
				<?php }?>
				<div class="table-responsive">
					<input type="hidden" name="guia[]" class="form-control f8 upper" value="<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
" autocomplete="off">
					<table class="table table-bordered" style="width:100%;">
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
								<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
								<th rowspan="2" class="text-left alert-success width5"> </th>
								<?php }?>
							</tr>
						</thead>
						<tbody class="tbodyFirstAppend">
							<tr class="text-left">
								<td class="td">1</td>
								<td class="td">
								<input type="hidden" name="txtIdSolCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="0" autocomplete="off">
								<input type="text" name="txtClaveCTCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtClaveCTCan" value="" autocomplete="off"></td>
								<td class="td turnoCmb"><input type="text" name="txtTurnoDrop[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" placeholder="Elija una clave Ct" class="form-control f8" disabled=""></td>
								<td class="td"><input type="text" name="txtTitularCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" value="" maxlength="160" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtPagoCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtUnidadCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtSubUniCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtCateCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtCateCan" value="" maxlength="7" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtHorasCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtPlazaCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="6" autocomplete="off"></td>
								<td class="td"><textarea name="txtMotivoCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper"></textarea></td>
								<td class="td"><input type="text" name="txtVigenciaCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="" maxlength="10" autocomplete="off"></td>
								<td class="td"><textarea name="txtObservacionesCan[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper"></textarea></td>
								<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
								<td class="td"><button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px"><i class="fa fa-times" title="Eliminar fila"></i></button></td>
								<?php }?>
							</tr>
						</tbody>
					</table>
				</div>
				<div style="text-align: center;width: 100%;font-weight: bold;font-size: 20px;margin-top: 20px;margin-bottom: 15px;">Creación / Conversión</div>
				<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
				<div class=" text-center">
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
					<i class="material-icons">add</i>
					</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
						<i class="fa fa-clone"></i>
					</a>
				</div>
				<?php }?>
				<div class="table-responsive">
					<table class="table table-bordered" style="width:100%;">
						<thead>
							<tr>
								<th rowspan="2" class="text-left alert-success width3">No</th>
								<th rowspan="2" class="text-left alert-success width12">Clave Ct</th>
								<th rowspan="2" class="text-left alert-success width10">Turno</th>
								<th colspan="<?php if ($_smarty_tpl->tpl_vars['esconderBCM']->value){?>3<?php }else{ ?>6<?php }?>" class="text-left alert-success">Grupos base</th>
								<th colspan="<?php if ($_smarty_tpl->tpl_vars['esconderBCM']->value){?>3<?php }else{ ?>6<?php }?>" class="text-left alert-success">Grupos contrato</th>
								<th colspan="<?php if ($_smarty_tpl->tpl_vars['esconderBCM']->value){?>3<?php }else{ ?>6<?php }?>" class="text-left alert-success">Matrícula</th>
								<th rowspan="2" class="text-left alert-success width7 esconderG">Grupo</th>
								<th rowspan="2" class="text-left alert-success width9 esconderA">Asignatura</th>
								<th rowspan="2" class="text-left alert-success width9">Categoría</th>
								<th rowspan="2" class="text-left alert-success width6 esconderH">Horas</th>
								<th rowspan="2" class="text-left alert-success width20">Motivo</th>
								<th rowspan="2" class="text-left alert-success width12">Vigencia</th>
								<th rowspan="2" class="text-left alert-success width20">Observaciones</th>
								<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
								<th rowspan="2" class="text-left alert-success width5"> </th>
								<?php }?>
							</tr>
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
						</thead>
						<tbody  class="tbodyAppend">
							<tr class="text-left">
								<td class="td">1</td>
								<td class="td">
								<input type="hidden" name="txtIdSolCrea[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="0" autocomplete="off">
								<input type="text" name="txtClaveCT[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtClaveCT" value="" autocomplete="off"></td>
								<td class="td turnoCmb"><input type="text" name="txtTurnoDropCrea[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" placeholder="Elija una clave Ct" class="form-control f8" disabled=""></td>
								<td class="td"><input type="text" name="txtGB1[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGB2[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGB3[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderBCM"><input type="text" name="txtGB4[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGB5[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGB6[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td"><input type="text" name="txtGC1[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGC2[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGC3[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderBCM"><input type="text" name="txtGC4[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGC5[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGC6[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td"><input type="text" name="txtMat1[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtMat2[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtMat3[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderBCM"><input type="text" name="txtMat4[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtMat5[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtMat6[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderG"><input type="text" name="txtGrupo[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8" value="" maxlength="25" autocomplete="off"></td>
								<td class="td esconderA"><input type="text" name="txtAsignatura[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper" value="" maxlength="30" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtPlaza[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper txtPlaza" value="" maxlength="6" autocomplete="off"></td>
								<td class="td esconderH"><input type="<?php if ($_smarty_tpl->tpl_vars['esconderH']->value){?>hidden<?php }else{ ?>text<?php }?>" name="txtHoras[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><textarea name="txtMotivo[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper"></textarea></td>
								<td class="td"><input type="text" name="txtVigencia[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="" maxlength="10" autocomplete="off"></td>
								<td class="td"><textarea name="txtObservacionesCrea[<?php echo $_smarty_tpl->tpl_vars['guia']->value;?>
][]" class="form-control f8 upper"></textarea></td>
								<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
								<td class="td"><button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px"><i class="fa fa-times" title="Eliminar fila"></i></button></td>
								<?php }?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>