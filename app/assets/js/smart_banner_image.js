/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var SmartBannerImage = (function () {
        /**
         * Constructor
         */
        function SmartBannerImage() {
            setTimeout(function () {
                console.log('loading large image...');
                jQuery('.w-banner__image').attr('style', 'background-image: url(' + jQuery('.w-banner__image').data('large') + ');');
            }, 500);
        }
        return SmartBannerImage;
    }());
    LolitaFramework.SmartBannerImage = SmartBannerImage;
    if (jQuery('.w-banner__image').length) {
        window.LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
})(LolitaFramework || (LolitaFramework = {}));
