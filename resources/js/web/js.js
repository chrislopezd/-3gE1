$.fn.extend({onEnter: function(fn){if($.isFunction(fn)){this.each(function(){$(this).keypress(function(e){if(e.which == 13){e.preventDefault();return fn.call(this,e);}});$(this).bind('onEnter',fn)});}else{$(this).trigger('onEnter');}return this;}});
$.fn.extend({onNumeric: function(fn){if($.isFunction(fn)){$(this).bind("paste", function(e){return false;});$(this).bind("drop", function(e){return false;});this.each(function(){$(this).keypress(function(e){var isFf = !(window.mozInnerScreenX == null);if(isFf){if((e.which >= 48 && e.which <= 57) || (e.which == 0) || (e.which == 8)){}else{e.preventDefault();}}else{if(e.which >= 48 && e.which <= 57){}else{e.preventDefault();}}});});}}});
function dialogoMensaje(msg,_title){
	_title = (_title == "") ? "Error" : _title;
	$("<div></div>").dialog( {
		position:'center',
		buttons: [{
			text: "Salir",
			click: function() {
				$( this ).remove();
			}
		}
		],
		close: function (event, ui) { $(this).remove(); },
		resizable: false,
		overflow: 'auto',
		fluid:true,
		title: _title,
		modal: true
		}).html(msg).parent().addClass("alert");
		$('html, body').animate({
		  scrollTop: $(this).offset() - 400
		}, 100);
}
function fluidDialog(){
	var $visible = $(".ui-dialog:visible");
	$(".ui-dialog-titlebar-close").attr('title','Cerrar');
	$visible.each(function () {
		var $this = $(this);
		var dialog = $this.find(".ui-dialog-content").data("ui-dialog");
		if (dialog.options.fluid) {
			var wWidth = $(window).width();
			if (wWidth < (parseInt(dialog.options.maxWidth) + 50)) {
				$this.css("max-width", "90%");
			} else {
				$this.css("max-width", dialog.options.maxWidth + "px");
			}
			dialog.option("position", dialog.options.position);
		}
	});
}
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

function userVerify(){
	$.ajax({
		url : "ajax/verSession",
		data : {csrf_sistem_tok_name : $("[name='csrf_sistem_tok_name']").val()},
		dataType : "json", type: "POST",
		beforeSend: function(){},
		success: function(data){
			if(data.isTrue == "0" || _isUV != data.isExist){
				if($(".aviso").size() == 0){
					if($("#_modal").size() == 0){
						$("body").append('<div id="_modal"></div>');
					}
					$("body").append("<div class='aviso' id='avisoHigh'><b>Su sesión ha terminado</div>");
					$("#avisoHigh,#_modal").show();
					$("<div></div>").dialog( {
						position:'center',
						buttons: [{
							text: "Continuar ",
							click: function(e) {
								$.ajaxSetup({async:false});
								$.post("ajax/generar",{csrf_sistem_tok_name:$("[name='csrf_sistem_tok_name']").val(), idU:_isUV, }, function(r){});
								$.ajaxSetup({async:true});
								$("#avisoHigh,#_modal:visible").hide().remove();
								$( this ).remove();
							}
						},
						{
							text: "Finalizar",
							click: function(e) {
								window.location = "http://localhost/sistema/";//  http://www.sigeyucatan.gob.mx/conversiondeplazas
								$( this ).remove();
								e.preventDefault();
							}
						}
						],
						close: function (event, ui) { $(this).remove();},//
						open: function(event, ui) { $(".ui-dialog-titlebar-close").hide();},
						resizable: false,
						fluid:true,
						title: "Tiempo de sesión por finalizar",
						modal: true
						}).html("<b>Si desea extender el tiempo de sesión haga clic en 'Continuar', de lo contrario haga clic en 'Finalizar'</b>").parent().addClass("alert");
						fluidDialog();

				}
			}
			else{
				$("#avisoHigh,#_modal:visible").hide().remove();
			}
		},
		error: function (){

		}
		});
}


var timestamp = null;
var timestampCount = null;
var _mconta_ = 0;
var _mcontaCount_ = 0;
var _mid_ = 0;
var _esta_ = 0;
var _idh_ = 0;
var _nombre_ = "";
var _folio_ = "";
var _estatus_ = "";
function editarNotificacion(mid,estatus,idh){
	var token = $('#token').val();
	$.ajax({
		url : "ajax/actualizarEstado",
		data : {
			'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";},
			'ids' : function(){ return mid;},
			'estado' : function(){ return estatus;},
			'idh' : function(){ return idh;}
		},
		dataType : "json", type: "POST",
		beforeSend: function(){},
		success: function(data){},
		error: function (d){}
	});
	var div = $("<div><form name='_form' id='_formulario' method='post' action='editaRegistro'><input type='hidden' name='ids' id='ids' value='"+mid+"' /><input type='hidden' name='csrf_sistem_tok_name' value='"+token+"' /></form></div>");
	$('body').append(div);
	$('body').find("#_formulario").submit();
}


function cargar_count(){
	$.ajax({
		async:	true,
		url : "ajax/notifyCount",
		data : {
				'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";},
				'timestampCount' : function(){ return timestampCount;}
			},
		dataType : "json",
		type: "POST",
	    success: function(data){
			timestampCount  = data.timestampCount;
			if(timestampCount != null){
				if(_mcontaCount_ > 0){
					loadListadoLi("");
				}
				_mcontaCount_++;
			}
			setTimeout('cargar_count()',1000);
	    }
	});
}
function cargar_push(){
	$.ajax({
		async:	true,
		url : "notify",
		data : {
				'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";},
				'timestamp' : function(){ return timestamp;}
			},
		dataType : "json",
		type: "POST",
	    success: function(data){
			timestamp  = data.timestamp;
			if(timestamp != null){
				loadListadoLi("push");
				if(_mconta_ > 0){
					if($("#btnRefresh").length > 0){
						$("#btnRefresh").click();
					}
					Push.create("Tiene una nueva notificación", {
				    body: _nombre_+"\n"+_folio_+" [ "+_estatus_+" ]",
				    icon: 'resources/images/logoSegey.png',
				    timeout: 10000,
				    onClick: function () {
				    	var token = $('#token').val();
				    	$.ajax({
							url : "ajax/actualizarEstado",
							data : {
								'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";},
								'ids' : function(){ return _mid_;},
								'estado' : function(){ return _esta_;},
								'idh' : function(){ return _idh_;}
							},
							dataType : "json", type: "POST",
							beforeSend: function(){},
							success: function(data){},
							error: function (){}
						});
						var div = $("<div><form name='_form' id='_formulario' method='post' action='editaRegistro'><input type='hidden' name='ids' id='ids' value='"+_mid_+"' /><input type='hidden' name='csrf_sistem_tok_name' value='"+token+"' /></form></div>");
						$('body').append(div);
						$('body').find("#_formulario").submit();
				        this.close();
				    }
				    });
				}
				_mconta_++;
			}
			setTimeout('cargar_push()',1000);
	    }
	});
}
function loadListadoLi(tipoPeticion){
	$.ajax({
		url : "ajax/listadoNHTML",
		data : {
			'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";}
		},
		dataType : "json", type: "POST",
		beforeSend: function(){},
		success: function(data){
			if(data.count > 0){
				$("#numNoti").html(data.count);
				$("#numNoti").removeClass("hide");
				if(tipoPeticion != ""){
					_mid_ = data.mid;
					_esta_ = data.idEstatus;
					_idh_ = data.id_hist;
					_nombre_ = data.nombre;
					_estatus_ = data.estatus;
					_folio_ = data.folio;
				}
			}
			$('#liListado').html(data.HTML);
		},
		error: function (){$('#liListado').html('Intente más tarde.');}
	});
}

$().ready( function(){
	cargar_count();
	cargar_push();
	setInterval(function(){
		var ua = navigator.userAgent.toLowerCase();
		if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || ua.indexOf("android") > -1){}else{
			userVerify();
		}
	},5000);
	$(window).resize(function(){
		fluidDialog();
		var ellipses1 = $("#bc1 :nth-child(2)");
        //if ($("#bc1 a:hidden").length >0) {ellipses1.show()} else {ellipses1.hide()}
	});
	setTimeout( function(){
		$("*").removeClass("animated");
	},1000);
	$(document).on( 'scroll', function(){if($(window).scrollTop() > 100) {$('.scrollTop').addClass('showUp');}else{$('.scrollTop').removeClass('showUp');}});$('.scrollTop').on('click', scrollToTop);
});