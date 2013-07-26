"use strict";

(function($) {
    var $window = $(window);
    var $jumbotron = $('.jumbotron');
    var $masthead = $('.masthead');
    var $navbar = $('#navigation');
    var $height, $original_text;

    // Adjust landing page layout
    var resizeJumbotron = function () {
        $height = $window.outerHeight() - $navbar.outerHeight();
        $height = $height <= $masthead.height() + 100 ? $masthead.height() + 100 : $height;
        $jumbotron.height($height);

        $masthead.fadeIn('slow').css('marginTop', ($height - $masthead.height()) / 2);
    }
    $window.load(resizeJumbotron);
    $window.resize(resizeJumbotron);

    // Fix/unfix navigation
    $window.scroll(function () {
        if ($(this).scrollTop() > $('.fix-nav').first().outerHeight())
            $navbar.addClass('navbar-fixed-top');
        else
            $navbar.removeClass('navbar-fixed-top');
    });

    // Scroll to top
    $('.top').click(function (e) {
        e.preventDefault();
       $('html, body').animate({scrollTop: 0}, 600, 'swing'); 
    });

    // Hide/reveal countdown
    var changeDateHeading = function ($context, $text) {
        $context.stop(true).animate({'opacity': 0}, 250, function () {
            $context[0].innerHTML = $text;
        }).animate({'opacity': 1}, 250);
    }
    $('.masthead-heading__date').hover(function () {
        $original_text = $original_text || $(this)[0].innerHTML;
        changeDateHeading($(this), '32 DAYS TO GO...');
    }, function () {
        changeDateHeading($(this), $original_text);
    })
    
    // Map
    var CM_API = 'eabfb4a5974f48c298384b082b2b657f';
    var MAP_ATT = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';
    var map = L.map('map').setView([3.069081,101.604088], 16);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: MAP_ATT,
        maxZoom: 18
    }).addTo(map);
    L.marker([3.069081,101.604088]).addTo(map)
        .bindPopup('Sunway Monash Residence (SMR) and Sunway University College')
        .openPopup();
    
    // Twitter feed
    $('#tweets').tweetable({
        username: 'MPPC2013',
        html5: true,
        time: true,
        rotate: true,
        onComplete: function ($ul) {
            $('time').timeago();
        }
    });
}(jQuery));
