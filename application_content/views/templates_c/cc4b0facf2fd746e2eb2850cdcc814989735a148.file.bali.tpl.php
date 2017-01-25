<?php /* Smarty version Smarty-3.1.13, created on 2016-06-03 13:18:34
         compiled from "application_content/views/templates/load/bali.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14920580075751c9fadff510-74175611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc4b0facf2fd746e2eb2850cdcc814989735a148' => 
    array (
      0 => 'application_content/views/templates/load/bali.tpl',
      1 => 1464964844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14920580075751c9fadff510-74175611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LISTADOBALI' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5751c9fb0808e7_74611402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751c9fb0808e7_74611402')) {function content_5751c9fb0808e7_74611402($_smarty_tpl) {?><style type="text/css">

</style>
<?php if (!empty($_smarty_tpl->tpl_vars['LISTADOBALI']->value)){?>
<div class="panel-table-inner-offset">
	<div class="table-responsive">
		<table id="mTables" class="table table-striped table-bordered table-hover dt-responsive tdisplay no-margin" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-left searchInput">Clave</th>
					<th class="text-left searchInput width25">Nombre</th>
					<th class="text-left searchInput">Turno</th>
					<th class="text-left searchInput">Gpo1</th>
					<th class="text-left searchInput">Aulas1</th>
					<th class="text-left searchInput">Alumt1</th>
					<th class="text-left searchInput">Gpo2</th>
					<th class="text-left searchInput">Aulas2</th>
					<th class="text-left searchInput">Alumt2</th>
					<th class="text-left searchInput">Gpo3</th>
					<th class="text-left searchInput">Aulas3</th>
					<th class="text-left searchInput">Alumt3</th>
					<th class="text-left searchInput">Gpo4</th>
					<th class="text-left searchInput">Aulas4</th>
					<th class="text-left searchInput">Alumt4</th>
					<th class="text-left searchInput">Gpo5</th>
					<th class="text-left searchInput">Aulas5</th>
					<th class="text-left searchInput">Alumt5</th>
					<th class="text-left searchInput">Gpo6</th>
					<th class="text-left searchInput">Aulas6</th>
					<th class="text-left searchInput">Alumt6</th>
					<th class="text-left searchInput">GpoTot</th>
					<th class="text-left searchInput">AlumTot</th>
					<th class="text-left searchInput">Docente</th>
					<th class="text-left searchInput">TotPerso</th>
				</tr>
			</thead>
			<tfoot>
		        <tr>
		         	<th class="text-left searchInput">Clave</th>
					<th class="text-left searchInput width25">Nombre</th>
					<th class="text-left searchInput">Turno</th>
					<th class="text-left searchInput">Gpo1</th>
					<th class="text-left searchInput">Aulas1</th>
					<th class="text-left searchInput">Alumt1</th>
					<th class="text-left searchInput">Gpo2</th>
					<th class="text-left searchInput">Aulas2</th>
					<th class="text-left searchInput">Alumt2</th>
					<th class="text-left searchInput">Gpo3</th>
					<th class="text-left searchInput">Aulas3</th>
					<th class="text-left searchInput">Alumt3</th>
					<th class="text-left searchInput">Gpo4</th>
					<th class="text-left searchInput">Aulas4</th>
					<th class="text-left searchInput">Alumt4</th>
					<th class="text-left searchInput">Gpo5</th>
					<th class="text-left searchInput">Aulas5</th>
					<th class="text-left searchInput">Alumt5</th>
					<th class="text-left searchInput">Gpo6</th>
					<th class="text-left searchInput">Aulas6</th>
					<th class="text-left searchInput">Alumt6</th>
					<th class="text-left searchInput">GpoTot</th>
					<th class="text-left searchInput">AlumTot</th>
					<th class="text-left searchInput">Docente</th>
					<th class="text-left searchInput">Tot Perso</th>
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
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['aulas1'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum1t'];?>
</td>					
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo2'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['aulas2'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum2t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo3'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['aulas3'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum3t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo4'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['aulas4'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum4t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo5'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['aulas5'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum5t'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpo6'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['aulas6'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alum6t'];?>
</td>					
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['gpot'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['alumt'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['prof_tot'];?>
</td>
					<td class="mf8"><?php echo $_smarty_tpl->tpl_vars['res']->value['tot_per'];?>
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
          			{ "sName": "aulas1","sClass":"center"},
          			{ "sName": "alum2t","sClass":"center"},
          			{ "sName": "gpo2","sClass":"center"},
          			{ "sName": "aulas2","sClass":"center"},
          			{ "sName": "alum3t","sClass":"center"},
          			{ "sName": "gpo3","sClass":"center"},
          			{ "sName": "aulas3","sClass":"center"},
          			{ "sName": "alum4t","sClass":"center"},
          			{ "sName": "gpo4","sClass":"center"},
          			{ "sName": "aulas4","sClass":"center"},
          			{ "sName": "alum5t","sClass":"center"},
          			{ "sName": "gpo5","sClass":"center"},
          			{ "sName": "aulas5","sClass":"center"},
          			{ "sName": "alum6t","sClass":"center"},
          			{ "sName": "gpo6","sClass":"center"},
          			{ "sName": "aulas6","sClass":"center"},
          			{ "sName": "gpot","sClass":"center"},
          			{ "sName": "alumt","sClass":"center"},
          			{ "sName": "prof_tot","sClass":"center"},
          			{ "sName": "tot_per","sClass":"center"}
				]
	}).columnFilter({
					aoColumns: [
					{sSelector: "#txtFilterClaveCCT"},
					{sSelector: "#txtFilterNombreCCT"},
					{sSelector: "#txtFilterTurnoCCT",type:"select"},
					null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]
			});
	$("#mTables_wrapper").find(".row:first").remove();
	$("#mTables").find("TFOOT").remove();
});
</script><?php }} ?>