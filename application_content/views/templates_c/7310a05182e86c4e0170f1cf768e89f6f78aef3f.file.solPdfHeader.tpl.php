<?php /* Smarty version Smarty-3.1.13, created on 2016-06-28 12:55:43
         compiled from "application_content\views\templates\solpdf\solPdfHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121475749f9c6538397-30086691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7310a05182e86c4e0170f1cf768e89f6f78aef3f' => 
    array (
      0 => 'application_content\\views\\templates\\solpdf\\solPdfHeader.tpl',
      1 => 1467136268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121475749f9c6538397-30086691',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5749f9c65437a7_59330077',
  'variables' => 
  array (
    'nivel' => 0,
    'folio' => 0,
    'fechaDown' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5749f9c65437a7_59330077')) {function content_5749f9c65437a7_59330077($_smarty_tpl) {?><div class="wrapper">
    <table class="headding" style="width:100%;" border="0">
        <tr>
          <td style="width:20%;"><br/><img src="resources/images/logopdf.png" alt="SEGEY" style="width:160px;"></td>
            <td style="width:78%;" class="center"><h4>GOBIERNO DEL ESTADO DE YUCATÁN<br/>SECRETARÍA DE EDUCACIÓN - DIRECCIÓN DE PLANEACIÓN<br/><?php echo $_smarty_tpl->tpl_vars['nivel']->value;?>
<div style="color:#A6A6A6;font-size:9pt">CANCELACIÓN / CREACIÓN / CONVERSIÓN</div></h4></td>
          <td style="width:12%;" class="right"><br/><br/><br/><br/><div><b><?php echo $_smarty_tpl->tpl_vars['folio']->value;?>
</b></div></td>
       </tr>
       <tr>
          <td colspan="3" class="right" style="font-size:8pt;" align="right">Mérida, Yucatán a <?php echo $_smarty_tpl->tpl_vars['fechaDown']->value;?>
</td>
       </tr>
    </table>
</div><?php }} ?>