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
            "click #btn-info-board-issue-2": "register"
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
        }
    });

    return Index;
});