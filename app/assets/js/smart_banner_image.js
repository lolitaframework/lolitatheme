/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var SmartBannerImage = (function () {
        /**
         * Constructor
         */
        function SmartBannerImage() {
            var img_large;
            img_large = new Image();
            img_large.src = jQuery('.w-banner__image').data('large');
            window.im = img_large;
            img_large.onload = function () {
                jQuery('.w-banner__image').addClass('loaded');
                jQuery('.w-banner__image').attr('background-image: url(' + img_large.src + ');');
            };
        }
        return SmartBannerImage;
    }());
    LolitaFramework.SmartBannerImage = SmartBannerImage;
    if (jQuery('.w-banner__image').length) {
        window.LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
})(LolitaFramework || (LolitaFramework = {}));
