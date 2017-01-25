{include file="design/header.tpl"}
<style type="text/css">
.btnDial{
    position: fixed;
    top: 50%;
    right: 0;
}
{if $edit eq 1 && $perfil gt 1}
.table>tbody>tr>td {
	height: 20px !important;
}
{/if}
{if $edit eq 1 && $perfil eq 1 && ($estatus eq 2 || $estatus eq 4)}
.table>tbody>tr>td {
	height: 20px !important;
}
{/if}
{if $esconderA}
.esconderA{
	display: none;
}
{/if}
{if $esconderG}
.esconderG{
	display: none;
}
{/if}
{if $esconderH}
.esconderH{
	display: none;
}
{/if}
{if $esconderBCM}
.esconderBCM{
	display: none;
}
{/if}
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
					<li><a href="#" class="disabled">{$bread}</a></li>
				</ol>
			</div>
		</div>
		<form name="mForm" id="mForm" class="form" method="post">
		<input type="hidden" name="{$token['token_name']}" id="token" value="{$token['token']}">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="right" style="float: right;margin-top: -30px;margin-right: -24px;">
							<button type="button" name="btnQuery" id="btnQuery" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalDialogBali"><i class="fa fa-search"></i> Buscar información CCT</button>
						</div>
						<div class="form-group floating-label col-md-6">
							<input type="hidden" name="idSol" id="idSol"  class="form-control" value="{$idSol}" readonly />
							<label for="txtOficio">Folio:</label><br/>
							{$idSolTxt}
						</div>
						{if $edit eq 1}
						<div class="form-group floating-label col-md-6">
							<label for="txtOficio">Estatus:</label><br/>
							{if $estatus eq 1}
							<span class="label label-info">Iniciado</span>
							{/if}
							{if $estatus eq 2}
							<span class="label label-success">Enviado</span>
							{/if}
							{if $estatus eq 3}
							<span class="label label-primary">Justifica</span>
							{/if}
							{if $estatus eq 4}
							<span class="label label-warning">No Justifica</span>
							{/if}
							{if $estatus eq 5}
							<span class="label label-danger">Canceldo</span>
							{/if}
							{if $estatus eq 6}
							<span class="label label-danger">No Procede</span>
							{/if}
							{if $estatus eq 7}
							<span class="label label-default">Finalizado</span>
							{/if}
						</div>
						{/if}
						<div class="form-group floating-label col-md-12">
							<textarea name="txtObservaciones" id="txtObservaciones" class="form-control" rows="2">{$observaciones}</textarea>
							<label for="txtObservaciones">Observaciones:</label>
						</div>
						{if $estatus eq 3 || $estatus eq 4 || $estatus eq 6 || $estatus eq 7}
						<div class="form-group floating-label col-md-12">
							{*<textarea name="txtObservaciones" id="txtObservaciones" class="form-control" rows="2">{$observacionesPlan}</textarea>*}
							<label for="txtObservaciones">Observaciones Planeación:</label><br/>
							{$observacionesPlan}
						</div>
						{/if}
					</div>
				</div>
			</div>
		</div>
		<header>
			{if ($perfil eq 1 && $estatus eq 1) || ($perfil eq 1 && $edit eq 0) || ($st_idPerfil eq 1 && ($estatus eq 1 || $estatus eq 4 || $edit eq 0)) || ($st_idPerfil eq 2 && ($estatus eq 1 || $estatus eq 4 || $edit eq 0))}
			<div class="col-sm-12">
				<a href="javascript:void(0)" id="btnNuevaPlaza" class="btn btn-floating-action btn-primary btn-sm btnFixed" data-toggle="tooltip" data-placement="right" title="Agregar plaza">
					<i class="material-icons">add</i>
				</a>
			</div>
			{/if}
		</header>
		<div class="row" id="PLAZASDIV">
			{if $GUIA|@count gt 0 && $edit eq 1}
				{foreach from=$GUIA key=_kk item=g}
					{assign var="guia" value=$g['guia']}
					<div class="col-lg-12 divForm">
						<div class="panel panel-default">
							<div class="panel-heading" style="padding: 1px !important;margin-right: 20px;">
								<header>
									<span class="badge badge-success badgeHeader"></span>
									<div style="text-align: center;margin-top: -28px;width: 100%;position: absolute;font-weight: bold;">Cancelación</div>
								</header>
								<div class="btn-group divDel{$guia}">
									{if $perfil eq 1 && $estatus eq 1 || $tmpVal[$guia] eq 0}
									<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-danger btnRemove" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Eliminar">
										<i class="material-icons">remove</i>
									</a>
									{/if}
								</div>
							</div>
							<div class="panel-body">
								<div class="panel-table-inner-offset">
									{if ($perfil eq 1 && ($estatus eq 1 || $estatus eq 4)) || ($st_idPerfil eq 1 && ($estatus eq 1 || $estatus eq 4))}
									<div class=" text-center">
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
											<i class="material-icons">add</i>
										</a>
										{if $estatus eq 1}
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
											<i class="fa fa-clone"></i>
										</a>
										{/if}
									</div>
									{/if}
									<div class="table-responsive">
										<input type="hidden" name="guia[]" class="form-control f8 upper" value="{$guia}" autocomplete="off">
										{if $perfil gt 1}
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
										{/if}
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
													{if $idSol gte 45}
													<th class="text-left alert-success width20">Observaciones Plan</th>
													{/if}
													{if ($perfil eq 1 && ($estatus eq 1 || $estatus eq 4)) || $perfil gt 1}
													<th rowspan="2" class="text-left alert-success width5"> </th>
													{/if}
												</tr>
											</thead>
											<tbody class="tbodyFirstAppend">
												{foreach from=$DATAPLAZACAN[$guia] key=kc item=p}
												<tr class="text-left">
													<td>{$kc + 1}</td>
													<td class="td">
													<input type="hidden" name="txtIdSolCan[{$guia}][]" class="form-control f8" value="{$p['idSolCan']}" autocomplete="off">
													<input type="hidden" name="txtEstatusCan[{$guia}][]" class="form-control f8" value="{$p['estatusCan']}" autocomplete="off">
													<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtClaveCTCan[{$guia}][]" class="form-control f8 upper txtClaveCTCan" value="{$p['claveCCTCan']}" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['claveCCTCan']}
													{/if}
													</td>
													<td class="td turnoCmb">
														<select name="txtTurnoCCTCan[{$guia}][]" class="form-control f8" style="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}display:none;{/if}">
															<option value="NA" class="form-control option">-Seleccione-</option>
															{if $p['turnoCCTCan'] eq 1}
															<option value="1" class="form-control option" selected>Matutino</option>
															{/if}
															{if $p['turnoCCTCan'] eq 2}
															<option value="2" class="form-control option" selected>Vespertino</option>
															{/if}
															{if $p['turnoCCTCan'] eq 3}
															<option value="3" class="form-control option" selected>Nocturno</option>
															{/if}
															{if $p['turnoCCTCan'] eq 4}
															<option value="4" class="form-control option" selected>Discontinuo</option>
															{/if}
														</select>
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{if $p['turnoCCTCan'] eq 1}
														Matutino
														{/if}
														{if $p['turnoCCTCan'] eq 2}
														Vespertino
														{/if}
														{if $p['turnoCCTCan'] eq 3}
														Nocturno
														{/if}
														{if $p['turnoCCTCan'] eq 4}
														Discontinuo
														{/if}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtTitularCan[{$guia}][]" class="form-control f8 upper" value="{$p['titularCan']}" maxlength="160" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['titularCan']}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtPagoCan[{$guia}][]" class="form-control f8 myNum" value="{$p['paCan']}" maxlength="2" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['paCan']}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtUnidadCan[{$guia}][]" class="form-control f8 myNum" value="{$p['unCan']}" maxlength="2" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['unCan']}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtSubUniCan[{$guia}][]" class="form-control f8 myNum" value="{$p['subCan']}" maxlength="2" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['subCan']}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtCateCan[{$guia}][]" class="form-control f8 upper txtCateCan" value="{$p['categoriaCan']}" maxlength="7" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['categoriaCan']}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtHorasCan[{$guia}][]" class="form-control f8 myNum" value="{$p['horasCan']}" maxlength="2" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['horasCan']}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtPlazaCan[{$guia}][]" class="form-control f8  myNum" value="{$p['plazaCan']}" maxlength="6" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['plazaCan']}
													{/if}
													</td>
													<td class="td">
														<textarea name="txtMotivoCan[{$guia}][]" class="form-control f8 upper" style="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}display:none;{/if}">{$p['motivoCan']}</textarea>
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['motivoCan']}
													{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtVigenciaCan[{$guia}][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="{$p['vigenciaCan']}" maxlength="10" autocomplete="off">
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['vigenciaCan']}
													{/if}
													</td>
													<td class="td">
														<textarea name="txtObservacionesCan[{$guia}][]" class="form-control f8 upper" style="{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}display:none;{/if}">{$p['observacionesCan']}</textarea>
													{if $estatus eq 2 || $p['estatusCan'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$p['observacionesCan']}
													{/if}
													</td>
													{if $idSol gte 45}
													<td class="td">
														{if $perfil gt 1 && $estatus eq 2}
														<textarea name="txtObservacionesPlanCan[{$guia}][]" class="form-control f8 upper">{$p['observacionesPlanCan']}</textarea>
														{else}
														{$p['observacionesPlanCan']}
														{/if}
													</td>
													{/if}
													{if $perfil eq 1 && $estatus eq 1}
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													{/if}
													{if $perfil eq 1 && $estatus eq 4 && $p['estatusCan'] eq 1}
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													{/if}
													{if $perfil eq 1 && $estatus eq 4 && $p['estatusCan'] eq 3}
													<td>
														<button type="button" name="success[]" class="btn btn-success" style="min-width:20px;cursor:default;">
															<i class="fa fa-check-square-o" title="Validado"></i>
														</button>
													</td>
													{/if}
													{if $perfil gt 1 && $estatus gt 1}
													{if $estatus eq 4 && $p['estatusCan'] eq 1 && $st_idPerfil eq 1}
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													{else}
													<td>
														<div class="list-icon">
														{if $estatus eq 3 || $estatus eq 4 || $estatus eq 6 || $estatus eq 7}
															<ul class="list">
																{if $p['estatusCan'] eq 3 || $p['estatusCan'] eq 7}
																<li><i class="fa fa-check-square" aria-hidden="true" style="color:#009688;font-size:11pt;"></i></li>
																{else}
																<li><i class="fa fa-ban" aria-hidden="true" style="color:#F22314;font-size:11pt;"></i></li>
																{/if}
  															</ul>
  														{else}
															<input class="checkbox checkbox-primary myCheck" type="checkbox" {if $p['estatusCan'] eq 3}checked{/if} data-id="{$p['idSolCan']}" data-tipo="can" data-g="{$guia}" value="{$p['estatusCan']}" />
														{/if}
														</div>
													</td>
													{/if}
													{else if $perfil gt 1}
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													{/if}
												</tr>
												{/foreach}
											</tbody>
										</table>
										{if $perfil gt 1}
										</div>{*Cierra el div del filtro cancelaciones*}
										{/if}
									</div>
									<div style="text-align: center;width: 100%;font-weight: bold;font-size: 20px;margin-top: 20px;margin-bottom: 15px;">Creación / Conversión</div>
									{if ($perfil eq 1 && ($estatus eq 1 || $estatus eq 4)) || ($st_idPerfil eq 1 && ($estatus eq 1 || $estatus eq 4))}
									<div class=" text-center">
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
										<i class="material-icons">add</i>
										</a>
										{if $estatus eq 1}
										<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
											<i class="fa fa-clone"></i>
										</a>
										{/if}
									</div>
									{else}
									<hr/>
									{/if}
									<div class="table-responsive">
										{if $perfil gt 1}
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
										{/if}
										<table class="table table-bordered tableCreaciones" style="width:100%;">
											<thead>
												<tr>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width3">No</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width12">Clave Ct</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width10">Turno</th>
													{if $idSol lt 45}
													<th colspan="{if $esconderBCM}3{else}6{/if}" class="text-left alert-success">Grupos base</th>
													<th colspan="{if $esconderBCM}3{else}6{/if}" class="text-left alert-success">Grupos contrato</th>
													<th colspan="{if $esconderBCM}3{else}6{/if}" class="text-left alert-success">Matrícula</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width7 esconderG">Grupo</th>
													{/if}
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width9 esconderA">Asignatura</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width9">Categoría</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width6 esconderH">Horas</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width20">Motivo</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width12">Vigencia</th>
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width20">Observaciones</th>
													{if $idSol gte 45}
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width20">Observaciones Plan</th>
													{/if}
													{if $perfil eq 1 && ($estatus eq 1 || $estatus eq 4)  || $perfil gt 1}
													<th rowspan="{if $idSol lt 45}2{else}1{/if}" class="text-left alert-success width5"> </th>
													{/if}
												</tr>
												{if $idSol lt 45}
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
												{/if}
											</thead>
											<tbody  class="tbodyAppend">
												{foreach from=$DATAPLAZACREA[$guia] key=k item=pc}
												<tr class="text-left">
													<td class="td">{$k + 1}</td>
													<td class="td">
													<input type="hidden" name="txtIdSolCrea[{$guia}][]" class="form-control f8" value="{$pc['idSolCrea']}" autocomplete="off">
													<input type="hidden" name="txtEstatusCrea[{$guia}][]" class="form-control f8" value="{$pc['estatusCrea']}" autocomplete="off">
													<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtClaveCT[{$guia}][]" class="form-control f8 upper txtClaveCT" value="{$pc['claveCCTCrea']}" autocomplete="off">
													{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
													{$pc['claveCCTCrea']}
													{/if}
													</td>
													<td class="td turnoCmb">
														<select name="txtTurnoCCT[{$guia}][]" class="form-control f8" style="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}display:none;{/if}">
															<option value="NA" class="form-control option">-Seleccione-</option>
															{if $pc['turnoCCTCrea'] eq 1}
															<option value="1" class="form-control option" selected>Matutino</option>
															{/if}
															{if $pc['turnoCCTCrea'] eq 2}
															<option value="2" class="form-control option" selected>Vespertino</option>
															{/if}
															{if $pc['turnoCCTCrea'] eq 3}
															<option value="3" class="form-control option" selected>Nocturno</option>
															{/if}
															{if $pc['turnoCCTCrea'] eq 4}
															<option value="4" class="form-control option" selected>Discontinuo</option>
															{/if}
														</select>
													{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{if $pc['turnoCCTCrea'] eq 1}
														Matutino
														{/if}
														{if $pc['turnoCCTCrea'] eq 2}
														Vespertino
														{/if}
														{if $pc['turnoCCTCrea'] eq 3}
														Nocturno
														{/if}
														{if $pc['turnoCCTCrea'] eq 4}
														Discontinuo
														{/if}
													{/if}
													</td>
													{if $idSol lt 45}
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGB1[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal1Base']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal1Base']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGB2[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal2Base']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal2Base']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGB3[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal3Base']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal3Base']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGB4[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal4Base']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal4Base']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGB5[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal5Base']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal4Base']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGB6[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal6Base']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal6Base']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGC1[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal1Contrato']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal1Contrato']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGC2[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal2Contrato']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal2Contrato']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGC3[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal3Contrato']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal3Contrato']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGC4[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal4Contrato']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal4Contrato']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGC5[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal5Contrato']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal5Contrato']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGC6[{$guia}][]" class="form-control f8 myNum" value="{$pc['grupoTotal6Contrato']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoTotal6Contrato']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtMat1[{$guia}][]" class="form-control f8 myNum" value="{$pc['alumTotal1']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['alumTotal1']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtMat2[{$guia}][]" class="form-control f8 myNum" value="{$pc['alumTotal2']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['alumTotal2']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtMat3[{$guia}][]" class="form-control f8 myNum" value="{$pc['alumTotal3']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['alumTotal3']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtMat4[{$guia}][]" class="form-control f8 myNum" value="{$pc['alumTotal4']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['alumTotal4']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtMat5[{$guia}][]" class="form-control f8 myNum" value="{$pc['alumTotal5']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['alumTotal5']}
														{/if}
													</td>
													<td class="td esconderBCM">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtMat6[{$guia}][]" class="form-control f8 myNum" value="{$pc['alumTotal6']}" maxlength="3" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['alumTotal6']}
														{/if}
													</td>
													<td class="td esconderG">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtGrupo[{$guia}][]" class="form-control f8" value="{$pc['grupoCrea']}" maxlength="25" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['grupoCrea']}
														{/if}
													</td>
													{/if}
													<td class="td esconderA">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtAsignatura[{$guia}][]" class="form-control f8 upper" value="{$pc['asignaturaCrea']}" maxlength="30" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['asignaturaCrea']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtPlaza[{$guia}][]" class="form-control f8 upper txtPlaza" value="{$pc['plazaCrea']}" maxlength="6" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['plazaCrea']}
														{/if}
													</td>
													<td class="td esconderH">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $esconderH || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtHoras[{$guia}][]" class="form-control f8 myNum" value="{$pc['horasCrea']}" maxlength="2" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['horasCrea']}
														{/if}
													</td>
													<td class="td">
														<textarea name="txtMotivo[{$guia}][]" class="form-control f8 upper" style="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}display:none;{/if}">{$pc['motivoCrea']}</textarea>
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['motivoCrea']}
														{/if}
													</td>
													<td class="td">
														<input type="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}hidden{else}text{/if}" name="txtVigencia[{$guia}][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="{$pc['vigenciaCrea']}" maxlength="10" autocomplete="off">
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['vigenciaCrea']}
														{/if}
													</td>
													<td class="td">
														<textarea name="txtObservacionesCrea[{$guia}][]" class="form-control f8 upper" style="{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}display:none;{/if}">{$pc['observacionesCrea']}</textarea>
														{if $estatus eq 2 || $pc['estatusCrea'] eq 3 || $perfil gt 1 && $st_idPerfil gt 1}
														{$pc['observacionesCrea']}
														{/if}
													</td>
													{if $idSol gte 45}
													<td class="td">
														{if $perfil gt 1 && $estatus eq 2}
														<textarea name="txtObservacionesPlanCrea[{$guia}][]" class="form-control f8 upper">{$pc['observacionesPlanCrea']}</textarea>
														{else}
														{$pc['observacionesPlanCrea']}
														{/if}
													</td>
													{/if}
													{if $perfil eq 1 && $estatus eq 1}
													<td class="td"><button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px"><i
													 class="fa fa-times" title="Eliminar fila"></i></button></td>
													{/if}
													{if $perfil eq 1 && $estatus eq 4 && $pc['estatusCrea'] eq 1}
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													{/if}
													{if $perfil eq 1 && $estatus eq 4 && $pc['estatusCrea'] eq 3}
													<td>
														<button type="button" name="success[]" class="btn btn-success" style="min-width:20px;cursor:default;">
															<i class="fa fa-check-square-o" title="Validado"></i>
														</button>
													</td>
													{/if}
													{if $perfil gt 1 && $estatus gt 1}
													{if $estatus eq 4 && $pc['estatusCrea'] eq 1 && $st_idPerfil eq 1}
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													{else}
													<td><div class="list-icon">
															{if $estatus eq 3 || $estatus eq 4 || $estatus eq 6 || $estatus eq 7}
															<ul class="list">
																{if $pc['estatusCrea'] eq 3 || $pc['estatusCrea'] eq 7}
																<li><i class="fa fa-check-square" aria-hidden="true" style="color:#009688;font-size:11pt;"></i></li>
																{else}
																<li><i class="fa fa-ban" aria-hidden="true" style="color:#F22314;font-size:11pt;"></i></li>
																{/if}
  															</ul>
  															{else}
															<input class="checkbox checkbox-primary myCheck" type="checkbox" {if $pc['estatusCrea'] eq 3}checked{/if} data-id="{$pc['idSolCrea']}" data-tipo="crea" data-g="{$guia}" value="{$pc['estatusCrea']}" />
															{/if}
														</div>
													</td>
													{/if}
													{else if $perfil gt 1}
													<td class="td">
														<button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px">
															<i class="fa fa-times" title="Eliminar fila"></i>
														</button>
													</td>
													{/if}
												</tr>
												{/foreach}
											</tbody>
										</table>
										{if $perfil gt 1}
										</div>{*Cierra el div del filtro creaciones*}
										{/if}
									</div>
								</div>
							</div>
						</div>
					</div>
				{/foreach}
			{/if}
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				{if ($perfil eq 1 && ($estatus eq 1 || $estatus eq 4)) || ($perfil eq 1 && $edit eq 0) || ($st_idPerfil eq 1 && ($estatus eq 1 || $estatus eq 4 || $edit eq 0)) || ($st_idPerfil eq 2 && ($estatus eq 1 || $estatus eq 4 || $edit eq 0))}
				<button type="button" class="btn btn-lg btn-primary materialRipple-light materialRipple-btn btn-block" id="btnGuardar">
					<i class="fa fa-floppy-o"></i> Guardar
				</button>
				{else}
				<a href="inicio" class="btn btn-info btn-block"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>
				{/if}
			</div>
		</div>
		</form>
		{if $perfil gt 1 && $estatus eq 2}
		<div id="speed-dial" class="md-fab-speed-dial btnDial" data-toggle="speed-dial" data-mode="scale">
			<div class="md-fab-trigger" aria-expanded="false" aria-haspopup="true">
				<button type="button" class="btn btn-floating-action btn-default"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></button>
			</div>
			<ul class="md-fab-actions" aria-hidden="true">
				<li><a href="#" class="listaAccionJ btn btn-default-bright btn-floating-action btn-primary btn-sm" title="Justifica" data-estatus="3" data-folio="{$idSolTxt}" data-id="{$idSol}" data-toggle="modal" data-target="#modalDialogAction">
				<i class="fa fa-check-square-o" aria-hidden="true"></i></a></li>
				<li><a href="#" class="listaAccionJ btn btn-default-bright btn-floating-action btn-warning btn-sm" title="No justifica" data-estatus="4" data-folio="{$idSolTxt}" data-id="{$idSol}" data-toggle="modal" data-target="#modalDialogAction">
				<i class="fa fa-times" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		{/if}
		{if $edit eq 1 && $perfil eq 1 && ($estatus eq 1 || $estatus eq 4) || $st_idPerfil eq 1 && ($estatus eq 1 || $estatus eq 4)}
		<div id="speed-dial" class="md-fab-speed-dial btnDial" data-toggle="speed-dial" data-mode="scale">
			<div class="md-fab-trigger" aria-expanded="false" aria-haspopup="true">
				<button type="button" class="btn btn-floating-action btn-default"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></button>
			</div>
			<ul class="md-fab-actions" aria-hidden="true">
				<li><a href="#" class="listaAccionJ btn btn-default-bright btn-floating-action btn-sm" title="Enviar solicitud" data-estatus="2" data-folio="{$idSolTxt}" data-id="{$idSol}" data-toggle="modal" data-target="#modalDialogAction" >
				<i class="fa fa-paper-plane" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		{/if}
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
						<input type="hidden" name="{$token['token_name']}" value="{$token['token']}">
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
			{*<div class="modal-header">
				<div class="alert alert-callout alert-primary" role="alert">
					<strong id="titleModal">Bali Inicio escolar 2015-2016</strong>
				</div>
			</div>*}
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
{include file="design/footer.tpl"}
<script src="{$raiz}resources/js/jquery.blockUI.js"></script>
<script type="text/javascript">
    $.blockUI({ message: '<div class="alert alert-success"><h5> Cargando, por favor espere un momento...</h5></div><div><img src="resources/images/loadAjax.gif" /><br/><br/></div>',});
</script>
{literal}
<script type="text/javascript">
var _edit = {/literal}'{$edit}'{literal};
var _url = {/literal}'{$url}'{literal};
var _raiz = {/literal}'{$raiz}'{literal};
var _perFil = {/literal}'{$st_idPerfil}'{literal};
</script>{/literal}
<script src="{$raiz}resources/js/web/formulario.js"></script>
