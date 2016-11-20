/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var HireUs = (function () {
        /**
         * Constructor
         */
        function HireUs() {
            var _this = this;
            jQuery(document).on('submit', '#hire-us', function (e) { return _this.submit(e); });
        }
        /**
         * Submit form
         * @param {any} e [description]
         */
        HireUs.prototype.submit = function (e) {
            var _this = this;
            LolitaFramework.css_loader.show(8);
            var newCard = {
                name: jQuery(e.currentTarget).find('[name=name]').val() + ' ' + jQuery(e.currentTarget).find('[name=email]').val(),
                desc: jQuery(e.currentTarget).find('[name=message]').val(),
                idList: '5831898acda113a90e9a2249',
                pos: 'top'
            };
            window.Trello.post('/cards/', newCard, function (data) { return _this.done(data); });
            e.preventDefault();
        };
        /**
         * Created succesful
         *
         * @param {any} response
         */
        HireUs.prototype.done = function (data) {
            console.log('Card created successfully. Data returned:' + JSON.stringify(data));
            jQuery('.b-get-in-touch__title').text('Thank you!');
            jQuery('#hire-us').fadeOut();
            LolitaFramework.css_loader.hide();
        };
        return HireUs;
    }());
    LolitaFramework.HireUs = HireUs;
    window.LolitaFramework.hire_us = new HireUs();
})(LolitaFramework || (LolitaFramework = {}));
