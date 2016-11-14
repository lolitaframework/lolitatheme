/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class SmartBannerImage {

        /**
         * Constructor
         */
        constructor() {
            var img_large, placeholder;
            placeholder = document.querySelector('.w-banner__image');
            img_large = new Image();
            img_large.src = placeholder.dataset.large; 
            img_large.onload = function () {
                placeholder.classList.add('loaded');
                placeholder.style.backgroundImage = "url('" + img_large.src + "');";
            };
        }
    }
    if(jQuery('.w-banner__image').length) {
        (<any>window).LolitaFramework.smart_banner_image = new SmartBannerImage();
    }
}