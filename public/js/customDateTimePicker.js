jQuery(document).ready(function () {
    'use strict';
    jQuery('#showing_date, .datetimepicker').datetimepicker({
        format: 'Y-m-d h:i A',
        formatTime: 'h:i A',
        step: 1
    });
    $('#showing_dates').repeater({
        btnAddClass: 'r-btnAdd',
        btnRemoveClass: 'r-btnRemove',
        groupClass: 'r-group',
        minItems: 3,
        maxItems: 0,
        startingIndex: 0,
        showMinItemsOnLoad: true,
        reindexOnDelete: true,
        repeatMode: 'append',
        animation: null,
        animationSpeed: 400,
        animationEasing: 'swing',
        clearValues: true,
        //beforeAdd: function() {},
        afterAdd: function ($doppleganger) {
            $doppleganger.find('.datetimepicker').datetimepicker({
                format: 'Y-m-d h:i A',
                formatTime: 'h:i A',
                step: 1
            });
        },
    });
});

