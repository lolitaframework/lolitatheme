/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class WFolowLazyLoad {

        /**
         * Ajax helper
         * @type {any}
         */
        ajax: any = null;

        /**
         * Item template
         * @type {any}
         */
        tmpl: any = null;

        /**
         * Constructor
         */
        constructor() {
            this.ajax = (<any>window).wp.ajax;
            this.tmpl = (<any>window).wp.template('insta-item');

            setTimeout(
                () => this.start(),
                1000
            );
        }

        start() {
            jQuery(document).on(
                'scroll',
                window,
                () => this.scroll()
            );
            this.items();
        }

        /**
         * Items
         */
        items() {
            var promise: any;
            promise = this.ajax.post({
                action: 'instagram',
                nonce: (<any>window).lolita_framework.LF_NONCE
            });

            promise.done((response:any) => this.fill(response));
        }

        /**
         * Ajax promise done
         *
         * @param {any} response
         */
        fill(response:any){
            var i:number, el:any;

            if (response.items.length) {
                for (i = 0; i < response.items.length; i++) {
                    el = response.items[i];
                    jQuery('.w-folow__items').append(this.tmpl(el));
                }
            }
            if(!jQuery('.w-folow').is(':visible')) {
                jQuery('.w-folow').slideDown();
                jQuery('.w-folow .w-folow__frame').sly('reload');
            }
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
                jQuery('.w-folow .w-folow__frame').sly('reload');
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