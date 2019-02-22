import { fillProducts } from './app.js';

$(document).ready(function() {
    $('#searching').on('change keyup', function (e) {
        console.log('working');
        if ($('#searching').val().length > 2) {
            fillProducts($('#searching').val());
        }
    });
} );


