<?php /* Smarty version Smarty-3.1.13, created on 2017-01-27 02:35:45
         compiled from "application_content\views\templates\inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74495712d06408abb8-05257863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf7305a3082b3c2bd478011cb496c8860eee413a' => 
    array (
      0 => 'application_content\\views\\templates\\inicio.tpl',
      1 => 1485480827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74495712d06408abb8-05257863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5712d064207b49_15411493',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5712d064207b49_15411493')) {function content_5712d064207b49_15411493($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("design/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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