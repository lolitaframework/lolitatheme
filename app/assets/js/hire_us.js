/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var HireUs = (function () {
        /**
         * Constructor
         */
        function HireUs() {
            var _this = this;
            jQuery(document).on('submit', '#hire_us', function (e) { return _this.submit(e); });
        }
        /**
         * Submit form
         * @param {any} e [description]
         */
        HireUs.prototype.submit = function (e) {
            console.log(e);
            e.preventDefault();
        };
        return HireUs;
    }());
    LolitaFramework.HireUs = HireUs;
    window.LolitaFramework.hire_us = new HireUs();
})(LolitaFramework || (LolitaFramework = {}));
