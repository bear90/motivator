/**
 * Created by m.soza on 17.06.2016.
 */
define([
    'validator'
], function () {
    return Backbone.View.extend({

        events: {
            'click .more': "clickMore",
            'click button.find': "clickShow",
            'click button.reset': "clickReset"
        },

        clickShow: function(e){
            e.preventDefault();
            var $form = this.$(e.target).closest('form');

            var $validation = $form.data('bootstrapValidator').validate();
            if ($validation.$invalidFields.length === 0) {

                $.ajax($form.attr('action'), {
                    type: "POST",
                    data: $form.serialize(),
                    dataType: 'json',
                    cache: false,
                }).done($.proxy(function(data) {
                    $form.find('.ajax').html(data.widget);
                },this)).fail($.proxy(function (e, data) {
                    $form.find('.ajax').html('Ошибка поиска. Попробуйте позже.');
                }, this));  
            }
        },

        clickReset: function(e){
            e.preventDefault();
            var $form = this.$(e.target).closest('form');

            $form[0].reset();
            $form.find('.ajax').html('');
        },

        clickMore: function(e){
            e.preventDefault();
            var $el = this.$(e.target);

            $el.parent().siblings('.desc').toggleClass('hidden');
        },

        render: function(){
            this.$('form').bootstrapValidator({
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'Filter[from]': {
                        validators: {
                            notEmpty: {
                                message: "Введите начальную дату!"
                            },
                        }
                    },
                    'Filter[to]': {
                        validators: {
                            notEmpty: {
                                message: "Введите конечную дату"
                            },
                        }
                    },
                }
            });

            this.$( ".datepicker" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar) {
                    var $el = $(this);
                    var $form = $el.closest('form');

                    $form.bootstrapValidator('revalidateField', $el.attr('name'));
                },
            });
        }
    });
});