/*
 * Modified by Mewsoft www.mewsoft.com on 2/17/2015
 * Dr. Ahmed Amin Elsheshtawy ahmed@mewsoft.com
 *
 * DC jQuery Drill Down Menu - jQuery drill down ipod menu
 * Copyright (c) 2011 Design Chemical
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 */

(function($){

	//define the new for the plugin ans how to call it
	$.fn.dcDrilldown = function(options) {

		//set default options
		var defaults = {
			wrapper_class		: 'dd-wrapper',
			menu_class			: 'dd-menu',
			submenu_class	    : 'nav',
			parent_class		: 'dd-parent',
			parent_class_link	: 'dd-parent-a',
			active_class		: 'active',
			header_class_list   : 'breadcrumb',
			header_class		: 'breadcrumbwrapper',
			event_type			: 'click',
			hover_delay			: 300,
			speed				: 'slow',
			save_state			: true,
			show_count		    : false,
			count_class			: 'dd-count',
			icon_class		    : 'glyphicon glyphicon-chevron-right pull-right',
			link_type			: 'backlink', //breadcrumb , link, backlink
			reset_text		    : '<span class="glyphicon glyphicon-folder-open"></span>', // All
			default_text		: 'Select Option',
			menu_height         : false, // '200px' , false for auto height
			show_header		    : false,
			header_tag		    : 'div',// h3
			header_tag_class    : 'list-group-item active' // hidden list-group-item active
		};

		//call in the default options
		var options = $.extend(defaults, options);

		//act upon the element that is passed into the design
		return this.each(function(options){

			var $ddObj = this;
			
			$($ddObj).addClass(defaults.menu_class);
			// mewsoft
			$($ddObj).addClass(defaults.submenu_class);

			var $wrapperObj = '<div class="'+defaults.wrapper_class+'" />';

			$($ddObj).wrap($wrapperObj);

			var $wrapper = $($ddObj).parent();

			var objIndex = $($wrapper).index('.'+defaults.wrapper_class);

			var idHeader = defaults.header_class+'-'+objIndex;
			var idWrapper = defaults.wrapper_class+'-'+objIndex;

			$($wrapper).attr('id',idWrapper);

			var $header = '<div id="'+idHeader+'" class="'+defaults.header_class+'"></div>';

			setUpDrilldown();

			if(defaults.save_state == true){
				var cookieId = defaults.wrapper_class+'-'+objIndex;
				checkCookie(cookieId, $ddObj);
			}

			resetDrilldown($ddObj, $wrapper);
			//resetDrilldown($('>li',$ddObj), $wrapper);
			

			$('li a',$ddObj).click(function(e){

				$link = this;
				$activeLi = $(this).parent('li').stop();
				$siblingsLi = $($activeLi).siblings();

				// Drilldown action
				if($('> ul',$activeLi).length){
					if($($link).hasClass(defaults.active_class)){
						$('ul a',$activeLi).removeClass(defaults.active_class);
						resetDrilldown($ddObj, $wrapper);
					} else {
						actionDrillDown($activeLi, $wrapper, $ddObj);
					}
				}

				// Prevent browsing to link if has child links
				if($(this).next('ul').length > 0){
					e.preventDefault();
					// mewsoft
					e.stopPropagation();
					$($link).trigger('drilldown.parentclick');
				}
				else {
					// mewsoft
					//$($link).trigger('click');
				}
				$($link).trigger('drilldown.linklclick');
			});

			// Set up accordion
			function setUpDrilldown(){

				// mewsoft
				$('ul',$ddObj).each(function(){
					$(this).addClass(defaults.submenu_class);
				});

				$arrow = '<span class="'+defaults.icon_class+'"></span>';
				$($ddObj).before($header);

				// Get width of menu container & height of list item
				var totalWidth = $($ddObj).outerWidth();
				totalWidth += 'px';
				var itemHeight = $('li',$ddObj).outerHeight(true);

				// Get height of largest sub menu
				var objUl = $('ul',$ddObj);
				var maxItems = findMaxHeight(objUl);

				// Get level of largest sub menu
				// mewsoft
				//var maxUl = $(objUl+'[rel="'+maxItems+'"]');
				var maxUl = $('[rel="'+maxItems+'"]', objUl);
				var getIndex = findMaxIndex(maxUl);

				// Set menu container height
				if(defaults.link_type == 'link'){
					menuHeight = itemHeight * (maxItems + getIndex);
				} else {
					menuHeight = itemHeight * maxItems;

				}
				//-------------------------------
				// mewsoft
				var showObj = $('> ul', $wrapper);
				var itemCount = $('>li', showObj).length;
				var menuHeight = itemHeight * itemCount + $($header).height();
				
				if (defaults.menu_height) {
					$($ddObj).css({height: defaults.menu_height, width: totalWidth, 'overflow-y':'auto', 'overflow-x':'hidden'});
				}
				else {
					$($ddObj).css({height: menuHeight+'px', width: totalWidth});
				}

				// mewsoft
				$(window).resize(function(){
					var totalWidth = $($wrapper).outerWidth();
					totalWidth += 'px';
					$($ddObj).css({width: totalWidth});
				});
				//-------------------------------
				// Set sub menu width and offset
				$('li',$ddObj).each(function(){
					$(this).css({width: totalWidth});
					$('ul',this).css({width: totalWidth, marginRight: '-'+totalWidth, marginTop: '0'});
					if($('> ul',this).length){
						$(this).addClass(defaults.parent_class);
						$('> a',this).addClass(defaults.parent_class_link).append($arrow);
						if(defaults.show_count == true){
							var parentLink = $('a:not(.'+defaults.parent_class_link+')',this);
							var countParent = parseInt($(parentLink).length);
							getCount = countParent;
							$('> a',this).append(' <span class="'+defaults.count_class+'">('+getCount+')</span>');
						}
					}
				});

				// Add css class
				$('ul',$wrapper).each(function(){
					// mewsoft
					//$(this).addClass(defaults.submenu_class);
					$('li:last',this).addClass('last');
				});

				$('> ul > li:last',$wrapper).addClass('last');

				if(defaults.link_type == 'link'){
					$(objUl).css('top',itemHeight+'px');
				}
			}

			// Breadcrumbs
			// mewsoft
			//$('#'+idHeader+' a').live('click',function(e){
			$('#'+idHeader).on('click', 'a', function(e){

				if($(this).hasClass('link-back')){
					linkIndex = $('#'+idWrapper+' .'+defaults.parent_class_link+'.active').length;
					linkIndex = linkIndex-2;
					$('a.'+defaults.active_class+':last', $ddObj).removeClass(defaults.active_class);
				} else {
					// Get link index
					var linkIndex = parseInt($(this).index('#'+idHeader+' a'));
					if(linkIndex == 0){
						$('a',$ddObj).removeClass(defaults.active_class);
					} else {
						// Select equivalent active link
						linkIndex = linkIndex-1;
						$('a.'+defaults.active_class+':gt('+linkIndex+')',$ddObj).removeClass(defaults.active_class);
					}
				}

				resetDrilldown($ddObj, $wrapper);

				e.preventDefault();
				// mewsoft
				$($ddObj).trigger('drilldown.linklclick');
			});
		});

		function findMaxHeight(element){
			var maxValue = undefined;
			$(element).each(function(){
				var val = parseInt($('> li',this).length);
				$(this).attr('rel',val);
				if (maxValue === undefined || maxValue < val){
					maxValue = val;
				}
			});
			return maxValue;
		}

		function findMaxIndex(element){
			var maxIndex = undefined;
			$(element).each(function(){
				var val = parseInt($(this).parents('li').length);
				if (maxIndex === undefined || maxIndex < val) {
					maxIndex = val;
				}
			});
			return maxIndex;
		}

		// Drill Down
		function actionDrillDown(element, wrapper, obj){
			//actionDrillDown($activeLi, $wrapper, $ddObj);
			// Declare header
			var $header = $('.'+defaults.header_class, wrapper);

			// Get new breadcrumb and header text
			var getNewBreadcrumb = $(defaults.header_tag,$header).text(); // .html()
			var getNewHeaderText = $('> a',element).text(); // .html()

			// Add new breadcrumb
			if(defaults.link_type == 'breadcrumb'){
				if(!$('ul',$header).length){
					// edit mewsoft
					$($header).prepend('<ul class="'+defaults.header_class_list+'"></ul>');
				}
				if(getNewBreadcrumb == defaults.default_text){
					// edit mewsoft
					$('ul',$header).append('<li class="first"><a href="#">'+defaults.reset_text+'</a></li>');
				} else {
					// mewsoft
					$('ul li:last-child',$header).remove();
					$('ul',$header).append('<li><a href="#">'+getNewBreadcrumb+'</a></li>');
				}
				// mewsoft
				$('ul',$header).append('<li class="active">'+getNewHeaderText+'</li>');
			}

			if(defaults.link_type == 'backlink'){
				if(!$('a',$header).length){
					$($header).prepend('<a href="#" class="link-back">'+getNewBreadcrumb+'</a>');
				} else {
					$('.link-back',$header).html(getNewBreadcrumb);
				}
			}
			if(defaults.link_type == 'link'){
				if(!$('a',$header).length){
					$($header).prepend('<ul><li class="first"><a href="#">'+defaults.reset_text+'</a></li></ul>');
				}
			}
			// Update header text
			updateHeader($header, getNewHeaderText);

			// declare child link
			var activeLink = $('> a',element);

			// add active class to link
			$(activeLink).addClass(defaults.active_class);
			//-----------------------------------
			// mewsoft
			var showObj = $('> ul',element);
			var itemHeight = $(element).outerHeight(true);
			var itemCount = $('>li', showObj).length;
			var menuHeight = itemHeight * itemCount;
			$(obj).css({height: menuHeight+'px'});
			var menuHeight = itemHeight * itemCount + $($header).height();

			if (defaults.menu_height) {
				$(wrapper).css({height: defaults.menu_height, 'overflow-y':'auto', 'overflow-x':'hidden'});
			}
			else {
				$(wrapper).css({height: menuHeight+'px'});
			}
			//-----------------------------------
			$('> ul li',element).show();
			$('> ul',element).animate({"margin-right": 0}, defaults.speed);

			// Find all sibling items & hide
			var $siblingsLi = $(element).siblings();
			$($siblingsLi).hide();

			// If using breadcrumbs hide this element
			if(defaults.link_type != 'link'){
				$(activeLink).hide();
			}

			// Write cookie if save state is on
			if(defaults.save_state == true){
				var cookieId = $(wrapper).attr('id');
				createCookie(cookieId, obj);
			}
		}

		// Drill Up
		function actionDrillUp(element, obj, wrapper){
			// Declare header
			var $header = $('.'+defaults.header_class, wrapper);

			var activeLink = $('> a',element);
			var checklength = $('.'+defaults.active_class, wrapper).length;
			var activeIndex = $(activeLink).index('.'+defaults.active_class, wrapper);

			// Get width of menu for animating right
			var totalWidth = $(obj).outerWidth(true);
			$('ul',element).css('margin-right',-totalWidth+'px');

			// Show all elements
			$(activeLink).addClass(defaults.active_class);
			$('> ul li',element).show();
			$('a',element).show();

			// Get new header text from clicked link
			var getNewHeaderText = $('> a',element).html();
			$(defaults.header_tag,$header).html(getNewHeaderText);

			if(defaults.link_type == 'breadcrumb'){
				var breadcrumbIndex = activeIndex-1;
				$('a:gt('+activeIndex+')',$header).remove();
			}
		}

		function updateHeader(obj, html){
			// mewsoft
			if(!$(defaults.header_tag,obj).length){
				if(defaults.show_header == true){
					$(obj).append('<'+defaults.header_tag+' class="'+defaults.header_tag_class+'"</'+defaults.header_tag+'>');
				}
				else {
					$(obj).append('<'+defaults.header_tag+' class="hidden '+defaults.header_tag_class+'"</'+defaults.header_tag+'>');
				}
			}

			//if(defaults.show_header == true){
			//	if($(defaults.header_tag,obj).length){
					$(defaults.header_tag,obj).html(html);
			//	} else {
			//		$(obj).append('<'+defaults.header_tag+' class="'+defaults.header_tag_class+'">'+html+'</'+defaults.header_tag+'>');
			//	}
			//}
		}

		// Reset accordion using active links
		function resetDrilldown(obj, wrapper){
			var $header = $('.'+defaults.header_class, wrapper);
			$('ul',$header).remove();
			$('a',$header).remove();
			$('li',obj).show();
			$('a',obj).show();
			var totalWidth = $(obj).outerWidth(true);
			if(defaults.link_type == "link"){
				if($('a.'+defaults.active_class+':last',obj).parent('li').length){
					var lastActive = $('a.'+defaults.active_class+':last',obj).parent('li');
					$('ul',lastActive).css('margin-right',-totalWidth+'px');
				}else {
				$('ul',obj).css('margin-right',-totalWidth+'px');
				}
			} else {
				$('ul',obj).css('margin-right',-totalWidth+'px');
			}
			updateHeader($header, defaults.default_text);

			// Write cookie if save state is on
			if(defaults.save_state == true){
				var cookieId = $(wrapper).attr('id');
				createCookie(cookieId, obj);
			}
			
			// mewsoft
			var activeObj = obj;

			$('a.'+defaults.active_class,obj).each(function(i){
				var $activeLi = $(this).parent('li').stop();
				actionDrillDown($activeLi, wrapper, obj);
				// mewsoft
				activeObj = $(this).parent('li');
			});
			//-----------------------------------
			// mewsoft
			var showObj;
			if ($('> ul', activeObj).length){
				showObj = $('> ul', activeObj);
			}
			else {
				// root ul
				var showObj = activeObj;
			}
			var itemCount = $('>li', showObj).length;
			var itemHeight = $('li',showObj).outerHeight(true);
			var menuHeight = (itemHeight * itemCount) + $($header).outerHeight(true);
			
			if (defaults.menu_height) {
				$(wrapper).css({height: defaults.menu_height,'overflow-y':'auto', 'overflow-x':'hidden'});
				$(obj).css({height: defaults.menu_height});
			}
			else {
				$(wrapper).css({height: menuHeight+'px'});
				$(obj).css({height: menuHeight+'px'});
			}

			//-----------------------------------
		}

		// Retrieve cookie value and set active items
		function checkCookie(cookieId, obj){
			var cookieVal = $.cookie(cookieId);
			if(cookieVal != null){
				// create array from cookie string
				var activeArray = cookieVal.split(',');
				$.each(activeArray, function(index,value){
					// mewsoft. fix firefox root menu not shown
					value = parseInt(value) + 0;
					var $cookieLi = $('li:eq('+value+')',obj);
					$('> a',$cookieLi).addClass(defaults.active_class);
				});
			}
		}

		// Write cookie
		function createCookie(cookieId, obj){
			var activeIndex = [];
			// Create array of active items index value
			$('a.'+defaults.active_class,obj).each(function(i){
				var $arrayItem = $(this).parent('li');
				var itemIndex = $('li',obj).index($arrayItem);
				activeIndex.push(itemIndex);
			});
			// Store in cookie
			$.cookie(cookieId, activeIndex, { path: '/' });
		}
	};
})(jQuery);


			$(document).ready(function($){
			
				$('#drilldown').dcDrilldown({
                    wrapper_class	    : 'dd-wrapper',
                    menu_class		    : 'dd-menu',
                    submenu_class	    : 'nav',
                    parent_class		: 'dd-parent',
                    parent_class_link	: 'dd-parent-a',
                    active_class		: 'active',
                    header_class_list   : 'breadcrumb',
                    header_class		: 'breadcrumbwrapper',
                    event_type		    : 'click',
                    hover_delay		    : 300,
                    speed       	    : 'fast',
                    save_state		    : true,
                    show_count		    : false,
                    count_class		    : 'dd-count',
                    icon_class		    : 'glyphicon glyphicon-chevron-right pull-right',
                    link_type		    : 'breadcrumb', //breadcrumb , link, backlink
                    reset_text		    : '<span class="glyphicon glyphicon-folder-open"></span>', // All
                    default_text	    : 'Select Category',
                    menu_height         : false, // '200px' , false for auto height
                    show_header		    : false,
                    header_tag		    : 'div',// h3
                    header_tag_class    : 'list-group-item active' // hidden list-group-item active
				});

                $('#drilldown').on('click', function(e){
                  //  console.log('click');
                });
			
                $('#drilldown').on('drilldown.parentclick', function(e){
                    //console.log('drilldown.parentclick');
                });
                $('#drilldown').on('drilldown.linklclick', function(e){
                    //console.log('drilldown.linklclick');
                });
			});


//----------------------------------------------------------------
/*! jquery.cookie v1.4.1 | MIT */ ! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? a(require("jquery")) : a(jQuery)
}(function(a) {
    function b(a) {
        return h.raw ? a : encodeURIComponent(a)
    }

    function c(a) {
        return h.raw ? a : decodeURIComponent(a)
    }

    function d(a) {
        return b(h.json ? JSON.stringify(a) : String(a))
    }

    function e(a) {
        0 === a.indexOf('"') && (a = a.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            return a = decodeURIComponent(a.replace(g, " ")), h.json ? JSON.parse(a) : a
        } catch (b) {}
    }

    function f(b, c) {
        var d = h.raw ? b : e(b);
        return a.isFunction(c) ? c(d) : d
    }
    var g = /\+/g,
        h = a.cookie = function(e, g, i) {
            if (void 0 !== g && !a.isFunction(g)) {
                if (i = a.extend({}, h.defaults, i), "number" == typeof i.expires) {
                    var j = i.expires,
                        k = i.expires = new Date;
                    k.setTime(+k + 864e5 * j)
                }
                return document.cookie = [b(e), "=", d(g), i.expires ? "; expires=" + i.expires.toUTCString() : "", i.path ? "; path=" + i.path : "", i.domain ? "; domain=" + i.domain : "", i.secure ? "; secure" : ""].join("")
            }
            for (var l = e ? void 0 : {}, m = document.cookie ? document.cookie.split("; ") : [], n = 0, o = m.length; o > n; n++) {
                var p = m[n].split("="),
                    q = c(p.shift()),
                    r = p.join("=");
                if (e && e === q) {
                    l = f(r, g);
                    break
                }
                e || void 0 === (r = f(r)) || (l[q] = r)
            }
            return l
        };
    h.defaults = {}, a.removeCookie = function(b, c) {
        return void 0 === a.cookie(b) ? !1 : (a.cookie(b, "", a.extend({}, c, {
            expires: -1
        })), !a.cookie(b))
    }
});