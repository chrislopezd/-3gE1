<?php /* Smarty version Smarty-3.1.13, created on 2017-01-27 04:29:57
         compiled from "application_content\views\templates\beneficiados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32376588aa4ea88f1d6-60962656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b318e61ae24f1164227a419a035d5edf9ab2c8f' => 
    array (
      0 => 'application_content\\views\\templates\\beneficiados.tpl',
      1 => 1485487795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32376588aa4ea88f1d6-60962656',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_588aa4ea907c25_96745854',
  'variables' => 
  array (
    'st_idTipo' => 0,
    'LISTADO' => 0,
    'key' => 0,
    'arrList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588aa4ea907c25_96745854')) {function content_588aa4ea907c25_96745854($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("design/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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
                                <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==1){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==2){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==3){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CLAVE CT</th>
                                        <th>NOMBRE CT</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==4){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>

                                </thead>
                                <tfoot>
                                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==1){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==2){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==3){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CLAVE CT</th>
                                        <th>NOMBRE CT</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==4){?>
                                    <tr>
                                        <th>#</th>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="disabled-sorting text-right">Acciones</th>
                                    </tr>
                                <?php }?>
                                </tfoot>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['arrList'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arrList']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LISTADO']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arrList']->key => $_smarty_tpl->tpl_vars['arrList']->value){
$_smarty_tpl->tpl_vars['arrList']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['arrList']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==1){?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['curp'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['nombreCompleto'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['correo'];?>
</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==2){?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['curp'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['nombreCompleto'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['correo'];?>
</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==3){?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['CLAVECCT'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['NOMBRECT'];?>
</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['st_idTipo']->value==4){?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['curp'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['nombreCompleto'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['arrList']->value['correo'];?>
</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }?>

                                    <?php } ?>
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


<?php echo $_smarty_tpl->getSubTemplate ("design/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
<?php }} ?>