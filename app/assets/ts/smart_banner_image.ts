/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class SmartBannerImage {

        /**
         * Constructor
         */
        constructor() {
            setTimeout(
                function() {
                    var i = new Image();
                    console.log('loading large image...');
                    i.src = jQuery('.w-banner__image').data('large');
                    i.onload = function() {
                        jQuery('.w-banner__image').attr('style', 'background-image: url(' + i.src + ');');
                    }
                },
                500
            );
        }
    }
    if(jQuery('.w-banner__image').length) {
        (<any>window).LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
}