<?php /* Smarty version Smarty-3.1.13, created on 2016-06-28 16:34:59
         compiled from "application_content\views\templates\inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74495712d06408abb8-05257863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf7305a3082b3c2bd478011cb496c8860eee413a' => 
    array (
      0 => 'application_content\\views\\templates\\inicio.tpl',
      1 => 1467149647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74495712d06408abb8-05257863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5712d064207b49_15411493',
  'variables' => 
  array (
    'token' => 0,
    'st_fechaUA' => 0,
    'st_idPerfil' => 0,
    'perfil' => 0,
    'isActive' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5712d064207b49_15411493')) {function content_5712d064207b49_15411493($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("design/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
.table-responsive{  
    overflow-x: inherit !important;
}
</style>
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['token']->value['token_name'];?>
" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value['token'];?>
">
<input type="hidden" name="fua" id="fua" value="<?php echo $_smarty_tpl->tpl_vars['st_fechaUA']->value;?>
">
<section id="right-content-wrapper">
	<section class="page-content animated fadeInUp">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li><i class="fa fa-home disabled" aria-hidden="true"></i></li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default" id="divFilter" style="display:none">
					<div class="panel-heading">
						<header><i class="fa fa-filter" aria-hidden="true"></i> Filtros</header>
						<div class="panel-heading-tools">
							<div class="btn-group">
								<a class="btn btn-icon-toggle panel-tools-collapse btnFilter"><i class="material-icons">expand_more</i></a>
								<a class="btn btn-icon-toggle panel-tools-close btnFilters"><i class="material-icons">close</i></a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
				            <div class="col-xs-6 <?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>col-sm-1<?php }else{ ?>col-sm-2<?php }?> form-group">
				            	<p id="txtFilterFolio"></p>
				            </div>
				            <div class="col-xs-6 col-sm-3 form-group">
				            	<p id="txtFilterNivel"></p>
					        </div>
					        <?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>
					        <div class="col-xs-6 col-sm-2 form-group">
				            	<p id="txtFilterSubNivel"></p>
					        </div>
					        <?php }?>
				            <div class="col-xs-6 <?php if ($_smarty_tpl->tpl_vars['st_idPerfil']->value==1){?>col-sm-2<?php }else{ ?>col-sm-3<?php }?> form-group">
					        	<p id="txtFilterCaptura"></p>
					        </div>
					        <div class="col-xs-6 col-sm-2 form-group">
					        	<p id="txtFilterFecha"></p>
					        </div>
					        <div class="col-xs-6 col-sm-2 form-group">
				            	<p id="txtFilterEstatus"></p>
					        </div>
				        </div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<header>
							<?php if ($_smarty_tpl->tpl_vars['perfil']->value==1||($_smarty_tpl->tpl_vars['st_idPerfil']->value==1||$_smarty_tpl->tpl_vars['st_idPerfil']->value==2)){?>
							<?php if ($_smarty_tpl->tpl_vars['isActive']->value){?>
							<div class="col-sm-12">
								<a href="nuevoRegistro" class="btn btn-floating-action btn-primary" data-toggle="tooltip" data-placement="right" title="Nuevo registro">
									<i class="material-icons">add</i>
								</a>
							</div>
							<?php }?>
							<?php }?>
						</header>
						<div class="panel-heading-tools">
							<div class="btn-group">
								<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#" id="btnRefresh"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar</a></li>
									<li><a href="#" class="btnFilters"><i class="fa fa-search" aria-hidden="true"></i> Búsqueda avanzada</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel-body mb20" id="AJAXLOAD"></div>
				</div>
			</div>
		</div>
	</section>
</section>
<div id="modalDialog" class="modal fade" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="alert alert-callout" role="alert">
					<strong id="titleModal"></strong>
				</div>
			</div>
			<div class="modal-body">
				<div id="error"></div>
				<form name="mform" id="mform" method="post" action="cambiarEstadoSol">
				<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['token']->value['token_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value['token'];?>
">
				<input type="hidden" name="ids" id="ids">
				<input type="hidden" name="estatus" id="estatus">
				<label for="txtComentarios">Observaciones:</label>
				<textarea class="form-control" name="txtComentarios" id="txtComentarios"></textarea>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-flat btn-ripple" id="btnAceptar">Aceptar</button>
				<button type="button" class="btn btn-primary btn-flat btn-ripple" id="btnCancelar" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("design/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">	
	$("body").on("click",".listaAccionJ", function(){
		var _class = "";var _txt = "";
		$("#modalDialog").find("#error").html('');
		if($(this).attr("data-estatus") == 2){_class = "alert-default"; _txt ="Enviar";}
		if($(this).attr("data-estatus") == 3){_class = "alert-primary"; _txt ="Justificar";}
		if($(this).attr("data-estatus") == 4){_class = "alert-warning"; _txt ="Rechazar";}
		if($(this).attr("data-estatus") == 5){_class = "alert-danger"; _txt ="Cancelar";}
		$("#modalDialog").find("#titleModal").html("Desea "+_txt+" la solicitud: "+$(this).attr("data-folio"));
		$("#modalDialog").find(".alert").addClass(_class);
		$("#modalDialog").find("#ids").val("").val($(this).attr("data-id"));
		$("#modalDialog").find("#estatus").val($(this).attr("data-estatus"));
		if($(this).attr("data-estatus") == 2){
			$("#modalDialog").find("#txtComentarios").hide();
			$("#modalDialog").find("LABEL").hide();
		}else{
			$("#modalDialog").find("#txtComentarios").val("");
			setTimeout( function(){
				$("#modalDialog").find("#txtComentarios").focus();
			},1000);
		}
	});
	$(".btnFilters").click( function(e){
		e.preventDefault();
		$("#divFilter").toggle();
	});
	$("#btnAceptar").click( function(){
		var _txtComen = $.trim($("#modalDialog").find("#txtComentarios").val());
		var _miEstatus = $("#modalDialog").find("#estatus").val();
		if(_miEstatus == 2){
		}
		else if(_txtComen == ""){
			$("#error").html('<div class="alert alert-danger" id="caperror" style="padding:5px !important;margin-bottom:5px !important;"><i class="fa fa-exclamation"></i>  El campo  Observaciones no puede quedar vacío.</div>');
			return false;
		}
		$.post("ajaX/cambiarEstadoSol",$("#modalDialog").find("#mform").serialize(), function(r){
			if(r == ""){
				$("#modalDialog").find("#btnCancelar").click();
				
				cargarSolicitudes();
				$.toasts("add",{
					msg: (_miEstatus == 2) ?  "Solicitud enviada correctamente" : "El cambio se aplico correctamente.",
				});
			}else{
				alert("Hubieron errores, favor intente más tarde.");
			}
		});
	});
	function cargarSolicitudes(){
	$('#AJAXLOAD').html('<div class="form-group text-center">Cargando... <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>');	
	$.ajax({
		url : "ajax/solicitudesHTML",
		data : {
			'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";}
		},
		dataType : "json", type: "POST",
		beforeSend: function(){},
		success: function(data){
			if(data.error){
				$('#AJAXLOAD').html('Intente mas Tarde.');
			}
			else{
				$('#AJAXLOAD').html(data.HTML);
			}
		},
		error: function (){$('#AJAXLOAD').html('Intente mas Tarde.');}
	});
    }
	function editarSolicitud(id){
		var token = $('#token').val();
		var div = $("<div><form name='_form' id='_formulario' method='post' action='editaRegistro'><input type='hidden' name='ids' id='ids' value='"+id+"' /><input type='hidden' name='csrf_sistem_tok_name' value='"+token+"' /></form></div>");
		$('body').append(div);
		$('body').find("#_formulario").submit();
	}
	function descargarPDF(id){
		var token = $('#token').val();
		var div = $("<div><form name='_form' id='_formulario' method='post' action='descargarPDF'><input type='hidden' name='ids' id='ids' value='"+id+"' /><input type='hidden' name='csrf_sistem_tok_name' value='"+token+"' /></form></div>");
		$('body').append(div);
		$('body').find("#_formulario").submit();
		$('body').find("#_formulario").remove();
	}
$().ready( function(){	
	if (typeof $.cookie('isLogged') === "undefined"){
		$.cookie('isLogged', 'true');
		$.toasts("add",{
			msg: "Bienvenido al Sistema "+$("#fua").val(),
		});
	}	
	$("#btnRefresh").click( function(e){
		e.preventDefault();
		cargarSolicitudes();
	});
	cargarSolicitudes();
	$("*").tooltip();
});
</script><?php }} ?>