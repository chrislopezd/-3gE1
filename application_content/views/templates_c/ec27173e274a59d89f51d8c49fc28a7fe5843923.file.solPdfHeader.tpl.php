<?php /* Smarty version Smarty-3.1.13, created on 2016-09-18 00:44:22
         compiled from "application_content/views/templates/solpdf/solPdfHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76389309957ddc746074ed5-52746346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec27173e274a59d89f51d8c49fc28a7fe5843923' => 
    array (
      0 => 'application_content/views/templates/solpdf/solPdfHeader.tpl',
      1 => 1467136270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76389309957ddc746074ed5-52746346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nivel' => 0,
    'folio' => 0,
    'fechaDown' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57ddc746083244_50583573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ddc746083244_50583573')) {function content_57ddc746083244_50583573($_smarty_tpl) {?><div class="wrapper">
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