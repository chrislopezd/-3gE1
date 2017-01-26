<?php /* Smarty version Smarty-3.1.13, created on 2017-01-26 06:51:29
         compiled from "application_content/views/templates/forms/usuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175334198058897c2192b957-95086029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2954045e086e92ca50a998c1f84a7a39f4ec22a0' => 
    array (
      0 => 'application_content/views/templates/forms/usuarios.tpl',
      1 => 1485409875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175334198058897c2192b957-95086029',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58897c219629e9_23931364',
  'variables' => 
  array (
    'bread' => 0,
    'PERFILES' => 0,
    'res' => 0,
    'idPerfil' => 0,
    'BENEFICIADOS' => 0,
    'idTipo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58897c219629e9_23931364')) {function content_58897c219629e9_23931364($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("design/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .moving-tab{
        width: 100%;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="rose" id="wizardProfile">
                    <form action="" method="">
                        <div class="wizard-navigation">
                            <ul>
                                <li>
                                    <a href="#info" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['bread']->value;?>
</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="info">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de perfil</label>
                                                 <select name="perfil" id="perfil" class="form-control" data-style="select-with-transition" data-size="10">
                                                  <?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PERFILES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['res']->key;
?>
                                                      <option value="<?php echo $_smarty_tpl->tpl_vars['res']->value['idPerfilUsuario'];?>
" <?php if ($_smarty_tpl->tpl_vars['res']->value['idPerfilUsuario']==$_smarty_tpl->tpl_vars['idPerfil']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['res']->value['nombrePerfilUsuario'];?>
</option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de beneficiado</label>
                                                 <select name="perfil" id="perfil" class="form-control" data-style="select-with-transition" data-size="10">
                                                  <?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['BENEFICIADOS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['res']->key;
?>
                                                      <option value="<?php echo $_smarty_tpl->tpl_vars['res']->value['idTipo'];?>
" <?php if ($_smarty_tpl->tpl_vars['res']->value['idTipo']==$_smarty_tpl->tpl_vars['idTipo']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['res']->value['tipo'];?>
</option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                             <div class="form-group label-floating">
                                                <label class="control-label">Breve descripción del programa
                                                    <small style="color:red">*</small>
                                                </label>
                                                <textarea class="form-control" name="observaciones" id="observaciones"  rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                             <div class="form-group label-floating">
                                                <label class="control-label">Usuario
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input name="usuario" id="usuario" maxlength="20" autocomplete="off" type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Contraseña
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input type="password" name="contrasena" id="contrasena"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Repetir contraseña
                                                    <small style="color:red">*</small>
                                                </label>
                                                <input type="password" name="contrasena" id="contrasena"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                           <div class="text-center">
                                <button type='button' class='btn btn-finish btn-fill btn-rose btn-wd btn-lg' name='finish'><i class="material-icons">save</i> Guardar</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("design/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>
<?php }} ?>