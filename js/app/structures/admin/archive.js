/**
 * Created by m.soza on 17.06.2016.
 */
define([
    'jqueryui'
], function () {
    return Backbone.View.extend({

        render: function(){
            this.$( "#startDate, #endDate" ).datepicker({
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