/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class HireUs {

        /**
         * Constructor
         */
        constructor() {
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
            LolitaFramework.css_loader.show(8);

            var newCard = {
                name: jQuery(e.currentTarget).find('[name=name]').val() + ' ' + jQuery(e.currentTarget).find('[name=email]').val(), 
                desc: jQuery(e.currentTarget).find('[name=message]').val(),
                idList: '5831898acda113a90e9a2249',
                pos: 'top'
            };
            (<any>window).Trello.post('/cards/', newCard, (data:any) => this.done(data));
            e.preventDefault();
        }

        /**
         * Created succesful
         *
         * @param {any} response
         */
        done(data:any){
            console.log('Card created successfully. Data returned:' + JSON.stringify(data));
            jQuery('.b-get-in-touch__title').text('Thank you!');
            jQuery('#hire-us').fadeOut();
            LolitaFramework.css_loader.hide();
        }
    }

    (<any>window).LolitaFramework.hire_us = new HireUs();
}