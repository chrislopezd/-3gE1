<?php /* Smarty version Smarty-3.1.13, created on 2016-06-17 17:37:03
         compiled from "application_content\views\templates\solpdf\solPdfFooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:282085749f9c65506f5-41847913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da97eb6ea44edf4839bb23b1b3686c9a1422b2be' => 
    array (
      0 => 'application_content\\views\\templates\\solpdf\\solPdfFooter.tpl',
      1 => 1466200110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '282085749f9c65506f5-41847913',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5749f9c6557546_39399102',
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
<?php if ($_valid && !is_callable('content_5749f9c6557546_39399102')) {function content_5749f9c6557546_39399102($_smarty_tpl) {?><div class="wrapper">
    <table style="width:100%" border="0">
        <tr>
            <td style="width:50%;font-size:7pt;" align="left"><i>
               <?php if ($_smarty_tpl->tpl_vars['ESTATUS']->value==3){?>
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