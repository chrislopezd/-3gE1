<?php /* Smarty version Smarty-3.1.13, created on 2016-09-26 22:45:56
         compiled from "application_content/views/templates/load/notify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27780426357e1e9cfa47079-88327641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '660f1c4de538f453f7259df8c0cf88b09720bd26' => 
    array (
      0 => 'application_content/views/templates/load/notify.tpl',
      1 => 1474922731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27780426357e1e9cfa47079-88327641',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57e1e9cfa9afb1_59339034',
  'variables' => 
  array (
    'LISTADO' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e1e9cfa9afb1_59339034')) {function content_57e1e9cfa9afb1_59339034($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['LISTADO']->value)){?>
	<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTADO']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?>
    <li>
    	<a href="javascript:void(0);" onclick="editarNotificacion(<?php echo $_smarty_tpl->tpl_vars['res']->value['idSol'];?>
,<?php echo $_smarty_tpl->tpl_vars['res']->value['idEstatus'];?>
,<?php echo $_smarty_tpl->tpl_vars['res']->value['id_hist'];?>
)">
			<div style="height:20px;">
            	<span>
            		<i class="fa fa-user" aria-hidden="true"></i>
            		<b><?php echo $_smarty_tpl->tpl_vars['res']->value['nombre'];?>
</b>
            	</span>
            </div>
            <div style="height:20px;">
                <small>
                	<i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['res']->value['folio'];?>

                    [  <span class="text-muted" style="font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['res']->value['estatus'];?>
</span>  ]
                </small>
            </div>
            <div style="height:20px;">
            	<small class="text-muted" style="color:#1ab394 !important;">
            		<i class="fa fa-clock-o" aria-hidden="true"></i>Fecha: <?php echo $_smarty_tpl->tpl_vars['res']->value['fecha'];?>
 <?php echo $_smarty_tpl->tpl_vars['res']->value['hora'];?>

            	</small>
            </div>
             <div style="height:20px;">
            	 <small>
                	
                </small>
            </div>
            <div style="clear:both"></div>
    	</a>
	</li>
	<li class="divider"></li>
	<?php } ?>
<?php }?>
<?php }} ?>