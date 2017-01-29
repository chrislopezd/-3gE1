<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Tipo perfil</th>
            <th>Tipo beneficiado</th>
            <th>Usuario</th>
            <th>Programa</th>
            <th>Estatus</th>
            <th class="disabled-sorting text-right">Acciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
           <th>#</th>
            <th>Tipo perfil</th>
            <th>Tipo beneficiado</th>
            <th>Usuario</th>
            <th>Programa</th>
            <th>Estatus</th>
            <th class="disabled-sorting text-right">Acciones</th>
        </tr>
    </tfoot>
    <tbody>
        {foreach from=$LISTADO key=key item=res}
        <tr>
            <td>{$key +1}</td>
            <td>{$res['nombrePerfilUsuario']}</td>
            <td>{$res['tipo']}</td>
            <td>{$res['programa']}</td>
            <td>{$res['observaciones']}</td>
            <td>
            <a href="#" class="update" data-toggle="modal" data-target="#winModal" data-id="{$res['idUsuario']}" data-estatus="{$res['idEstatus']}">
            <span  class="tag label label-{if $res['idEstatus'] eq 1}success{else}danger{/if}"><i class="material-icons" style="font-size:12px;">thumb_{if $res['idEstatus'] eq 1}up{else}down{/if}</i> {$res['estatusUsuario']}</span>
            </a>
            </td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-success btn-round edit" data-id="{$res['idUsuario']}">
                    <i class="material-icons">edit</i>
                </button>
                <button type="button" rel="tooltip" data-toggle="modal" data-target="#winModal" data-id="{$res['idUsuario']}" class="btn btn-danger btn-round remove">
                    <i class="material-icons">close</i>
                </button>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>{literal}
<script type="text/javascript">
    function editarUsuario(id){
        var token = $('#token').val();
        var div = $("<div><form name='_form' id='_formulario' method='post' action='editaUsuario'><input type='hidden' name='id' id='id' value='"+id+"' /><input type='hidden' name='csrf_segey_tok_name' value='"+token+"' /></form></div>");
        $('body').append(div);
        $('body').find("#_formulario").submit();
    }
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Todos"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Buscar",
                sZeroRecords:"No se encontraron resultados",
                paginate:{
                    first:"Primero",
                    last:"Último",
                    next:"Siguiente",
                    previous:"Anterior"
                },
                infoEmpty: "Mostrando 0 - 0 de 0 ",
                emptyTable:"Ningún dato disponible en el listado",
                info:"Mostrando _START_ - _END_ de _TOTAL_",
                infoFiltered:"(filtrado de un total de _MAX_ registros)",
                lengthMenu:"Mostrar _MENU_ ",
                loadingRecords:"Cargando...",
                processing:"Procesando...",
                search:"",
                thousands:",",
                zeroRecords:"No se encontraron resultados"
            },
        });
        var table = $('#datatables').DataTable();
        // Edit
        table.on('click', '.edit', function() {
            var id = $(this).attr("data-id");
            editarUsuario(id);
        });
         table.on('click', '.update', function(e){
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            var id = $(this).attr("data-id");
            var estatus = $(this).attr("data-estatus");
            var texto = (estatus == 1) ? 'Desactivar' : 'Activar';
            estatus = (estatus == 1) ? 0 : 1;
            $("#id").val(id);
            $("#estatus").val(estatus);
            $("#winModal").find(".btn-simple").first().removeClass("btn-danger");
            $("#winModal").find(".btn-simple").first().addClass("btn-success");
            $("#winModal").find(".btn-simple").first().html("Si, Cambiar");
            $("#winTitulo").html("Desea "+texto+" al usuario <strong>"+data[3]+"</strong>");
            e.preventDefault();
        });
        // Delete
        table.on('click', '.remove', function(e){
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            var id = $(this).attr("data-id");
            $("#id").val(id);
            $("#estatus").val(2);
            $("#winTitulo").html("Desea Eliminar al usuario <strong>"+data[3]+"</strong>");
            $("#winModal").find(".btn-simple").first().removeClass("btn-success");
            $("#winModal").find(".btn-simple").first().addClass("btn-danger");
            $("#winModal").find(".btn-simple").first().html("Si, Eliminar");
            e.preventDefault();
        });
        $('body').find(".pagination").addClass("pagination-success");
        $('.card .material-datatables label').addClass('form-group has-success');
    });
</script>
{/literal}