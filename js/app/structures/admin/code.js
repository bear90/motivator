/**
 * Created by m.soza on 31.06.2016.
 */
 define([
    'backbone',
    'validator'
], function(Backbone) {
    return Backbone.View.extend({

        events: {
            'keydown input[name=count]': "keydownInputInt",
            'click button.view': "clickView",
            'click button.delete': "clickDelete",
        },

        clickView: function (e) {
            var $form = this.$(e.target).closest('form'),
                action;
            

            if ($form.find('input[type=checkbox]:checked').size() == 0) {
                alert('Не выбраны ни один код');
                return;
            }

            action = $form.attr('action');
            $form.attr('action', action + '/view')
                .attr("target", "_blank")
                .submit();
            $form.attr('action', action).attr("target", "");
        },

        clickDelete: function (e) {
            var $form = this.$(e.target).closest('form'),
                action;
            
            if ($form.find('input[type=checkbox]:checked').size() == 0) {
                alert('Не выбраны ни один код');
                return;
            }

            if (confirm('Вы уверены?')) {
                action = $form.attr('action');
                $form.attr('action', action + '/delete');
                $form.submit();
            }
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
            this.$el.find('form.generate-code-form').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'count': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести колличество!"
                            },
                        }
                    },
                }
            });
        }
    });
});
