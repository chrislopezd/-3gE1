{if !empty($LISTADO)}
<div class="panel-table-inner-offset">
	<div class="table-responsive">
		<table id="mTable" class="table table-striped table-hover dt-responsive tdisplay no-margin" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-left searchInput">Folio</th>
					{*<th class="text-left">Oficio</th>*}
					<th class="text-left searchInput">Nivel</th>
					{if $st_idPerfil eq 1}
					<th class="text-left searchInput">SubNivel</th>
					{/if}
					<th class="text-left searchInput">Captura</th>
					<th class="text-left searchInput">Fecha</th>
					<th class="text-left searchInput">Estatus</th>
					<th class="text-left">Acciones</th>
				</tr>
			</thead>
			<tfoot>
		        <tr>
		          <th class="text-left searchInput">Folio</th>
					{*<th class="text-left">Oficio</th>*}
					<th class="text-left searchInput">Nivel</th>
					{if $st_idPerfil eq 1}
					<th class="text-left searchInput">SubNivel</th>
					{/if}
					<th class="text-left searchInput">Captura</th>
					<th class="text-left searchInput">Fecha</th>
					<th class="text-left searchInput">Estatus</th>
					<th class="text-left">Acciones</th>

		        </tr>
		    </tfoot>
			<tbody>
				{foreach from=$LISTADO item=res}
				<tr class="text-left">
					<td>{$res['folio']}</td>
					{*<td>{$res['oficio']}</td>*}
					<td>{$res['nivel']}</td>
					{if $st_idPerfil eq 1}
					<td>{$res['subnivel']}</td>
					{/if}
					<td>{$res['nombre']}</td>
					<td>{$res['fechaCaptura']}</td>
					<td>{$res['estadoSol']}</td>
					<td>
					{if $res['estatus'] eq 1 || $res['estatus'] eq 2 || $res['estatus'] eq 3 || $res['estatus'] eq 4 || $res['estatus'] eq 6 || $res['estatus'] eq 7}
					<div class="btn-group">
						<button type="button" class="btn btn-raised btn-default-bright btn-xs dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-cog" aria-hidden="true"></i>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right text-left" role="menu">
							{if $perfil eq 1}
								{if ($res['estatus'] eq 2 || $res['estatus'] eq 3 || $res['estatus'] eq 4 || $res['estatus'] eq 6 || $res['estatus'] eq 7)}
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('{$res['idSol']}')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								{/if}								
								{if ($res['estatus'] eq 4)}
								<li>
									<a href="#" class="listaAccionJ cambiar" data-estatus="2" data-folio="{$res['folio']}" data-id="{$res['idSol']}" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar solicitud
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-id="{$res['idSol']}" data-estatus="5" data-folio="{$res['folio']}" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-ban" aria-hidden="true"></i> Cancelar
									</a>
								</li>
								{/if}
								{if $res['estatus'] eq 1}
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('{$res['idSol']}')">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-estatus="2" data-folio="{$res['folio']}" data-id="{$res['idSol']}" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar solicitud
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar" data-id="{$res['idSol']}" data-estatus="5" data-folio="{$res['folio']}" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-ban" aria-hidden="true"></i> Cancelar
									</a>
								</li>
								{/if}
							{else}
								{if  $res['estatus'] eq 2 || $st_idPerfil eq 1}
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('{$res['idSol']}')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								{/if}
								{if $res['estatus'] eq 1 && $st_idPerfil eq 1}
								<li>
									<a href="#" class="listaAccionJ cambiar" data-estatus="2" data-folio="{$res['folio']}" data-id="{$res['idSol']}" data-toggle="modal" data-target="#modalDialog">
										<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar solicitud
									</a>
								</li>
								{/if}
								{if  $res['estatus'] eq 2}
								<li>
									<a href="#" class="listaAccionJ cambiar btn-primary" data-estatus="3" data-folio="{$res['folio']}" data-id="{$res['idSol']}" data-toggle="modal" data-target="#modalDialog" style="color:#FFF;">
										<i class="fa fa-check-square-o" aria-hidden="true" style="color:#FFF;"></i> Justifica
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar btn-warning" data-estatus="4" data-folio="{$res['folio']}" data-id="{$res['idSol']}" data-toggle="modal" data-target="#modalDialog" style="color:#FFF;">
										<i class="fa fa-times" aria-hidden="true" style="color:#FFF;"></i> No Justifica
									</a>
								</li>
								{else if $res['estatus'] eq 4 && $st_idPerfil gt 1}
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('{$res['idSol']}')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								{else if $res['estatus'] eq 3 && $st_idPerfil gt 1} 
								<li>
									<a href="#" class="listaAccionJ cambiar btn-primary" data-estatus="7" data-folio="{$res['folio']}" data-id="{$res['idSol']}" data-toggle="modal" data-target="#modalDialog" style="color:#FFF;">
										<i class="fa fa-check-square-o" aria-hidden="true" style="color:#FFF;"></i> Finzalizar
									</a>
								</li>
								<li>
									<a href="#" class="listaAccionJ cambiar btn-danger" data-estatus="6" data-folio="{$res['folio']}" data-id="{$res['idSol']}" data-toggle="modal" data-target="#modalDialog" style="color:#FFF;">
										<i class="fa fa-times" aria-hidden="true" style="color:#FFF;"></i> No Procede
									</a>
								</li>
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('{$res['idSol']}')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								{else if ($res['estatus'] eq 6 || $res['estatus'] eq 7)&& $st_idPerfil gt 1}
								<li>
									<a href="#" class="listaAccion cambiar" onclick="editarSolicitud('{$res['idSol']}')">
										<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle
									</a>
								</li>
								{/if}
							{/if}
								{*{if $st_idPerfil eq 1 || $st_idPerfil eq 27 || $st_idPerfil eq 26}*}
								<li>
									<a href="javascript:void(0);" class="listaAccion cambiar" onclick="descargarPDF('{$res['idSol']}')">
										<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF
									</a>
								</li>
								{*{/if}*}
						</ul>
					</div>
					{/if}
					</td>
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
var _mytipo = {/literal}{$st_idPerfil}{literal};
</script>
{/literal}

{literal}
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
</script>{/literal}