/**
 * Created by m.soza on 17.06.2016.
 */
define([
    'jqueryui'
], function () {
    return Backbone.View.extend({

        events: {
            'click form.filter input[type=checkbox]': 'clickFilterCheckbox'
        },

        clickFilterCheckbox: function (e) {
            var $el = $(e.target);

            if ($el.val() != -1 && $el.is(':checked'))
            {
                $el.closest('ul').find('input[value=-1]:checked').attr('checked', false);
            }
            if ($el.val() == -1 && $el.is(':checked'))
            {
                $el.closest('ul').find('input[value!=-1]:checked').attr('checked', false);
            }
        },

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