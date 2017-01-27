{include file="design/header.tpl"}


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
                           <a href="#" class="btn btn-round btn-success">
                                <i class="material-icons">add_box</i>
                                Nuevo beneficiario
                            </a>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                {if $st_idTipo == 1}
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}
                                {if $st_idTipo == 2}
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}
                                {if $st_idTipo == 3}
                                    <tr>
                                        <th>#</th>
                                        <th>CLAVE CT</th>
                                        <th>NOMBRE CT</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}
                                {if $st_idTipo == 4}
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}

                                </thead>
                                <tfoot>
                                    {if $st_idTipo == 1}
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}
                                {if $st_idTipo == 2}
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}
                                {if $st_idTipo == 3}
                                    <tr>
                                        <th>#</th>
                                        <th>CLAVE CT</th>
                                        <th>NOMBRE CT</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}
                                {if $st_idTipo == 4}
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                {/if}
                                </tfoot>
                                <tbody>
                                    {foreach from=$LISTADO key=key item=arrList}
                                    {if $st_idTipo == 1}
                                        <tr>
                                            <td>{$key +1}</td>
                                            <td>{$arrList['curp']}</td>
                                            <td>{$arrList['nombreCompleto']}</td>
                                            <td>{$arrList['correo']}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    {/if}
                                    {if $st_idTipo == 2}
                                        <tr>
                                            <td>{$key +1}</td>
                                            <td>{$arrList['curp']}</td>
                                            <td>{$arrList['nombreCompleto']}</td>
                                            <td>{$arrList['correo']}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    {/if}
                                    {if $st_idTipo == 3}
                                        <tr>
                                            <td>{$key +1}</td>
                                            <td>{$arrList['CLAVECCT']}</td>
                                            <td>{$arrList['NOMBRECT']}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    {/if}
                                    {if $st_idTipo == 4}
                                        <tr>
                                            <td>{$key +1}</td>
                                            <td>{$arrList['curp']}</td>
                                            <td>{$arrList['nombreCompleto']}</td>
                                            <td>{$arrList['correo']}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    {/if}

                                    {/foreach}
                                </tbody>
                            </table>
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


{include file="design/footer.tpl"}
{literal}
<script type="text/javascript">
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

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });
        $('body').find(".pagination").addClass("pagination-success");

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
{/literal}