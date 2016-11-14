/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class SmartBannerImage {

        /**
         * Constructor
         */
        constructor() {
            setTimeout(
                function() {
                    console.log('loading large image...');
                    jQuery('.w-banner__image').attr('style', 'background-image: url(' + jQuery('.w-banner__image').data('large') + ');');
                },
                500
            );
        }
    }
    if(jQuery('.w-banner__image').length) {
        (<any>window).LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
}