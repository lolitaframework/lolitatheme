/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var SmartBannerImage = (function () {
        /**
         * Constructor
         */
        function SmartBannerImage() {
            setTimeout(function () {
                var i = new Image();
                console.log('loading large image...');
                i.src = jQuery('.w-banner__image').data('large');
                i.onload = function () {
                    jQuery('.w-banner__image').attr('style', 'background-image: url(' + i.src + ');');
                };
            }, 500);
        }
        return SmartBannerImage;
    }());
    LolitaFramework.SmartBannerImage = SmartBannerImage;
    if (jQuery('.w-banner__image').length) {
        window.LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
})(LolitaFramework || (LolitaFramework = {}));
