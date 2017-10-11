// Custom global scripts
jQuery(document).ready(function($) {
    'use strict';

    // Foundation Init
    $(document).foundation();

    // Mobile nav toggle
    $('#nav-mobile-toggle').on('click', function() {
        $('#nav-mobile').slideToggle();
    });

}(jQuery));
