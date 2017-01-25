// JavaScript Document
(function($) {
	
	$.fn.rowCount = function() {
    return $('tr', $(this).find('tbody')).length;
	};

	_LoadDataPage = function() 
	{
	    var $_cargando = $('#loadData');
	    var $_linea = $('#loadDataPorcentajeLinea');
	    var $_porcentaje = $('#loadDataPorcentaje');    
	    var _velocity = 1000;
	    function aumentar(e) 
		{
	        $_porcentaje.text(parseInt(e));
	    }
	    function cargando() 
		{
	        var porcen = 0;        
	        $_linea.stop().animate({width:porcen + '%'}, _velocity);
	        $_cargando.stop().animate({porcen:porcen},{duration: _velocity,step: aumentar});
	    }
	    function finalizando()
		{
	        var porcen = 100;
	        $_linea.stop().animate({width:porcen + '%'},(_velocity / 2));
	        $_cargando.stop().animate({porcen:porcen},{duration: (_velocity / 2),step: aumentar
	        }).css({opacity: 1}).animate({opacity: 0},function(){$_cargando.css({display:'none'});$("#loadData").remove();});
	    }
	    $(window).load(function(){
	        finalizando();
	    });
	};	
	
	$.download = function(url, data, method, callback){ 
		var inputs = ''; 
		var iframeX; 
		var downloadInterval; 
		if(url && data){ 
		// remove old iframe if has 
		if($("#iframeX")) $("#iframeX").remove(); 
		// creater new iframe 
		iframeX= $('<iframe src="javascript:false;" name="iframeX" id="iframeX"></iframe>').appendTo('body').hide(); 
		
		if (iframeX.attachEvent){ 
		iframeX.attachEvent("load", function(){ 
		callback(); 
		}); 
		} else { 
		iframeX.load(function() { 
		callback(); 
		}); 
		}
		/*iframeX.ready(function(){ 
		callback(); 
		}); */
		
		//split params into form inputs 
		$.each(data, function(p, val){ 
		inputs+='<input type="hidden" name="'+ p +'" value="'+ val +'" />'; 
		}); 
		
		//create form to send request 
		$('<form action="'+ url +'" method="'+ (method||'post') + '" target="iframeX">'+inputs+'</form>').appendTo('body').submit().remove(); 
		}; 
	};
	
	$.extend({ alert: function (message, title) {
		  $("<div></div>").dialog( {
			buttons: { "Cerrar": function () { $(this).dialog("close"); } },
			close: function (event, ui) { $(this).remove(); },
			open : function() {
				var t = $(this).parent();
				var  w = $(window);				
				var www = (t.width() / 2);
				t.offset({
					top:  (w.height() / 2) - (t.height() / 2),
					left: (w.width() / 2) - (t.width() / 2)
				});
			},
			resizable: false,
			position:"center",
			title: title,
			witdh:'auto',
			height: 'auto',
			overflow: 'auto',
			fluid:true,
			modal: true
		  }).html(message);
		}
	});
	
	////////////////////////////////////////
	//Eventos al presionar ENTER
	////////////////////////////////////////////////////////
  $.fn.extend({
		onEnter: function(fn) {
			if($.isFunction(fn)){
				this.each(function() {
					$(this).keypress(function(e){
						if(e.which == 13){
							e.preventDefault();
							return fn.call(this,e);
						}
					});
					$(this).bind('onEnter',fn)
				});
			}
			else{
				$(this).trigger('onEnter');
			}
			return this;
		}
  });
  
  $.fn.extend({
	   unchosen: function() {
        return $(this).each(function() {
            var element = $(this);
            if(element.hasClass('chzn-done')){
                //remove chosen
                element.next('[id*=_chzn]').remove(); //Make sure its id contain _chzn
                //remove chosen class in original combobox and make it visible
                element.removeClass('chzn-done').css('display','block');
            }
        });
    	}
  });

$.fn.extend({
  onNumeric: function(fn){
	  if($.isFunction(fn)){
		$(this).bind("paste", function (e) {
			return false;
		});
		$(this).bind("drop", function (e) {
			return false;
		});
		this.each(function() {
			$(this).keypress(function(e){
				var isFf = !(window.mozInnerScreenX == null);
				if(isFf){
					if((e.which >= 48 && e.which <= 57) || (e.which == 0) || (e.which == 8)){}else{e.preventDefault();}
				}
				else{
					if(e.which >= 48 && e.which <= 57){}else{e.preventDefault();}
				}
			});
		});
	  }
	}
});
  	
	////////////////////////////////////////////////////////
	//Eventos al presionar ESC
	////////////////////////////////////////////////////////
  $.fn.extend({
		onEsc: function(fn) {
			if($.isFunction(fn))
			{
				this.each(function() {
					$(this).keyup(function(e){
						if(e.which == 27)
						{
							e.preventDefault();
							return fn.call(this,e);
						}
					});
					$(this).bind('onEsc',fn)
				});
			}
			else
			{
				$(this).trigger('onEsc');
			}
			return this;
		}
  });
})(jQuery);