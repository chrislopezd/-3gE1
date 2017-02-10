{include file="design/header.tpl"}
<input type="hidden" name="{$token.token_name}" id="token" value="{$token.token}" />
<input type="hidden" name="tipoBene" id="tipoBene" value="{$st_idTipo}" />
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title"><i class="material-icons">assignment</i> Listado de beneficiarios</h4>
                    </div>
                     <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">{if $st_tipo eq 'ESCUELAS'}account_balance{else}person{/if}</i> {$st_tipo}</h4>
                    </div>
                    <div class="card-content">
                        <hr/>
                        <div class="toolbar">
                            <div class="col-md-5">
                                <div class="form-group label-floating has-success">
                                <label class="control-label">Buscar beneficiario</label>
                                <input type="text" name="beneficiadoSearch" id="beneficiadoSearch" class="form-control input-sm upper" placeholder="">
                                <input type="hidden" name="beneCT" id="beneCT">
                                <input type="hidden" name="beneIdPersona" id="beneIdPersona">
                                <input type="hidden" name="personaCurp" id="personaCurp">
                                <input type="hidden" name="personaNombre" id="personaNombre">
                                <input type="hidden" name="personaApePat" id="personaApePat">
                                <input type="hidden" name="personaApeMat" id="personaApeMat">
                                <input type="hidden" name="personaCorreo" id="personaCorreo">
                                <input type="hidden" name="personaTelefono" id="personaTelefono">
                                <input type="hidden" name="personaDireccion" id="personaDireccion">
                                <input type="hidden" name="personaLocalidad" id="personaLocalidad">
                                <input type="hidden" name="personaMunicipio" id="personaMunicipio">
                                <input type="hidden" name="codpos" id="codpos">
                                <input type="hidden" name="personaNombreTuto" id="personaNombreTuto">
                                <input type="hidden" name="personaApePatTuto" id="personaApePatTuto">
                                <input type="hidden" name="personaApeMatTuto" id="personaApeMatTuto">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button type="button" id="beneficiadoBtn" class="btn btn-round btn-success"><i class="material-icons">add_box</i> Agregar beneficiario</button>

                                <button type="button" id="importBene" class="btn btn-round btn-warning" data-toggle="modal" data-target="#importarExcel"><i class="material-icons">system_update_alt</i> Importar Excel</button>
                            </div>
                            <div class="col-md-2 pull-right">
                                <button type="button" id="btnExport" class="btn btn-simple btn-success">
                                    <i class="material-icons">insert_drive_file</i> Exportar excel
                                </button>
                            </div>
                           {*<a href="#" class="btn btn-round btn-success">
                                <i class="material-icons">add_box</i>
                                Nuevo beneficiario
                            </a>*}
                        </div>
                        <div class="toolbar">
                            <form id="getFormF">
                            {if $st_idTipo == 1 || $st_idTipo == 2}
                             <div class="col-md-4">
                               <div class="form-group label-floating is-empty has-success">
                                    <label class="control-label">Clave o Nombre CT</label>
                                    <input type="text" name="cctF" id="cctF" class="form-control upper">
                                    <input type="hidden" name="cctFF" id="cctFF" class="form-control upper" maxlength="10">
                                    <input type="hidden" name="nombreFF" id="nombreFF" class="form-control upper">
                                </div>
                            </div>
                            {/if}
                            {if $st_idTipo == 1}
                            <div class="col-md-2">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Grado</label>
                                    <select name="gradoF" id="gradoF" class="selectpicker" data-style="select-with-transition" data-size="10">
                                        <option disabled selected>Elija el grado</option>
                                      {foreach from=$GRADOS key=k item=res}
                                        <option>{$res}</option>
                                      {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Grupo</label>
                                    <select name="grupoF" id="grupoF" class="selectpicker" data-style="select-with-transition" data-size="10">
                                        <option disabled selected>Elija el grupo</option>
                                      {foreach from=$GRUPOS key=k item=res}
                                        <option>{$res}</option>
                                      {/foreach}
                                    </select>
                                </div>
                            </div>
                            {/if}
                            {if $st_idTipo == 2}
                            <div class="col-md-3">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Nombre o CURP</label>
                                    <input type="text" name="NoCF" id="NoCF" class="form-control upper">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Sin Clave CT</label>
                                    <div class="checkbox checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="miCheck" id="miCheck">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {/if}
                            {if $st_idTipo == 3}
                            <div class="col-md-2">
                               <div class="form-group label-floating is-empty has-success">
                                    <label class="control-label">Zona</label>
                                    <input type="text" name="zonaF" id="zonaF" class="form-control upper" maxlength="3">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Municipio</label>
                                    <select name="municipioF" id="municipioF" class="selectpicker" data-style="select-with-transition" data-size="10">
                                        <option disabled selected>Elija el municipio</option>
                                      {foreach from=$MUNICIPIOSF key=k item=res}
                                        <option value="{$res['MUNICIPIO']}">{$res['NOM']}</option>
                                      {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating has-success">
                                    <label class="control-label">Localidad</label>
                                     <select name="localidadF" id="localidadF" class="selectpicker" data-style="select-with-transition" data-size="10">
                                     <option disabled selected>Elija la localidad</option>
                                    </select>
                                </div>
                            </div>
                            {/if}
                            {if $st_idTipo == 1 || $st_idTipo == 2 || $st_idTipo == 3}
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Buscar</label>
                                    <button type="button" id="btnFilter" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Limpiar</label>
                                    <button type="button" id="btnClean" class="btn btn-white btn-round btn-just-icon" >
                                        <i class="material-icons">refresh</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                            {/if}
                            </form>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="material-datatables" id="datosList" style="min-height:300px;">
                            <div class="loader">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="lading"></div>
                            </div>
                        </div>
                    </div>
                    {*<!-- end content-->*}
                </div>
                {*<!--  end card  -->*}
            </div>
            {*<!-- end col-md-12 -->*}
        </div>
        {*<!-- end row -->*}
    </div>
</div>
<div class="modal fade" id="eliminarBeneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" name="idSol" id="idSol" value="0">
    <div class="modal-dialog modal-small ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
                <h5>Desea eliminar a este Beneficiario? </h5>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger btn-simple" onclick="eliminarBeneficiario();"><i class="material-icons">delete_forever</i> Si eliminar</button>
                <button type="button" class="btn btn-simple" data-dismiss="modal" onclick="cancelarEliminar();"><i class="material-icons">block</i> No(Cancelar)</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="importarExcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
        <div class="modal-content card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">file_upload</i>
            </div>
            <div class="modal-header" style="margin-top: -10px;margin-bottom: 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
                <h5>Seleccione el archivo. </h5>
                <span class="">Tiene que ser un archivo de Excel (.xlsx)</span><br>
                <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Selecionar Archivo</span>
                    <span class="fileinput-exists"></span>
                    <input type="hidden" value="" name="...">
                    <input type="file" name="" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" id="fileImport">
                <div class="ripple-container"></div></span><br/>
                <b>El primer registro debe de contener los titulos de cada columna. El archivo debe de tener la siguiente estructura:</b>
                <table class="tablaEstructura table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                    <tbody>
                    {if $st_idTipo == 1}
                        <tr>
                            <th>CURP</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Código Postal</th>
                        </tr>
                    {/if}
                    {if $st_idTipo == 2}
                        <tr>
                            <th>CURP</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Código Postal</th>
                        </tr>
                    {/if}
                    {if $st_idTipo == 3}
                        <tr>
                            <th>Clave CT</th>
                            <th>Nombre CT</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                        </tr>
                    {/if}
                    {if $st_idTipo == 4}
                        <tr>
                            <th>CURP</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Código Postal</th>
                        </tr>
                    {/if}
                    </thead>
                </table>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success" onclick="importar();"><i class="material-icons">system_update_alt</i> Importar Benficiarios</button>
                <button type="button" class="btn btn-simple btn-rose" data-dismiss="modal"><i class="material-icons">exit_to_app</i> Salir</button>
            </div>
        </div>
    </div>
</div>
<button style="display: none" id="mostrarResultados" data-toggle="modal" data-target="#resultadosImport"></button>
<div class="modal fade" id="resultadosImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
        <div class="modal-content card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">file_upload</i>
            </div>
            <div class="modal-header" style="margin-top: -10px;margin-bottom: 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
                <h5>Resultados: </h5>
                <div id="resultadosINFO"></div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-simple btn-rose" data-dismiss="modal"><i class="material-icons">exit_to_app</i> Salir</button>
            </div>
        </div>
    </div>
</div>
<button style="display: none" id="mostrarAgregarNuevo" data-toggle="modal" data-target="#mostrarAgregarNuevoView"></button>
<div class="modal fade" id="mostrarAgregarNuevoView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="modal-header" style="margin-top: -10px;margin-bottom: 10px;">
                <button type="button" class="close cerrarNuevo" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
                <h5>Datos: </h5>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        {*<!--label class="control-label" style="width: 100%;left: 0px;">Clve CT</label-->*}
                        <select name="centroPersona" id="centroPersona" class="form-control upper" autofocus="" autocomplete="off"></select>
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">CURP</label>
                        <input type="text" name="curpPersona" id="curpPersona" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Nombre</label>
                        <input type="text" name="nombrePersona" id="nombrePersona" class="form-control upper" autofocus="" autocomplete="off">
                        <input type="hidden" name="nombrePersonaTuto" id="nombrePersonaTuto" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Apellido Paterno</label>
                        <input type="text" name="apellidoPPersona" id="apellidoPPersona" class="form-control upper" autofocus="" autocomplete="off">
                        <input type="hidden" name="apellidoPPersonaTuto" id="apellidoPPersonaTuto" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Apellido Materno</label>
                        <input type="text" name="apellidoMPersona" id="apellidoMPersona" class="form-control upper" autofocus="" autocomplete="off">
                        <input type="hidden" name="apellidoMPersonaTuto" id="apellidoMPersonaTuto" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Correo Electronico</label>
                        <input type="text" name="correoPersona" id="correoPersona" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Telefono</label>
                        <input type="text" name="telefonoPersona" id="telefonoPersona" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Dirección</label>
                        <input type="text" name="direccionPersona" id="direccionPersona" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Codigo Postal</label>
                        <input type="text" name="codposPersona" id="codposPersona" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        {*<!--label class="control-label" style="width: 100%;left: 0px;">Municipio</label-->*}
                        <select name="municipioPersona" id="municipioPersona" class="form-control upper" autofocus="" autocomplete="off">
                            {$MUNICIPIOS}
                        </select>
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        {*<!--label class="control-label" style="width: 100%;left: 0px;">Localidad</label-->*}
                        <select name="localidadPersona" id="localidadPersona" class="form-control upper" autofocus="" autocomplete="off">
                            {$LOCALIDADES}
                        </select>
                        <select name="localidadPersonaBACK" id="localidadPersonaBACK" class="form-control upper hidden" autofocus="" autocomplete="off">
                            {$LOCALIDADES}
                        </select>
                    <span class="material-input"></span></div>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success" id="agregarNuevo" data-dismiss="modal"><i class="material-icons">save</i> Guardar</button>
                <button type="button" class="btn btn-warning cerrarNuevo" data-dismiss="modal"><i class="material-icons">block</i> Cancelar</button>
            </div>
        </div>
    </div>
</div>

<button style="display: none" type="button" id="showModalLoad" class="btn btn-white btn-round btn-just-icon" data-toggle="modal" data-target="#loadModal" data-backdrop="static" data-keyboard="false"></button>
<div class="modal" id="loadModal">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title" id="myModalLabel">Listado</h5>
            </div>
            <div class="modal-body" id="listaFiltro" style="min-height:200px;">
                <div class="instruction">
                    <div class="loader">
                        <div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="lading"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-simple btn-success" id="btnAddBene"><i class="material-icons">add_box</i> Agregar beneficiario</button>
                <button type="button" class="btn btn-simple btn-rose" id="btnExitBene" data-dismiss="modal"><i class="material-icons">block</i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
{include file="design/footer.tpl"}
{literal}
<script type="text/javascript">
    var _mTipo = {/literal}'{$st_idTipo}'{literal};
    $("#fileImport").change(function(e){
        var _totalImg = $("#fileImport")[0].files.length;
        if(_totalImg > 0){
            $('.fileinput-new').html(e.target.files[0].name);
        }else{
            $('.fileinput-new').html("Selecionar Archivo");
        }
    });
    $('.cerrarNuevo').click(function(){
        $('#beneficiadoSearch').val('');
        $('#beneCT').val('');
        $('#beneIdPersona').val('');
        $('#personaCurp').val('');
        $('#personaNombre').val('');
        $('#personaApePat').val('');
        $('#personaApeMat').val('');
        $('#personaCorreo').val('');
        $('#personaTelefono').val('');
        $('#personaDireccion').val('');
        $('#personaMunicipio').val('');
        $('#personaLocalidad').val('');
        $('#codpos').val('');
        $('#personaNombreTuto').val('');
        $('#personaApePatTuto').val('');
        $('#personaApeMatTuto').val('');
        $('#centroPersona').find('option').remove();
        $('#curpPersona').val('');
        $('#nombrePersona').val('');
        $('#apellidoPPersona').val('');
        $('#apellidoMPersona').val('');
        $('#nombrePersonaTuto').val('');
        $('#apellidoPPersonaTuto').val('');
        $('#apellidoMPersonaTuto').val('');
        $('#correoPersona').val('');
        $('#telefonoPersona').val('');
        $('#direccionPersona').val('');
        $('#municipioPersona').val('');
        $('#localidadPersona').val('');
        $('#codposPersona').val('');
    });
    function importar(){
        var dataForm = new FormData();
        var _totalImg = $("#fileImport")[0].files.length;
        if(_totalImg == 1){
            dataForm.append('fileCSV', $('#fileImport')[0].files[0]);
        }else{
            return false;
        }
        dataForm.append($("#token").attr('name'), $("#token").val());
        $("#fileImport").val(null);
        $('.fileinput-new').html("Subiendo archivo...");
        $.ajax({
            url : "ajax/importarBeneficiarios",
            data : dataForm,
            processData: false,
            contentType: false,
            cache: false,
            dataType : "json", type: "POST",
            beforeSend: function(){$('#loadData').show();},
            success: function(data){
                if(data.error){
                    //$('#products').append('Intente mas Tarde.');
                    demo.showNotificacion('top','center','error','danger',data.HTML);
                    $('.fileinput-new').html("Selecionar Archivo");
                }
                else{
                    //mensaje('La Acción se realizo correctamente.');
                    cargarListado();
                    $('.fileinput-new').html("Selecionar Archivo");
                    $('#resultadosINFO').html(data.INFO);
                    $('#mostrarResultados').trigger('click');
                }
            },
            error: function (){/*$(element).next('div').html('Intente mas Tarde.');*/}
        });
    }
    function eliminarBeneficiario(){
        var dataForm = new FormData();
        dataForm.append($("#token").attr('name'), $("#token").val());
        dataForm.append('idSol', $("#idSol").val());

        $.ajax({
            url : "ajax/eliminarBeneficiario",
            data : dataForm,
            processData: false,
            contentType: false,
            cache: false,
            dataType : "json", type: "POST",
            beforeSend: function(){$('#loadData').show();},
            success: function(data){
                if(data.error){
                    $('#loadData').hide();
                }
                else{
                    cargarListado();
                    $('#loadData').hide();
                    $("#idSol").val(0);
                    $('#beneficiadoSearch').val('');
                    $('#beneCT').val('');
                    $('#beneIdPersona').val('');
                    $('#personaCurp').val('');
                    $('#personaNombre').val('');
                    $('#personaApePat').val('');
                    $('#personaApeMat').val('');
                    $('#personaCorreo').val('');
                    $('#personaTelefono').val('');
                    $('#personaDireccion').val('');
                    $('#personaMunicipio').val('');
                    $('#personaLocalidad').val('');
                    $('#codpos').val('');
                    $('#personaNombreTuto').val('');
                    $('#personaApePatTuto').val('');
                    $('#personaApeMatTuto').val('');
                    $('.close').trigger('click');
                }
            },
            error: function (){$('#loadData').hide();}
        });
    }
    function cancelarEliminar(){
        $("#idSol").val(0);
    }
    function addBeneMasivo(marray){
        var dataForm = new FormData();
        dataForm.append($("#token").attr('name'), $("#token").val());
        dataForm.append('t', _mTipo);
        $(marray).each( function(i,e){
            if(_mTipo == 1 || _mTipo == 2){
                dataForm.append('curp[]',e);
            }
            if(_mTipo == 3){
                dataForm.append('claveCT[]',e);
            }
        });
        $.ajax({
            url : "ajax/guardarBeneficiarioMasivo",
            data : dataForm,
            processData: false,
            contentType: false,
            cache: false,
            dataType : "json", type: "POST",
            beforeSend: function(){$('#loadData').show();},
            success: function(data){
                if(data.error){
                    $('#loadData').hide();
                    $("#btnAddBene").removeClass("disabled");
                }
                else{
                    cargarListado();
                    $("#btnExitBene").click();
                    $("#btnAddBene").removeClass("disabled");
                    $('#loadData').hide();
                }
            },
            error: function (){$('#loadData').hide();$("#btnAddBene").removeClass("disabled");}
        });
    }
    $(document).ready(function(){
        $("#btnAddBene").click( function(){
            if($(this).hasClass("disabled")){
                return false;
            }
            if($(".mIcheck:checked").length == 0){
                demo.showNotificacion('top','center','error','danger','<strong>Debe seleccionar al menos un registro.</strong>');
                return false;
            }
            $(this).addClass("disabled");
            var _mArray = [];
            $("#tbodyList").find("TR").each( function(){
                var _mt = 0;
                $(this).find("TD").each( function(ii,ee){
                    if($(this).find(".mIcheck").prop('checked') && ii == 0){
                        _mt++;
                    }
                    if(_mt > 0 && ii == 1){
                        _mArray.push($.trim($(ee).html()));
                        return false;
                    }
                });
            });
           // console.log(_mArray);return false;
            if(_mArray.length > 0){
                addBeneMasivo(_mArray);
            }
        });
        if(_mTipo == '1' || _mTipo == '2'){
            setTimeout( function(){
                $("#cctF").focus();
            },10);
        }
        if(_mTipo == '3'){
            $('*[data-id="municipioF"]').click();
            $('*[data-id="municipioF"]').click();
            $("#zonaF").focus();
        }
        else{
            $("#beneficiadoSearch").focus();
        }
        $('.close').click(function(){
            $("#idSol").val(0);
        });
        $("#btnFilter").click( function(){
            var _tt = 0;
            if(_mTipo == 1 || _mTipo == 2){
                if($.trim($("#cctFF").val()).length == 0){
                    _tt++;
                }
                if(_mTipo == 2){
                    if($("#miCheck").prop("checked")){
                        _tt = 0;
                        if($.trim($("#NoCF").val()).length == 0){
                            _tt++;
                        }
                    }
                }
                if(_tt == 0){
                    $("#showModalLoad").click();
                    $("#loadModal").find("#myModalLabel").html("Listado "+$("#cctFF").val()+" - "+$("#nombreFF").val());
                    cargarFiltro();
                }else{
                    $("#loadModal").find("modal-header button").click();
                    demo.showNotificacion('top','center','error','danger','<strong>Debe elegir un filtro.</strong>');
                    if(_mTipo == 2 && $("#miCheck").prop("checked")){
                        $("#NoCF").focus();
                    }else if($.trim($("#cctF").val()).length  == 0){
                        $("#cctF").focus();
                    }
                    return false;
                }
            }
            if(_mTipo == 3){
                if($.trim($("#zonaF").val()).length == 0){
                    _tt++;
                }
                if($("#municipioF").val() == ""){
                    _tt++;
                }
                if(_tt == 0){
                    $("#showModalLoad").click();
                    cargarFiltro();
                }else{
                    $("#loadModal").find("modal-header button").click();
                    demo.showNotificacion('top','center','error','danger','<strong>Debe elegir un filtro.</strong>');
                    if($.trim($("#zonaF").val()).length  == 0){
                        $("#zonaF").focus();
                    }
                    return false;
                }
            }
        });
        $("#zonaF,#cctF").onEnter(function(){
            $("#btnFilter").click();
        });
        $("#loadModal").on("hidden.bs.modal",function (){
            $("#listaFiltro").html('<div class="instruction"><div class="loader"><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="lading"></div></div></div>');
            $("#loadModal").find("#myModalLabel").html("Listado");
        });
        $("#btnClean").click( function(){
            $("#getFormF")[0].reset();
            if(_mTipo == 1){
                $("#gradoF").selectpicker('refresh');
                $("#grupoF").selectpicker('refresh');
                $("#cctFF").val('');
                $("#nombreFF").val('');
            }
            if(_mTipo == 2){
                $("#cctFF").val('');
                $("#nombreFF").val('');
            }
            if(_mTipo == 3){
                $("#localidadF").html('<option disabled selected>Elija la localidad</option>');
                $("#localidadF").selectpicker('refresh');
                $("#municipioF").selectpicker('refresh');
            }
        });
        $("#municipioF").change( function(){
          if($(this).val() != ""){
            $.ajax({
              url : "ajax/buscarLocalidades",
              data : {
                'municipio' : $('#municipioF').val(),
                'csrf_segey_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";}
              },
              dataType : "json", type: "POST",
              beforeSend: function(){
              },
              success: function(data){
                if(data.error){
                  $("#localidadF").html('<option>Intente más tarde.</option>');
                }
                else{
                  $("#localidadF").html(data.HTML);
                }
                $("#localidadF").selectpicker('refresh');
              },
              error: function (){
                $('#localidadF').html('<option>Intente más tarde.</option>');
                $("#localidadF").selectpicker('refresh');
              }
            });
          }else{
            $("#localidadF").html('<option disabled selected>Elija la localidad</option>');
            $("#localidadF").selectpicker('refresh');
          }
        });
        $("#btnExport").click(function(event){
            $("#btnExport").addClass('disabled ui-state-disabled').html('<i class="material-icons">insert_drive_file</i> Generando...');
            var token = $.trim($("#token").val());
            var div = $("<div><form name='formExcel' id='formExcel' method='post' action='descargarProgramaExcel'><input type='hidden' name='csrf_segey_tok_name' value='"+token+"' /></form></div>");
            $('body').append(div);
            $('body').find("#formExcel").submit();
            $('body').find("#formExcel").remove();
            setTimeout( function(){
                $("#btnExport").removeClass('disabled ui-state-disabled').html('<i class="material-icons">insert_drive_file</i> Exportar excel');
            },2000);
        });

        $("#cctF").autocomplete({
            source: "ajax/buscarCCT",
            minLength: 3,
            select: function(event,ui){
                $("#cctF").val(ui.item.value);
                $("#cctFF").val(ui.item.id);
                $("#nombreFF").val(ui.item.nombre);
                return false;
            }
        });

        $( "#beneficiadoSearch" )
            .on( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB && $( this ).autocomplete( "instance" ).menu.active ) {
                    event.preventDefault();
                }
                if(event.keyCode == 8){
                    $('#beneficiadoSearch').val('');
                    $('#beneCT').val('');
                    $('#beneIdPersona').val('');
                    $('#personaCurp').val('');
                    $('#personaNombre').val('');
                    $('#personaApePat').val('');
                    $('#personaApeMat').val('');
                    $('#personaCorreo').val('');
                    $('#personaTelefono').val('');
                    $('#personaDireccion').val('');
                    $('#personaMunicipio').val('');
                    $('#personaLocalidad').val('');
                    $('#codpos').val('');
                    $('#personaNombreTuto').val('');
                    $('#personaApePatTuto').val('');
                    $('#personaApeMatTuto').val('');
                }
            })
            .autocomplete({
                minLength: 3,
                source: function(request,response){
                    //var terms = split( request.term );
                    $.ajax({
                        url: "ajax/autocomplete/beneficiadoSearch",
                        dataType: "json",
                        async: false,
                        data: {
                            q: request.term
                            //q: terms.pop()
                        },
                        success: function(data){
                            response( data );
                        }
                    });
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    //var terms = split( this.value );
                    //console.log(ui);
                    $('#beneficiadoSearch').val(ui.item.value);
                    var claveCT = ui.item.claveCT;
                    var turno = ui.item.turno;
                    var idPersona = ui.item.idPersona;
                    $('#beneCT').val(claveCT);
                    $('#beneIdPersona').val(idPersona);
                    $('#personaCurp').val(ui.item.curp);
                    $('#personaNombre').val(ui.item.nombre);
                    $('#personaApePat').val(ui.item.apellidop);
                    $('#personaApeMat').val(ui.item.apellidom);
                    $('#personaCorreo').val(ui.item.correo);
                    $('#personaTelefono').val(ui.item.telefono);
                    $('#personaDireccion').val(ui.item.direccion);
                    $('#personaMunicipio').val(ui.item.municipio);
                    $('#personaLocalidad').val(ui.item.localidad);
                    $('#codpos').val(ui.item.codpos);
                    $('#personaNombreTuto').val(ui.item.nombreTuto);
                    $('#personaApePatTuto').val(ui.item.apellidopTuto);
                    $('#personaApeMatTuto').val(ui.item.apellidomTuto);
                    return false;
                }
        });
        $('#beneficiadoBtn').click(function(){
            if((($('#tipoBene').val() == 1 || $('#tipoBene').val() == 2 || $('#tipoBene').val() == 4) && $('#personaCurp').val() != '')){
                $('#localidadPersona').html($('#localidadPersonaBACK').html());
                $('#localidadPersona').find('option').each(function(ind, ele){
                    if($(ele).attr('data-MUN') == $('#personaMunicipio').val()){
                        $(ele).show();
                    }
                    else{
                        $(ele).remove();
                    }
                });
                centros = $('#beneCT').val().split(',');
                if(centros.length > 0){
                    $('#centroPersona').find('option').remove();
                    $('#beneCT').val(centros[0]);
                    $.each(centros, function( index, value ) {
                        $('#centroPersona').append('<option>'+value+'</option>');
                    });
                }
                $('#curpPersona').val($('#personaCurp').val());
                $('#nombrePersona').val($('#personaNombre').val());
                $('#apellidoPPersona').val($('#personaApePat').val());
                $('#apellidoMPersona').val($('#personaApeMat').val());
                $('#correoPersona').val($('#personaCorreo').val());
                $('#telefonoPersona').val($('#personaTelefono').val());
                $('#direccionPersona').val($('#personaDireccion').val());
                $('#municipioPersona').val($('#personaMunicipio').val());
                $('#localidadPersona').val($('#personaLocalidad').val());
                $('#codposPersona').val($('#codpos').val());
                $('#nombrePersonaTuto').val($('#personaNombreTuto').val());
                $('#apellidoPPersonaTuto').val($('#personaApePatTuto').val());
                $('#apellidoMPersonaTuto').val($('#personaApeMatTuto').val());
                $('#mostrarAgregarNuevoView').find('div').removeClass('is-empty');
                $('#mostrarAgregarNuevo').trigger('click');
                return false;
            }
            else if($('#tipoBene').val() == 3 && $.trim($("#beneCT").val()).length == 10){
                funcionAgregar();
            }else{
                $("#beneficiadoSearch").focus();
            }
        });
        cargarListado();
    });
    $('#centroPersona').change(function(){
        $('#beneCT').val($('#centroPersona').val());
    });
    $('#municipioPersona').change(function(){
        $('#personaMunicipio').val($('#municipioPersona').val());
        $('#localidadPersona').html($('#localidadPersonaBACK').html());
        $('#localidadPersona').find('option').each(function(ind, ele){
            if($(ele).attr('data-MUN') == $('#personaMunicipio').val()){
                $(ele).show();
            }
            else{
                $(ele).remove();
            }
        });
        $('#localidadPersona').val(null);
    });
    $('#localidadPersona').change(function(){
        $('#personaLocalidad').val($('#localidadPersona').val());
    });
    $('#agregarNuevo').click(function(){
        //console.log($('#municipioPersona').val());
        if($('#municipioPersona').val() == null){
            demo.showNotificacion('top','center','error','danger','Favor de seleccionar el <strong>Municipio</strong>');
            /*$("#dialogMensaje").find("#textoDialog").html("Favor de seleccionar el Municipio");
            $("#mostrarDialogMensaje").click();*/
            return false;
        }
        //console.log($('#localidadPersona').val());
        if($('#localidadPersona').val() == null){
            demo.showNotificacion('top','center','error','danger','Favor de seleccionar la <strong>Localidad</strong>');
           /* $("#dialogMensaje").find("#textoDialog").html("Favor de seleccionar la Localidad");
            $("#mostrarDialogMensaje").click();*/
            return false;
        }
        $('#personaCurp').val($('#curpPersona').val());
        $('#personaNombre').val($('#nombrePersona').val());
        $('#personaApePat').val($('#apellidoPPersona').val());
        $('#personaApeMat').val($('#apellidoMPersona').val());
        $('#personaCorreo').val($('#correoPersona').val());
        $('#personaTelefono').val($('#telefonoPersona').val());
        $('#personaDireccion').val($('#direccionPersona').val());
        $('#personaMunicipio').val($('#municipioPersona').val());
        $('#personaLocalidad').val($('#localidadPersona').val());
        $('#codpos').val($('#codposPersona').val());
        $('#personaNombreTuto').val($('#nombrePersonaTuto').val());
        $('#personaApePatTuto').val($('#apellidoPPersonaTuto').val());
        $('#personaApeMatTuto').val($('#apellidoMPersonaTuto').val());
        funcionAgregar();
    });
    function funcionAgregar(){
        var dataForm = new FormData();
        dataForm.append($("#token").attr('name'), $("#token").val());
        dataForm.append('claveCT', $("#beneCT").val());
        dataForm.append('idPersona', $('#beneIdPersona').val());
        dataForm.append('curp', $('#personaCurp').val());
        dataForm.append('nombre', $('#personaNombre').val());
        dataForm.append('apellidop', $('#personaApePat').val());
        dataForm.append('apellidom', $('#personaApeMat').val());
        dataForm.append('correo', $('#personaCorreo').val());
        dataForm.append('telefono', $('#personaTelefono').val());
        dataForm.append('direccion', $('#personaDireccion').val());
        dataForm.append('municipio', $('#personaMunicipio').val());
        dataForm.append('localidad', $('#personaLocalidad').val());
        dataForm.append('codpos', $('#codpos').val());
        dataForm.append('nombreTuto', $('#personaNombreTuto').val());
        dataForm.append('apellidopTuto', $('#personaApePatTuto').val());
        dataForm.append('apellidomTuto', $('#personaApeMatTuto').val());
        $.ajax({
            url : "ajax/guardarBeneficiario",
            data : dataForm,
            processData: false,
            contentType: false,
            cache: false,
            dataType : "json", type: "POST",
            beforeSend: function(){$('#loadData').show();},
            success: function(data){
                if(data.error){
                    $('#loadData').hide();
                }
                else{
                    cargarListado();
                    $('.cerrarNuevo').trigger('click');
                    $('#loadData').hide();
                    $('#beneficiadoSearch').val('');
                    $('#beneCT').val('');
                    $('#beneIdPersona').val('');
                    $('#personaCurp').val('');
                    $('#personaNombre').val('');
                    $('#personaApePat').val('');
                    $('#personaApeMat').val('');
                    $('#personaCorreo').val('');
                    $('#personaTelefono').val('');
                    $('#personaDireccion').val('');
                    $('#personaMunicipio').val('');
                    $('#personaLocalidad').val('');
                    $('#codpos').val('');
                }
            },
            error: function (){$('#loadData').hide();}
        });
    }
    function cargarListado(){
        var dataForm = new FormData();
        dataForm.append($("#token").attr('name'), $("#token").val());
        $.ajax({
            url : "ajax/listadoBeneficiados",
            data : dataForm,
            processData: false,
            contentType: false,
            cache: false,
            dataType : "json", type: "POST",
            beforeSend: function(){$('#loadData').show();},
            success: function(data){
                if(data.error){
                    $('#loadData').hide();
                }
                else{
                    $('#loadData').hide();
                    $('#datosList').html(data.HTML);
                }
            },
            error: function (){$('#loadData').hide();}
        });
    }
    function cargarFiltro(){
        var dataForm = new FormData();
        dataForm.append($("#token").attr('name'), $("#token").val());
        dataForm.append('t', _mTipo);
        if(_mTipo == 1){
            dataForm.append('c', $.trim($("#cctFF").val()));
            dataForm.append('g', $("#gradoF").val());
            dataForm.append('gg', $("#grupoF").val());
        }
        if(_mTipo == 2){
            dataForm.append('c', $.trim($("#cctFF").val()));
            var sinCT = ($("#miCheck").prop("checked")) ? 1 : 0;
            dataForm.append('s', sinCT);
            dataForm.append('nc', $.trim($("#NoCF").val()));
        }
        if(_mTipo == 3){
            dataForm.append('z', $.trim($("#zonaF").val()));
            dataForm.append('m', $("#municipioF").val());
            dataForm.append('l', $("#localidadF").val());
        }
        $.ajax({
            url : "ajax/listadoFiltro",
            data : dataForm,
            processData: false,
            contentType: false,
            cache: false,
            dataType : "json", type: "POST",
            beforeSend: function(){$('#loadData').show();},
            success: function(data){
                if(data.error){
                    $('#loadData').hide();
                }
                else{
                    $('#loadData').hide();
                    $('#listaFiltro').html(data.HTML);
                }
            },
            error: function (){$('#loadData').hide();}
        });
    }
</script>
<style type="text/css">
    .ui-menu{
        list-style: none;
        padding: 0px;
        background: white;
        border: 1px solid #ccc;
        max-width: 500px;
    }
    .ui-menu li{
        border-bottom: 1px solid #ccc;
        padding: 4px;
    }
    .ui-menu li:hover{
        background: #f5f5f5;
    }
    .tablaEstructura th{
        font-size: 11px !important;
        padding: 5px !important;
        text-align: center;
    }
    .tablaEstructura td{
        font-size: 11px !important;
        padding: 5px !important;
    }
</style>
{/literal}
<button style="display: none" id="mostrarDialogMensaje" data-toggle="modal" data-target="#dialogMensaje"></button>
<div class="modal fade" id="dialogMensaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
        <div class="modal-content card" style="box-shadow: 4px 5px 24px">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
                <h5>Mensaje: </h5>
                <div id="textoDialog"></div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-simple" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>