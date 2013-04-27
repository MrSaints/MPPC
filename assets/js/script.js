"use strict";
(function($) {
    var $this;

    // Foundation
    $(document).foundation();

    var $window = $(window);
    var $title = $('.post-title');
    var $main = $('.main');
    var $margin;

    // Search
    $('.has-search a').click( function (e) {
        $this = $(this);

        e.preventDefault();

        $this.find('i').first().toggleClass('icon-remove');
        $this.parent().toggleClass('searching')
            .find('div.dropdown-search').slideToggle('fast');
    });

    // Background slideshow
    $.backstretch([
        template_uri + '/assets/img/background_2.jpg'
        , template_uri + '/assets/img/background_3.jpg'
        , template_uri + '/assets/img/background_4.jpg'
        , template_uri + '/assets/img/background.jpg'
    ], {centeredY: false, fade: 1000});

    // Resize content
    var resizeMargin = function () {
        $margin = $window.height() - $('header').outerHeight()
                     - $('.heading').outerHeight();

        if ($('body').hasClass('admin-bar'))
            $margin -= 28;

        if (!$title.is(":visible")) {
            $main.css('marginTop', $margin + 'px');
        } else {
            $main.css('marginTop', 0);
            $title.css('margin', ($margin - $title.outerHeight()) / 2 + 'px auto');
        }
    };
    resizeMargin();
    $window.resize(resizeMargin);

    // @TODO
    /*$(window).scroll(function () {

    });*/
    
    var options, map;
    function initGoogleMaps () {
        options = { 
            zoom:               15,
            center:             new google.maps.LatLng('3.134174', '101.698723'),
            mapTypeId:          google.maps.MapTypeId.TERRAIN,
            mapTypeControl:     false,
            streetViewControl:  false,
            scrollwheel:        false,
        }
        map = new google.maps.Map($('.map')[0], options);
    }
    google.maps.event.addDomListener(window, 'load', initGoogleMaps);
}(jQuery));