/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var SmartBannerImage = (function () {
        /**
         * Constructor
         */
        function SmartBannerImage() {
            var _this = this;
            jQuery(window).on('onload', function () { return _this.windowLoad(); });
        }
        SmartBannerImage.prototype.windowLoad = function () {
            console.log('Loading...');
        };
        return SmartBannerImage;
    }());
    LolitaFramework.SmartBannerImage = SmartBannerImage;
    if (jQuery('.w-banner__image').length) {
        window.LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
})(LolitaFramework || (LolitaFramework = {}));
