/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var HireUs = (function () {
        /**
         * Constructor
         */
        function HireUs() {
            var _this = this;
            /**
             * Ajax helper
             * @type {any}
             */
            this.ajax = null;
            this.ajax = window.wp.ajax;
            jQuery(document).on('submit', '#hire-us', function (e) { return _this.submit(e); });
        }
        /**
         * Submit form
         * @param {any} e [description]
         */
        HireUs.prototype.submit = function (e) {
            var _this = this;
            var promise;
            LolitaFramework.css_loader.show(8);
            promise = this.ajax.post({
                action: 'hire-us',
                nonce: window.lolita_framework.LF_NONCE,
                name: jQuery(e.currentTarget).find('[name=name]').val(),
                email: jQuery(e.currentTarget).find('[name=email]').val(),
                msg: jQuery(e.currentTarget).find('[name=msg]').val()
            });
            promise.done(function (response) { return _this.searchDone(response); });
            e.preventDefault();
        };
        /**
         * Ajax promise done
         *
         * @param {any} response
         */
        HireUs.prototype.searchDone = function (response) {
            jQuery('.b-get-in-touch__title').text('Thank you!');
            jQuery('#hire-us').fadeOut();
            LolitaFramework.css_loader.hide(8);
        };
        return HireUs;
    }());
    LolitaFramework.HireUs = HireUs;
    window.LolitaFramework.hire_us = new HireUs();
})(LolitaFramework || (LolitaFramework = {}));
