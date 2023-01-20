// Flatpickr

var f1 = flatpickr(document.getElementById('basicFlatpickr'), {
    dateFormat: "d.m.Y",
    allowInput: true,
    defaultDate: "01.01.1980",
    appendTo: document.getElementById('addContactModal')
});
f1.element.style.zIndex = 9999;
var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});
var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
    mode: "range",
});
var f4 = flatpickr(document.getElementById('timeFlatpickr'), {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "13:45"
});