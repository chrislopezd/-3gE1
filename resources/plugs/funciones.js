// JavaScript Document
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}
function correoV(mail){
	var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	return (filter.test(mail)) ? true : false;
}
function showerror(o){
	o.parents('.form-group').addClass('has-error');
}
function dump(arr,level){
	var dumped_text = "";
	if(!level) level = 0;
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";	
	if(typeof(arr) == 'object'){
		for(var item in arr){
			var value = arr[item];
			if(typeof(value) == 'object'){
				dumped_text += level_padding + "'" + item + "' ...\n";
				dumped_text += dump(value,level+1);
			}
			else{
				dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
			}
		}
	}
	else{
		dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text;
}
function dialogoMensaje(msg,_title){
	_title = (_title == "") ? "Error" : _title;
	$("<div></div>").dialog( {
		position:'top',
		buttons: [{
			text: "Salir",
			click: function() {
				$( this ).remove();
			}
		}
		],
		close: function (event, ui) { $(this).remove(); },
		resizable: false,
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
function Numeric(obj){	
    $(obj).bind("keypress", function (e) {
		var keyCode = e.which ? e.which : e.keyCode
		var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);		
		return ret;
	});
	$(obj).bind("paste", function (e) {	
		return false;
	});
	$(obj).bind("drop", function (e) {		
		return false;
	});  	
}
function in_array (needle, haystack, argStrict){  
  var key = '',
  strict = !! argStrict;
  if(strict){
    for (key in haystack){
      if (haystack[key] === needle){
        return true;
      }
    }
  } 
  else{
    for (key in haystack){
      if (haystack[key] == needle){
        return true;
      }
    }
  }
  return false;
}
function zeroPad(num,count){
	var numZeropad = num + '';
	while(numZeropad.length < count) {
		numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
function fechaCalendar(obj){
	$(obj).datepicker({ dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true,dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']});
}
$().ready(function() {
	fechaCalendar($(".fecha"));
	$(document).on( 'scroll', function(){if($(window).scrollTop() > 100) {$('.scrollTop').addClass('showUp');}else{$('.scrollTop').removeClass('showUp');}});$('.scrollTop').on('click', scrollToTop);
});