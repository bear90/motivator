define([
    'backbone',
    'structures/touragentam-dashboard/models/changeTour',
    'structures/touragentam-dashboard/models/choiceTour',
    'structures/touragentam-dashboard/views/changeTour',
    'structures/touragentam-dashboard/views/choiceTour'
], function(Backbone, changeTourModel, choiceTourModel, changeTourView, choiceTourView){

    return Backbone.View.extend({

        modelChoiceTour: null,
        modelChangeTour: null,
        viewChoiceTour: null,
        viewChangeTour: null,

        events: {
            'submit form.choice-tour' : 'onSubmitChoiceTour',
            'submit form.change-tour' : 'onSubmitChangeTour',
            'reset form.choice-tour' : 'onResetChoiceTour',
            'reset form.change-tour' : 'onResetChangeTour',
        },

        initialize: function(){

            var self = this;

            // initialize models
            this.modelChoiceTour = new choiceTourModel;
            this.modelChangeTour = new changeTourModel;

            // initialize views
            this.viewChoiceTour = new choiceTourView({
                el: '#choice-calculation',
                model: this.modelChoiceTour
            });
            this.viewChangeTour = new changeTourView({
                el: '#change-calculation',
                model: this.modelChangeTour
            });

            // initialize Datepicker
            this.$( ".calendar" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy"
            });
        },

        onResetChangeTour: function(){
            this.viewChangeTour.clear();
        },

        onResetChoiceTour: function(){
            this.viewChoiceTour.clear();
        },

        onSubmitChoiceTour: function(e){
            var $form = $(e.target);

            this.modelChoiceTour.fetch({data: {
                startDate:  $form.find('input[name=startDate]').val(),
                endDate:    $form.find('input[name=endDate]').val(),
                price:      $form.find('input[name=price]').val()
            }});
            return false;
        },

        onSubmitChangeTour: function(e){
            var $form = $(e.target);

            this.modelChangeTour.fetch({data: {
                touristId:  $form.find('input[name=touristId]').val(),
                startDate:  $form.find('input[name=startDate]').val(),
                endDate:    $form.find('input[name=endDate]').val(),
                price:      $form.find('input[name=price]').val(),
                currencyUnit:   $form.find('select[name=currencyUnit]').val()
            }})
            .success($.proxy(function(){
                this.$('a.more').removeClass('hidden');
            }, this))
            .error($.proxy(function(e){
                if (e.status === 404)
                {
                    alert("Турист не найден");
                }
            }, this));
            return false;
        },

        render: function(){

        }
    });
});