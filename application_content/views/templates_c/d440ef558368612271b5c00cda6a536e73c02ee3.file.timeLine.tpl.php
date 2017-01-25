<?php /* Smarty version Smarty-3.1.13, created on 2016-09-18 02:34:54
         compiled from "application_content/views/templates/load/timeLine.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70075454357dde12ea1b937-72914699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd440ef558368612271b5c00cda6a536e73c02ee3' => 
    array (
      0 => 'application_content/views/templates/load/timeLine.tpl',
      1 => 1474156430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70075454357dde12ea1b937-72914699',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DATOS' => 0,
    'key' => 0,
    'arrayVal' => 0,
    'back' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57dde12eaa1888_14797729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dde12eaa1888_14797729')) {function content_57dde12eaa1888_14797729($_smarty_tpl) {?><div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
    <?php if (isset($_smarty_tpl->tpl_vars['back'])) {$_smarty_tpl->tpl_vars['back'] = clone $_smarty_tpl->tpl_vars['back'];
$_smarty_tpl->tpl_vars['back']->value = ''; $_smarty_tpl->tpl_vars['back']->nocache = null; $_smarty_tpl->tpl_vars['back']->scope = 0;
} else $_smarty_tpl->tpl_vars['back'] = new Smarty_variable('', null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['arrayVal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arrayVal']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['DATOS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arrayVal']->key => $_smarty_tpl->tpl_vars['arrayVal']->value){
$_smarty_tpl->tpl_vars['arrayVal']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['arrayVal']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?><?php if (isset($_smarty_tpl->tpl_vars['back'])) {$_smarty_tpl->tpl_vars['back'] = clone $_smarty_tpl->tpl_vars['back'];
$_smarty_tpl->tpl_vars['back']->value = $_smarty_tpl->tpl_vars['arrayVal']->value['tipo']; $_smarty_tpl->tpl_vars['back']->nocache = null; $_smarty_tpl->tpl_vars['back']->scope = 0;
} else $_smarty_tpl->tpl_vars['back'] = new Smarty_variable($_smarty_tpl->tpl_vars['arrayVal']->value['tipo'], null, 0);?><?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['back']->value==$_smarty_tpl->tpl_vars['arrayVal']->value['tipo']&&$_smarty_tpl->tpl_vars['arrayVal']->value['tipo']=='Planeación'){?>
            <div class="vertical-timeline-block">
            </div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['back'])) {$_smarty_tpl->tpl_vars['back'] = clone $_smarty_tpl->tpl_vars['back'];
$_smarty_tpl->tpl_vars['back']->value = $_smarty_tpl->tpl_vars['arrayVal']->value['tipo']; $_smarty_tpl->tpl_vars['back']->nocache = null; $_smarty_tpl->tpl_vars['back']->scope = 0;
} else $_smarty_tpl->tpl_vars['back'] = new Smarty_variable($_smarty_tpl->tpl_vars['arrayVal']->value['tipo'], null, 0);?>
    <div class="vertical-timeline-block">
        <?php if ($_smarty_tpl->tpl_vars['arrayVal']->value['estatus']=='Iniciado'){?>
            <div class="vertical-timeline-icon lazur-bg">
                <i class="fa fa-file-text"></i>
            </div>
        <?php }?>        
        <?php if ($_smarty_tpl->tpl_vars['arrayVal']->value['estatus']=='Enviado'){?>
            <div class="vertical-timeline-icon yellow-bg">
                <i class="fa fa-undo"></i>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['arrayVal']->value['estatus']=='Justifica'||$_smarty_tpl->tpl_vars['arrayVal']->value['estatus']=='Finalizado'){?>
            <div class="vertical-timeline-icon navy-bg">
                <i class="fa fa-thumbs-up"></i>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['arrayVal']->value['estatus']=='Cancelado'){?>
            <div class="vertical-timeline-icon" style="background:red">
                <i class="fa fa-thumbs-down"></i>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['arrayVal']->value['estatus']=='No Justifica'||$_smarty_tpl->tpl_vars['arrayVal']->value['estatus']=='No Procede'){?>
            <div class="vertical-timeline-icon" style="background:red">
                <i class="fa fa-thumbs-down"></i>
            </div>
        <?php }?>
        <div class="vertical-timeline-content">
            <h2><?php echo $_smarty_tpl->tpl_vars['arrayVal']->value['nombre'];?>
</h2>
            <p><?php echo $_smarty_tpl->tpl_vars['arrayVal']->value['observacion'];?>

            </p>
            <span class="vertical-date">
                <div class="date" style="color:#676a6c"><?php echo $_smarty_tpl->tpl_vars['arrayVal']->value['estatus'];?>
</div>
                <?php echo $_smarty_tpl->tpl_vars['arrayVal']->value['fecha'];?>
 <br>
                <small><?php echo $_smarty_tpl->tpl_vars['arrayVal']->value['hora'];?>
</small>
            </span>
        </div>
    </div>
    <?php } ?>
</div><?php }} ?>