$(function() {
    var date = new Date();

    $("#calendar").fullCalendar({
        schedulerLicenseKey: "GPL-My-Project-Is-Open-Source",
        header: {
            left: "prev,next today",
            center: "title",
            right: "agendaDay, agendaWeek, month,  listDay"
        },
        views: {
            listDay: { buttonText: "Lista" }
        },
        height: 750,
        minTime: "08:00:00",
        maxTime: "20:00:00",
        defaultView: "month",
        now: date,
        lang: "es",
        editable: false,
        navLinks: true,
        droppable: false, // this allows things to be dropped onto the calendar
        events: {
            url: laraveljs.path + "/sicenet/mis_cursos/search/calendar"
        },
        eventLimit: true,
        eventClick: function(event) {
            $("#myModalContent").load(
                laraveljs.path +
                    "/sicenet/mis_cursos/show/" +
                    event.id +
                    "/modal",
                function() {
                    $("#modalCurso").modal({ keyboard: true }, "show");
                }
            );

            return false;
        }
    });
});
