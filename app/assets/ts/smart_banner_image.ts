/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class SmartBannerImage {

        /**
         * Constructor
         */
        constructor() {
            jQuery(window).on(
                'onload',
                () => this.windowLoad()
            );
        }

        windowLoad() {
            console.log('Loading...');
        }
    }
    if(jQuery('.w-banner__image').length) {
        (<any>window).LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
}