/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class HomeSearch {

        /**
         * Ajax helper
         * @type {any}
         */
        ajax: any = null;

        /**
         * Timeout handler
         * @type {any}
         */
        handler: any = null;

        /**
         * Search item template
         * @type {any}
         */
        tmpl: any = null;

        /**
         * Constructor
         */
        constructor() {
            this.ajax = (<any>window).wp.ajax;
            this.tmpl = (<any>window).wp.template('search-item');
            jQuery(document).on(
                'keyup',
                '.b-search-form__input',
                (e:any) => this.searchInputKeyup(e)
            );
        }

        /**
         * Search input keyup event
         */
        searchInputKeyup(e:any) {
            var value:string;

            value   = jQuery(e.currentTarget).val();
            if(this.handler) {
                clearTimeout(this.handler);
            }
            this.handler = setTimeout(
                () => this.search(value),
                200
            );
        }

        /**
         * Search
         *
         * @param {string} value
         */
        search(value:string) {
            var promise: any;
            promise = this.ajax.post({
                action: 'search',
                nonce: (<any>window).lolita_framework.LF_NONCE,
                s: value
            });

            promise.done((response:any) => this.searchDone(response, value));
        }

        /**
         * Ajax promise done
         *
         * @param {any} response
         */
        searchDone(response:any, value:string){
            var i:number, el:any;

            jQuery('.w-search-block__results').empty();

            if (response.items.length) {
                for (i = 0; i < response.items.length; i++) {
                    el         = response.items[i];
                    el.title   = el.title.replace(new RegExp(value, 'gi'), '<b>' + value + '</b>');
                    el.content = el.content.replace(new RegExp(value, 'gi'), '<b>' + value + '</b>');

                    jQuery('.w-search-block__results').append(this.tmpl(el));
                }
            }
        }
    }

    (<any>window).LolitaFramework.home_search = new HomeSearch();
}