<?php /* Smarty version Smarty-3.1.13, created on 2016-09-17 17:48:17
         compiled from "application_content/views/templates/load/plazas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4707282245751c9f7b71a57-96524396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39bb05dc59a9dc4a4fa76cf2a8ccb765645d6f1a' => 
    array (
      0 => 'application_content/views/templates/load/plazas.tpl',
      1 => 1474127294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4707282245751c9f7b71a57-96524396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5751c9f7dc5988_35213706',
  'variables' => 
  array (
    'perfil' => 0,
    'st_idPerfil' => 0,
    'guia' => 0,
    'esconderH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751c9f7dc5988_35213706')) {function content_5751c9f7dc5988_35213706($_smarty_tpl) {?><div class="col-lg-12 divForm">
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
								<th rowspan="1" class="text-left alert-success width3">No</th>
								<th rowspan="1" class="text-left alert-success width12">Clave Ct</th>
								<th rowspan="1" class="text-left alert-success width10">Turno</th>
								
								<th rowspan="1" class="text-left alert-success width9 esconderA">Asignatura</th>
								<th rowspan="1" class="text-left alert-success width9">Categoría</th>
								<th rowspan="1" class="text-left alert-success width6 esconderH">Horas</th>
								<th rowspan="1" class="text-left alert-success width20">Motivo</th>
								<th rowspan="1" class="text-left alert-success width12">Vigencia</th>
								<th rowspan="1" class="text-left alert-success width20">Observaciones</th>
								<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
								<th rowspan="1" class="text-left alert-success width5"> </th>
								<?php }?>
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