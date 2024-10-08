// /*
// Template Name: tailwik - Admin & Dashboard Template
// Author: Themesdesign
// Website: https://themesdesign.in/
// Contact: Themesdesign@gmail.com
// File: Calendar init js
// */

// Constants
const getElement = (id) => document.getElementById(id);
const calendarEl = getElement('calendar');
const checkbox = getElement('drop-remove');
const businessHoursCheckbox = getElement('businessCalendar');
const weekNumberCalendar = getElement('weekNumberCalendar');
const modalTitle = getElement('modal-title');
const formEvent = getElement('form-event');
const eventModal = getElement('event-modal');
const eventTitleInput = getElement('event-title');
const eventCategoryInput = getElement('event-category');
const deleteEventBtn = getElement('btn-delete-event');
const saveEventBtn = getElement('btn-save-event');
const localeSelect = getElement('locale-select');
const eventModalCloseBtn = getElement('eventModal-close');

// Variables
let selectedEvent = null;
let newEventData = null;

// Functions
const initializeDraggable = () => {
    const externalEventContainerEl = getElement('external-events');
    new FullCalendar.Draggable(externalEventContainerEl, {
        itemSelector: '.external-event',
        eventData: (eventEl) => ({
            title: eventEl.innerText,
            start: new Date(),
            className: eventEl.getAttribute('data-class'),
        }),
    });
};

const getDefaultEvents = () => {
    const date = new Date();
    const d = date.getDate();
    const m = date.getMonth();
    const y = date.getFullYear();

    return [
        { title: 'All Day Event', start: new Date(y, m, 1), className: 'w-[100%] text-purple-500 !bg-purple-100 dark:!bg-purple-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Long Event', start: new Date(y, m, d - 5), end: new Date(y, m, d - 2), className: '!text-sky-500 w-[100%] !bg-sky-100 dark:!bg-sky-500/20 border-none rounded-md py-1.5 px-3' },
        { id: 999, title: 'Repeating Event', start: new Date(y, m, d - 3, 16, 0), allDay: false, className: 'text-yellow-500 w-[100%] !bg-yellow-100 dark:!bg-yellow-500/20 border-none rounded-md py-1.5 px-3' },
        { id: 999, title: 'Repeating Event', start: new Date(y, m, d + 4, 16, 0), allDay: false, className: 'w-[100%] text-custom-500 !bg-custom-100 dark:!bg-custom-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Meeting', start: new Date(y, m, d, 10, 30), allDay: false, className: 'text-green-500 w-[100%] !bg-green-100 dark:!bg-green-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Lunch', start: new Date(y, m, d, 12, 0), end: new Date(y, m, d, 14, 0), allDay: false, className: 'text-purple-500 w-[100%] !bg-purple-100 dark:!bg-purple-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Birthday Party', start: new Date(y, m, d + 1, 19, 0), end: new Date(y, m, d + 1, 22, 30), allDay: false, className: 'w-[100%] text-sky-500 !bg-sky-100 dark:!bg-sky-500/20 border-none rounded-md py-1.5 px-3' },
        { title: 'Click for Google', start: new Date(y, m, 28), end: new Date(y, m, 29), url: 'http://google.com/', className: 'w-[100%] text-custom-500 !bg-custom-100 dark:!bg-custom-500/20 border-none rounded-md py-1.5 px-3' }
    ];
};

const addNewEvent = (info) => {
    formEvent.classList.remove('was-validated');
    formEvent.reset();
    selectedEvent = null;
    modalTitle.innerText = 'Add Event';
    newEventData = info;
};

const getInitialView = () => {
    const windowWidth = window.innerWidth;
    if (windowWidth >= 768 && windowWidth < 1200) return 'timeGridWeek';
    else if (windowWidth <= 768) return 'listMonth';
    else return 'dayGridMonth';
};

const getBusinessHours = () => (businessHoursCheckbox.checked ? { daysOfWeek: [1, 2, 3, 4, 5], startTime: '10:00', endTime: '18:00' } : []);

const weekNumber = () => weekNumberCalendar.checked;

// Event Listeners
businessHoursCheckbox.addEventListener('change', () => calendar.setOption('businessHours', getBusinessHours()));
weekNumberCalendar.addEventListener('change', () => calendar.setOption('weekNumbers', weekNumber()));

// Main Calendar Initialization
const calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: 'local',
    editable: true,
    droppable: true,
    selectable: true,
    // longPressDelay: true,
    weekNumbers: weekNumber(),
    initialView: getInitialView(),
    themeSystem: 'tailwindcss',
    headerToolbar: { left: 'prev,next,today', center: 'title', right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth' },
    drop: (info) => checkbox.checked && info.draggedEl.parentNode.removeChild(info.draggedEl),
    businessHours: getBusinessHours(),
    windowResize: (view) => calendar.changeView(getInitialView()),
    eventClick: (info) => {
        eventModal.classList.remove('hidden');
        document.getElementById("calendarBtn").click();
        formEvent.reset();
        eventTitleInput.value = '';

        selectedEvent = info.event;
        eventTitleInput.value = selectedEvent.title;
        eventCategoryInput.value = selectedEvent.classNames[0];
        deleteEventBtn.classList.remove('hidden');

        newEventData = null;
        saveEventBtn.innerText = 'Edit Event';
    },
    dateClick: (info) => {
        addNewEvent(info);
        eventModal.classList.remove('hidden');
        document.getElementById("calendarBtn").click();
        deleteEventBtn.classList.add('hidden');
    },
    events: getDefaultEvents(),
});

// Localization
const changeLocale = () => calendar.setOption('locale', localeSelect.value);

// Form to add new event
formEvent.addEventListener('submit', (ev) => {
    ev.preventDefault();
    const updatedTitle = eventTitleInput.value;
    const updatedCategory = eventCategoryInput.value;
    const forms = document.getElementsByClassName('needs-validation');
    if (forms[0].checkValidity() === false) {
        forms[0].classList.add('was-validated');
    } else {
        if (selectedEvent) {
            selectedEvent.setProp('title', updatedTitle);
            selectedEvent.setProp('classNames', [updatedCategory]);
        } else {
            const newEvent = {
                title: updatedTitle,
                start: newEventData.date,
                allDay: newEventData.allDay,
                className: updatedCategory,
            };
            calendar.addEvent(newEvent);
        }
        eventModalCloseBtn.click();
    }
});

deleteEventBtn.addEventListener('click', () => {
    if (selectedEvent) {
        selectedEvent.remove();
        selectedEvent = null;
        eventModalCloseBtn.click();
    }
});

// Calendar Rendering
calendar.render();

// Additional Initialization
initializeDraggable();
