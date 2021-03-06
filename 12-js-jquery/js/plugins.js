// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

/*===========================================
=            Responsive-carousel            =
===========================================*/

/*
 * responsive-carousel
 * https://github.com/filamentgroup/responsive-carousel
 *
 * Copyright (c) 2012 Filament Group, Inc.
 * Licensed under the MIT, GPL licenses.
 */

(function($) {

  var pluginName = "carousel",
    initSelector = "." + pluginName,
    transitionAttr = "data-transition",
    prevAttr = "data-prev",
    prevTitleAttr = "data-prev-title",
    nextAttr = "data-next",
    nextTitleAttr = "data-next-title",
    transitioningClass = pluginName + "-transitioning",
    itemClass = pluginName + "-item",
    activeClass = pluginName + "-active",
    prevClass = pluginName + "-item-prev",
    nextClass = pluginName + "-item-next",
    inClass = pluginName + "-in",
    outClass = pluginName + "-out",
    navClass =  pluginName + "-nav",
    focusables = "a, input, button, select, [tabindex], textarea",
    prototype,
    cssTransitionsSupport = (function(){
      var prefixes = "webkit Moz O Ms".split( " " ),
        supported = false,
        property;

      while( prefixes.length ){
        property = prefixes.shift() + "Transition";

        if ( property in document.documentElement.style !== undefined && property in document.documentElement.style !== false ) {
          supported = true;
          break;
        }
      }
      return supported;
    }()),
    methods = {
      _create: function(){
        $( this )
          .trigger( "beforecreate." + pluginName )
          [ pluginName ]( "_init" )
          [ pluginName ]( "_addNextPrev" )
          .trigger( "create." + pluginName );
      },

      _init: function(){
        var trans = $( this ).attr( transitionAttr );

        if( !trans ){
          cssTransitionsSupport = false;
        }

        $( this )
          .addClass(
            pluginName +
            " " + ( trans ? pluginName + "-" + trans : "" ) + " "
          )
          .attr( "role", "region" )
          .attr( "aria-label", "carousel" )
          .children()
          .addClass( itemClass );

        $(this)[ pluginName ]( "_addNextPrevClasses" );
        $(this)[ pluginName ]( "update" );
        $( this ).data( pluginName + "data", "init"  );
      },

      _addNextPrevClasses: function(){
        var $items = $( this ).find( "." + itemClass ),
          $active = $items.filter( "." + activeClass ),
          $next = $active.next().filter( "." + itemClass ),
          $prev = $active.prev().filter( "." + itemClass );

        if( !$next.length ){
          $next = $items.first().not( "." + activeClass );
        }
        if( !$prev.length ){
          $prev = $items.last().not( "." + activeClass );
        }

        $items.removeClass( prevClass + " " + nextClass );
        $prev.addClass( prevClass );
        $next.addClass( nextClass );

      },

      next: function(){
        $( this )[ pluginName ]( "goTo", "+1" );
      },

      prev: function(){
        $( this )[ pluginName ]( "goTo", "-1" );
      },

      goTo: function( num ){

        var $self = $(this),
          trans = $self.attr( transitionAttr ),
          reverseClass = " " + pluginName + "-" + trans + "-reverse";

        if( $( this ).find( "." + itemClass ).filter( "." + outClass + ", ." + inClass ).length ){
          return; // goTo doesn't work during an animation
        }

        // clean up children
        $( this ).find( "." + itemClass ).removeClass( [ outClass, inClass, reverseClass ].join( " " ) );

        var $from = $( this ).find( "." + activeClass ),
          prevs = $from.index(),
          activeNum = ( prevs < 0 ? 0 : prevs ) + 1,
          nextNum = typeof( num ) === "number" ? num : activeNum + parseFloat(num),
          carouselItems = $( this ).find( "." + itemClass ),
          index = (nextNum - 1) % carouselItems.length,
          beforeGoto = "beforegoto." + pluginName,
          $to = carouselItems.eq( index ),
          reverse = ( typeof( num ) === "string" && !(parseFloat(num)) ) || nextNum > activeNum ? "" : reverseClass,
          data;

        $self.trigger( beforeGoto, data = {
          $from: $from,
          $to: $to,
          direction: nextNum > activeNum ? "forward" : "backward"
        });


        // NOTE this is a quick hack to approximate the api that jQuery provides
        //      without depending on the API (for use with similarly shaped apis)
        if( data.isDefaultPrevented ) {
          return;
        }

        if( !$to.length ){
          $to = $( this ).find( "." + itemClass )[ reverse.length ? "last" : "first" ]();
        }



        if( cssTransitionsSupport ){
          $self[ pluginName ]( "_transitionStart", $from, $to, reverse, index );
        } else {
          $self[ pluginName ]( "_transitionEnd", $from, $to, reverse, index );
        }

        // added to allow pagination to track
        $self.trigger( "goto." + pluginName, [ $to, index ] );
      },

      update: function(){
        var $items = $(this).children().not( "." + navClass );
        var $activeItem = $items.filter( "." + activeClass );
        if( !$activeItem.length ){
          $activeItem = $items.first();
        }

        $items
          .addClass( itemClass )
          .attr( "tabindex", "-1" )
          .attr( "aria-hidden", "true" )
          .attr( "role", "region" )
          .each(function( i ){
            $( this ).attr( "aria-label", "slide " + ( i + 1 ) );
            $( this ).find( focusables ).attr( "tabindex", "-1" );
          });

        $activeItem
          .addClass( activeClass )
          .attr( "tabindex", "0" )
          .each(function( i ){
            $( this ).find( focusables ).attr( "tabindex", "0" );
          })
          .attr( "aria-hidden", "false" );

        return $(this).trigger( "update." + pluginName );
      },

      _transitionStart: function( $from, $to, reverseClass, index ){
        var $self = $(this);

        $to.one( navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ? "webkitTransitionEnd" : "transitionend otransitionend", function(){
          $self[ pluginName ]( "_transitionEnd", $from, $to, reverseClass, index );
        });

        $(this).addClass( reverseClass );
        $from.addClass( outClass );
        $to.addClass( inClass );
      },

      _transitionEnd: function( $from, $to, reverseClass, index ){
        $( this ).removeClass( reverseClass );
        $from.removeClass( outClass + " " + activeClass );
        $to.removeClass( inClass ).addClass( activeClass );
        $( this )[ pluginName ]( "update" );
        $( this )[ pluginName ]( "_addNextPrevClasses" );
        $( this ).trigger( "aftergoto." + pluginName, [ $to, index ] );
        if( $( document.activeElement ).closest( $from[ 0 ] ).length ){
          $to.focus();
        }

      },

      _bindEventListeners: function(){
        var $elem = $( this )
          .bind( "click", function( e ){
            var targ = $( e.target ).closest( "a[href='#next'],a[href='#prev']" );
            if( targ.length ){
              $elem[ pluginName ]( targ.is( "[href='#next']" ) ? "next" : "prev" );
              e.preventDefault();
            }
          });

        return this;
      },

      _addNextPrev: function(){
        var $nav, $this = $( this ), $items, $active;

        var prev = $( this ).attr( prevAttr ) || "Prev",
          next = $( this ).attr( nextAttr ) || "Next",
          prevTitle = $( this ).attr( prevTitleAttr) || "Previous",
          nextTitle = $( this ).attr( nextTitleAttr) || "Next";

        $nav = $("<nav class='"+ navClass +"' role='region' aria-label='carousel controls'>" +
          "<a href='#prev' class='prev' aria-label='" + prevTitle + "' title='" + prevTitle + " slide'>" + prev + "</a>" +
          "<a href='#next' class='next' aria-label='" + nextTitle + "' title='" + nextTitle + " slide'>" + next + "</a>" +
          "</nav>");

        $this.trigger( "beforecreatenav." + pluginName, { $nav: $nav });

        return $this.append( $nav )[ pluginName ]( "_bindEventListeners" );
      },

      destroy: function(){
        // TODO
      }
    };

  // Collection method.
  $.fn[ pluginName ] = function( arrg, a, b, c ) {
    return this.each(function() {

      // if it's a method
      if( arrg && typeof( arrg ) === "string" ){
        return $.fn[ pluginName ].prototype[ arrg ].call( this, a, b, c );
      }

      // don't re-init
      if( $( this ).data( pluginName + "active" ) ){
        return $( this );
      }

      // otherwise, init
      $( this ).data( pluginName + "active", true );
      $.fn[ pluginName ].prototype._create.call( this );
    });
  };

  // add methods
  prototype = $.extend( $.fn[ pluginName ].prototype, methods );
}(jQuery));



/*=====  End of Responsive-carousel  ======*/

/*========================================
=            Responsive touch            =
========================================*/
/*
 * responsive-carousel touch drag extension
 * https://github.com/filamentgroup/responsive-carousel
 *
 * Copyright (c) 2012 Filament Group, Inc.
 * Licensed under the MIT, GPL licenses.
 */

(function($) {

  var pluginName = "carousel",
    initSelector = "." + pluginName,
    noTrans = pluginName + "-no-transition",
    // UA is needed to determine whether to return true or false during touchmove (only iOS handles true gracefully)
    iOS = /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1,
    touchMethods = {
      _dragBehavior: function(){
        var $self = $( this ),
          origin,
          data = {},
          xPerc,
          yPerc,
          stopMove,
          setData = function( e ){

            var touches = e.touches || e.originalEvent.touches,
              $elem = $( e.target ).closest( initSelector );

            if( e.type === "touchstart" ){
              origin = {
                x : touches[ 0 ].pageX,
                y: touches[ 0 ].pageY
              };
            }
            stopMove = false;
            if( touches[ 0 ] && touches[ 0 ].pageX ){
              data.touches = touches;
              data.deltaX = touches[ 0 ].pageX - origin.x;
              data.deltaY = touches[ 0 ].pageY - origin.y;
              data.w = $elem.width();
              data.h = $elem.height();
              data.xPercent = data.deltaX / data.w;
              data.yPercent = data.deltaY / data.h;
              data.srcEvent = e;
            }

          },
          emitEvents = function( e ){
            setData( e );
            if( data.touches.length === 1 ){
              $( e.target ).closest( initSelector ).trigger( pluginName + ".drag" + e.type.split( "touch" )[ 1 ], data );
            }
          };

        $( this )
          .bind( "touchstart", function( e ){
            $( this ).addClass( noTrans );
            emitEvents( e );
          } )
          .bind( "touchmove", function( e ){
            if( Math.abs( data.deltaX ) > 10 ){
              e.preventDefault();
            }
            else if( Math.abs( data.deltaY ) > 3 ){
              stopMove = true;
            }
            if( !stopMove ){
              setData( e );
              emitEvents( e );
            }
          } )
          .bind( "touchend", function( e ){
            $( this ).removeClass( noTrans );
            emitEvents( e );
          } );


      }
    };

  // add methods
  $.extend( $.fn[ pluginName ].prototype, touchMethods );

  // DOM-ready auto-init
  $( document ).bind( "create." + pluginName, function( e ){
    $( e.target )[ pluginName ]( "_dragBehavior" );
  } );

}(jQuery));



/*=====  End of Responsive touch  ======*/

/*=======================================
=            Responsive Drag            =
=======================================*/

/*
 * responsive-carousel touch drag transition
 * https://github.com/filamentgroup/responsive-carousel
 *
 * Copyright (c) 2012 Filament Group, Inc.
 * Licensed under the MIT, GPL licenses.
 */

(function($) {

  var pluginName = "carousel",
    initSelector = "." + pluginName,
    activeClass = pluginName + "-active",
    itemClass = pluginName + "-item",
    dragThreshold = function( deltaX ){
      return Math.abs( deltaX ) > 4;
    },
    getActiveSlides = function( $carousel, deltaX ){
      var $from = $carousel.find( "." + pluginName + "-active" ),
        activeNum = $from.prevAll().length + 1,
        forward = deltaX < 0,
        nextNum = activeNum + (forward ? 1 : -1),
        $to = $carousel.find( "." + itemClass ).eq( nextNum - 1 );

      if( !$to.length ){
        $to = $carousel.find( "." + itemClass )[ forward ? "first" : "last" ]();
      }

      return [ $from, $to, nextNum-1 ];
    };

  // Touch handling
  $( document )
    .bind( pluginName + ".dragmove", function( e, data ){
      if( !!data && !dragThreshold( data.deltaX ) ){
        return;
      }
      if( $( e.target ).attr( "data-transition" ) === "slide" ){
        var activeSlides = getActiveSlides( $( e.target ), data.deltaX );

        activeSlides[ 0 ].css( "left", data.deltaX + "px" );
        activeSlides[ 1 ].css( "left", data.deltaX < 0 ? data.w + data.deltaX + "px" : -data.w + data.deltaX + "px" );
      }
    } )
    .bind( pluginName + ".dragend", function( e, data ){
      if( !!data && !dragThreshold( data.deltaX ) ){
        return;
      }
      var activeSlides = getActiveSlides( $( e.target ), data.deltaX ),
        newSlide = Math.abs( data.deltaX ) > 45;

      if( $( e.target ).attr( "data-transition" ) === "slide" ){
        $( e.target ).one( navigator.userAgent.indexOf( "AppleWebKit" ) ? "webkitTransitionEnd" : "transitionEnd", function(){
          activeSlides[ 0 ].add( activeSlides[ 1 ] ).css( "left", "" );
          $( e.target ).trigger( "goto." + pluginName, activeSlides[ newSlide ? 1 : 0 ] );
        });

        if( newSlide ){
          activeSlides[ 0 ].removeClass( activeClass ).css( "left", data.deltaX > 0 ? data.w  + "px" : -data.w  + "px" );
          activeSlides[ 1 ].addClass( activeClass ).css( "left", 0 );
        }
        else {
          activeSlides[ 0 ].css( "left", 0);
          activeSlides[ 1 ].css( "left", data.deltaX > 0 ? -data.w  + "px" : data.w  + "px" );
        }
      }
      else if( newSlide ){
        $( e.target )[ pluginName ]( data.deltaX > 0 ? "prev" : "next" );
      }
    } );

}(jQuery));


/*=====  End of Responsive Drag  ======*/

/*===========================================
=            Responsive autoinit            =
===========================================*/
/*
 * responsive-carousel auto-init extension
 * https://github.com/filamentgroup/responsive-carousel
 *
 * Copyright (c) 2012 Filament Group, Inc.
 * Licensed under the MIT, GPL licenses.
 */

(function( $ ) {
  // DOM-ready auto-init
  $( document ).bind("enhance", function() {
    $( ".carousel" ).carousel();
  });
}( jQuery ));


/*=====  End of Responsive autoinit  ======*/

/*======================================
=            Global Enhance            =
======================================*/
// DOM-ready auto-init of plugins.
// Many plugins bind to an "enhance" event to init themselves on dom ready, or when new markup is inserted into the DOM
(function( $ ){
  $( function(){
    $( document ).trigger( "enhance" );
  });
}( jQuery ));



/*=====  End of Global Enhance  ======*/

