/**
 * Created by m.soza on 25.02.2016.
 */
define([
    'structures/registration/view',
    'bootstrap'
], function(RegisterView){

    var Index = Backbone.View.extend({

        events: {
            "click a.internal": "linkClick",
            "click #btn-continue-2": "renderStep3",
            "click #btn-continue-3": "renderStep4",
            "click #btn-continue-4": "renderStep5",
            "click .reg-button": "showRegform",
            "click #btn-info-board-issue-2": "register"
        },

        showRegform: function(e) {
            $('#btn-info-board-issue').trigger('click');
        },

        initialize:function () {
            var location = window.location;

            switch (location.hash) {
                case '#accordion':
                    $('#accordion').find('.panel-collapse').addClass('in');
                    break;

                case '#tabRules':
                    $('#tabRules').trigger('click');
                    break;

                case '#tabAbout':
                    $('#tabAbout').trigger('click');
                    break;

                case '#tabPartners':
                    $('#tabPartners').trigger('click');
                    break;
            }
        },

        linkClick: function(e){
            var $el = $(e.target);

            switch($el.attr('href')){
                case '#tabRules':
                case '#tabPartners':
                    this.$($el.attr('href')).click();
                    break;
            }

        },

        render: function(){
            
            (new RegisterView({
                el: '#register-block'
            })).render();

            //Accordion
            this.$('#accordion')
                .on('show.bs.collapse', function(e) {
                    $(e.target).prev('.panel-heading').addClass('open-accordion');
                })
                .on('hide.bs.collapse', function(e) {
                    $(e.target).prev('.panel-heading').removeClass('open-accordion');
                });

            this.$('.detail-block').on('click', function(e){
                $(e.target).siblings('span.hidden').removeClass('hidden');
                $(e.target).addClass('hidden');
            });

        }
    });

    return Index;
});