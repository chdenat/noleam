jQuery(function ($) {
    'use strict';

    /**
     *  Sticky top bar
     */

    /**
     * @type {{animationDuration: number, hideDuration: number, topOffset: number, stickyClass: string}}
     */
    var defaults = {
        topOffset: 80, //px - offset to switch of fixed position
        hideDuration: 500,
        animationDuration: 500,
        stickyClass: 'is-fixed'
    };

    $.fn.stickyPanel = function (options) {
        if (this.length == 0) return this; // returns the current jQuery object

        var self = this,
            settings,
            isFixed = false, //state of panel
            stickyClass,
            animation = {
                normal: defaults.animationDuration,//, //show duration
                reverse: '', //hide duration
                getStyle: function (type) {
                    return {
                        animationDirection: type,
                        animationDuration: this[type]
                    };
                }
            };

        // Init carousel
        function init() {
            settings = $.extend({}, defaults, options);
            animation.reverse = settings.hideDuration + 'ms';
            stickyClass = settings.stickyClass;
            $(window).on('scroll', onScroll).trigger('scroll');
        }

        // On scroll
        function onScroll() {
            if (window.pageYOffset > settings.topOffset) {
                if (!isFixed) {
                    isFixed = true;
                    self.addClass(stickyClass)
                        .css(animation.getStyle('normal'));
                }
            } else {
                if (isFixed) {
                    isFixed = false;

                    self.removeClass(stickyClass)
                        .each(function (index, e) {
                            // restart animation
                            // https://css-tricks.com/restart-css-animation/
                            void e.offsetWidth;
                        })
                        .addClass(stickyClass)
                        .css(animation.getStyle('reverse'));

                    setTimeout(function () {
                        self.removeClass(stickyClass);
                    }, settings.hideDuration);
                }
            }
        }

        init();
        return this;
    };
    $('#wrapper-navbar').stickyPanel();

    /**
     * change fas to fad (duo-tone)
     */

    $('.fas').addClass('fad').removeClass('fas');
});

