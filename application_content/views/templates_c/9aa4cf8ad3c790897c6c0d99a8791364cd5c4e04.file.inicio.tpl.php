<?php /* Smarty version Smarty-3.1.13, created on 2017-01-25 08:14:17
         compiled from "application_content/views/templates/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20421494325751c9eff0f0d7-67989750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9aa4cf8ad3c790897c6c0d99a8791364cd5c4e04' => 
    array (
      0 => 'application_content/views/templates/inicio.tpl',
      1 => 1485328450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20421494325751c9eff0f0d7-67989750',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5751c9f00e65a9_24344868',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751c9f00e65a9_24344868')) {function content_5751c9f00e65a9_24344868($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("design/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="green">
                                <i class="material-icons">language</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Bienvenido al sistema.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php echo $_smarty_tpl->getSubTemplate ("design/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>