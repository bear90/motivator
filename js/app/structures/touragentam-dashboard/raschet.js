define([
    'structures/touragentam-dashboard/models/choiceTourModel'
], function(choiceTourModel){
    var view = Backbone.View.extend({

        choiceTour: null,

        initialize: function(){
            this.choiceTour = new choiceTourModel;

            this.$( ".calendar" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                /*onClose: function( selectedDate, calendar ) {
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'startDate');
                }*/
            });
        },

        events: {
            'click .tourists-tabs a': 'showTourists',
            'submit form.choice-tour' : 'submitChoiceTour'
        },

        submitChoiceTour: function(e){
            var form = e.target;

            this.choiceTour.fetch({data: {
                startDate:  $(form).find('input[name=startDate]').val(),
                endDate:    $(form).find('input[name=endDate]').val(),
                price:      $(form).find('input[name=price]').val(),
            }});
            return false;
        },

        render: function(){

        }
    });

    return view;
});