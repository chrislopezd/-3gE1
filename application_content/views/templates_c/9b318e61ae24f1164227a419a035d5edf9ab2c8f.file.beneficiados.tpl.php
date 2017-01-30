<?php /* Smarty version Smarty-3.1.13, created on 2017-01-30 15:12:23
         compiled from "application_content\views\templates\beneficiados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24931588ac51dd8e097-66083694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b318e61ae24f1164227a419a035d5edf9ab2c8f' => 
    array (
      0 => 'application_content\\views\\templates\\beneficiados.tpl',
      1 => 1485785414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24931588ac51dd8e097-66083694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_588ac51de85e26_75602059',
  'variables' => 
  array (
    'token' => 0,
    'st_idTipo' => 0,
    'MUNICIPIOS' => 0,
    'LOCALIDADES' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ac51de85e26_75602059')) {function content_588ac51de85e26_75602059($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("design/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['token']->value['token_name'];?>
" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value['token'];?>
" />
<input type="hidden" name="tipoBene" id="tipoBene" value="<?php echo $_smarty_tpl->tpl_vars['st_idTipo']->value;?>
" />
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Listado de beneficiarios</h4>
                        <div class="toolbar">
                            <div class="col-md-6">
                                <input type="text" name="beneficiadoSearch" id="beneficiadoSearch" class="form-control input-sm" placeholder="Buscar Beneficiado">
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
                            </div>
                            <div class="col-md-6">
                                <button type="button" id="beneficiadoBtn" class="btn btn-round btn-success"><i class="material-icons">add_box</i> Agregar Beneficiado</button>

                                <button type="button" id="importBene" class="btn btn-round btn-warning" data-toggle="modal" data-target="#importarExcel"><i class="material-icons">add_box</i> Importar Excel</button>
                            </div>
                           
                        </div>
                        <div style="clear: both;"></div>
                        <div class="material-datatables" id="datosList">

                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
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
                <button type="button" class="btn btn-danger btn-simple" onclick="eliminarBeneficiario();">Si eliminar</button>
                <button type="button" class="btn btn-simple" data-dismiss="modal" onclick="cancelarEliminar();">No(Cancelar)</button>
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
                    <input type="hidden" value="" name="..."><input type="file" name="" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" id="fileImport">
                <div class="ripple-container"></div></span><br>
                <b>El primer registro debe de contener los titulos de cada columna. El archivo debe de tener la siguiente estructura:</b>
                <table class="tablaEstructura table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                    <tbody>
                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==1){?>
                        <tr>
                            <th>CURP</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Codigo Postal</th>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==2){?>
                        <tr>
                            <th>CURP</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Codigo Postal</th>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==3){?>
                        <tr>
                            <th>CLAVE CT</th>
                            <th>Nombre CT</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==4){?>
                        <tr>
                            <th>CURP</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Codigo Postal</th>
                        </tr>
                    <?php }?>
                    </thead>
                </table>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success" onclick="importar();">Importar Benficiarios</button>
                <button type="button" class="btn btn-simple" data-dismiss="modal">Salir</button>
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
                <button type="button" class="btn btn-simple" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

<button style="display: none" id="mostrarAgregarNuevo" data-toggle="modal" data-target="#mostrarAgregarNuevoView"></button>
<div class="modal fade" id="mostrarAgregarNuevoView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
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
                        <!--label class="control-label" style="width: 100%;left: 0px;">Clve CT</label-->
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
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Apellido Paterno</label>
                        <input type="text" name="apellidoPPersona" id="apellidoPPersona" class="form-control upper" autofocus="" autocomplete="off">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating has-success is-empty">
                        <label class="control-label" style="width: 100%;left: 0px;">Apellido Materno</label>
                        <input type="text" name="apellidoMPersona" id="apellidoMPersona" class="form-control upper" autofocus="" autocomplete="off">
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
                        <!--label class="control-label" style="width: 100%;left: 0px;">Municipio</label-->
                        <select name="municipioPersona" id="municipioPersona" class="form-control upper" autofocus="" autocomplete="off">
                            <?php echo $_smarty_tpl->tpl_vars['MUNICIPIOS']->value;?>

                        </select>
                    <span class="material-input"></span></div>
                </div>

                <div class="col-md-6">
                    <div class="form-group label-floating has-success is-empty">
                        <!--label class="control-label" style="width: 100%;left: 0px;">Localidad</label-->
                        <select name="localidadPersona" id="localidadPersona" class="form-control upper" autofocus="" autocomplete="off">
                            <?php echo $_smarty_tpl->tpl_vars['LOCALIDADES']->value;?>

                        </select>
                        <select name="localidadPersonaBACK" id="localidadPersonaBACK" class="form-control upper hidden" autofocus="" autocomplete="off">
                            <?php echo $_smarty_tpl->tpl_vars['LOCALIDADES']->value;?>

                        </select>
                    <span class="material-input"></span></div>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success" id="agregarNuevo" data-dismiss="modal">Agregar</button>
                <button type="button" class="btn btn-warning cerrarNuevo" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("design/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">
$("#fileImport").change(function(e){
    var _totalImg = $("#fileImport")[0].files.length;
    if(_totalImg > 0){
        $('.fileinput-new').html(e.target.files[0].name);
    }else{$('.fileinput-new').html("Selecionar Archivo");}


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

    $('#centroPersona').find('option').remove();
    $('#curpPersona').val('');
    $('#nombrePersona').val('');
    $('#apellidoPPersona').val('');
    $('#apellidoMPersona').val('');
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
                    $('.close').trigger('click');
                }
            },
            error: function (){$('#loadData').hide();}
        });
    }
    function cancelarEliminar(){
        $("#idSol").val(0);
    }
    $(document).ready(function() {
        $('.close').click(function(){
            $("#idSol").val(0);
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
                }
            })
            .autocomplete({
                minLength: 3,
                source: function(request,response){
                    //var terms = split( request.term );
                    $.ajax({
                        url: "ajax/autocomplete/beneficiadoSearch",
                        dataType: "json",
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
                    console.log(ui);
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

                    return false;
                }
        });
        $('#beneficiadoBtn').click(function(){
            if($('#personaCurp').val() != ''){
                if($('#tipoBene').val() == 1 || $('#tipoBene').val() == 2 || $('#tipoBene').val() == 4){

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

                    $('#mostrarAgregarNuevoView').find('div').removeClass('is-empty');

                    $('#mostrarAgregarNuevo').trigger('click');
                    return false;
                }
                funcionAgregar();
            }
            else{
                $('#beneficiadoSearch').focus();
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
});
$('#localidadPersona').change(function(){
    $('#personaLocalidad').val($('#localidadPersona').val());
});

$('#agregarNuevo').click(function(){
    $('#personaCurp').val($('#curpPersona').val());
    $('#personaNombre').val($('#nombrePersona').val());
    $('#personaApePat').val($('#apellidoPPersona').val());
    $('#personaApeMat').val($('#apellidoMPersona').val());
    $('#personaCorreo').val($('#correoPersona').val());
    $('#personaTelefono').val($('#telefonoPersona').val());
    $('#personaDireccion').val($('#direccionPersona').val());
    $('#codpos').val($('#codposPersona').val());
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
    dataForm.append('localidad', $('#personaLocalidad').val());
    dataForm.append('municipio', $('#personaMunicipio').val());
    dataForm.append('codpos', $('#codpos').val());

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
<?php }} ?>