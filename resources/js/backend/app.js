// import 'alpinejs'

window.$ = window.jQuery = require('jquery');
window.Swal = require('sweetalert2');
window.toastr = require('toastr');
window.Popper = require('popper.js').default;
// CoreUI
require('@coreui/coreui');

// Boilerplate
require('../plugins');

import "jquery-ui/ui/widgets/datepicker.js";
import "jquery-ui/ui/widgets/sortable.js";

// import '../../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables.js';
import '../../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables-all.js';

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
