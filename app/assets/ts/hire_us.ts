/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class HireUs {

        /**
         * Ajax helper
         * @type {any}
         */
        ajax: any = null;

        /**
         * Constructor
         */
        constructor() {
            this.ajax = (<any>window).wp.ajax;
            jQuery(document).on(
                'submit',
                '#hire-us',
                (e:any) => this.submit(e)
            );
        }

        /**
         * Submit form
         * @param {any} e [description]
         */
        submit(e:any) {
            var promise: any;
            LolitaFramework.css_loader.show(8);
            promise = this.ajax.post({
                action: 'hire-us',
                nonce: (<any>window).lolita_framework.LF_NONCE,
                name: jQuery(e.currentTarget).find('[name=name]').val(),
                email: jQuery(e.currentTarget).find('[name=email]').val(),
                msg: jQuery(e.currentTarget).find('[name=msg]').val()
            });

            promise.done((response:any) => this.searchDone(response));
            e.preventDefault();
        }

        /**
         * Ajax promise done
         *
         * @param {any} response
         */
        searchDone(response:any){
            jQuery('.b-get-in-touch__title').text('Thank you!');
            jQuery('#hire-us').fadeOut();
            LolitaFramework.css_loader.hide(8);
        }
    }

    (<any>window).LolitaFramework.hire_us = new HireUs();
}