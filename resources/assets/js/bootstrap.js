window.$ = window.jQuery = require('jquery');

window.Vue = require('vue');

//require('popper.js');

require('jquery-ui-bundle');

require('bootstrap');

require('bootstrap-tagsinput');

document.addEventListener('turbolinks:load', function() {
  $("input[data-role='tagsinput']").tagsinput('refresh');
});


window.Dropzone = require('dropzone');
Dropzone.autoDiscover = false; 

require('nestable');

window.moment = require('moment');

require('./modules/select');

require('select2');

$(() => {
  $('.select2-enable').select2({
    theme: 'bootstrap',
  });
});

$.fn.select2.defaults.set('theme', 'bootstrap');
require('croppie');

require('./modules/open-click');
window.Chart = require('frappe-charts');

require('./components/attachment');
require('./components/filemanager');
// require('./components/menu');

