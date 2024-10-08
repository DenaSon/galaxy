document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById('calendar');
    var checkbox = document.getElementById('drop-remove');
    var modalTitle = document.getElementById('modal-title');
    var formEvent = document.getElementById('form-event');
    var selectedEvent = null;
    var newEventData = null;
    var forms = document.getElementsByClassName('needs-validation');
    var calendar;

    /* initialize the calendar */
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var defaultEvents = [
        { title: 'All Day Event', start: new Date(y, m, 1), className: 'w-[100%] text-purple-500 !bg-purple-100 dark:!bg-purple-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Long Event', start: new Date(y, m, d - 5), end: new Date(y, m, d - 2), className: '!text-sky-500 w-[100%] !bg-sky-100 dark:!bg-sky-500/20 border-none rounded-md py-1.5 px-3' },
        { id: 999, title: 'Repeating Event', start: new Date(y, m, d - 3, 16, 0), allDay: false, className: 'text-yellow-500 w-[100%] !bg-yellow-100 dark:!bg-yellow-500/20 border-none rounded-md py-1.5 px-3' },
        { id: 999, title: 'Repeating Event', start: new Date(y, m, d + 4, 16, 0), allDay: false, className: 'w-[100%] text-custom-500 !bg-custom-100 dark:!bg-custom-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Meeting', start: new Date(y, m, d, 10, 30), allDay: false, className: 'text-green-500 w-[100%] !bg-green-100 dark:!bg-green-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Lunch', start: new Date(y, m, d, 12, 0), end: new Date(y, m, d, 14, 0), allDay: false, className: 'text-purple-500 w-[100%] !bg-purple-100 dark:!bg-purple-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Birthday Party', start: new Date(y, m, d + 1, 19, 0), end: new Date(y, m, d + 1, 22, 30), allDay: false, className: 'w-[100%] text-sky-500 !bg-sky-100 dark:!bg-sky-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Click for Google', start: new Date(y, m, 28), end: new Date(y, m, 29), url: 'http://google.com/', className: 'w-[100%] text-custom-500 !bg-custom-100 dark:!bg-custom-500/20 border-none rounded-md py-1.5 px-3' }
    ];

    function addNewEvent(info) {
        formEvent.classList.remove("was-validated");
        formEvent.reset();
        selectedEvent = null;
        modalTitle.innerText = 'Add Event';
        newEventData = info;
    }

    calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC',
        editable: true,
        droppable: true,
        selectable: true,
        initialView: 'multiMonthYear',
        themeSystem: 'tailwindcss',
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        drop: function (info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        },
        // responsive
        windowResize: function (view) {
            // handle resize
        },
        eventDidMount: function (info) {
            if (info.event.extendedProps.status === 'done') {
                // Change background color of row
                info.el.style.backgroundColor = 'red';
                // Change color of dot marker
                var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
                if (dotEl) {
                    dotEl.style.backgroundColor = 'white';
                }
            }
        },
        eventClick: function (info) {
            document.getElementById("event-modal").classList.remove('hidden');
            document.getElementById("calendarBtn").click();
            formEvent.reset();
            document.getElementById("event-title").value = "";
            selectedEvent = info.event;
            document.getElementById("event-title").value = selectedEvent.title;
            document.getElementById('event-category').value = selectedEvent.classNames[0];
            newEventData = null;
            document.getElementById('btn-delete-event').classList.remove("hidden");
            document.getElementById('btn-save-event').innerText = 'Edit Event';
            newEventData = null;
        },
        dateClick: function (info) {
            addNewEvent(info);
            document.getElementById("event-modal").classList.remove('hidden');
            document.getElementById("calendarBtn").click();
        },
        events: defaultEvents
    });

    calendar.render();

    formEvent.addEventListener('submit', function (ev) {
        ev.preventDefault();

        var updatedTitle = document.getElementById("event-title").value;
        var updatedCategory = document.getElementById('event-category').value;

        // validation
        if (forms[0].checkValidity() === false) {
            forms[0].classList.add('was-validated');
        } else {
            if (selectedEvent) {
                selectedEvent.setProp("title", updatedTitle);
                selectedEvent.setProp("classNames", [updatedCategory]);
            } else {
                var newEvent = {
                    title: updatedTitle,
                    start: newEventData.date,
                    allDay: newEventData.allDay,
                    className: updatedCategory
                };
                calendar.addEvent(newEvent);
            }
            document.getElementById("eventModal-close").click();
        }
    });

    document.getElementById("btn-delete-event").addEventListener("click", function (e) {
        if (selectedEvent) {
            selectedEvent.remove();
            selectedEvent = null;
            document.getElementById("eventModal-close").click();
        }
    });
});
