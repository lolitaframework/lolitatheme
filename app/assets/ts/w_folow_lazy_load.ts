/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class WFolowLazyLoad {

        /**
         * Constructor
         */
        constructor() {
            setTimeout(
                function() {
                    jQuery(document).on(
                        'scroll',
                        window,
                        () => this.scroll()
                    );
                },
                1000
            );
        }

        /**
         * Scroll event
         */
        scroll() {
            jQuery('.w-folow__item__image').each((index:any, obj:any) => this.update(index, obj));
        }

        /**
         * Update image
         * @param {any} index
         * @param {any} obj
         */
        update(index:any, obj:any) {
            if(this.isIntoView(obj)) {
                jQuery(obj).attr('src', jQuery(obj).data('src'));
            }
        }

        /**
         * Is into view?
         * @param {any} elem
         */
        isIntoView(elem:any ) {
            var doc_view_top: any, doc_view_bottom:any, elem_top: any, elem_bottom: any;
            
            doc_view_top    = jQuery(window).scrollTop();
            doc_view_bottom = doc_view_top + jQuery(window).height();
            elem_top        = jQuery(elem).offset().top;
            elem_bottom     = elem_top + jQuery(elem).height();

            if (elem_top >= doc_view_top && elem_top <= doc_view_bottom) {
                return true;
            }

            if (elem_bottom >= doc_view_top && elem_bottom <= doc_view_bottom) {
                return true;
            }
            return false
        }
    }
    if(jQuery('.w-folow').length) {
        (<any>window).LolitaFramework.w_folow_lazy_load = new WFolowLazyLoad();
    }
}