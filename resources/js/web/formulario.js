(function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this), search = $this.val().toLowerCase(), target = $this.attr('data-filters'), $target = $(target), $rows = $target.find('tbody tr');
					if(search == '') {
						$rows.show();
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.children(':eq(0)').text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No se encontraron resultados</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);


function cargarPlazas(tipo){
	var _guia = $(".divForm:last").find("[name='guia[]']").val();
	if(tipo == 1){
		$('#PLAZASDIV').html('<div class="form-group text-center">Cargando... <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>');
	}
	$.ajax({
		url : "ajax/plazasHTML",
		data : {
			'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";},
			'tipo' : function(){ return tipo;},
			'guia' : function(){ return (tipo == 1) ? 'A' : _guia;}
		},
		dataType : "json", type: "POST",
		beforeSend: function(){},
		success: function(data){
			if(data.error){
				if(tipo == 1){
					$('#PLAZASDIV').html('Intente más tarde.');
				}else if(tipo == 2){

				}
			}
			else{
				if(tipo == 1){
					$('#PLAZASDIV').html(data.HTML);
				}else if(tipo == 2){
					$('#PLAZASDIV').append(data.HTML);
				}
			}
			precargar();
			$("*").tooltip();
		},
		error: function (){$(element).next('div').html('Intente más tarde.');}
	});
}
function fechaCalendar(obj){
	$(obj).datepicker({ dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true,dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']});
}
function cargarFormatoTurnos(turnoClave, nombreDrop, selDrop){
  if(turnoClave == undefined){return undefined;}
  if(nombreDrop == undefined){nombreDrop = 'txtTurnoCCT[A][]';}
  if(selDrop == undefined){selDrop = '';}
  var sel = '';  var sel2 = '';  var sel3 = '';  var sel4 = '';

  var htmlDrop = "<select name="+nombreDrop+" class='form-control f8'>";
  htmlDrop+= "<option value='NA' class='form-control option'>-Seleccione-</option>";
  switch (turnoClave){
    case '100':
      if(selDrop == 1){sel = 'selected';}
      htmlDrop+= "<option value='1' class='form-control option' "+sel+" selected>Matutino</option>";
      break;
    case '120':
      if(selDrop == 1){sel = 'selected';}
      if(selDrop == 2){sel2 = 'selected';}
      htmlDrop+= "<option value='1' class='form-control option' "+sel+" >Matutino</option>";
      htmlDrop+= "<option value='2' class='form-control option' "+sel2+" >Vespertino</option>";
      break;
    case '130':
      if(selDrop == 1){sel = 'selected';}
      if(selDrop == 3){sel3 = 'selected';}
      htmlDrop+= "<option value='1' class='form-control option' "+sel+" >Matutino</option>";
      htmlDrop+= "<option value='3' class='form-control option' "+sel3+" >Nocturno</option>";
      break;
    case '123':
      if(selDrop == 1){sel = 'selected';}
      if(selDrop == 2){sel2 = 'selected';}
      if(selDrop == 3){sel3 = 'selected';}
      htmlDrop+= "<option value='1' class='form-control option' "+sel+" >Matutino</option>";
      htmlDrop+= "<option value='2' class='form-control option' "+sel2+" >Vespertino</option>";
      htmlDrop+= "<option value='3' class='form-control option' "+sel3+" >Nocturno</option>";
      break;
    case '200':
      if(selDrop == 2){sel2 = 'selected';}
      htmlDrop+= "<option value='2' class='form-control option' "+sel2+" selected>Vespertino</option>";
      break;
    case '230':
      if(selDrop == 2){sel2 = 'selected';}
      if(selDrop == 3){sel3 = 'selected';}
      htmlDrop+= "<option value='2' class='form-control option' "+sel2+" >Vespertino</option>";
      htmlDrop+= "<option value='3' class='form-control option' "+sel3+" >Nocturno</option>";
      break;
    case '300':
      if(selDrop == 3){sel3 = 'selected';}
      htmlDrop+= "<option value='3' class='form-control option' "+sel3+" selected>Nocturno</option>";
      break;
    case '400':
    case '800':
      if(selDrop == 4){sel4 = 'selected';}
      htmlDrop+= "<option value='4' class='form-control option' "+sel4+" selected>Discontinuo</option>";
      break;
  }
  htmlDrop += "</select>";
  return htmlDrop;
}
function contador(){
	$(".badgeHeader").each( function(i,e){
		$(this).html(parseInt(i) + 1);
	});
}
function contaTr(){
	$(".tbodyFirstAppend").each( function(i,e){
		$(e).find("TR").each( function(ii,ee){
			$(ee).find("td").each( function(iii,eee){
				if(iii == 0){$(eee).html(parseInt(ii) + 1); return false;}
			});
		});
	});
	$(".tbodyAppend").each( function(i,e){
		$(e).find("TR").each( function(ii,ee){
			$(ee).find("td").each( function(iii,eee){
				if(iii == 0){$(eee).html(parseInt(ii) + 1); return false;}
			});
		});
	});
}
function precargar(){
	contador();
	contaTr();
	fechaCalendar($(".fecha"));
	$(".fecha").inputmask();
	$('.fecha').blur(function(){var filter = /^\d{2}\/\d{2}\/\d{4}$/;if(!filter.test($(this).val())){$(this).val(null);}});
	buscarCAT($(".txtCateCan"));
	buscarCAT($(".txtPlaza"));
	buscarCCT($(".txtClaveCTCan"),1);
	buscarCCT($(".txtClaveCT"),2);
	$(".myNum").onNumeric(function(){});
	//$(".myNum").onNumeric(function(){});
}
function buscarCCT(obj,t){
$(obj).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "ajax/obtenerCCTLista",
          dataType: "json",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 3,
      select: function( event, ui ){
      	var _mthis = event.target;
      	var _mGuia = $(_mthis).parents(".divForm").find("[name='guia[]']").val();
        var _name = (t == 1) ? "txtTurnoCCTCan["+_mGuia+"][]" : "txtTurnoCCT["+_mGuia+"][]";
        var htmlTurno = cargarFormatoTurnos(ui.item.turno,_name);
        $(_mthis).parents("tr").find("td.turnoCmb").html(htmlTurno);
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
}

function buscarCAT(obj){
$(obj).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "ajax/obtenerCATLista",
          dataType: "json",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 2,
      select: function( event, ui ){
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
}
function addRowFirst(obj){
	var _mGuia = $(obj).parents(".divForm").find("[name='guia[]']").val();
	//tbodyFirstAppend
	var _row = '<tr class="text-left">'
					+'<td class="td"></td>'
					+'<td class="td">'
					+'<input type="hidden" name="txtIdSolCan['+_mGuia+'][]" class="form-control f8" value="0" autocomplete="off">'
					+'<input type="text" name="txtClaveCTCan['+_mGuia+'][]" class="form-control f8 upper txtClaveCTCan" value="" autocomplete="off"></td>'
					+'<td class="td turnoCmb"><input type="text" name="txtTurnoDrop['+_mGuia+'][]" placeholder="Elija una clave Ct" class="form-control f8" disabled=""></td>'
					+'<td class="td"><input type="text" name="txtTitularCan['+_mGuia+'][]" class="form-control f8 upper" value="" maxlength="160" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtPagoCan['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtUnidadCan['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtSubUniCan['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtCateCan['+_mGuia+'][]" class="form-control f8 txtCateCan upper" value="" maxlength="7" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtHorasCan['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtPlazaCan['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="6" autocomplete="off"></td>'
					+'<td class="td"><textarea name="txtMotivoCan['+_mGuia+'][]" class="form-control f8 upper"></textarea></td>'
					+'<td class="td"><input type="text" name="txtVigenciaCan['+_mGuia+'][]" class="form-control f8 fecha" data-inputmask="\'alias\' : \'date\'" value="" maxlength="10" autocomplete="off"></td>'
					+'<td class="td"><textarea name="txtObservacionesCan['+_mGuia+'][]" class="form-control f8 upper"></textarea></td>'
					+'<td class="td"><button type="button" name="deleted[]" class="btn btn-danger deleteTrFirst" style="min-width:30px"><i class="fa fa-times" title="Eliminar fila"></i></button></td>'
				+'</tr>';
	$(obj).parent().parent().find(".tbodyFirstAppend").append(_row);
	$.toasts("add",{
		msg: "Fila agregada",
	});
	precargar();
}
function cloneRowFirst(obj){
	var _row = $(obj).parent().parent().find(".tbodyFirstAppend").find("TR:last").clone();
	var _mGuia = $(obj).parents(".divForm").find("[name='guia[]']").val();
	$(_row).find("TD").each( function(i,e){
		if(i == 1){
			var _valor = $(e).find("[name='txtClaveCTCan["+_mGuia+"][]']").val();
			$(e).html('<input type="hidden" name="txtIdSolCan['+_mGuia+'][]" class="form-control f8" value="0" autocomplete="off"><input type="text" name="txtClaveCTCan['+_mGuia+'][]" class="form-control f8 upper txtClaveCTCan" value="'+_valor+'" autocomplete="off">');
		}
		if(i == 2){
			var _valor = "";
			$(obj).parent().parent().find(".tbodyFirstAppend").find("TR:last").find("TD").each( function(index,item){
				if(index == 2){
					_valor = $(item).find("[name='txtTurnoCCTCan["+_mGuia+"][]'] option:selected").val();
					return false;
				}
			});
			$(e).find("option").each( function(ii,ee){
				if(_valor == $(ee).val()){
					$(ee).attr("selected","selected");
				}
			});
		}
		if($(e).find("[name='txtVigenciaCan["+_mGuia+"][]']").length > 0){
			var _valor = $(e).find("[name='txtVigenciaCan["+_mGuia+"][]']").val();
			$(e).html('<input type="text" name="txtVigenciaCan['+_mGuia+'][]" class="form-control f8 fecha" data-inputmask="\'alias\' : \'date\'" value="'+_valor+'" maxlength="10" autocomplete="off">');
		}
	});
	$(obj).parent().parent().find(".tbodyFirstAppend").append(_row);
	$.toasts("add",{
		msg: "Fila clonada",
	});
	precargar();
}
function removeRowFirst(obj){
	if($(obj).parents("TR").parent().find("TR").length > 1){
		$(obj).parents("TR").fadeOut(500, function(){
    		$(obj).parents("TR").remove();
    		contaTr();
		});
		$.snackbar("add",{
			type:"success",
			msg:"Fila eliminada correctamente.",
			buttonText: "Cerrar",
			disappearTime: 2000,
		});
	}
}
function addRow(obj){
	var _mGuia = $(obj).parents(".divForm").find("[name='guia[]']").val();
	var _txtHours = $('[name="txtHoras['+_mGuia+'][]"]').attr("type");
	var _txtEst = $('[name="txtEstatusCrea['+_mGuia+'][]"]').val();
	if(_txtEst == '3'){
		_txtHours = 'text';
	}
	if($(obj).parent().parent().find(".tbodyAppend").find("TR").length >= 10){
		$("#modalDialog").find("#titleModal").html("Mensaje");
		$("#modalDialog").find("#msgModal").html("Solo se permiten 10 plazas");
		$("#btnMsg").click();
		return false;
	}
	/*Código agregado el 23/08/2016*/
	var _contaTrFirst  = $(obj).parent().parent().find(".tbodyFirstAppend TR").length;
	var _contaTr = parseInt($(obj).parent().parent().find(".tbodyAppend TR").length) + 1;
	if(parseInt(_contaTr) > parseInt(_contaTrFirst)){
		$("#modalDialog").find("#titleModal").html("Mensaje");
		$("#modalDialog").find("#msgModal").html("Por indicaciones de la Dirección Administrativa no se pueden crear más plazas de las que se cancelan");
		$("#btnMsg").click();
	}
	/*End Código agregado el 23/08/2016*/
	var _newTd = (_edit == 1) ? "<td></td>" : "";
	var _row = '<tr class="text-left">'
					+'<td class="td"></td>'
					+'<td class="td">'
					+'<input type="hidden" name="txtIdSolCrea['+_mGuia+'][]" class="form-control f8" value="0" autocomplete="off">'
					+'<input type="text" name="txtClaveCT['+_mGuia+'][]" class="form-control f8 upper txtClaveCT" value="" autocomplete="off"></td>'
					+'<td class="td turnoCmb"><input type="text" name="txtTurnoDropCrea['+_mGuia+'][]" placeholder="Elija una clave Ct" class="form-control f8" disabled=""></td>'
					/*
					+'<td class="td"><input type="text" name="txtGB1['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtGB2['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtGB3['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'

					+'<td class="td esconderBCM"><input type="text" name="txtGB4['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td esconderBCM"><input type="text" name="txtGB5['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td esconderBCM"><input type="text" name="txtGB6['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'

					+'<td class="td"><input type="text" name="txtGC1['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtGC2['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtGC3['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'

					+'<td class="td esconderBCM"><input type="text" name="txtGC4['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td esconderBCM"><input type="text" name="txtGC5['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td esconderBCM"><input type="text" name="txtGC6['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'

					+'<td class="td"><input type="text" name="txtMat1['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtMat2['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtMat3['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'

					+'<td class="td esconderBCM"><input type="text" name="txtMat4['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td esconderBCM"><input type="text" name="txtMat5['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'
					+'<td class="td esconderBCM"><input type="text" name="txtMat6['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="3" autocomplete="off"></td>'

					+'<td class="td esconderG"><input type="text" name="txtGrupo['+_mGuia+'][]" class="form-control f8" value="" maxlength="25" autocomplete="off"></td>'
					*/
					+'<td class="td esconderA"><input type="text" name="txtAsignatura['+_mGuia+'][]" class="form-control f8 upper" value="" maxlength="30" autocomplete="off"></td>'
					+'<td class="td"><input type="text" name="txtPlaza['+_mGuia+'][]" class="form-control f8 upper txtPlaza" value="" maxlength="6" autocomplete="off"></td>'
					+'<td class="td esconderH"><input type="'+_txtHours+'" name="txtHoras['+_mGuia+'][]" class="form-control f8 myNum" value="" maxlength="2" autocomplete="off"></td>'
					+'<td class="td"><textarea name="txtMotivo['+_mGuia+'][]" class="form-control f8 upper"></textarea></td>'
					+'<td class="td"><input type="text" name="txtVigencia['+_mGuia+'][]" class="form-control f8 fecha" data-inputmask="\'alias\' : \'date\'" value="" maxlength="10" autocomplete="off"></td>'
					+'<td class="td"><textarea name="txtObservacionesCrea[{$guia}][]" class="form-control f8 upper"></textarea></td>'
					+''+_newTd+''
					+'<td><button type="button" name="deleted[]" class="btn btn-danger deleteTr" style="min-width:30px"><i class="fa fa-times" title="Eliminar fila"></i></button></td>'
				+'</tr>';
	$(obj).parent().parent().find(".tbodyAppend").append(_row);
	$.toasts("add",{
		msg: "Fila agregada",
	});
	precargar();
}
function cloneRow(obj){
	var _row = $(obj).parent().parent().find(".tbodyAppend").find("TR:last").clone();
	var _mGuia = $(obj).parents(".divForm").find("[name='guia[]']").val();

	if($(obj).parent().parent().find(".tbodyAppend").find("TR").length >= 10){
		$("#modalDialog").find("#titleModal").html("Mensaje");
		$("#modalDialog").find("#msgModal").html("Solo se permiten 10 plazas");
		$("#btnMsg").click();
		return false;
	}
	/*Código agregado el 23/08/2016*/
	var _contaTrFirst  = $(obj).parent().parent().find(".tbodyFirstAppend TR").length;
	var _contaTr = parseInt($(obj).parent().parent().find(".tbodyAppend TR").length) + 1;
	if(parseInt(_contaTr) > parseInt(_contaTrFirst)){
		$("#modalDialog").find("#titleModal").html("Mensaje");
		$("#modalDialog").find("#msgModal").html("Por indicaciones de la Dirección Administrativa no se pueden crear más plazas de las que se cancelan");
		$("#btnMsg").click();
	}
	/*End Código agregado el 23/08/2016*/
	$(_row).find("TD").each( function(i,e){
		if(i == 1){
			var _valor = $(e).find("[name='txtClaveCT["+_mGuia+"][]']").val();
			$(e).html('<input type="hidden" name="txtIdSolCrea['+_mGuia+'][]" class="form-control f8" value="0" autocomplete="off"><input type="text" name="txtClaveCT['+_mGuia+'][]" class="form-control f8 upper txtClaveCT" value="'+_valor+'" autocomplete="off">');
		}
		if(i == 2){
			var _valor = "";
			$(obj).parent().parent().find(".tbodyAppend").find("TR:last").find("TD").each( function(index,item){
				if(index == 2){
					_valor = $(item).find("[name='txtTurnoCCT["+_mGuia+"][]'] option:selected").val();
					return false;
				}
			});
			$(e).find("option").each( function(ii,ee){
				if(_valor == $(ee).val()){
					$(ee).attr("selected","selected");
				}
			});
		}
		if($(e).find("[name='txtVigencia["+_mGuia+"][]']").length > 0){
			var _valor = $(e).find("[name='txtVigencia["+_mGuia+"][]']").val();
			$(e).html('<input type="text" name="txtVigencia['+_mGuia+'][]" class="form-control f8 fecha" data-inputmask="\'alias\' : \'date\'" value="'+_valor+'" maxlength="10" autocomplete="off">');
		}
	});
	$(obj).parent().parent().find(".tbodyAppend").append(_row);
	$.toasts("add",{
		msg: "Fila clonada",
	});
	precargar();
}
function removeRow(obj){
	if($(obj).parents("TR").parent().find("TR").length > 1){
		$(obj).parents("TR").fadeOut(500, function(){
    		$(obj).parents("TR").remove();
    		contaTr();
		});
		$.snackbar("add",{
			type:"success",
			msg:"Fila eliminada correctamente.",
			buttonText: "Cerrar",
			disappearTime: 2000,
		});
	}
}
function zeroPad(num,count,t){
	var numZeropad = num + '';
	while(numZeropad.length < count){
		if(t == 'z'){
			numZeropad = "0" + numZeropad;
		}else{
			numZeropad = " " + numZeropad;
		}
	}
	return numZeropad;
}
function verPlazas(marray){
	var _mydata = new FormData();
	_mydata.append('csrf_sistem_tok_name', $("[name='csrf_sistem_tok_name']").val());
	_mydata.append('cps', marray);
	_mydata.append('mId',$("#idSol").val());
	return $.ajax({
    		url: 'ajax/verPlazas',type: 'POST',data:_mydata,cache: false,contentType: false,processData: false,
            beforeSend: function(){
            },
            success: function(data){
            },
            error: function(d){
            	alert("Hubieron errores favor de intentar más tarde.");
            	return false;
            }
    	});
}
$().ready( function(){
	$("#btnQuery").click( function(){
		$('#AJAXLOADBALI').html('<div class="form-group text-center">Cargando... <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>');
		$.ajax({
			url : "ajax/baliHTML",
			data : {
				'csrf_sistem_tok_name' : function(){ return ($('#token').val() != "") ? $('#token').val() : "";}
			},
			dataType : "json", type: "POST",
			beforeSend: function(){
					$.blockUI({ message: '<div class="alert alert-success"><h5> Generando..., por favor espere un momento...</h5></div><div><img src="resources/images/loadAjax.gif" /><br/><br/></div>',});
			},
			success: function(data){
				$.unblockUI();
				if(data.error){
					$('#AJAXLOADBALI').html('Intente más tarde.');
				}
				else{
					$('#AJAXLOADBALI').html(data.HTML);
				}
			},
			error: function (){$.unblockUI();$('#AJAXLOADBALI').html('Intente más tarde.');}
		});
	});
	$(".listaAccionJ").click( function(){
		var _class = "";var _txt = "";
		$("#modalDialogAction").find("#error").html('');
		if($(this).attr("data-estatus") == 2){_class = "alert-default"; _txt ="Enviar";}
		if($(this).attr("data-estatus") == 3){_class = "alert-primary"; _txt ="Justificar";}
		if($(this).attr("data-estatus") == 4){_class = "alert-warning"; _txt ="Rechazar";}
		$("#modalDialogAction").find("#titleModal").html("Desea "+_txt+" la solicitud: "+$(this).attr("data-folio"));
		$("#modalDialogAction").find(".alert").addClass(_class);
		$("#modalDialogAction").find("#ids").val("").val($(this).attr("data-id"));
		$("#modalDialogAction").find("#estatus").val($(this).attr("data-estatus"));
		if($(this).attr("data-estatus") == 2){
			$("#modalDialogAction").find("#txtComentarios").hide();
			$("#modalDialogAction").find("LABEL").hide();
		}else{
			$("#modalDialogAction").find("#txtComentarios").val("");
			setTimeout( function(){
				$("#modalDialogAction").find("#txtComentarios").focus();
			},1000);
		}
	});
	$("#btnAceptar").click( function(){
		var _txtComen = $.trim($("#modalDialogAction").find("#txtComentarios").val());
		var _miEstatus = $("#modalDialogAction").find("#estatus").val();
		if(_miEstatus == 2){
		}
		else if(_txtComen == ""){
			$("#error").html('<div class="alert alert-danger" id="caperror" style="padding:5px !important;margin-bottom:5px !important;"><i class="fa fa-exclamation"></i>  El campo  Observaciones no puede quedar vacío.</div>');
			return false;
		}
		$.post("ajaX/cambiarEstadoSol",$("#modalDialogAction").find("#mform").serialize(), function(r){
			if(r == ""){
				var id = $("#modalDialogAction").find("#ids").val();
				var token = $('#token').val();
				var div = $("<div><form name='_form' id='_formulario' method='post' action='editaRegistro'><input type='hidden' name='ids' id='ids' value='"+id+"' /><input type='hidden' name='csrf_sistem_tok_name' value='"+token+"' /></form></div>");
				$('body').append(div);
				$('body').find("#_formulario").submit();
			}else{
				alert("Hubieron errores, favor intente más tarde.");
			}
		});
	});
	$("body").on("click",".btnAddRowFirst", function(){
		addRowFirst($(this));
	});
	$("body").on("click",".btnCloneRowFirst", function(){
		cloneRowFirst($(this));
	});
	$("body").on("click",".deleteTrFirst", function(){
		removeRowFirst($(this));
	});
	$("body").on("click",".btnAddRow", function(){
		addRow($(this));
	});
	$("body").on("click",".btnCloneRow", function(){
		cloneRow($(this));
	});
	$("body").on("click",".deleteTr", function(){
		removeRow($(this));
	});
	$("body").on("click",".btnRemove", function(){
		if($(".divForm").length > 1){
			var _this = $(this).parent().parent().parent().parent();
			$(_this).fadeOut(500, function(){
			    $(_this).remove();
			    contador();
			});
			$.snackbar("add",{
				type:"success",
				msg:"Eliminado correctamente.",
				buttonText: "Cerrar",
				disappearTime: 2000,
			});
		}
	});
	$("#btnGuardar").click( function(){
		$(".divForm").find(".panel-default").removeClass("myerror");
		var _res = "";var _ii = 0;
		if(_edit == 1){
			var _myid = $("#idSol").val();
			var _mytoken = $('#token').val();
			$.post("ajaX/verificarEstatus",{csrf_sistem_tok_name: _mytoken,ids:_myid}, function(r){
				_res = r;
				_ii++;
			});
		}else{
			_ii++;
		}
		var _timer = setInterval( function(){
			if(_ii == "1"){
				clearInterval(_timer);
				if(_res != ""){
					if(parseInt(_res) > 1){
						if(parseInt(_res) == 4){
						}else{
							$("#modalDialog").find("#titleModal").html("Mensaje");
							$("#modalDialog").find("#msgModal").html("El estatus de la solicitud ha cambiado, favor de actualizar para ver reflejado el cambio.");
							$("#btnMsg").click();
							return false;
						}
					}
				}
				var _oficio = $.trim($("#txtOficio").val());
				/*if(_oficio.length == 0){
					$("#modalDialog").find("#titleModal").html("Mensaje");
					$("#modalDialog").find("#msgModal").html("El campo Oficio es obligatorio.");
					$("#btnMsg").click();
					return false;
				}*/
				var _data = new FormData();
				_data.append('csrf_sistem_tok_name', $("#token").val());
				_data.append('idSol', $("#idSol").val());
				_data.append('txtObservaciones', $("#txtObservaciones").val());
				var _cctC =  0;
				var _cpArray =  [];
				var _horasNoDistribuidas = 0;
				var _bloque = 0;
				var _horasTotal = 0;
				var _hours = 0;
				var _hoursCrea = 0;
				var _duplicate = 0;
				$("[name='guia[]']").each( function(){
					_horasTotal = 0;
					var _numeroGuia = $(this).parents().parents().parents().parents();
					_bloque = $(_numeroGuia).find(".badgeHeader").html();
					var _Mguia = $.trim($(this).val());
					_data.append("guia[]",_Mguia);
					$("[name='txtPagoCan["+_Mguia+"][]']").each( function(_index,_item){
						var _cp = zeroPad($(_item).val(),2,'z')+""+$("[name='txtUnidadCan["+_Mguia+"][]']").eq(_index).val()+""+$("[name='txtSubUniCan["+_Mguia+"][]']").eq(_index).val()+""+zeroPad($("[name='txtCateCan["+_Mguia+"][]']").eq(_index).val().toUpperCase(),7,'')+""+zeroPad($("[name='txtHorasCan["+_Mguia+"][]']").eq(_index).val(),2,'z')+".0"+zeroPad($("[name='txtPlazaCan["+_Mguia+"][]']").eq(_index).val(),6,'z');
						if($.inArray(_cp, _cpArray) <= -1){
							_cpArray.push(_cp);
						}else{
							_duplicate++;
						}
						if($("[name='txtHorasCan["+_Mguia+"][]']").eq(_index).val() != ""){
							if(parseInt($("[name='txtHorasCan["+_Mguia+"][]']").eq(_index).val()) > 0){
								_horasNoDistribuidas++;
								_horasTotal += parseInt($("[name='txtHorasCan["+_Mguia+"][]']").eq(_index).val());
							}
						}else{
							_horasTotal = 0;
						}
					});
					if(_horasNoDistribuidas > 0){
						var _myHours = 0;
						//var _typeTxt = $("[name='txtHoras["+_Mguia+"][]'] :last").attr("type");
						var _typeTxt = $("[name='txtHoras["+_Mguia+"][]']").last().attr("type");
						if(_typeTxt == 'text'){
							$("[name='txtHoras["+_Mguia+"][]']").each( function(index,item){
								if($(item).val() != ""){
									_myHours = parseInt(_myHours) + parseInt($(item).val());
								}
							});
							if(_horasTotal > _myHours){
								_hours++;
								$(_numeroGuia).eq(0).addClass("myerror");
							}
							if(_myHours > _horasTotal){
								_hoursCrea++;
								$(_numeroGuia).eq(0).addClass("myerror");
							}
						}
					}
					$("[name='txtIdSolCan["+_Mguia+"][]']").each( function(){_data.append("txtIdSolCan["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtEstatusCan["+_Mguia+"][]']").each( function(){_data.append("txtEstatusCan["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtClaveCTCan["+_Mguia+"][]']").each( function(){	if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtClaveCTCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtTurnoCCTCan["+_Mguia+"][]']").each( function(){if($.trim($(this).val()) == 'NA'){_cctC++;}else{_data.append("txtTurnoCCTCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtTitularCan["+_Mguia+"][]']").each( function(){_data.append("txtTitularCan["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtPagoCan["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtPagoCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtUnidadCan["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtUnidadCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtSubUniCan["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtSubUniCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtCateCan["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtCateCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtHorasCan["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtHorasCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtPlazaCan["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtPlazaCan["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtMotivoCan["+_Mguia+"][]']").each( function(){_data.append("txtMotivoCan["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtVigenciaCan["+_Mguia+"][]']").each( function(){_data.append("txtVigenciaCan["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtObservacionesCan["+_Mguia+"][]']").each( function(){_data.append("txtObservacionesCan["+_Mguia+"][]",$.trim($(this).val()));});

					$("[name='txtIdSolCrea["+_Mguia+"][]']").each( function(){_data.append("txtIdSolCrea["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtEstatusCrea["+_Mguia+"][]']").each( function(){_data.append("txtEstatusCrea["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtClaveCT["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtClaveCT["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtTurnoCCT["+_Mguia+"][]']").each( function(){if($.trim($(this).val()) == 'NA'){_cctC++;}else{_data.append("txtTurnoCCT["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtGB1["+_Mguia+"][]']").each( function(){_data.append("txtGB1["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGB2["+_Mguia+"][]']").each( function(){_data.append("txtGB2["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGB3["+_Mguia+"][]']").each( function(){_data.append("txtGB3["+_Mguia+"][]",$.trim($(this).val()));});

					$("[name='txtGB4["+_Mguia+"][]']").each( function(){_data.append("txtGB4["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGB5["+_Mguia+"][]']").each( function(){_data.append("txtGB5["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGB6["+_Mguia+"][]']").each( function(){_data.append("txtGB6["+_Mguia+"][]",$.trim($(this).val()));});

					$("[name='txtGC1["+_Mguia+"][]']").each( function(){_data.append("txtGC1["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGC2["+_Mguia+"][]']").each( function(){_data.append("txtGC2["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGC3["+_Mguia+"][]']").each( function(){_data.append("txtGC3["+_Mguia+"][]",$.trim($(this).val()));});

					$("[name='txtGC4["+_Mguia+"][]']").each( function(){_data.append("txtGC4["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGC5["+_Mguia+"][]']").each( function(){_data.append("txtGC5["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtGC6["+_Mguia+"][]']").each( function(){_data.append("txtGC6["+_Mguia+"][]",$.trim($(this).val()));});

					$("[name='txtMat1["+_Mguia+"][]']").each( function(){_data.append("txtMat1["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtMat2["+_Mguia+"][]']").each( function(){_data.append("txtMat2["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtMat3["+_Mguia+"][]']").each( function(){_data.append("txtMat3["+_Mguia+"][]",$.trim($(this).val()));});

					$("[name='txtMat4["+_Mguia+"][]']").each( function(){_data.append("txtMat4["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtMat5["+_Mguia+"][]']").each( function(){_data.append("txtMat5["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtMat6["+_Mguia+"][]']").each( function(){_data.append("txtMat6["+_Mguia+"][]",$.trim($(this).val()));});

					$("[name='txtGrupo["+_Mguia+"][]']").each( function(){_data.append("txtGrupo["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtAsignatura["+_Mguia+"][]']").each( function(){_data.append("txtAsignatura["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtPlaza["+_Mguia+"][]']").each( function(){if($.trim($(this).val()).length == 0){_cctC++;}else{_data.append("txtPlaza["+_Mguia+"][]",$.trim($(this).val()));}});
					$("[name='txtHoras["+_Mguia+"][]']").each( function(){_data.append("txtHoras["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtMotivo["+_Mguia+"][]']").each( function(){_data.append("txtMotivo["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtVigencia["+_Mguia+"][]']").each( function(){_data.append("txtVigencia["+_Mguia+"][]",$.trim($(this).val()));});
					$("[name='txtObservacionesCrea["+_Mguia+"][]']").each( function(){_data.append("txtObservacionesCrea["+_Mguia+"][]",$.trim($(this).val()));});
				});
				if(_cctC > 0){
					$("#modalDialog").find("#titleModal").html("Mensaje");
					$("#modalDialog").find("#msgModal").html("Existen campos vacios, favor de verificar.");
					$("#btnMsg").click();
					return false;
				}
				if(_hours > 0){
					$("#modalDialog").find("#titleModal").html("Mensaje");
					$("#modalDialog").find("#msgModal").html("Las horas no están completas.");
					$("#btnMsg").click();
					return false;
				}
				if(_hoursCrea > 0){
					$("#modalDialog").find("#titleModal").html("Mensaje");
					$("#modalDialog").find("#msgModal").html("Las horas no están bien distribuidas.");
					$("#btnMsg").click();
					return false;
				}
				if(_duplicate > 0){
					$("#modalDialog").find("#titleModal").html("Mensaje");
					$("#modalDialog").find("#msgModal").html("Tiene claves duplicadas, favor de verificar.");
					$("#btnMsg").click();
					return false;
				}
				$("#btnGuardar").prop('disabled',true);
				$("#btnGuardar").addClass("disabled");
				$.when(verPlazas(_cpArray)).then(function(r){
					var myRes = $.parseJSON(r);
					if(myRes.RES > 0){
						var _htmlTable = '<div class="panel-table-inner-offset"><div class="table-responsive"><table class="table table-striped table-bordered table-hover dt-responsive tdisplay no-margin" cellspacing="0" width="100%">'
										+'<thead><tr><th class="text-left searchInput">Folio</th><th class="text-left searchInput width25">Clave</th><th class="text-left searchInput">Fecha</th><th class="text-left searchInput">Estatus</th></tr></thead><tbody>';
						$(myRes.HTML).each( function (index,item){
							  _htmlTable += '<tr class="text-left"><td>'+item.folio+'</td><td>'+item.cp+'</td><td>'+item.fecha+'</td><td>'+item.estatus+'</td></tr>';
						});
						_htmlTable +='</tbody></table></div>';
						$("#btnGuardar").prop('disabled',false);
	           			$("#btnGuardar").removeClass('disabled');
	           			$("#modalDialog").find("#titleModal").html("Existen plazas ocupadas");
						$("#modalDialog").find("#msgModal").html(_htmlTable);
						$("#btnMsg").click();
					}else{
					    $.ajax({
				    		url: 'ajax/'+_url,type: 'POST',data: _data,cache: false,contentType: false,processData: false,
				            beforeSend: function(){
					           	$.blockUI({ message: '<div class="alert alert-success"><h5> Guardando, por favor espere un momento...</h5></div><div><img src="resources/images/loadAjax.gif" /><br/><br/></div>',});
				            },
				            success: function(data){
				            	//alert(data);
					            if(parseInt(data) > 0){
					                //window.location = 'inicio';
					                $.unblockUI();
					                var token = $('#token').val();
									var div = $("<div><form name='_form' id='_formulario' method='post' action='editaRegistro'><input type='hidden' name='ids' id='ids' value='"+data+"' /><input type='hidden' name='csrf_sistem_tok_name' value='"+token+"' /></form></div>");
									$('body').append(div);
									$('body').find("#_formulario").submit();
					            }else{
					            	$.unblockUI();
					            	$("#btnGuardar").prop('disabled',false);
				           			$("#btnGuardar").removeClass('disabled');
				           			$("#modalDialog").find("#titleModal").html("Mensaje");
									$("#modalDialog").find("#msgModal").html("Intente más tarde, hay errores!!!!");
									$("#btnMsg").click();
					            }
				            },
				            error: function(d){
				            	$.unblockUI();
				            	$("#btnGuardar").prop('disabled',false);
				           		$("#btnGuardar").removeClass('disabled');
				           		$("#modalDialog").find("#titleModal").html("Mensaje");
								$("#modalDialog").find("#msgModal").html("Intente más tarde, hay errores!!!!");
								$("#btnMsg").click();
				            }
				    	});
					}
				});
			}
	 	},100);

	});
	$("*").tooltip();
	var  _myconta = 0;
	$('.myCheck').on('ifChecked', function(event){
		_myconta++;
		if(_myconta == 1){
			var _miId = $(this).attr("data-id");
			var _miTipo = $(this).attr("data-tipo");
			var _miG = $(this).attr("data-g");
			var _miToken = $('#token').val();
			var _txt = (_miTipo == "can") ? "txtObservacionesPlanCan" : "txtObservacionesPlanCrea";
			var _observa = $(this).parent().parent().parent().parent().find("[name='"+_txt+"["+_miG+"][]']").val();
			$.post("ajax/justificarPlaza",{csrf_sistem_tok_name:_miToken,ids:_miId,tipo:_miTipo,sta:3,observaPlan:_observa}, function(r){
				if(r == ""){
					$.toasts("add",{
						msg: "Plaza Justifica",
					});
				}else{
					alert("Hubieron errores, favor intente más tarde.");
				}
			});
		}else{
			_myconta = 0;
		}
	});
	$('.myCheck').on('ifUnchecked', function(event){
		_myconta++;
		if(_myconta == 1){
			var _miId = $(this).attr("data-id");
			var _miTipo = $(this).attr("data-tipo");
			var _miG = $(this).attr("data-g");
			var _miToken = $('#token').val();
			var _txt = (_miTipo == "can") ? "" : "txtObservacionesPlanCrea";
			var _observa = $(this).parent().parent().parent().parent().find("[name='"+_txt+"["+_miG+"][]']").val();
			$.post("ajax/justificarPlaza",{csrf_sistem_tok_name:_miToken,ids:_miId,tipo:_miTipo,sta:1,observaPlan:_observa}, function(r){
				if(r == ""){
					$.toasts("add",{
						msg: "Plaza No justifica",
					});
				}else{
					alert("Hubieron errores, favor intente más tarde.");
				}
			});
		}else{
			_myconta = 0;
		}
	});
	$("#btnNuevaPlaza").click( function(){
		cargarPlazas(2);
		$.toasts("add",{
			msg: "Plaza agregada",
		});
	});
	if(_edit == 0){
		cargarPlazas(1);
	}else{
		$(".turnoCmb").find("select").removeClass("bs-select-hidden");
		$(".turnoCmb").find("div.bootstrap-select").remove();
	}
	precargar();
	if(_edit == 0){
		setTimeout( function(){
			$("#txtObservaciones").focus();
		},1000);
	}
	setTimeout( function(){
		$.unblockUI();
	},1000);
	$('body').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this);
		$panel = $this.parents('.myPanel');
		if($panel.find('.divPanel').is(':hidden')) {
			$panel.find('.divPanel').slideToggle();
			$panel.find('.panel-body .tableInput').focus();
			console.log("abierto");
		}else{
			$panel.find('.divPanel').slideToggle();
			$panel.find('.panel-body .tableInput').val("");
			$panel.find('.panel-body .tableInput').keyup();
		}

	});
	$('[data-toggle="tooltip"]').tooltip();
	$('[data-action="filter"]').filterTable();
});