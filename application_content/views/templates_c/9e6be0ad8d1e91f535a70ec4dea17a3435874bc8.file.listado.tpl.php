<?php /* Smarty version Smarty-3.1.13, created on 2016-08-23 10:25:16
         compiled from "application_content\views\templates\load\listado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11285741dd5a1a0d47-16734099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e6be0ad8d1e91f535a70ec4dea17a3435874bc8' => 
    array (
      0 => 'application_content\\views\\templates\\load\\listado.tpl',
      1 => 1467308321,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11285741dd5a1a0d47-16734099',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5741dd5a2167c3_25018753',
  'variables' => 
  array (
    'LISTADO' => 0,
    'st_idPerfil' => 0,
    'res' => 0,
    'perfil' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741dd5a2167c3_25018753')) {function content_5741dd5a2167c3_25018753($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['LISTADO']->value)){?>
<div class="panel-table-inner-offset">
	<div class="table-responsive">
		<table id="mTable" class="table table-striped table-hover dt-responsive tdisplay no-margin" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-left searchInput">Folio</th>
					
					<th class="text-left searchInput">Nivel</th>
					<?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
					<th class="text-left searchInput">SubNivel</th>
					<?php }?>
					<th class="text-left searchInput">Captura</th>
					<th class="text-left searchInput">Fecha</th>
					<th class="text-left searchInput">Estatus</th>
					<th class="text-left">Acciones</th>
				</tr>
			</thead>
			<tfoot>
		        <tr>
		          <th class="text-left searchInput">Folio</th>
					
					<th class="text-left searchInput">Nivel</th>
					<?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
					<th class="text-left searchInput">SubNivel</th>
					<?php }?>
					<th class="text-left searchInput">Captura</th>
					<th class="text-left searchInput">Fecha</th>
					<th class="text-left searchInput">Estatus</th>
					<th class="text-left">Acciones</th>

		        </tr>
		    </tfoot>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTADO']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?>
				<tr class="text-left">
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
</td>
					
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['nivel'];?>
</td>
					<?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['subnivel'];?>
</td>
					<?php }?>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['nombre'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['fechaCaptura'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['estadoSol'];?>
</td>
					<td>
					<?php if ($_smarty_tpl->tpl_vars['res']->value['estatus']==1||$_smarty_tpl->tpl_vars['res']->value['estatus']==2||$_smarty_tpl->tpl_vars['res']->value['estatus']==3||$_smarty_tpl->tpl_vars['res']->value['estatus']==4){?>
					<div class="btn-group">
						<button type="button" class="btn btn-raised btn-default-bright btn-xs dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-cog" aria-hidden="true"></i>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right text-left" role="menu">
							<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1){?>
								<?php if (($_smarty_tpl->tpl_vars['res']->value['estatus']==2||$_smarty_tpl->tpl_vars['res']->value['estatus']==3||$_smarty_tpl->tpl_vars['res']->value['estatus']==4)){?>
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								<?php }?>								
								<?php if (($_smarty_tpl->tpl_vars['res']->value['estatus']==4)){?>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-estatus="2" data-folio="<?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar solicitud
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-id="<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
" data-estatus="5" data-folio="<?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-ban" aria-hidden="true"></i> Cancelar
									</a>
								</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['res']->value['estatus']==1){?>
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
')">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-estatus="2" data-folio="<?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar solicitud
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-id="<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
" data-estatus="5" data-folio="<?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-ban" aria-hidden="true"></i> Cancelar
									</a>
								</li>
								<?php }?>
							<?php }else{ ?>
								<?php if ($_smarty_tpl->tpl_vars['res']->value['estatus']==2||$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['res']->value['estatus']==1&&$_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-estatus="2" data-folio="<?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar solicitud
									</a>
								</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['res']->value['estatus']==2){?>
								<li>
									<a href="#" class="listaAccionJ cambiar btn-primary" data-estatus="3" data-folio="<?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
" data-toggle="modal" data-target="#modalDialog" style="color:#FFF;">
										<i class="fa fa-check-square-o" aria-hidden="true" style="color:#FFF;"></i> Justifica
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar btn-warning" data-estatus="4" data-folio="<?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
" data-toggle="modal" data-target="#modalDialog" style="color:#FFF;">
										<i class="fa fa-times" aria-hidden="true" style="color:#FFF;"></i> No Justifica
									</a>
								</li>
								<?php }elseif($_smarty_tpl->tpl_vars['res']->value['estatus']==4&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								<?php }elseif($_smarty_tpl->tpl_vars['res']->value['estatus']==3&&$_smarty_tpl->tpl_vars['st_idPerfil']->value>1){?>
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								<?php }?>
							<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==27||$_smarty_tpl->tpl_vars['st_idPerfil']->value==26){?>
								<li>
									<a href="javascript:void(0);" class="listaAccion cambiar" onclick="descargarPDF('<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
')">
										<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF
									</a>
								</li>
								<?php }?>
						</ul>
					</div>
					<?php }?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php }else{ ?>
<div class="alert alert-danger alert-callout" role="alert">
	<div class="micro-stats_icons"><span class="label label-danger"><i class="material-icons">report_problem</i></span></div> 
	<strong class="ml10">No se encontraron resultados.</strong>
</div>
<?php }?>


<script type="text/javascript">
var _mytipo = <?php echo $_smarty_tpl->tpl_vars['st_idPerfil']->value;?>
;
</script>



<script type="text/javascript">
function fechaCalendar(obj){
	$(obj).datepicker({ dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true,dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']});
}
var _myArrayCols = (_mytipo == 1) ?  [
          			{ "sName": "folio","sWidth": 50,"sClass":"left"},
          			{ "sName": "nivel","sWidth": 20,"sClass":"left"},          			
          			{ "sName": "subnivel","sWidth": 20,"sClass":"left"},
          			{ "sName": "captura","sWidth": 50,"sClass":"left"},
          			{ "sName": "fecha","sWidth": 50,"sClass":"left"},
          			{ "sName": "estatus","sWidth": 50,"sClass":"left"},
          			{ "sName": "icone","sWidth": 20,"sClass":"center","bSortable":false,"bSearchable":false}
				]  :  [
          			{ "sName": "folio","sWidth": 50,"sClass":"left"},
          			{ "sName": "nivel","sWidth": 20,"sClass":"left"},          			
          			{ "sName": "captura","sWidth": 50,"sClass":"left"},
          			{ "sName": "fecha","sWidth": 50,"sClass":"left"},
          			{ "sName": "estatus","sWidth": 50,"sClass":"left"},
          			{ "sName": "icone","sWidth": 20,"sClass":"center","bSortable":false,"bSearchable":false}
				];
var _myArray = (_mytipo == 1) ? [
					{sSelector: "#txtFilterFolio"},
					{sSelector: "#txtFilterNivel",type:"select"},
					{sSelector: "#txtFilterSubNivel",type:"select"},
					{sSelector: "#txtFilterCaptura"},
					{sSelector: "#txtFilterFecha",type: "date-range",date_format: 'DD/MM/YYYY'},
					{sSelector: "#txtFilterEstatus"},null] :
					[
					{sSelector: "#txtFilterFolio"},
					{sSelector: "#txtFilterNivel",type:"select"},
					{sSelector: "#txtFilterCaptura"},
					{sSelector: "#txtFilterFecha",type: "date-range",date_format: 'DD/MM/YYYY'},
					{sSelector: "#txtFilterEstatus"},null];
$().ready( function(){
	$("#mTable").dataTable({
		 responsive: true,
		 "aaSorting": [],
		 "iDisplayLength": 25,
		 "aoColumns": _myArrayCols
	}).columnFilter({
					aoColumns: _myArray
			});
	$('#txtFilterFecha').find('input').removeClass("hasDatepicker").addClass('fecha');	
	$('.fecha-').datepicker({
		changeMonth: true,changeYear: true,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
        dateFormat: 'dd/mm/yy',
        showButtonPanel: true,currentText: "Hoy",closeText: "Cerrar",
        onSelect: function(date) {var e = jQuery.Event("keyup");e.which = 13;e.keyCode = 13; $(this).trigger(e);$(this).val(date);$(this).blur();}
	});
	fechaCalendar($(".fecha"));
	var table = $('#mTable').DataTable();
});
</script><?php }} ?>