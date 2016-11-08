/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var HomeSearch = (function () {
        /**
         * Constructor
         */
        function HomeSearch() {
            var _this = this;
            /**
             * Ajax helper
             * @type {any}
             */
            this.ajax = null;
            /**
             * Timeout handler
             * @type {any}
             */
            this.handler = null;
            /**
             * Search item template
             * @type {any}
             */
            this.tmpl = null;
            this.ajax = window.wp.ajax;
            this.tmpl = window.wp.template('search-item');
            jQuery(document).on('keyup', '.b-search-form__input', function (e) { return _this.searchInputKeyup(e); });
            if (jQuery('.b-search-form__input').length) {
                this.search(jQuery('.b-search-form__input').val());
            }
        }
        /**
         * Search input keyup event
         */
        HomeSearch.prototype.searchInputKeyup = function (e) {
            var _this = this;
            var value;
            value = jQuery(e.currentTarget).val();
            if (this.handler) {
                clearTimeout(this.handler);
            }
            this.handler = setTimeout(function () { return _this.search(value); }, 200);
        };
        /**
         * Search
         *
         * @param {string} value
         */
        HomeSearch.prototype.search = function (value) {
            var _this = this;
            var promise;
            promise = this.ajax.post({
                action: 'search',
                nonce: window.lolita_framework.LF_NONCE,
                s: value
            });
            promise.done(function (response) { return _this.searchDone(response, value); });
        };
        /**
         * Ajax promise done
         *
         * @param {any} response
         */
        HomeSearch.prototype.searchDone = function (response, value) {
            var i, el;
            jQuery('.w-search-block__results').empty();
            if (response.items.length) {
                for (i = 0; i < response.items.length; i++) {
                    el = response.items[i];
                    el.title = el.title.replace(new RegExp(value, 'gi'), '<b>' + value + '</b>');
                    el.content = el.content.replace(new RegExp(value, 'gi'), '<b>' + value + '</b>');
                    jQuery('.w-search-block__results').append(this.tmpl(el));
                }
            }
        };
        return HomeSearch;
    }());
    LolitaFramework.HomeSearch = HomeSearch;
    window.LolitaFramework.home_search = new HomeSearch();
})(LolitaFramework || (LolitaFramework = {}));
