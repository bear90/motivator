/**
 * Created by m.soza on 31.06.2016.
 */
 define([
    'backbone',
    'validator'
], function(Backbone) {
    return Backbone.View.extend({

        events: {
            'keydown input.integer': "keydownInputInt",
        },

        keydownInputInt:  function (e){
            // Allow: backspace, delete, tab, escape, enter
            if ($.inArray(e.keyCode, [8, 9, 27, 13, 110]) !== -1 ||
                // Allow: Ctrl/cmd+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        },

        initialize: function () {
            this.$el.find('form').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'config[CODE_LIVE_TIME]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести срок действия кода доступа в часах!"
                            },
                            greaterThan: {
                                message: "Cрок действия кода доступа должен быть не меньше 168 часов (одна неделя)!",
                                value: 168
                            },
                        }
                    },
                }
            });
        }
        
    });
});
