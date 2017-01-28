{include file="design/header.tpl"}

<input type="hidden" name="{$token.token_name}" id="token" value="{$token.token}" />

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
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="beneficiadoBtn" class="btn btn-round btn-success"><i class="material-icons">add_box</i> Agregar Beneficiado</button>
                            </div>
                           {*<a href="#" class="btn btn-round btn-success">
                                <i class="material-icons">add_box</i>
                                Nuevo beneficiario
                            </a>*}
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


{include file="design/footer.tpl"}
{literal}
<script type="text/javascript">
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
                    return false;
                }
        });
        $('#beneficiadoBtn').click(function(){
            var dataForm = new FormData();

            dataForm.append($("#token").attr('name'), $("#token").val());
            dataForm.append('claveCT', $("#beneCT").val());
            dataForm.append('idPersona', $('#beneIdPersona').val());

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
                        $('#loadData').hide();
                        $('#beneficiadoSearch').val('');
                        $('#beneCT').val('');
                        $('#beneIdPersona').val('');
                    }
                },
                error: function (){$('#loadData').hide();}
            });
        });

        cargarListado();
    });

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
</style>
{/literal}