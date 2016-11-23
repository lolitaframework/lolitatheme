/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var WFolowLazyLoad = (function () {
        /**
         * Constructor
         */
        function WFolowLazyLoad() {
            /**
             * Ajax helper
             * @type {any}
             */
            this.ajax = null;
            /**
             * Item template
             * @type {any}
             */
            this.tmpl = null;
            this.ajax = window.wp.ajax;
            this.tmpl = window.wp.template('insta-item');
            // setTimeout(
            //     () => this.start(),
            //     1000
            // );
        }
        WFolowLazyLoad.prototype.start = function () {
            var _this = this;
            jQuery(document).on('scroll', window, function () { return _this.scroll(); });
            this.items();
        };
        /**
         * Items
         */
        WFolowLazyLoad.prototype.items = function () {
            var _this = this;
            var promise;
            promise = this.ajax.post({
                action: 'instagram',
                nonce: window.lolita_framework.LF_NONCE
            });
            promise.done(function (response) { return _this.fill(response); });
        };
        /**
         * Ajax promise done
         *
         * @param {any} response
         */
        WFolowLazyLoad.prototype.fill = function (response) {
            var i, el;
            if (response.items.length) {
                for (i = 0; i < response.items.length; i++) {
                    el = response.items[i];
                    jQuery('.w-folow__items').append(this.tmpl(el));
                }
            }
            if (!jQuery('.w-folow').is(':visible')) {
                jQuery('.w-folow').slideDown();
                jQuery('.w-folow .w-folow__frame').sly('reload');
            }
        };
        /**
         * Scroll event
         */
        WFolowLazyLoad.prototype.scroll = function () {
            var _this = this;
            jQuery('.w-folow__item__image').each(function (index, obj) { return _this.update(index, obj); });
        };
        /**
         * Update image
         * @param {any} index
         * @param {any} obj
         */
        WFolowLazyLoad.prototype.update = function (index, obj) {
            if (this.isIntoView(obj)) {
                jQuery(obj).attr('src', jQuery(obj).data('src'));
                jQuery('.w-folow .w-folow__frame').sly('reload');
            }
        };
        /**
         * Is into view?
         * @param {any} elem
         */
        WFolowLazyLoad.prototype.isIntoView = function (elem) {
            var doc_view_top, doc_view_bottom, elem_top, elem_bottom;
            doc_view_top = jQuery(window).scrollTop();
            doc_view_bottom = doc_view_top + jQuery(window).height();
            elem_top = jQuery(elem).offset().top;
            elem_bottom = elem_top + jQuery(elem).height();
            if (elem_top >= doc_view_top && elem_top <= doc_view_bottom) {
                return true;
            }
            if (elem_bottom >= doc_view_top && elem_bottom <= doc_view_bottom) {
                return true;
            }
            return false;
        };
        return WFolowLazyLoad;
    }());
    LolitaFramework.WFolowLazyLoad = WFolowLazyLoad;
    if (jQuery('.w-folow').length) {
        window.LolitaFramework.w_folow_lazy_load = new WFolowLazyLoad();
    }
})(LolitaFramework || (LolitaFramework = {}));
