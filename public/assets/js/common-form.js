/*
Template Name: Dashonic - Admin & Dashboard Template
Author: Pichforest
Website: https://Pichforest.com/
Contact: Pichforest@gmail.com
File: Form Advanced Js File
*/

// Chocies Select plugin
document.addEventListener("DOMContentLoaded", function () {
    var genericExamples = document.querySelectorAll("[data-trigger]");
    for (i = 0; i < genericExamples.length; ++i) {
        var element = genericExamples[i];
        new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
            placeholderValue: "",
            searchPlaceholderValue: "",
        });
    }

    // singleNoSearch
    var singleNoSearch = new Choices("#choices-single-no-search", {
        searchEnabled: false,
        removeItemButton: true,
        choices: [],
    }).setChoices([], "value", "label", false);

    // singleNoSorting
    var singleNoSorting = new Choices("#choices-single-no-sorting", {
        shouldSort: false,
    });

    // multiple Remove CancelButton
    var multipleCancelButton = new Choices("#choices-multiple-remove-button", {
        removeItemButton: true,
    });

    //choices-multiple-groups
    var multipleDefault = new Choices(
        document.getElementById("choices-multiple-groups")
    );

    // text inputs example
    var textRemove = new Choices(
        document.getElementById("choices-text-remove-button"),
        {
            delimiter: ",",
            editItems: true,
            maxItemCount: 5,
            removeItemButton: true,
        }
    );

    // choices-text-unique-values
    var textUniqueVals = new Choices("#choices-text-unique-values", {
        paste: false,
        duplicateItemsAllowed: false,
        editItems: true,
    });

    //choices-text-disabled
    var textDisabled = new Choices("#choices-text-disabled", {
        addItems: false,
        removeItems: false,
    }).disable();
});

// flatpickr

flatpickr("#datepicker-basic");

flatpickr("#datepicker-datetime", {
    enableTime: true,
    dateFormat: "m-d-Y H:i",
});

flatpickr("#datepicker-humanfd", {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
});

flatpickr("#datepicker-minmax", {
    minDate: "today",
    maxDate: new Date().fp_incr(14), // 14 days from now
});

flatpickr("#datepicker-disable", {
    onReady: function () {
        this.jumpToDate("2025-01");
    },
    disable: ["2025-01-30", "2025-02-21", "2025-03-08", new Date(2025, 4, 9)],
    dateFormat: "Y-m-d",
});

flatpickr("#datepicker-multiple", {
    mode: "multiple",
    dateFormat: "Y-m-d",
});

flatpickr("#datepicker-range", {
    mode: "range",
});

flatpickr("#datepicker-timepicker", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
});

flatpickr("#datepicker-inline", {
    inline: true,
});
