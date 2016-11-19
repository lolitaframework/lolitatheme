/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class HireUs {

        /**
         * Constructor
         */
        constructor() {
            jQuery(document).on(
                'submit',
                '#hire_us',
                (e:any) => this.submit(e)
            );
        }

        /**
         * Submit form
         * @param {any} e [description]
         */
        submit(e:any) {
            console.log(e);
            e.preventDefault();
        }
    }

    (<any>window).LolitaFramework.hire_us = new HireUs();
}