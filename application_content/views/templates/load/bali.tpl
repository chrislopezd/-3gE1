{if !empty($LISTADOBALI)}
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
				{foreach from=$LISTADOBALI item=res}
				<tr class="text-left">
					<td class="mf8">{$res['claveCCT']}</td>
					<td class="mf8 width25">{$res['nombreCCT']}</td>
					<td class="mf8">{$res['turnoCCT']}</td>
					<td class="mf8">{$res['gpo1']}</td>
					<td class="mf8">{$res['alum1t']}</td>
					<td class="mf8">{$res['gpo2']}</td>
					<td class="mf8">{$res['alum2t']}</td>
					<td class="mf8">{$res['gpo3']}</td>
					<td class="mf8">{$res['alum3t']}</td>
					<td class="mf8">{$res['gpo4']}</td>
					<td class="mf8">{$res['alum4t']}</td>
					<td class="mf8">{$res['gpo5']}</td>
					<td class="mf8">{$res['alum5t']}</td>
					<td class="mf8">{$res['gpo6']}</td>
					<td class="mf8">{$res['alum6t']}</td>
					<td class="mf8">{$res['gpot']}</td>
					<td class="mf8">{$res['alumt']}</td>
					<td class="mf8">{$res['dirsgpo']}</td>
					<td class="mf8">{$res['dircgpo']}</td>
					<td class="mf8">{$res['sub_dir']}</td>
					<td class="mf8">{$res['docente']}</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
{else}
<div class="alert alert-danger alert-callout" role="alert">
	<div class="micro-stats_icons"><span class="label label-danger"><i class="material-icons">report_problem</i></span></div> 
	<strong class="ml10">No se encontraron resultados.</strong>
</div>
{/if}
{literal}
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
</script>{/literal}