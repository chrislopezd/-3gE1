<?php /* Smarty version Smarty-3.1.13, created on 2016-06-06 13:34:56
         compiled from "application_content\views\templates\load\bali.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217965750b8b6df5d38-93400846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c82c104bf1403db8a3ace87bb1c65e9d460b152' => 
    array (
      0 => 'application_content\\views\\templates\\load\\bali.tpl',
      1 => 1465235437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217965750b8b6df5d38-93400846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5750b8b6e76035_98639337',
  'variables' => 
  array (
    'LISTADOBALI' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5750b8b6e76035_98639337')) {function content_5750b8b6e76035_98639337($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['LISTADOBALI']->value)){?>
<div class="panel-table-inner-offset">
	<div class="table-responsive">
		<table id="mTables" class="table table-striped table-bordered table-hover dt-responsive tdisplay no-margin" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-left searchInput">Clave</th>
					<th class="text-left searchInput width25">Nombre</th>
					<th class="text-left searchInput">Turno</th>
					<th class="text-left searchInput">Gpo1</th>
					<th class="text-left searchInput">Alumt1</th>
					<th class="text-left searchInput">Gpo2</th>
					<th class="text-left searchInput">Alumt2</th>
					<th class="text-left searchInput">Gpo3</th>
					<th class="text-left searchInput">Alumt3</th>
					<th class="text-left searchInput">Gpo4</th>
					<th class="text-left searchInput">Alumt4</th>
					<th class="text-left searchInput">Gpo5</th>
					<th class="text-left searchInput">Alumt5</th>
					<th class="text-left searchInput">Gpo6</th>
					<th class="text-left searchInput">Alumt6</th>
					<th class="text-left searchInput">GpoTot</th>
					<th class="text-left searchInput">AlumTot</th>
					<th class="text-left searchInput">Dirsgpo</th>
					<th class="text-left searchInput">Dircgpo</th>
					<th class="text-left searchInput">Subdir</th>
					<th class="text-left searchInput">Docente</th>
				</tr>
			</thead>
			<tfoot>
		        <tr>
		         	<th class="text-left searchInput">Clave</th>
					<th class="text-left searchInput width25">Nombre</th>
					<th class="text-left searchInput">Turno</th>
					<th class="text-left searchInput">Gpo1</th>
					<th class="text-left searchInput">Alumt1</th>
					<th class="text-left searchInput">Gpo2</th>
					<th class="text-left searchInput">Alumt2</th>
					<th class="text-left searchInput">Gpo3</th>
					<th class="text-left searchInput">Alumt3</th>
					<th class="text-left searchInput">Gpo4</th>
					<th class="text-left searchInput">Alumt4</th>
					<th class="text-left searchInput">Gpo5</th>
					<th class="text-left searchInput">Alumt5</th>
					<th class="text-left searchInput">Gpo6</th>
					<th class="text-left searchInput">Alumt6</th>
					<th class="text-left searchInput">GpoTot</th>
					<th class="text-left searchInput">AlumTot</th>
					<th class="text-left searchInput">Dirsgpo</th>
					<th class="text-left searchInput">Dircgpo</th>
					<th class="text-left searchInput">Subdir</th>
					<th class="text-left searchInput">Docente</th>
		        </tr>
		    </tfoot>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTADOBALI']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?>
				<tr class="text-left">
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['claveCCT'];?>
</td>
					<td class="mf8 width25"><?php echo $_smarty_tpl->tpl_vars['res']->value['nombreCCT'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['turnoCCT'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo1'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum1t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo2'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum2t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo3'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum3t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo4'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum4t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo5'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum5t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo6'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum6t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpot'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alumt'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['dirsgpo'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['dircgpo'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['sub_dir'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['docente'];?>
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
$().ready( function(){
	$("#mTables").dataTable({
		 responsive: true,
		 "aaSorting": [],
		 "iDisplayLength": 5,
		 "aoColumns": [
          			{ "sName": "claveCCT","sClass":"left"},
          			{ "sName": "nombreCCT","sClass":"left"},
          			{ "sName": "turnoCCT","sClass":"left"},
          			{ "sName": "alum1t","sClass":"center"},
          			{ "sName": "gpo1","sClass":"center"},
          			{ "sName": "alum2t","sClass":"center"},
          			{ "sName": "gpo2","sClass":"center"},
          			{ "sName": "alum3t","sClass":"center"},
          			{ "sName": "gpo3","sClass":"center"},
          			{ "sName": "alum4t","sClass":"center"},
          			{ "sName": "gpo4","sClass":"center"},
          			{ "sName": "alum5t","sClass":"center"},
          			{ "sName": "gpo5","sClass":"center"},
          			{ "sName": "alum6t","sClass":"center"},
          			{ "sName": "gpo6","sClass":"center"},
          			{ "sName": "gpot","sClass":"center"},
          			{ "sName": "alumt","sClass":"center"},
          			{ "sName": "dirsgpo","sClass":"center"},
          			{ "sName": "dircgpo","sClass":"center"},
          			{ "sName": "sub_dir","sClass":"center"},
          			{ "sName": "docente","sClass":"center"}
				]
	}).columnFilter({
					aoColumns: [
					{sSelector: "#txtFilterClaveCCT"},
					{sSelector: "#txtFilterNombreCCT"},
					{sSelector: "#txtFilterTurnoCCT",type:"select"},
					null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]
			});
	$("#mTables_wrapper").find(".row:first").remove();
	$("#mTables").find("TFOOT").remove();
});
</script><?php }} ?>