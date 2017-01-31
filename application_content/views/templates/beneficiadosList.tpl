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
                <td>{$key +1}
                <input type="hidden" name="pIdPersona" value="{$arrList['idPersona']}">
                <input type="hidden" name="pCurp" value="{$arrList['curp']}">
                <input type="hidden" name="pClaveCT" value="{$arrList['clavecct']}">
                <input type="hidden" name="pNombre" value="{$arrList['nombre']}">
                <input type="hidden" name="pApePat" value="{$arrList['apellidop']}">
                <input type="hidden" name="pApeMat" value="{$arrList['apellidom']}">
                <input type="hidden" name="pCorreo" value="{$arrList['correo']}">
                <input type="hidden" name="pTelefono" value="{$arrList['telefono']}">
                <input type="hidden" name="pDireccion" value="{$arrList['direccion']}">
                <input type="hidden" name="pCodPos" value="{$arrList['codpos']}">
                <input type="hidden" name="pMunicipio" value="{$arrList['municipio']}">
                <input type="hidden" name="pLocalidad" value="{$arrList['localidad']}"></td>
                <td>{$arrList['curp']}</td>
                <td>{$arrList['nombreCompleto']}</td>
                <td>{$arrList['correo']}</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-success btn-round edit" data-id="1">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" data-toggle="modal" data-target="#eliminarBeneModal" class="btn btn-danger btn-round remove" data-idSol = "{$arrList['idSol']}">
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
                    <button type="button" rel="tooltip" class="btn btn-success btn-round edit" data-id="1">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" data-toggle="modal" data-target="#eliminarBeneModal" class="btn btn-danger btn-round remove" data-idSol = "{$arrList['idSol']}">
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
                    <button type="button" rel="tooltip" data-toggle="modal" data-target="#eliminarBeneModal" class="btn btn-danger btn-round remove" data-idSol = "{$arrList['idSol']}">
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
                    <button type="button" rel="tooltip" class="btn btn-success btn-round edit" data-id="1">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" data-toggle="modal" data-target="#eliminarBeneModal" class="btn btn-danger btn-round remove" data-idSol = "{$arrList['idSol']}">
                        <i class="material-icons">close</i>
                    </button>
                </td>
            </tr>
        {/if}

        {/foreach}
    </tbody>
</table>

{literal}
<script type="text/javascript">
    $(document).ready(function() {

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [50, 100, 150, -1],
                [50, 100, 150, "Todos"]
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
            pIdPersona = $(this).closest('tr').find('input[name = "pIdPersona"]').val();
            pCurp = $(this).closest('tr').find('input[name = "pCurp"]').val();
            pClaveCT = $(this).closest('tr').find('input[name = "pClaveCT"]').val();
            pNombre = $(this).closest('tr').find('input[name = "pNombre"]').val();
            pApePat = $(this).closest('tr').find('input[name = "pApePat"]').val();
            pApeMat = $(this).closest('tr').find('input[name = "pApeMat"]').val();
            pCorreo = $(this).closest('tr').find('input[name = "pCorreo"]').val();
            pTelefono = $(this).closest('tr').find('input[name = "pTelefono"]').val();
            pDireccion = $(this).closest('tr').find('input[name = "pDireccion"]').val();
            pCodPos = $(this).closest('tr').find('input[name = "pCodPos"]').val();
            pMunicipio = $(this).closest('tr').find('input[name = "pMunicipio"]').val();
            pLocalidad = $(this).closest('tr').find('input[name = "pLocalidad"]').val();

            $('#localidadPersona').html($('#localidadPersonaBACK').html());
            $('#localidadPersona').find('option').each(function(ind, ele){
                if($(ele).attr('data-MUN') == pMunicipio){
                    $(ele).show();
                }
                else{
                    $(ele).remove();
                }
            });
            if(pMunicipio != ''){$('#municipioPersona').val(pMunicipio);}
            else{$('#municipioPersona').val(null);}

            if(pLocalidad != ''){$('#localidadPersona').val(pLocalidad);}
            else{$('#localidadPersona').val(null);}

            centros = pClaveCT;
            if(centros.length > 0){
                $('#centroPersona').find('option').remove();
                $('#beneCT').val(pClaveCT);
                $.each(centros, function( index, value ) {
                    $('#centroPersona').append('<option>'+value+'</option>');
                });
            }
            $('#curpPersona').val(pCurp);
            $('#nombrePersona').val(pNombre);
            $('#apellidoPPersona').val(pApePat);
            $('#apellidoMPersona').val(pApeMat);
            $('#correoPersona').val(pCorreo);
            $('#telefonoPersona').val(pTelefono);
            $('#direccionPersona').val(pDireccion);

            $('#codposPersona').val(pCodPos);

            $('#mostrarAgregarNuevoView').find('div').removeClass('is-empty');

            $('#mostrarAgregarNuevo').trigger('click');
            return false;

            //var data = table.row($tr).data();
            //alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $("#idSol").val($(this).attr('data-idSol'));
            /*$tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();*/
        });
        $('body').find(".pagination").addClass("pagination-success");

        $('.card .material-datatables label').addClass('form-group');
    });
</script>

{/literal}