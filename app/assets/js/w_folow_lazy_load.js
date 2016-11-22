/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var WFolowLazyLoad = (function () {
        /**
         * Constructor
         */
        function WFolowLazyLoad() {
            (function (w, me) {
                setTimeout(function () {
                    jQuery(document).on('scroll', w, function () { return me.scroll(); });
                });
            })(window, this);
        }
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
