<?php /* Smarty version Smarty-3.1.13, created on 2016-05-18 16:32:26
         compiled from "application_content\views\templates\nivel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96285713c66ee004c1-65176234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e79cf79d9c51cd56fa90b62bbbfb6123cf36821' => 
    array (
      0 => 'application_content\\views\\templates\\nivel.tpl',
      1 => 1461262153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96285713c66ee004c1-65176234',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5713c66ee34a51_37025845',
  'variables' => 
  array (
    'token' => 0,
    'nivel' => 0,
    'clase' => 0,
    'panel' => 0,
    'dimensiones' => 0,
    'res' => 0,
    'parametros' => 0,
    'rp' => 0,
    'indicadores' => 0,
    'ri' => 0,
    'bibliografias' => 0,
    'rb' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5713c66ee34a51_37025845')) {function content_5713c66ee34a51_37025845($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="resources/css/animate.css" rel="stylesheet">
<br/>
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['token']->value['token_name'];?>
" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value['token'];?>
">
<div class="container">
    <div class="row">	
    	<div class="col-lg-12">
	        <div id="bc1" class="btn-group btn-breadcrumb">
	            <a href="inicio" title="Inicio" class="btn btn-default"><i class="icon icon-home"></i></a>
	            <a href="perfilDocenteEducacionBasica" title="Perfil Docente de Educación Básica" class="btn btn-default"><div>Perfil Docente de Educación Básica</div></a>
	            <a href="#" class="btn btn-default disabled"><div><?php echo $_smarty_tpl->tpl_vars['nivel']->value;?>
</div></a>
	        </div>
        </div>
	</div>
</div>
<br/>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-4 user-details">                    
        </div>
	</div>
</div>
<div class="container">	
	<div class="wrapper wrapper-content animated fadeInRight gray-bg">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content">
						<div class="center">
	                    	<h2><span class="text-navy">EVALUACIÓN DEL DESEMPEÑO</span></h2>
	                    </div>
						<h4><strong>Introducción</strong></h4>
	                    <p>
	                        El presente documento tiene la finalidad de ofrecer una antología con los textos que integran la bibliografía básica para el estudio de la etapa 3 <strong>Examen de conocimientos y competencias didácticas que favorecen el aprendizaje de los alumnos.</strong>
	                    </p>
	                    <p>
	                    	Antes de revisar dicha bibliografía, es importante plantear que la calidad de las prácticas de enseñanza de los docentes y técnicos docentes es uno de los factores escolares que tiene mayor incidencia en el aprendizaje de los alumnos. Es por ello que para mejorar el servicio educativo que se ofrece en las escuelas de Educación Básica, se hace necesario fortalecer los conocimientos y las competencias didácticas de los docentes y técnicos docentes en servicio, en primer lugar mediante la detección de fortalezas y aspectos a mejorar en su quehacer educativo a través de la evaluación de su desempeño, y en segundo lugar con la puesta en práctica de distintas acciones de formación, asesoría y acompañamiento.
	                    </p>
	                    <p>
	                    	Con la intención de atender los propósitos, características y condiciones en que se desarrolla la Evaluación del Desempeño, la Secretaría de Educación Pública (SEP), en vinculación con el Instituto Nacional para la Evaluación de la Educación (INEE), establecieron etapas, entendidas como los momentos secuenciales en que se llevará este proceso de evaluación para docentes y técnicos docentes.
	                    </p>
						<p>
							Este documento considera en específico a la Etapa 3 titulada <strong>“Examen de conocimientos y competencias didácticas que favorecen el aprendizaje de los alumnos”</strong>, referida a  dar cuenta, entre otros elementos, de la capacidad del docente o técnico docente para afrontar y resolver con éxito diversas situaciones de la práctica profesional. En esta etapa, la aplicación de un examen basado en casos permite dar cuenta de los conocimientos y competencias que el docente y técnico docente ponen en juego para resolver situaciones hipotéticas de la práctica educativa, basadas en situaciones reales y contextualizadas para facilitar su comprensión. Para ello, el docente y técnico docente, deberá revisar, analizar y reflexionar sobre textos que componen la bibliografía básica para el estudio.
						</p>
						<p>
							La bibliografía tiene como referente el Perfil, Parámetros e Indicadores para docentes y técnicos docentes en Educación Básica aprobados por el INEE. Dicho perfil está constituido por cinco dimensiones en las que se consideran los aspectos de la función docente establecidos en el Artículo 14 de la LGSPD.
						</p>
						<p>
							De las dimensiones del perfil se derivan parámetros que describen aspectos del saber y del quehacer docente. A su vez, a cada parámetro le corresponde un conjunto de indicadores que señalan el nivel y las formas en que tales saberes y quehaceres se concretan.
						</p>
						<p>
							En las siguientes páginas se podrá encontrar la bibliografía básica para el estudio de cada nivel educativo, así como su correspondencia con los parámetros e indicadores que serán evaluados específicamente en cada dimensión.
						</p>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="clear"></div>
	<br/>

		
	<div class="user-info-block">                
        <ul class="navigation <?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
1">
            <li class="active">
                <a class="<?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
2" data-toggle="tab" href="#information" style="text-decoration:none">
                    <?php echo $_smarty_tpl->tpl_vars['nivel']->value;?>

                </a>
            </li>            
        </ul>
        <div class="user-body">
            <div class="tab-content">
                <div id="information" class="tab-pane active">
                	<br/>
                    <div class="panel panel-<?php echo $_smarty_tpl->tpl_vars['panel']->value;?>
">
				        <div class="panel-heading">
				            <h2 class="panel-title">Perfil del Docente de <?php echo $_smarty_tpl->tpl_vars['nivel']->value;?>
</h2>
				        </div>   
				        <ul class="list-group">
				        	<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['dimensiones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['res']->key;
?>
				            <li class="list-group-item">
				                <div class="row toggle manita" id="dropdown-detail-<?php echo $_smarty_tpl->tpl_vars['res']->value['id'];?>
" data-toggle="detail-<?php echo $_smarty_tpl->tpl_vars['res']->value['id'];?>
">
				                    <div class="col-xs-10 negritas">
				                       <?php echo $_smarty_tpl->tpl_vars['res']->value['dimension'];?>
<br/> <?php echo $_smarty_tpl->tpl_vars['res']->value['texto'];?>

				                    </div>
				                    <div class="col-xs-2"><span class="glyphicon glyphicon-chevron-down pull-right"></span></div>
				                </div>
				                <div id="detail-<?php echo $_smarty_tpl->tpl_vars['res']->value['id'];?>
">
				                    <div class="container">
				                        <div class="fluid-row">
											<?php  $_smarty_tpl->tpl_vars['rp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rp']->_loop = false;
 $_smarty_tpl->tpl_vars['kp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['parametros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rp']->key => $_smarty_tpl->tpl_vars['rp']->value){
$_smarty_tpl->tpl_vars['rp']->_loop = true;
 $_smarty_tpl->tpl_vars['kp']->value = $_smarty_tpl->tpl_vars['rp']->key;
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['id']==$_smarty_tpl->tpl_vars['rp']->value['dimension']){?>
					                        <div class="col-xs-11">
												<table class="table table-striped custab">
													<thead>
														<tr>
															<th class="col-lg-4 center <?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
">PARÁMETROS</th>
															<th class="col-lg-4 center <?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
">INDICADORES A EVALUAR</th>
															<th class="col-lg-4 center <?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
">BIBLIOGRAFÍA BÁSICA</th>
														</tr>
													</thead>
													<tr>
														<td class="negritas"><?php echo $_smarty_tpl->tpl_vars['rp']->value['parametros'];?>
</td>
														<td>
															<?php  $_smarty_tpl->tpl_vars['ri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ri']->_loop = false;
 $_smarty_tpl->tpl_vars['ki'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['indicadores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ri']->key => $_smarty_tpl->tpl_vars['ri']->value){
$_smarty_tpl->tpl_vars['ri']->_loop = true;
 $_smarty_tpl->tpl_vars['ki']->value = $_smarty_tpl->tpl_vars['ri']->key;
?>
															<?php if ($_smarty_tpl->tpl_vars['res']->value['id']==$_smarty_tpl->tpl_vars['ri']->value['dimension']&&$_smarty_tpl->tpl_vars['rp']->value['id']==$_smarty_tpl->tpl_vars['ri']->value['idParametro']){?>
															<ul class="list-group">
																<li class="list-group-item">
																	<?php echo $_smarty_tpl->tpl_vars['ri']->value['indicador'];?>

																</li>
															</ul>
															<?php }?>
															<?php } ?>
														</td>
														<td>
															<?php  $_smarty_tpl->tpl_vars['rb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rb']->_loop = false;
 $_smarty_tpl->tpl_vars['kb'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bibliografias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rb']->key => $_smarty_tpl->tpl_vars['rb']->value){
$_smarty_tpl->tpl_vars['rb']->_loop = true;
 $_smarty_tpl->tpl_vars['kb']->value = $_smarty_tpl->tpl_vars['rb']->key;
?>
															<?php if ($_smarty_tpl->tpl_vars['res']->value['id']==$_smarty_tpl->tpl_vars['rb']->value['dimension']&&$_smarty_tpl->tpl_vars['rp']->value['id']==$_smarty_tpl->tpl_vars['rb']->value['idParametro']){?>
															<ul class="list-group">
																<li class="list-group-item">
																	<a href="#" class="btnDownload" data-ruta="<?php echo $_smarty_tpl->tpl_vars['rb']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['rb']->value['bibliografia'];?>
</a>
																</li>
															</ul>
															<?php }?>
															<?php } ?>
														</td>
													</tr>
												</table>
											</div>
											<?php }?>
											<?php } ?>
				                        </div>
				                    </div>
				                </div>
				            </li>
				           <?php } ?>
				        </ul>
					</div>
                </div>               
            </div>
        </div>
    </div>
	<div class="clear"></div>	
<div class="scrollTop"><span class="glyphicon glyphicon-chevron-up"></span></div>
</div>
<br/><br/>
<script src="resources/plugs/pace/pace.min.js"></script>
<script src="resources/plugs/menu.js"></script>
<script type="text/javascript">
$().ready( function (){
	$('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
    $(".btnDownload").click( function(){
    	event.preventDefault();
    	var _ruta = $.trim($(this).attr("data-ruta"));
    	var _token = $("#token").val();
    	if(_ruta != ""){  		
    		var div = $("<div><form name='formView' id='formView' method='post' action='descarga'><input type='hidden' name='ruta' value='"+_ruta+"' /><input type='hidden' name='csrf_eva_tok_name' value='"+_token+"' /></form></div>");
		    $('body').append(div);
		    $('body').find("#formView").submit();
		    $('body').find("#formView").remove();
    	}
    });
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>