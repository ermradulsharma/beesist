import 'jquery-ui/ui/widgets/datepicker.js';
import 'jquery-ui/ui/widgets/autocomplete.js';
import 'jquery-ui/ui/widgets/spinner.js';
import './jquery.form-repeater.js';
import 'lightslider/dist/js/lightslider.min.js';
import 'lity/dist/lity.min.js';
// Select2
require('select2');
/**
 * Place any jQuery/helper plugins in here.
 */
$(function () {
    /**
     * Checkbox tree for permission selecting
     */
    let permissionTree = $('.permission-tree :checkbox');

    permissionTree.on('click change', function () {
        if ($(this).is(':checked')) {
            $(this).siblings('ul').find('input[type="checkbox"]').attr('checked', true).attr('disabled', true);
        } else {
            $(this).siblings('ul').find('input[type="checkbox"]').removeAttr('checked').removeAttr('disabled');
        }
    });

    permissionTree.each(function () {
        if ($(this).is(':checked')) {
            $(this).siblings('ul').find('input[type="checkbox"]').attr('checked', true).attr('disabled', true);
        }
    });

    /**
     * Disable submit inputs in the given form
     *
     * @param form
     */
    function disableSubmitButtons(form) {
        form.find('input[type="submit"]').attr('disabled', true);
        form.find('button[type="submit"]').attr('disabled', true);
    }

    /**
     * Enable the submit inputs in a given form
     *
     * @param form
     */
    function enableSubmitButtons(form) {
        form.find('input[type="submit"]').removeAttr('disabled');
        form.find('button[type="submit"]').removeAttr('disabled');
    }

    /**
     * Disable all submit buttons once clicked
     */
    $('form').submit(function () {
        disableSubmitButtons($(this));
        return true;
    });

    /**
     * Add a confirmation to a delete button/form
     */
    $('body').on('submit', 'form[name=delete-item]', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to delete this item?',
            showCancelButton: true,
            confirmButtonText: 'Confirm Delete',
            cancelButtonText: 'Cancel',
            icon: 'warning'
        }).then((result) => {
            if (result.value) {
                this.submit()
            } else {
                enableSubmitButtons($(this));
            }
        });
    })
        .on('submit', 'form[name=confirm-item]', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure you want to do this?',
                showCancelButton: true,
                confirmButtonText: 'Continue',
                cancelButtonText: 'Cancel',
                icon: 'warning'
            }).then((result) => {
                if (result.value) {
                    this.submit()
                } else {
                    enableSubmitButtons($(this));
                }
            });
        })
        .on('click', 'a[name=confirm-item]', function (e) {
            /**
             * Add an 'are you sure' pop-up to any button/link
             */
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure you want to do this?',
                showCancelButton: true,
                confirmButtonText: 'Continue',
                cancelButtonText: 'Cancel',
                icon: 'info',
            }).then((result) => {
                result.value && window.location.assign($(this).attr('href'));
            });
        });

    // Remember tab on page load
    $('a[data-toggle="tab"], a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        let hash = $(e.target).attr('href');
        history.pushState ? history.pushState(null, null, hash) : location.hash = hash;
    });

    let hash = window.location.hash;
    if (hash) {
        $('.nav-link[href="' + hash + '"]').tab('show');
    }

    // Enable tooltips everywhere
    $('[data-bs-toggle="tooltip"]').tooltip();



    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+5",
        dateFormat: 'yy-mm-dd',
        onSelect: function (selectedDate) {
            $('#ui-datepicker-div table a.ui-state-default').attr('href', 'javascript:;');
        }
    });

    $('.yearpicker').datepicker({
        changeYear: true,
        dateFormat: 'yy',
        todayHighlight: true,
        autoHide: true,
        onClose: function (dateText, inst) {
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
        }
    });
    $(".yearpicker").focus(function () {
        $(".ui-datepicker-calendar, .ui-datepicker-month, .ui-datepicker-prev, .ui-datepicker-next").hide();
        $(".ui-datepicker-year").css({ 'width': '90%' });
    });

    $(document).ready(function ($) {

        $(".owl-carousel").each(function (index) {
            var items = $(this).data('items');
            var items_tab = $(this).data('items_tab');
            var items_mobile = $(this).data('items_mobile');
            var autoplay = $(this).data('autoplay');
            var nav_owl = $(this).data('nav');
            var margin = $(this).data('margin');
            var loop = $(this).data('loop');
            var dots = $(this).data('dots');
            $(this).owlCarousel({
                navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
                items: items,
                autoplay: autoplay,
                nav: nav_owl,
                dots: dots,
                loop: loop,
                margin: margin,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: items_mobile
                    },
                    600: {
                        items: items_tab
                    },
                    1000: {
                        items: items,
                        nav: nav_owl,
                    }
                }
            });
        });

        $(".collapse.show").each(function () {
            $(this).prev(".card-header").find(".fa").addClass("fa-times").removeClass("fa-plus");
        });
        $(".collapse").on('show.bs.collapse', function () {
            $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-times");
        }).on('hide.bs.collapse', function () {
            $(this).prev(".card-header").find(".fa").removeClass("fa-times").addClass("fa-plus");
        });
    });





    function scroll_to_class(element_class, removed_height) {
        var scroll_to = $(element_class).offset().top - removed_height;
        if ($(window).scrollTop() != scroll_to) {
            $(window).scrollTop(scroll_to);
        }
    }

    function bar_progress(progress_line_object, direction) {
        var number_of_steps = progress_line_object.data('number-of-steps');
        var now_value = progress_line_object.data('now-value');
        var new_value = 0;
        if (direction == 'right') {
            new_value = now_value + (100 / number_of_steps);
        }
        else if (direction == 'left') {
            new_value = now_value - (100 / number_of_steps);
        }
        progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
    }

    $(document).ready(function () {

        /*
            Form
        */
        $('.form-wizard fieldset:first').fadeIn('slow');

        $('.form-wizard .required').on('focus', function () {
            $(this).removeClass('input-error');
        });

        $('.required').on('keyup keypress blur change', function () {
            var pattern = /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}\b$/i
            var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
            var not_type = ["checkbox", "radio"];
            var submit_btn = $(this).closest('form').find(':submit');
            if ($(this).val().trim() == "" && not_type.indexOf($(this).attr('type')) < 0) {
                $(this).addClass('is-invalid');
                $(this).parent().parent().find('.invalid-feedback').text('This field is required');
                //submit_btn.attr('disabled', 'disabled');
            } else if ($(this).attr('type') == "email" && !pattern.test($(this).val())) {
                $(this).addClass('is-invalid');
                $(this).parent().parent().find('.invalid-feedback').text('Please enter a valid email address.');
                //submit_btn.attr('disabled', 'disabled');
            } else if ($(this).attr('type') == "tel" && !phone_pattern.test($(this).val())) {
                $(this).addClass('is-invalid');
                $(this).parent().parent().find('.invalid-feedback').text('Please enter a valid phone number.');
                //submit_btn.attr('disabled', 'disabled');
            } else if (($(this).attr('type') == "checkbox" || $(this).attr('type') == "radio")) {
                if ($('[name="' + $(this).attr('name') + '"]').is(':checked')) {
                    $('[name="' + $(this).attr('name') + '"]').removeClass('is-invalid');
                    next_step = true;
                    //submit_btn.removeAttr('disabled');
                } else {
                    $(this).addClass('is-invalid');
                    next_step = false;
                    //submit_btn.attr('disabled', 'disabled');
                }
            } else {
                $(this).removeClass('is-invalid');
                $(this).parent().parent().find('.invalid-feedback').text('');
                $('.form-wizard form').find('input[type="submit"]').removeAttr('disabled');
                $('.form-wizard form').find('button[type="submit"]').removeAttr('disabled');
                $('form').find('input[type="submit"]').removeAttr('disabled');
                $('form').find('button[type="submit"]').removeAttr('disabled');
                submit_btn.removeAttr('disabled');
            }
        });

        // next step
        $('.form-wizard .btn-next').on('click', function () {
            var parent_fieldset = $(this).parents('fieldset');

            var next_step = true;
            // navigation steps / progress steps
            var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
            var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

            // fields validation
            parent_fieldset.find('.required').each(function () {
                var pattern = /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}\b$/i
                var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
                //console.log($(this).attr('type')+" : "+$(this).val());
                var not_type = ["checkbox", "radio"];
                if ($(this).val().trim() == "" && not_type.indexOf($(this).attr('type')) < 0) {
                    $(this).addClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('This field is required');
                    next_step = false;
                } else if ($(this).attr('type') == "email" && !pattern.test($(this).val())) {
                    $(this).addClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('Please enter a valid email address.');
                    next_step = false;
                } else if ($(this).attr('type') == "tel" && !phone_pattern.test($(this).val())) {
                    $(this).addClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('Please enter a valid phone number.');
                    next_step = false;
                } else if (($(this).attr('type') == "checkbox" || $(this).attr('type') == "radio")) {
                    if ($('[name="' + $(this).attr('name') + '"]').is(':checked')) {
                        $('[name="' + $(this).attr('name') + '"]').removeClass('is-invalid');
                    } else {
                        $(this).addClass('is-invalid');
                        next_step = false;
                    }
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('');
                }
            });
            // fields validation

            if (next_step) {
                parent_fieldset.fadeOut(400, function () {
                    // change icons
                    current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'right');
                    // show next step
                    $(this).next().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class($('.form-wizard'), 20);
                });
            } else {
                scroll_to_class($('.form-wizard'), 20);
            }

        });

        // previous step
        $('.form-wizard .btn-previous').on('click', function () {
            // navigation steps / progress steps
            var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
            var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

            $(this).parents('fieldset').fadeOut(400, function () {
                // change icons
                current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
                // progress bar
                bar_progress(progress_line, 'left');
                // show previous step
                $(this).prev().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($('.form-wizard'), 20);
            });
        });

        // submit
        $('.form-wizard').on('submit', function (e) {

            // fields validation
            $(this).find('.required').each(function () {
                var pattern = /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}\b$/i
                var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
                //console.log($(this).attr('type')+" : "+$(this).val());
                var not_type = ["checkbox", "radio"];
                if ($(this).val().trim() == "" && not_type.indexOf($(this).attr('type')) < 0) {
                    $(this).addClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('This field is required');
                    e.preventDefault();
                } else if ($(this).attr('type') == "email" && !pattern.test($(this).val())) {
                    $(this).addClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('Please enter a valid email address.');
                    e.preventDefault();
                } else if ($(this).attr('type') == "tel" && !phone_pattern.test($(this).val())) {
                    $(this).addClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('Please enter a valid phone number.');
                    e.preventDefault();
                } else if (($(this).attr('type') == "checkbox" || $(this).attr('type') == "radio")) {
                    if ($('[name="' + $(this).attr('name') + '"]').is(':checked')) {
                        $('[name="' + $(this).attr('name') + '"]').removeClass('is-invalid');
                    } else {
                        $(this).addClass('is-invalid');
                        e.preventDefault();
                    }
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().parent().find('.invalid-feedback').text('');
                }
            });
            // fields validation

        });


    });

    $(".select2").select2({
        multiple: true,
        tags: false,
    });

    // image uploader scripts

    var $dropzone = $('.image_picker'),
        $droptarget = $('.drop_target'),
        $dropinput = $('#inputFile'),
        $dropimg = $('.image_preview'),
        $remover = $('[data-action="remove_current_image"]');

    $dropzone.on('dragover', function () {
        $droptarget.addClass('dropping');
        return false;
    });

    $dropzone.on('dragend dragleave', function () {
        $droptarget.removeClass('dropping');
        return false;
    });

    $dropzone.on('drop', function (e) {
        $droptarget.removeClass('dropping');
        $droptarget.addClass('dropped');
        $remover.removeClass('disabled');
        e.preventDefault();

        var file = e.originalEvent.dataTransfer.files[0],
            reader = new FileReader();

        reader.onload = function (event) {
            $dropimg.css('background-image', 'url(' + event.target.result + ')');
        };

        console.log(file);
        reader.readAsDataURL(file);

        return false;
    });

    $dropinput.change(function (e) {
        $droptarget.addClass('dropped');
        $remover.removeClass('disabled');
        $('.image_title input').val('');

        var file = $dropinput.get(0).files[0],
            reader = new FileReader();

        reader.onload = function (event) {
            $dropimg.css('background-image', 'url(' + event.target.result + ')');
        }

        reader.readAsDataURL(file);
    });

    $remover.on('click', function () {
        $dropimg.css('background-image', '');
        $droptarget.removeClass('dropped');
        $remover.addClass('disabled');
        $('.image_title input').val('');
    });

    $('.image_title input').blur(function () {
        if ($(this).val() != '') {
            $droptarget.removeClass('dropped');
        }
    });

    $(document).on('change', '.file-input', function () {
        var filesCount = $(this)[0].files.length;
        var textbox = $(this).prev();
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $(this).parent().parent().find(".divImageMediaPreview");
            // dvPreview.html("");

            $($(this)[0].files).each(function (f) {
                var file = $(this);
                var reader = new FileReader();
                reader.fileName = file[0].name;
                reader.fileType = file[0].type;
                reader.onload = function (e) {
                    if (e.target.fileType == 'application/pdf') {
                        var img = "<span class=\"pip\">" + "<img class=\"imageThumb\" src='/img/pdf-icon.png' title=\"" + e.target.fileName + "\"/></span>";
                    } else {
                        var img = "<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + e.target.fileName + "\"/></span>";
                    }
                    /*var img = $("<img />");
                    img.attr("style", "width: 150px; height:100px; padding: 10px");
                    img.attr("src", e.target.result);*/
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });

    $("body").on("click", ".selFile", removeFile);

    function removeFile(e) {
        var file = $(this).data("file");
        for (var i = 0; i < storedFiles.length; i++) {
            if (storedFiles[i].name === file) {
                storedFiles.splice(i, 1);
                break;
            }
        }
        $(this).parent().remove();
    }






});
