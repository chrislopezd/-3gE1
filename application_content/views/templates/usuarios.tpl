{include file="design/header.tpl"}
<input type="hidden" name="csrf_segey_tok_name" id="token" value="{$token}" />
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title">Listado de usuarios</h4>
                    </div>
                    <div class="card-content">
                    <hr/>
                        <div class="toolbar">
                           <a href="nuevoUsuario" class="btn btn-round btn-success">
                                <i class="material-icons">add</i>
                                Nuevo usuario
                            </a>
                        </div>
                        <div class="material-datatables" id="listTable">

                        </div>
                    </div>
                   {*  <!-- end content-->*}
                </div>
                {*  <!--  end card  -->*}
            </div>
          {*  <!-- end col-md-12 -->*}
        </div>
        {* <!-- end row -->*}
    </div>
</div>


<div class="modal fade" id="winModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" name="id" id="id" value="0">
    <input type="hidden" name="estatus" id="estatus" value="0">
    <div class="modal-dialog modal-small ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
                <h5 id="winTitulo"></h5>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger btn-simple" onclick="cambiarEstatus();">Si </button>
                <button type="button" class="btn btn-simple" data-dismiss="modal" onclick="cancelarAccion();">No(Cancelar)</button>
            </div>
        </div>
    </div>
</div>
{include file="design/footer.tpl"}
{literal}
<script type="text/javascript">
function cargarListadoUsuarios(){
    var dataForm = new FormData();
    dataForm.append($("#token").attr('name'), $("#token").val());
    $.ajax({
        url : "ajax/listadoUsuarios",
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
                $('#listTable').html(data.HTML);
            }
        },
        error: function (){$('#loadData').hide();}
    });
}
function cancelarAccion(){
    $("#id").val("");
    $("#estatus").val("");
}
function cambiarEstatus(){
        var dataForm = new FormData();
        dataForm.append($("#token").attr('name'), $("#token").val());
        dataForm.append('id', $("#winModal").find("#id").val());
        dataForm.append('estatus', $("#winModal").find("#estatus").val());
        $.ajax({
            url : "ajax/cambiarEstatusUsuario",
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
                    cargarListadoUsuarios();
                    $('#loadData').hide();
                    $("#winModal").find('.close').click();
                }
            },
            error: function (){$('#loadData').hide();}
        });
    }
$().ready( function(){
    cargarListadoUsuarios();
});
</script>{/literal}