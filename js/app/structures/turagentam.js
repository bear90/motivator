/**
 * Created by m.soza on 25.02.2016.
 */
define([
    'validator'
], function(RegisterView){

    var Index = Backbone.View.extend({

        events: {
            //'click .show-list': 'showList',
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

        showList: function(e){
            e.preventDefault();

            this.$(e.target).siblings('ul').toggleClass('hidden');
        },

        render: function(){
            this.$('form.form-inline').bootstrapValidator({
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

    return Index;
});