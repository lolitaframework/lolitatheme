/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class SmartBannerImage {

        /**
         * Constructor
         */
        constructor() {
            var img_large;
            img_large = new Image();
            img_large.src = jQuery('.w-banner__image').data('large');
            (<any>window).im = img_large;
            img_large.onload = function () {
                jQuery('.w-banner__image').addClass('loaded');
                jQuery('.w-banner__image').attr('background-image: url(' + img_large.src + ');');
            };
        }
    }
    if(jQuery('.w-banner__image').length) {
        (<any>window).LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
}