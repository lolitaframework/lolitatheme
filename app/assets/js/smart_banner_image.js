/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var SmartBannerImage = (function () {
        /**
         * Constructor
         */
        function SmartBannerImage() {
            var img_large, placeholder;
            placeholder = document.querySelector('.w-banner__image');
            img_large = new Image();
            img_large.src = placeholder.dataset.large;
            img_large.onload = function () {
                placeholder.classList.add('loaded');
                placeholder.style.backgroundImage = "url('" + img_large.src + "');";
            };
        }
        return SmartBannerImage;
    }());
    LolitaFramework.SmartBannerImage = SmartBannerImage;
    if (jQuery('.w-banner__image').length) {
        window.LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
})(LolitaFramework || (LolitaFramework = {}));
