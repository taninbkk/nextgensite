/**
 * Upsell notice for theme
 */
(function ($) {
    'use strict';
    // Add Upgrade Message
    if ('undefined' !== typeof belliniL10n) {
        var upsell = $('<a class="prefix-upsell-link"></a>')
             .attr('href', belliniL10n.belliniURL)
             .attr('target', '_blank')
             .text(belliniL10n.belliniLabel);
        setTimeout(function () {
            $('#accordion-section-themes h3').append(upsell);
        }, 200);
         // Remove accordion click event
        $('.prefix-upsell-link').on('click', function (e) {
            e.stopPropagation();
        });
     }
})(jQuery);