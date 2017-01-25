<div class="col-lg-12 divForm">
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
				{if $perfil eq 1 || $st_idPerfil eq 1}
				<div class=" text-center">
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
						<i class="material-icons">add</i>
					</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRowFirst" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
						<i class="fa fa-clone"></i>
					</a>
				</div>
				{/if}
				<div class="table-responsive">
					<input type="hidden" name="guia[]" class="form-control f8 upper" value="{$guia}" autocomplete="off">
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
								{if $perfil eq 1 || $st_idPerfil eq 1}
								<th rowspan="2" class="text-left alert-success width5"> </th>
								{/if}
							</tr>
						</thead>
						<tbody class="tbodyFirstAppend">
							<tr class="text-left">
								<td class="td">1</td>
								<td class="td">
								<input type="hidden" name="txtIdSolCan[{$guia}][]" class="form-control f8" value="0" autocomplete="off">
								<input type="text" name="txtClaveCTCan[{$guia}][]" class="form-control f8 upper txtClaveCTCan" value="" autocomplete="off"></td>
								<td class="td turnoCmb"><input type="text" name="txtTurnoDrop[{$guia}][]" placeholder="Elija una clave Ct" class="form-control f8" disabled=""></td>
								<td class="td"><input type="text" name="txtTitularCan[{$guia}][]" class="form-control f8 upper" value="" maxlength="160" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtPagoCan[{$guia}][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtUnidadCan[{$guia}][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtSubUniCan[{$guia}][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtCateCan[{$guia}][]" class="form-control f8 upper txtCateCan" value="" maxlength="7" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtHorasCan[{$guia}][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtPlazaCan[{$guia}][]" class="form-control f8 myNum" value="" maxlength="6" autocomplete="off"></td>
								<td class="td"><textarea name="txtMotivoCan[{$guia}][]" class="form-control f8 upper"></textarea></td>
								<td class="td"><input type="text" name="txtVigenciaCan[{$guia}][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="" maxlength="10" autocomplete="off"></td>
								<td class="td"><textarea name="txtObservacionesCan[{$guia}][]" class="form-control f8 upper"></textarea></td>
								{if $perfil eq 1 || $st_idPerfil eq 1}
								<td class="td"><button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px"><i class="fa fa-times" title="Eliminar fila"></i></button></td>
								{/if}
							</tr>
						</tbody>
					</table>
				</div>
				<div style="text-align: center;width: 100%;font-weight: bold;font-size: 20px;margin-top: 20px;margin-bottom: 15px;">Creación / Conversión</div>
				{if $perfil eq 1 || $st_idPerfil eq 1}
				<div class=" text-center">
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnAddRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Agregar fila">
					<i class="material-icons">add</i>
					</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-floating-action btn-success btnCloneRow" style="color: #FFF;" data-toggle="tooltip" data-placement="right" title="Clonar última fila">
						<i class="fa fa-clone"></i>
					</a>
				</div>
				{/if}
				<div class="table-responsive">
					<table class="table table-bordered" style="width:100%;">
						<thead>
							<tr>
								<th rowspan="1" class="text-left alert-success width3">No</th>
								<th rowspan="1" class="text-left alert-success width12">Clave Ct</th>
								<th rowspan="1" class="text-left alert-success width10">Turno</th>
								{*<th colspan="{if $esconderBCM}3{else}6{/if}" class="text-left alert-success">Grupos base</th>
								<th colspan="{if $esconderBCM}3{else}6{/if}" class="text-left alert-success">Grupos contrato</th>
								<th colspan="{if $esconderBCM}3{else}6{/if}" class="text-left alert-success">Matrícula</th>
								<th rowspan="1" class="text-left alert-success width7 esconderG">Grupo</th>*}
								<th rowspan="1" class="text-left alert-success width9 esconderA">Asignatura</th>
								<th rowspan="1" class="text-left alert-success width9">Categoría</th>
								<th rowspan="1" class="text-left alert-success width6 esconderH">Horas</th>
								<th rowspan="1" class="text-left alert-success width20">Motivo</th>
								<th rowspan="1" class="text-left alert-success width12">Vigencia</th>
								<th rowspan="1" class="text-left alert-success width20">Observaciones</th>
								{if $perfil eq 1 || $st_idPerfil eq 1}
								<th rowspan="1" class="text-left alert-success width5"> </th>
								{/if}
							</tr>
							{*<tr>
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
							</tr>*}
						</thead>
						<tbody  class="tbodyAppend">
							<tr class="text-left">
								<td class="td">1</td>
								<td class="td">
								<input type="hidden" name="txtIdSolCrea[{$guia}][]" class="form-control f8" value="0" autocomplete="off">
								<input type="text" name="txtClaveCT[{$guia}][]" class="form-control f8 upper txtClaveCT" value="" autocomplete="off"></td>
								<td class="td turnoCmb"><input type="text" name="txtTurnoDropCrea[{$guia}][]" placeholder="Elija una clave Ct" class="form-control f8" disabled=""></td>
								{*<td class="td"><input type="text" name="txtGB1[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGB2[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGB3[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderBCM"><input type="text" name="txtGB4[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGB5[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGB6[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td"><input type="text" name="txtGC1[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGC2[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtGC3[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderBCM"><input type="text" name="txtGC4[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGC5[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtGC6[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td"><input type="text" name="txtMat1[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtMat2[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtMat3[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderBCM"><input type="text" name="txtMat4[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtMat5[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								<td class="td esconderBCM"><input type="text" name="txtMat6[{$guia}][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>
								
								<td class="td esconderG"><input type="text" name="txtGrupo[{$guia}][]" class="form-control f8" value="" maxlength="25" autocomplete="off"></td>
								*}
								
								<td class="td esconderA"><input type="text" name="txtAsignatura[{$guia}][]" class="form-control f8 upper" value="" maxlength="30" autocomplete="off"></td>
								<td class="td"><input type="text" name="txtPlaza[{$guia}][]" class="form-control f8 upper txtPlaza" value="" maxlength="6" autocomplete="off"></td>
								<td class="td esconderH"><input type="{if $esconderH}hidden{else}text{/if}" name="txtHoras[{$guia}][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>
								
								<td class="td"><textarea name="txtMotivo[{$guia}][]" class="form-control f8 upper"></textarea></td>
								<td class="td"><input type="text" name="txtVigencia[{$guia}][]" class="form-control f8 fecha" data-inputmask="'alias' : 'date'" value="" maxlength="10" autocomplete="off"></td>
								<td class="td"><textarea name="txtObservacionesCrea[{$guia}][]" class="form-control f8 upper"></textarea></td>
								{if $perfil eq 1 || $st_idPerfil eq 1}
								<td class="td"><button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px"><i class="fa fa-times" title="Eliminar fila"></i></button></td>
								{/if}
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>