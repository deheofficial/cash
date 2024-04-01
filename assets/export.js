/**

 * jquery.gallery.js

 * http://www.codrops.com

 *

 * Copyright 2011, Pedro Botelho / Codrops

 * Free to use under the MIT license.

 *

 * Date: Mon Jan 30 2012

 */

(function(){function j(a,c){return[].slice.call((c||document).querySelectorAll(a))}if(window.addEventListener){var g=window.StyleFix={link:function(a){try{if("stylesheet"!==a.rel||a.hasAttribute("data-noprefix"))return}catch(c){return}var i=a.href||a.getAttribute("data-href"),f=i.replace(/[^\/]+$/,""),j=(/^[a-z]{3,10}:/.exec(f)||[""])[0],k=(/^[a-z]{3,10}:\/\/[^\/]+/.exec(f)||[""])[0],h=/^([^?]*)\??/.exec(i)[1],n=a.parentNode,e=new XMLHttpRequest,b;e.onreadystatechange=function(){4===e.readyState&&

b()};b=function(){var c=e.responseText;if(c&&a.parentNode&&(!e.status||400>e.status||600<e.status)){c=g.fix(c,!0,a);if(f)var c=c.replace(/url\(\s*?((?:"|')?)(.+?)\1\s*?\)/gi,function(a,c,b){return/^([a-z]{3,10}:|#)/i.test(b)?a:/^\/\//.test(b)?'url("'+j+b+'")':/^\//.test(b)?'url("'+k+b+'")':/^\?/.test(b)?'url("'+h+b+'")':'url("'+f+b+'")'}),b=f.replace(/([\\\^\$*+[\]?{}.=!:(|)])/g,"\\$1"),c=c.replace(RegExp("\\b(behavior:\\s*?url\\('?\"?)"+b,"gi"),"$1");b=document.createElement("style");b.textContent=

c;b.media=a.media;b.disabled=a.disabled;b.setAttribute("data-href",a.getAttribute("href"));n.insertBefore(b,a);n.removeChild(a);b.media=a.media}};try{e.open("GET",i),e.send(null)}catch(r){"undefined"!=typeof XDomainRequest&&(e=new XDomainRequest,e.onerror=e.onprogress=function(){},e.onload=b,e.open("GET",i),e.send(null))}a.setAttribute("data-inprogress","")},styleElement:function(a){if(!a.hasAttribute("data-noprefix")){var c=a.disabled;a.textContent=g.fix(a.textContent,!0,a);a.disabled=c}},styleAttribute:function(a){var c=

a.getAttribute("style"),c=g.fix(c,!1,a);a.setAttribute("style",c)},process:function(){j('link[rel="stylesheet"]:not([data-inprogress])').forEach(StyleFix.link);j("style").forEach(StyleFix.styleElement);j("[style]").forEach(StyleFix.styleAttribute)},register:function(a,c){(g.fixers=g.fixers||[]).splice(void 0===c?g.fixers.length:c,0,a)},fix:function(a,c,i){for(var f=0;f<g.fixers.length;f++)a=g.fixers[f](a,c,i)||a;return a},camelCase:function(a){return a.replace(/-([a-z])/g,function(a,g){return g.toUpperCase()}).replace("-",

"")},deCamelCase:function(a){return a.replace(/[A-Z]/g,function(a){return"-"+a.toLowerCase()})}};setTimeout(function(){j('link[rel="stylesheet"]').forEach(StyleFix.link)},10);document.addEventListener("DOMContentLoaded",StyleFix.process,!1)}})();

(function(j){function g(d,b,c,e,f){d=a[d];d.length&&(d=RegExp(b+"("+d.join("|")+")"+c,"gi"),f=f.replace(d,e));return f}if(window.StyleFix&&window.getComputedStyle){var a=window.PrefixFree={prefixCSS:function(d,b){var c=a.prefix;-1<a.functions.indexOf("linear-gradient")&&(d=d.replace(/(\s|:|,)(repeating-)?linear-gradient\(\s*(-?\d*\.?\d*)deg/ig,function(a,d,b,c){return d+(b||"")+"linear-gradient("+(90-c)+"deg"}));d=g("functions","(\\s|:|,)","\\s*\\(","$1"+c+"$2(",d);d=g("keywords","(\\s|:)","(\\s|;|\\}|$)",

"$1"+c+"$2$3",d);d=g("properties","(^|\\{|\\s|;)","\\s*:","$1"+c+"$2:",d);if(a.properties.length)var e=RegExp("\\b("+a.properties.join("|")+")(?!:)","gi"),d=g("valueProperties","\\b",":(.+?);",function(a){return a.replace(e,c+"$1")},d);b&&(d=g("selectors","","\\b",a.prefixSelector,d),d=g("atrules","@","\\b","@"+c+"$1",d));d=d.replace(RegExp("-"+c,"g"),"-");return d=d.replace(/-\*-(?=[a-z]+)/gi,a.prefix)},property:function(d){return(a.properties.indexOf(d)?a.prefix:"")+d},value:function(d){d=g("functions",

"(^|\\s|,)","\\s*\\(","$1"+a.prefix+"$2(",d);return d=g("keywords","(^|\\s)","(\\s|$)","$1"+a.prefix+"$2$3",d)},prefixSelector:function(d){return d.replace(/^:{1,2}/,function(d){return d+a.prefix})},prefixProperty:function(d,b){var c=a.prefix+d;return b?StyleFix.camelCase(c):c}},c={},i=[],f=getComputedStyle(document.documentElement,null),p=document.createElement("div").style,k=function(a){if("-"===a.charAt(0)){i.push(a);var a=a.split("-"),b=a[1];for(c[b]=++c[b]||1;3<a.length;)a.pop(),b=a.join("-"),

StyleFix.camelCase(b)in p&&-1===i.indexOf(b)&&i.push(b)}};if(0<f.length)for(var h=0;h<f.length;h++)k(f[h]);else for(var n in f)k(StyleFix.deCamelCase(n));var h=0,e,b;for(b in c)f=c[b],h<f&&(e=b,h=f);a.prefix="-"+e+"-";a.Prefix=StyleFix.camelCase(a.prefix);a.properties=[];for(h=0;h<i.length;h++)n=i[h],0===n.indexOf(a.prefix)&&(e=n.slice(a.prefix.length),StyleFix.camelCase(e)in p||a.properties.push(e));"Ms"==a.Prefix&&(!("transform"in p)&&!("MsTransform"in p)&&"msTransform"in p)&&a.properties.push("transform",

"transform-origin");a.properties.sort();e=function(a,b){r[b]="";r[b]=a;return!!r[b]};b={"linear-gradient":{property:"backgroundImage",params:"red, teal"},calc:{property:"width",params:"1px + 5%"},element:{property:"backgroundImage",params:"#foo"},"cross-fade":{property:"backgroundImage",params:"url(a.png), url(b.png), 50%"}};b["repeating-linear-gradient"]=b["repeating-radial-gradient"]=b["radial-gradient"]=b["linear-gradient"];h={initial:"color","zoom-in":"cursor","zoom-out":"cursor",box:"display",

flexbox:"display","inline-flexbox":"display",flex:"display","inline-flex":"display"};a.functions=[];a.keywords=[];var r=document.createElement("div").style,l;for(l in b)k=b[l],f=k.property,k=l+"("+k.params+")",!e(k,f)&&e(a.prefix+k,f)&&a.functions.push(l);for(var m in h)f=h[m],!e(m,f)&&e(a.prefix+m,f)&&a.keywords.push(m);l=function(a){s.textContent=a+"{}";return!!s.sheet.cssRules.length};m={":read-only":null,":read-write":null,":any-link":null,"::selection":null};e={keyframes:"name",viewport:null,

document:'regexp(".")'};a.selectors=[];a.atrules=[];var s=j.appendChild(document.createElement("style")),q;for(q in m)b=q+(m[q]?"("+m[q]+")":""),!l(b)&&l(a.prefixSelector(b))&&a.selectors.push(q);for(var t in e)b=t+" "+(e[t]||""),!l("@"+b)&&l("@"+a.prefix+b)&&a.atrules.push(t);j.removeChild(s);a.valueProperties=["transition","transition-property"];j.className+=" "+a.prefix;StyleFix.register(a.prefixCSS)}})(document.documentElement);



//alert(navigator.appName);

//document.getElementById("browser").value=navigator.appName;

if(navigator.appName=="Microsoft Internet Explorer")

{

    //alert(navigator.appVersion);

    alert('Sila gunakan pelayar Google Chrome atau Mozilla Firefox bagi melayari sistem ini, Harap Maklum. !');

    window.location='/erumah/browser.html';

}



(function( $, undefined ) {

	

	/*

	 * Gallery object.

	 */

	$.Gallery 				= function( options, element ) {

	

		this.$el	= $( element );

		this._init( options );

		

	};

	

	$.Gallery.defaults 		= {

		current		: 0,	// index of current item

		autoplay	: false,// slideshow on / off

		interval	: 2000  // time between transitions

    };

	

	$.Gallery.prototype 	= {

		_init 				: function( options ) {

			

			this.options 		= $.extend( true, {}, $.Gallery.defaults, options );

			

			// support for 3d / 2d transforms and transitions

			this.support3d		= Modernizr.csstransforms3d;

			this.support2d		= Modernizr.csstransforms;

			this.supportTrans	= Modernizr.csstransitions;

			

			this.$wrapper		= this.$el.find('.dg-wrapper');

			

			this.$items			= this.$wrapper.children();

			this.itemsCount		= this.$items.length;

			

			this.$nav			= this.$el.find('nav');

			this.$navPrev		= this.$nav.find('.dg-prev');

			this.$navNext		= this.$nav.find('.dg-next');

			

			// minimum of 3 items

			if( this.itemsCount < 3 ) {

					

				this.$nav.remove();

				return false;

			

			}	

			

			this.current		= this.options.current;

			

			this.isAnim			= false;

			

			this.$items.css({

				'opacity'	: 0,

				'visibility': 'hidden'

			});

			

			this._validate();

			

			this._layout();

			

			// load the events

			this._loadEvents();

			

			// slideshow

			if( this.options.autoplay ) {

			

				this._startSlideshow();

			

			}

			

		},

		_validate			: function() {

		

			if( this.options.current < 0 || this.options.current > this.itemsCount - 1 ) {

				

				this.current = 0;

			

			}	

		

		},

		_layout				: function() {

			

			// current, left and right items

			this._setItems();

			

			// current item is not changed

			// left and right one are rotated and translated

			var leftCSS, rightCSS, currentCSS;

			

			if( this.support3d && this.supportTrans ) {

			

				leftCSS 	= {

					'-webkit-transform'	: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

					'-moz-transform'	: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

					'-o-transform'		: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

					'-ms-transform'		: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

					'transform'			: 'translateX(-350px) translateZ(-200px) rotateY(45deg)'

				};

				

				rightCSS	= {

					'-webkit-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

					'-moz-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

					'-o-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

					'-ms-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

					'transform'			: 'translateX(350px) translateZ(-200px) rotateY(-45deg)'

				};

				

				leftCSS.opacity		= 1;

				leftCSS.visibility	= 'visible';

				rightCSS.opacity	= 1;

				rightCSS.visibility	= 'visible';

			

			}

			else if( this.support2d && this.supportTrans ) {

				

				leftCSS 	= {

					'-webkit-transform'	: 'translate(-350px) scale(0.8)',

					'-moz-transform'	: 'translate(-350px) scale(0.8)',

					'-o-transform'		: 'translate(-350px) scale(0.8)',

					'-ms-transform'		: 'translate(-350px) scale(0.8)',

					'transform'			: 'translate(-350px) scale(0.8)'

				};

				

				rightCSS	= {

					'-webkit-transform'	: 'translate(350px) scale(0.8)',

					'-moz-transform'	: 'translate(350px) scale(0.8)',

					'-o-transform'		: 'translate(350px) scale(0.8)',

					'-ms-transform'		: 'translate(350px) scale(0.8)',

					'transform'			: 'translate(350px) scale(0.8)'

				};

				

				currentCSS	= {

					'z-index'			: 999

				};

				

				leftCSS.opacity		= 1;

				leftCSS.visibility	= 'visible';

				rightCSS.opacity	= 1;

				rightCSS.visibility	= 'visible';

			

			}

			

			this.$leftItm.css( leftCSS || {} );

			this.$rightItm.css( rightCSS || {} );

			

			this.$currentItm.css( currentCSS || {} ).css({

				'opacity'	: 1,

				'visibility': 'visible'

			}).addClass('dg-center');

			

		},

		_setItems			: function() {

			

			this.$items.removeClass('dg-center');

			

			this.$currentItm	= this.$items.eq( this.current );

			this.$leftItm		= ( this.current === 0 ) ? this.$items.eq( this.itemsCount - 1 ) : this.$items.eq( this.current - 1 );

			this.$rightItm		= ( this.current === this.itemsCount - 1 ) ? this.$items.eq( 0 ) : this.$items.eq( this.current + 1 );

			

			if( !this.support3d && this.support2d && this.supportTrans ) {

			

				this.$items.css( 'z-index', 1 );

				this.$currentItm.css( 'z-index', 999 );

			

			}

			

			// next & previous items

			if( this.itemsCount > 3 ) {

			

				// next item

				this.$nextItm		= ( this.$rightItm.index() === this.itemsCount - 1 ) ? this.$items.eq( 0 ) : this.$rightItm.next();

				this.$nextItm.css( this._getCoordinates('outright') );

				

				// previous item

				this.$prevItm		= ( this.$leftItm.index() === 0 ) ? this.$items.eq( this.itemsCount - 1 ) : this.$leftItm.prev();

				this.$prevItm.css( this._getCoordinates('outleft') );

			

			}

			

		},

		_loadEvents			: function() {

			

			var _self	= this;

			

			this.$navPrev.on( 'click.gallery', function( event ) {

				

				if( _self.options.autoplay ) {

				

					clearTimeout( _self.slideshow );

					_self.options.autoplay	= false;

				

				}

				

				_self._navigate('prev');

				return false;

				

			});

			

			this.$navNext.on( 'click.gallery', function( event ) {

				

				if( _self.options.autoplay ) {

				

					clearTimeout( _self.slideshow );

					_self.options.autoplay	= false;

				

				}

				

				_self._navigate('next');

				return false;

				

			});

			

			this.$wrapper.on( 'webkitTransitionEnd.gallery transitionend.gallery OTransitionEnd.gallery', function( event ) {

				

				_self.$currentItm.addClass('dg-center');

				_self.$items.removeClass('dg-transition');

				_self.isAnim	= false;

				

			});

			

		},

		_getCoordinates		: function( position ) {

			

			if( this.support3d && this.supportTrans ) {

			

				switch( position ) {

					case 'outleft':

						return {

							'-webkit-transform'	: 'translateX(-450px) translateZ(-300px) rotateY(45deg)',

							'-moz-transform'	: 'translateX(-450px) translateZ(-300px) rotateY(45deg)',

							'-o-transform'		: 'translateX(-450px) translateZ(-300px) rotateY(45deg)',

							'-ms-transform'		: 'translateX(-450px) translateZ(-300px) rotateY(45deg)',

							'transform'			: 'translateX(-450px) translateZ(-300px) rotateY(45deg)',

							'opacity'			: 0,

							'visibility'		: 'hidden'

						};

						break;

					case 'outright':

						return {

							'-webkit-transform'	: 'translateX(450px) translateZ(-300px) rotateY(-45deg)',

							'-moz-transform'	: 'translateX(450px) translateZ(-300px) rotateY(-45deg)',

							'-o-transform'		: 'translateX(450px) translateZ(-300px) rotateY(-45deg)',

							'-ms-transform'		: 'translateX(450px) translateZ(-300px) rotateY(-45deg)',

							'transform'			: 'translateX(450px) translateZ(-300px) rotateY(-45deg)',

							'opacity'			: 0,

							'visibility'		: 'hidden'

						};

						break;

					case 'left':

						return {

							'-webkit-transform'	: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

							'-moz-transform'	: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

							'-o-transform'		: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

							'-ms-transform'		: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

							'transform'			: 'translateX(-350px) translateZ(-200px) rotateY(45deg)',

							'opacity'			: 1,

							'visibility'		: 'visible'

						};

						break;

					case 'right':

						return {

							'-webkit-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

							'-moz-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

							'-o-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

							'-ms-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

							'transform'			: 'translateX(350px) translateZ(-200px) rotateY(-45deg)',

							'opacity'			: 1,

							'visibility'		: 'visible'

						};

						break;

					case 'center':

						return {

							'-webkit-transform'	: 'translateX(0px) translateZ(0px) rotateY(0deg)',

							'-moz-transform'	: 'translateX(0px) translateZ(0px) rotateY(0deg)',

							'-o-transform'		: 'translateX(0px) translateZ(0px) rotateY(0deg)',

							'-ms-transform'		: 'translateX(0px) translateZ(0px) rotateY(0deg)',

							'transform'			: 'translateX(0px) translateZ(0px) rotateY(0deg)',

							'opacity'			: 1,

							'visibility'		: 'visible'

						};

						break;

				};

			

			}

			else if( this.support2d && this.supportTrans ) {

			

				switch( position ) {

					case 'outleft':

						return {

							'-webkit-transform'	: 'translate(-450px) scale(0.7)',

							'-moz-transform'	: 'translate(-450px) scale(0.7)',

							'-o-transform'		: 'translate(-450px) scale(0.7)',

							'-ms-transform'		: 'translate(-450px) scale(0.7)',

							'transform'			: 'translate(-450px) scale(0.7)',

							'opacity'			: 0,

							'visibility'		: 'hidden'

						};

						break;

					case 'outright':

						return {

							'-webkit-transform'	: 'translate(450px) scale(0.7)',

							'-moz-transform'	: 'translate(450px) scale(0.7)',

							'-o-transform'		: 'translate(450px) scale(0.7)',

							'-ms-transform'		: 'translate(450px) scale(0.7)',

							'transform'			: 'translate(450px) scale(0.7)',

							'opacity'			: 0,

							'visibility'		: 'hidden'

						};

						break;

					case 'left':

						return {

							'-webkit-transform'	: 'translate(-350px) scale(0.8)',

							'-moz-transform'	: 'translate(-350px) scale(0.8)',

							'-o-transform'		: 'translate(-350px) scale(0.8)',

							'-ms-transform'		: 'translate(-350px) scale(0.8)',

							'transform'			: 'translate(-350px) scale(0.8)',

							'opacity'			: 1,

							'visibility'		: 'visible'

						};

						break;

					case 'right':

						return {

							'-webkit-transform'	: 'translate(350px) scale(0.8)',

							'-moz-transform'	: 'translate(350px) scale(0.8)',

							'-o-transform'		: 'translate(350px) scale(0.8)',

							'-ms-transform'		: 'translate(350px) scale(0.8)',

							'transform'			: 'translate(350px) scale(0.8)',

							'opacity'			: 1,

							'visibility'		: 'visible'

						};

						break;

					case 'center':

						return {

							'-webkit-transform'	: 'translate(0px) scale(1)',

							'-moz-transform'	: 'translate(0px) scale(1)',

							'-o-transform'		: 'translate(0px) scale(1)',

							'-ms-transform'		: 'translate(0px) scale(1)',

							'transform'			: 'translate(0px) scale(1)',

							'opacity'			: 1,

							'visibility'		: 'visible'

						};

						break;

				};

			

			}

			else {

			

				switch( position ) {

					case 'outleft'	: 

					case 'outright'	: 

					case 'left'		: 

					case 'right'	:

						return {

							'opacity'			: 0,

							'visibility'		: 'hidden'

						};

						break;

					case 'center'	:

						return {

							'opacity'			: 1,

							'visibility'		: 'visible'

						};

						break;

				};

			

			}

		

		},

		_navigate			: function( dir ) {

			

			if( this.supportTrans && this.isAnim )

				return false;

				

			this.isAnim	= true;

			

			switch( dir ) {

			

				case 'next' :

					

					this.current	= this.$rightItm.index();

					

					// current item moves left

					this.$currentItm.addClass('dg-transition').css( this._getCoordinates('left') );

					

					// right item moves to the center

					this.$rightItm.addClass('dg-transition').css( this._getCoordinates('center') );	

					

					// next item moves to the right

					if( this.$nextItm ) {

						

						// left item moves out

						this.$leftItm.addClass('dg-transition').css( this._getCoordinates('outleft') );

						

						this.$nextItm.addClass('dg-transition').css( this._getCoordinates('right') );

						

					}

					else {

					

						// left item moves right

						this.$leftItm.addClass('dg-transition').css( this._getCoordinates('right') );

					

					}

					break;

					

				case 'prev' :

				

					this.current	= this.$leftItm.index();

					

					// current item moves right

					this.$currentItm.addClass('dg-transition').css( this._getCoordinates('right') );

					

					// left item moves to the center

					this.$leftItm.addClass('dg-transition').css( this._getCoordinates('center') );

					

					// prev item moves to the left

					if( this.$prevItm ) {

						

						// right item moves out

						this.$rightItm.addClass('dg-transition').css( this._getCoordinates('outright') );

					

						this.$prevItm.addClass('dg-transition').css( this._getCoordinates('left') );

						

					}

					else {

					

						// right item moves left

						this.$rightItm.addClass('dg-transition').css( this._getCoordinates('left') );

					

					}

					break;	

					

			};

			

			this._setItems();

			

			if( !this.supportTrans )

				this.$currentItm.addClass('dg-center');

			

		},

		_startSlideshow		: function() {

		

			var _self	= this;

			

			this.slideshow	= setTimeout( function() {

				

				_self._navigate( 'next' );

				

				if( _self.options.autoplay ) {

				

					_self._startSlideshow();

				

				}

			

			}, this.options.interval );

		

		},

		destroy				: function() {

			

			this.$navPrev.off('.gallery');

			this.$navNext.off('.gallery');

			this.$wrapper.off('.gallery');

			

		}

	};

	

	var logError 			= function( message ) {

		if ( this.console ) {

			console.error( message );

		}

	};

	

	$.fn.gallery			= function( options ) {

	

		if ( typeof options === 'string' ) {

			

			var args = Array.prototype.slice.call( arguments, 1 );

			

			this.each(function() {

			

				var instance = $.data( this, 'gallery' );

				

				if ( !instance ) {

					logError( "cannot call methods on gallery prior to initialization; " +

					"attempted to call method '" + options + "'" );

					return;

				}

				

				if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {

					logError( "no such method '" + options + "' for gallery instance" );

					return;

				}

				

				instance[ options ].apply( instance, args );

			

			});

		

		} 

		else {

		

			this.each(function() {

			

				var instance = $.data( this, 'gallery' );

				if ( !instance ) {

					$.data( this, 'gallery', new $.Gallery( options, this ) );

				}

			});

		

		}

		

		return this;

		

	};

	

})( jQuery );



/***** autologout start *****/

var timer = 0;

function set_interval() {

  // the interval 'timer' is set as soon as the page loads

  timer = setInterval("auto_logout()", 600000);

  // the figure '10000' above indicates how many milliseconds the timer be set to.

  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.

  // So set it to 300000

}



function reset_interval() {

  //resets the timer. The timer is reset on each of the below events:

  // 1. mousemove   2. mouseclick   3. key press 4. scroliing

  //first step: clear the existing timer



  if (timer != 0) {

    clearInterval(timer);

    timer = 0;

    // second step: implement the timer again

    timer = setInterval("auto_logout()", 600000);

    // completed the reset of the timer

  }

}



function auto_logout() {

  // this function will redirect the user to the logout script

  window.location = location.protocol + "//" + location.host + "/prs/index.php/mainpage/idle";

}

/***** autologout end *****/



function manipulateCheck() {

    var inputElems = document.getElementsByTagName("input"), 

    data = ''; 

    for (var i=0; i<inputElems.length; i++) { 

        if (inputElems[i].id === "cbox" && inputElems[i].checked === true) { 

            if(data)

            data +="-"+inputElems[i].value;

            else

            data = inputElems[i].value;

        } 

    } 

    

    return data;

}



function CheckAllBox(thisForm){

  for (var i=0;i<thisForm.elements.length;i++){

    var e = thisForm.elements[i];

    if(e.type=="checkbox"){

      if (e.name != 'allbox'){

        e.checked = thisForm.allbox.checked;

      }

    }

  }

}



var xmlhttp;

    

function GetXmlHttpObject()

{

    if (window.XMLHttpRequest)

    {

    // code for IE7+, Firefox, Chrome, Opera, Safari

    return new XMLHttpRequest();

    

    }

    if (window.ActiveXObject)

    {

    // code for IE6, IE5

    return new ActiveXObject("Microsoft.XMLHTTP");

    }

    return null;

}



function showAJAX(elementID,URLs)

{      

    // alert("testing");

    //  alert(URLs);

    if(document.getElementById('loading'))

        document.getElementById('loading').style.display='none';

    

    xmlhttp = GetXmlHttpObject();

        

    if (xmlhttp==null)

      {

      alert ("Browser does not support HTTP Request");

      return;

      }

    var urls=URLs;

   

    xmlhttp.onreadystatechange=function()

      {

       if (xmlhttp.readyState==4 && xmlhttp.status==200)

        {

        	// alert(xmlhttp.responseText);

          //document.getElementById(elementID).innerHTML=xmlhttp.responseText;

          $("#"+elementID).html(xmlhttp.responseText);

		  // alert(xmlhttp.responseText);

          document.getElementById('loading').style.display='none';  

        }

      }

    xmlhttp.open("GET",urls,true);

    xmlhttp.send(null);

   

    

}



function showAJAXAttach(elementID,URLs,id)

{      

    // alert("testing");

    //  alert(URLs);

    var x;

    if (confirm("Confirm Delete?") == true) {

        // x = "You pressed OK!";

        $(id).closest('tr').remove();

    } else {

        return false;

    }

    // document.getElementById("sdas").innerHTML = x;



    if(document.getElementById('loading'))

        document.getElementById('loading').style.display='none';

    

    xmlhttp = GetXmlHttpObject();

        

    if (xmlhttp==null)

      {

      alert ("Browser does not support HTTP Request");

      return;

      }

    var urls=URLs;

   

    xmlhttp.onreadystatechange=function()

      {

       if (xmlhttp.readyState==4 && xmlhttp.status==200)

        {

        	// alert(xmlhttp.responseText);

          //document.getElementById(elementID).innerHTML=xmlhttp.responseText;

          $("#"+elementID).html(xmlhttp.responseText);

		  // alert(xmlhttp.responseText);

          document.getElementById('loading').style.display='none';  

        }

      }

    xmlhttp.open("GET",urls,true);

    xmlhttp.send(null);

   

    

}



function callAJAXLoad(elementID,URLs)

{       

    $( "#"+elementID ).load( URLs );

   

}



function getAJAXVal(URLs)

{       

    

    if(document.getElementById('loading'))

        document.getElementById('loading').style.display='none';

    xmlhttp=GetXmlHttpObject();

    if (xmlhttp==null)

      {

      alert ("Browser does not support HTTP Request");

      return;

      }

      var retVal="";

    var urls=URLs;

    xmlhttp.onreadystatechange=function()

      {

       if (xmlhttp.readyState==4 && xmlhttp.status==200)

        {

          retVal= xmlhttp.responseText;

            

            if(retVal=="error")

            {

                alert('Please keyin correct postcode value !');

                 document.getElementById('poskod_pusat').value='';

                return;

            }

            var res = retVal.split("|");

            document.getElementById('town').innerHTML = res[0]; 

            document.getElementById('negeri_pusat').innerHTML = res[1]; 

        }

      }

    xmlhttp.open("GET",urls,true);

    xmlhttp.send(null);

    

    

}



function getAJAXVal2(URLs,cityID,stateID)

{       

    

    if(document.getElementById('loading'))

        document.getElementById('loading').style.display='none';

    xmlhttp=GetXmlHttpObject();

    if (xmlhttp==null)

      {

      alert ("Browser does not support HTTP Request");

      return;

      }

      var retVal="";

    var urls=URLs;

    xmlhttp.onreadystatechange=function()

      {

       if (xmlhttp.readyState==4 && xmlhttp.status==200)

        {

          retVal= xmlhttp.responseText;

            

            if(retVal=="error")

            {

                alert('Please keyin correct postcode value !');

                 document.getElementById('poskod_pusat').value='';

                return;

            }

            var res = retVal.split("|");

            document.getElementById(cityID).innerHTML = res[0]; 

            document.getElementById(stateID).innerHTML = res[1]; 

        }

      }

    xmlhttp.open("GET",urls,true);

    xmlhttp.send(null);

    

    

}



function val_log( thisform ){

    

    if($( "#username" ).val() == ""){

      return false;

    }else if($( "#password" ).val() == "") {

      return false;

    }else{

      thisform.submit();

    }

}



function val_regInd( thisform ){



    if($('#_name').val() == ""){

      return false;

    }else if($( "#_ic" ).val() == "") {

      return false;

    }else if($( "#_home" ).val() == "") {

      return false;

    }else if($( "#_handphone" ).val() == "") {

      return false;

    }else if($( "#_email" ).val() == "") {

      return false;

    }else if($( "#addr" ).val() == "") {

      return false;

    }else if($( "#poskod" ).val() == "") {

      return false;

    }else if($( "#ct" ).val() == "") {

      return false;

    }else if($( "#st" ).val() == "") {

      return false;

    }else{

      thisform.submit();

    }

	alert('Modul telah didaftarkan.Sila tunggu pengesahan daripada pentadbir Sistem.');

}



function getCookie(c_name)

{

  var i,x,y,ARRcookies=document.cookie.split(";");

  for (i=0;i<ARRcookies.length;i++)

    {

    x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));

    y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);

    x=x.replace(/^\s+|\s+$/g,"");

    if (x==c_name)

      {

      return unescape(y);

      }

    }

}



function setCookie(c_name,value,exdays)

{

  var exdate=new Date();

  exdate.setDate(exdate.getDate() + exdays);

  var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());

  document.cookie=c_name + "=" + c_value;

}



function date_time(id,bhs)

{

        date = new Date;

        year = date.getFullYear();

        month = date.getMonth();

        if(bhs=="bahasa")

        {

          months = new Array('Januari', 'Febuari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember');

          days = new Array('Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'); 

        }

        else

        {

          months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

          days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        }

        

        d = date.getDate();

        day = date.getDay();

        

        h = date.getHours();

        if(h<10)

        {

                h = "0"+h;

        }

        m = date.getMinutes();

        if(m<10)

        {

                m = "0"+m;

        }

        s = date.getSeconds();

        if(s<10)

        {

                s = "0"+s;

        }

        result = ''+days[day]+', '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;

        document.getElementById(id).innerHTML = result;

        setTimeout('date_time("'+id+'","'+bhs+'");','1000');

        return true;

}



var counter = 2;

function tambah_tr(urls){

    // alert(urls);

    

    $( ".trparent" ).first().clone()

    .find("input:text")

    .val("")

    .end()

    .find("input:hidden")

    .val("")

    .end()    

    .find("textarea")

    .val("")

    .end()    

    .find("#datepicker")

    .replaceWith('<input type="text" name="delivery_date[]" class="form-control" id="datepicker'+counter+'" required />')

    .end()

    .find("#img_add")

    .replaceWith("<a onclick='deleteRow(this);counter--;' style=\"cursor:pointer\"><span class='fa fa-minus' aria-hidden='true'></span></a>")

    .end()
    
    .find("#a1")
    .attr("id","a"+counter)
    .end()
    .find("#a"+counter)
    .attr("onchange","call1(this.value,"+counter+")")
    .end()
    .find("#b1")
    .attr("id","b"+counter)
    .end()
    .find("#c1")
    .attr("id","c"+counter)
    .end()



    .appendTo( ".trchild" );



    $( "#datepicker"+counter ).datepicker({ 

      autoclose: true,

      format: 'dd/mm/yyyy',

      startDate: new Date()

    });



    counter++;

   

}



$(function() {

    $( "#datepicker" ).datepicker({ 

      autoclose: true,

      format: 'dd/mm/yyyy',

      // startDate: new Date()

    });

    

  });





var counter = 2;

function tambah_trS(urls){

    // alert(urls);

    counter = $('input[name*="item_description"]').length;

    

    $( ".trparentS" ).first().clone()

    .find("input:text")

    .val("")

    .end()

    .find("input:hidden")

    .val("")

    .end()    

    .find("textarea")

    .val("")

    .end()    

    // .find("#bil")

    // .replaceWith("<td align=\"center\">"+counter+".</td>")

    // .end()

    .find("#del_date")

    .replaceWith('<input type="text" name="del_date[]" class="form-control" maxlength="10" size="8" id="del_date'+counter+'"  />')

    .end()

    .find("#item_description")

    .replaceWith('<input type="text" name="item_description[]" class="form-control" id="item_description'+counter+'" onkeyup="autoSuggestItemX(\'item_description'+counter+'\' , \''+urls+'getItemStationeryX/\'+this.value+\'/\' ,  \''+counter+'\')"  />')

    .end()

    .find("#vendor")

    .replaceWith('<input type="text" name="vendor[]" class="form-control" id="vendor'+counter+'" onkeyup="autoSuggestVendor(\'vendor'+counter+'\' , \''+urls+'getVendor/\'+this.value+\'/\' ,  \''+counter+'\')"  />')

    .end()

    

    .find("#vendor_id")

    .replaceWith('<input type="hidden" name="vendor_id[]" class="form-control" id="vendor_id'+counter+'"   />')

    .end()

    .find("#item_code")

    .replaceWith('<input type="text" name="item_code[]" align="center" class="form-control" id="item_code'+counter+'" onkeyup="autoSuggestItemCode(\'item_code'+counter+'\' , \''+urls+'getItemStationeryCode/0/\'+this.value+\'/\' ,  \''+counter+'\')"  />')

    .end()

	.find("#item_glcode")

    .replaceWith('<input type="text" name="item_glcode[]" class="form-control" id="item_glcode'+counter+'" onkeyup="autoSuggestItemCode(\'item_code'+counter+'\' , \''+urls+'getItemStationeryCode/0/\'+this.value+\'/\' ,  \''+counter+'\')"  readonly="readonly"/>')

    .end()

    .find("#qty")

    .replaceWith('<input type="text" name="qty[]" class="form-control" id="qty'+counter+'"  />')

    .end()

    .find("#unit_measurement")

    .attr('id', 'unit_measurement'+counter) 

    .end()

    .find("#img_add")

    .replaceWith("<a onclick='deleteRow(this);counter--;' style=\"cursor:pointer\"><span class='fa fa-minus' aria-hidden='true'></span></a>")

    // .replaceWith("<img src='"+url+"images/pangkah.gif' onclick=\"deleteRow(this);\">")

    .end()

    .appendTo( ".trchildS" );



    $(function() {

    $( "#del_date"+counter ).datepicker({ 

      minDate: 0 , 

      dateFormat: 'dd/mm/yy',

      changeMonth:true,

      changeYear:true,

    });

  });





    counter++;

   

}



var counter = 2;

function tambah_tr2(ids,urls){

    // alert(ids+" "+urls);

    $( ".trparent2" ).first().clone()

    .find("input:text")

    .val("")

    .end()

    .find("input:hidden")

    .val("")

    .end()    

    .find("textarea")

    .val("")

    .end()  

    .find("#a")

    .replaceWith("<td style=\"vertical-align: middle;\" id=\"a\"><input type='text' class='form-control' name='pIc[]'' id='pIc"+counter+"' size='13' onkeyup='viewDash(this.id)' maxlength='14'></td>")

    .end()   

    .find("#img_add")

    .replaceWith("<a onclick='deleteRow(this);counter--;'  style='cursor:pointer'><span class='fa fa-minus' aria-hidden='true'></span></a>")

    .end()

    .appendTo( ".trchild2" );

   

    counter++;   

}



var counter = 2;

function tambah_tr3(ids,urls){

    // alert('sdasdas');

    // alert(ids+" "+counter);



    $( ".trparent3" ).first().clone()

    .find("input:text")

    .val("")

    .end()

    .find("input:hidden")

    .val("")

    .end()    

    .find("textarea")

    .val("")

    .end()   

    .find("#fam_datepicker1")

    .replaceWith('<input type="text" name="fDate[]" maxlength="10" size="8" id="fam_datepicker'+counter+'" class="form-control" />')

    .end()  

    .find("#img_add")

    .replaceWith("<a onclick='deleteRow(this);counter--;'  style='cursor:pointer'><span class='fa fa-minus' aria-hidden='true'></span></a>")

    .end()

    .appendTo( ".trchild3" );



    $(function() {

    $( "#fam_datepicker"+counter).datepicker({

            dateFormat: 'dd/mm/yy',

            minDate: 0,

            changeYear: true,

            changeMonth:true

    }); 

    }); 

   

    counter++;   

}



var counter = 2;

function tambah_tr4(ids,urls){

    // alert(ids+" "+urls);

    $( ".trparent4" ).first().clone()

    .find("input:text")

    .val("")

    .end()

    .find("input:hidden")

    .val("")

    .end()    

    .find("textarea")

    .val("")

    .end()     

    .find("#fam_datepicker21")

    .replaceWith('<input type="text" name="hDate[]" maxlength="10" size="8" id="fam_datepicker2'+counter+'" class="form-control" />')

    .end() 

    .find("#img_add")

    .replaceWith("<a onclick='deleteRow(this);counter--;'  style='cursor:pointer'><span class='fa fa-minus' aria-hidden='true'></span></a>")

    .end()

    .appendTo( ".trchild4" );



    $(function() {

    $( "#fam_datepicker2"+counter).datepicker({

            dateFormat: 'dd/mm/yy',

            minDate: 0,

            changeYear: true,

            changeMonth:true

    }); 

    }); 

   

    counter++;   

}



var counter = 2;

function tambah_tr5(ids,urls){

    // alert(ids+" "+urls);

    $( ".trparent5" ).first().clone()

    .find("input:text")

    .val("")

    .end()

    .find("input:hidden")

    .val("")

    .end()    

    .find("textarea")

    .val("")

    .end()   

    .find("#a")

    .replaceWith('<td style="vertical-align: middle;" id="a"><input type="text" class="form-control" name="rStart[]" id="rStart'+counter+'"  onkeyup="time(this.id)" maxlength="5"></td>')

    .end()   

    .find("#b")

    .replaceWith('<td style="vertical-align: middle;" id="b"><input type="text" class="form-control" name="rReturn[]" id="rReturn'+counter+'"  onkeyup="time(this.id)" maxlength="5"></td>')

    .end()            

    .find("#fam_datepicker31")

    .replaceWith('<input type="text" name="rDate[]" maxlength="10" size="8" id="fam_datepicker3'+counter+'" class="form-control" />')

    .end()  

    .find("#img_add")

    .replaceWith("<a onclick='deleteRow(this);counter--;'  style='cursor:pointer'><span class='fa fa-minus' aria-hidden='true'></span></a>")

    .end()

    .appendTo( ".trchild5" );

   

    $(function() {

    $( "#fam_datepicker3"+counter).datepicker({



            dateFormat: 'dd/mm/yy',

            minDate: 0,            

            changeYear: true,

            changeMonth:true

    }); 

    }); 

    counter++;   

}



function deleteRow(ids)

{

     $(ids).closest('tr').remove();

   

}











function sbmtForm(forms,urls){

   

 // alert(urls);

	$('.selectX').attr('disabled', false);    

    if(confirm("Are you sure?")){

        forms.action = urls;

        forms.submit();

    }else{

        

        return false;

    }

}



function sbmtForm2(urls){

   // alert(urls);

    if(confirm("Are you sure?")){

        window.location.href = urls;

    }else{

        return false;

    }

}



function sbmtForm3(forms){

   // alert('lalala');

    if(confirm("Are you sure?")){

   		// alert('lalala');

        forms.submit();

    }else{

   		// alert('lululu');

        return false;

    }

}



function sbmtForm4(forms,vals,ids){

   alert(vals);return false;

    if(confirm("Are you sure?")){

   		$('#'+ids).val(vals);

		// alert($('#btnSbmt').val());return false;

        forms.submit();

    }else{

   		// alert('lululu');

        return false;

    }

}



function sbmtFormStats(forms,urls,stats){

   

 // alert(stats);return false;

    if(confirm("Are you sure?")){

        $('#pr_status').val(stats);

        forms.action = urls;

        forms.submit();

    }else{

        

        return false;

    }

}





function autoSuggestUser(ids,urls){



$(function() {                     

    $( "#"+ids ).autocomplete({ //the recipient text field with id #username

        source: function( request, response ) {

            $.ajax({

                url: urls,

                dataType: "json",

                data: request,

                success: function(data){

                    // alert(data.response);

                    if(data.response == 'true') {

                       response(data.message);

                    }

                }

            });

        },

        minLength: 1,

        select: function( event, ui ) {

        	// alert(ui.item.value);

        	document.getElementById('email').value = ui.item.email;

        	document.getElementById('notel').value = ui.item.contact;

        	// document.getElementById('entity').value = ui.item.company;

        	$("#entity option[value="+ui.item.co_id+"]").attr("selected", "selected");

        	$("#position option[value="+ui.item.position_id+"]").attr("selected", "selected");

        	document.getElementById('user_id').value = ui.item.user_id;

        	

        },



    });

}); 

}



function autoSuggestAirport(ids,urls){



$(function() {                     

    $( "#"+ids ).autocomplete({ //the recipient text field with id #username

        source: function( request, response ) {

            $.ajax({

                url: urls,

                dataType: "json",

                data: request,

                success: function(data){

                    // alert(data.response);

                    if(data.response == 'true') {

                       response(data.message);

                    }

                }

            });

        },

        minLength: 1,

        select: function( event, ui ) { 

        },



    });

}); 

}





function autoSuggestHotel(ids,urls){



$(function() {                     

    $( "#"+ids ).autocomplete({ //the recipient text field with id #username

        source: function( request, response ) {

            $.ajax({

                url: urls,

                dataType: "json",

                data: request,

                success: function(data){

                    // alert(data.response);

                    if(data.response == 'true') {

                       response(data.message);

                    }

                }

            });

        },

        minLength: 1,

        select: function( event, ui ) { 

        },



    });

}); 

}











function autoSuggestVendor(ids,urls,ctr){



$(function() {                     

    $( "#"+ids ).autocomplete({ //the recipient text field with id #username

        source: function( request, response ) {

            $.ajax({

                url: urls,

                dataType: "json",

                data: request,

                success: function(data){

                    // alert(data.response);

                    if(data.response == 'true') {

                       response(data.message);

                    }

                }

            });

        },

        minLength: 1,

        select: function( event, ui ) {

        	// alert(ui.item.value);

        	// document.getElementById('vendor_id').value = ui.item.vendor_id; 

        	document.getElementById('vendor_id'+ctr).value = ui.item.vendor_id;

        },



    });

}); 

}



function autoSuggestUserTravel(ids,urls){



$(function() {                     

    $( "#"+ids ).autocomplete({ //the recipient text field with id #username

        source: function( request, response ) {

            $.ajax({

                url: urls,

                dataType: "json",

                data: request,

                success: function(data){

                    // alert(data.response);

                    if(data.response == 'true') {

                       response(data.message);

                    }

                }

            });

        },

        minLength: 1,

        select: function( event, ui ) {

        	// alert(ui.item.ic);

        	document.getElementById('email').value = ui.item.email;

        	document.getElementById('ic').value = ui.item.ic;

        	document.getElementById('passport').value = ui.item.passport;

        	document.getElementById('contact').value = ui.item.contact;

        	document.getElementById('job').value = ui.item.jobNo;

        	// document.getElementById('entity').value = ui.item.company;

        	$("#entity option[value="+ui.item.co_id+"]").attr("selected", "selected");

        	document.getElementById('position').value = ui.item.position_id;



        	$("#entity option[value="+ui.item.dept_id+"]").attr("selected", "selected");

        	document.getElementById('department').value = ui.item.dept_id;

        	// document.getElementById('item_description').value = ui.item.item_desc;

            //Do something extra on select... Perhaps add user id to hidden input    

        },



    });

}); 

}



function autoSuggestItem(ids,urls,ctr){



$(function() {                     

    $( "#"+ids ).autocomplete({ //the recipient text field with id #username

        source: function( request, response ) {

            $.ajax({

                url: urls,

                dataType: "json",

                data: request,

                success: function(data){

                    // alert(data.response);

                    if(data.response == 'true') {

                       response(data.message);

                    }

                }

            });

        },

        minLength: 1,

        select: function( event, ui ) {

        	// alert(ui.item.gl_code);

        	// document.getElementById('email').value = ui.item.email;

        	document.getElementById('item_code'+ctr).value = ui.item.item_desc;

        	document.getElementById('item_glcode'+ctr).value = ui.item.gl_code;



        	if(ui.item.item_type=='SERVICES')

        	{

        		document.getElementById('unit_measurement'+ctr).disabled  = true;

        		document.getElementById('unit_measurement'+ctr).value = ' ';

        		document.getElementById('qty'+ctr).readOnly  = true;

        		document.getElementById('qty'+ctr).value = ' ';

        	}

        	if(ui.item.item_type=='GOODS')

        	{

        		document.getElementById('unit_measurement'+ctr).disabled  = false;

        		document.getElementById('qty'+ctr).readOnly  = false;



        	}

            //Do something extra on select... Perhaps add user id to hidden input    

        },



    });

}); 

}



function autoSuggestItemX(ids,urls,ctr){

// alert('ayam');

$(function() {                     

    $( "#"+ids ).autocomplete({ //the recipient text field with id #username

        source: function( request, response ) {

            $.ajax({

                url: urls,

                dataType: "json",

                data: request,

                success: function(data){

                    // alert(data.response);

                    if(data.response == 'true') {

                       response(data.message);

                    }

                }

            });

        },

        minLength: 1,

        select: function( event, ui ) {

        	// alert(ui.item.gl_code);

        	// document.getElementById('email').value = ui.item.email;

        	document.getElementById('item_code'+ctr).value = ui.item.item_desc;

        	document.getElementById('item_glcode'+ctr).value = ui.item.gl_code;



        	// if(ui.item.item_type=='SERVICES')

        	// {

        	// 	document.getElementById('unit_measurement'+ctr).disabled  = true;

        	// 	document.getElementById('unit_measurement'+ctr).value = ' ';

        	// 	document.getElementById('qty'+ctr).readOnly  = true;

        	// 	document.getElementById('qty'+ctr).value = ' ';

        	// }

        	// if(ui.item.item_type=='GOODS')

        	// {

        	// 	document.getElementById('unit_measurement'+ctr).disabled  = false;

        	// 	document.getElementById('qty'+ctr).readOnly  = false;



        	// }

            //Do something extra on select... Perhaps add user id to hidden input    

        },



    });

}); 

}



function formatCurrncy(num) {

    var p = num.toFixed(2).split(".");

    return p[0].split("").reverse().reduce(function(acc, num, i, orig) {

        return  num + (i && !(i % 3) ? "," : "") + acc;

    }, "") ;//+ "." + p[1];

}





function viewDash(thisID){

	cur_val = $("#"+thisID).val();

	cur_count = $("#"+thisID).val().length;







	if(cur_count == 6 || cur_count == 9){

		new_val  = cur_val + "-";

		$("#"+thisID).val(new_val);

	}

}





function time(thisID){

	cur_val = $("#"+thisID).val();

	cur_count = $("#"+thisID).val().length;







	if(cur_count == 2 ){

		new_val  = cur_val + ":";

		$("#"+thisID).val(new_val);

	}

}









function grabAjax(ids,urls){

    //alert("hahaha");

    $.ajax({

        url: urls,

        async: false,

        type: "POST",

        data: "",

        datatype: "html",



        success: function(data){

            //alert(data);

            $("#"+ids).html(data);

        }

    });



}



  $(document).ready(function(){



    $( ".date" ).datepicker({

            dateFormat: 'dd/mm/yy',

            changeMonth: true,

            changeYear: true,

            minDate: 0,

            maxDate: '+10Y',

            autoclose: true

            });

});





  function time(thisID){

	cur_val = $("#"+thisID).val();

	cur_count = $("#"+thisID).val().length;







	if(cur_count == 2 ){

		new_val  = cur_val + ":";

		$("#"+thisID).val(new_val);

	}

}



