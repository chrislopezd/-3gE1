<?php /* Smarty version Smarty-3.1.13, created on 2016-09-19 19:38:18
         compiled from "application_content/views/templates/solpdf/solPdfFooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31268859857ddc746087d62-76566876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '523d71d98dd8a6b5eb61a7aa0dca892c51630ba9' => 
    array (
      0 => 'application_content/views/templates/solpdf/solPdfFooter.tpl',
      1 => 1474303758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31268859857ddc746087d62-76566876',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57ddc7460a21c1_65379611',
  'variables' => 
  array (
    'ESTATUS' => 0,
    'FJUST' => 0,
    'iniCaptura' => 0,
    'iniValida' => 0,
    'PAGENO' => 0,
    'nb' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ddc7460a21c1_65379611')) {function content_57ddc7460a21c1_65379611($_smarty_tpl) {?><div class="wrapper">
    <table style="width:100%" border="0">
        <tr>
            <td style="width:50%;font-size:7pt;" align="left"><i>
               <?php if ($_smarty_tpl->tpl_vars['ESTATUS']->value==3||$_smarty_tpl->tpl_vars['ESTATUS']->value==6||$_smarty_tpl->tpl_vars['ESTATUS']->value==7){?>
               <div style="float:right;font-size:8pt;"><i>Justificado por la Dirección de Planeación</i>&nbsp;&nbsp;&nbsp;<i>Fecha de validación: <?php echo $_smarty_tpl->tpl_vars['FJUST']->value;?>
</i></div>
               <?php }?>
            </td>
            <td style="width:40%;font-size:7pt;" align="left"><i>
                <?php if ($_smarty_tpl->tpl_vars['iniCaptura']->value!=''){?><span><?php echo $_smarty_tpl->tpl_vars['iniCaptura']->value;?>
</span><?php }?><?php if ($_smarty_tpl->tpl_vars['iniValida']->value!=''){?> / <span><?php echo $_smarty_tpl->tpl_vars['iniValida']->value;?>
</span><?php }?></i>
            </td>
            <td style="width:10%;text-align:right;" align="right">
                <div style="float:right;font-size:8pt;"><i>Página <?php echo $_smarty_tpl->tpl_vars['PAGENO']->value;?>
 de <?php echo $_smarty_tpl->tpl_vars['nb']->value;?>
</i></div>
            </td>
        </tr>
    </table>
</div><?php }} ?>