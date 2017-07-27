/**
 * Created by m.soza on 31.06.2016.
 */
 define([
    'backbone',
    'validator'
], function(Backbone) {
    return Backbone.View.extend({

        events: {
            
        },

        initialize: function () {
            this.$(".datepicker").datepicker({
                //defaultDate: "+1w",
                changeMonth: true,
                //numberOfMonths: 3,
                dateFormat: "dd.mm.yy",
                //minDate: new Date,
                /*onClose: function( selectedDate, calendar ) {
                    var date = new Date(calendar.selectedYear, calendar.selectedMonth, calendar.selectedDay);
                    date.setDate(date.getDate() + 1);
                    $("#endDate").datepicker("option", "minDate", $.datepicker.formatDate('d.m.yy', date));
                }*/
            });
        }
    });
});
