define([
    'backbone',
    'text!structures/user/tmpl/new_offer.html',
    'validator'
], function(Backbone, newOfferTmpl){

    var view = Backbone.View.extend({

        events: {
            "click form.addForm button[type=button]": "submitTour",
            "click #add-city": "addCity",
            "change #site": "showSite",
            "click button.edit": "editOffer",
            "click button.confirm": "onClickConfirmOffer",
            "click button.paid": "onClickPaidOffer",
            "click a.addOffer": "renderNewOffer",
            "click a.deleteOffer": "deleteOffer",
        },

        templateNewOffer: _.template(newOfferTmpl),

        initialize: function(){

            this.initOffer();

            this.initOrderTour();
        },

        renderNewOffer: function(e) {
            e.preventDefault();

            var $item = this.$(e.target).closest('.item');
            var number = this.$(e.target).closest('form.offerForm').find('> .item').size();

            $item.find('button.save').addClass('hidden');
            $item.find('a.addOffer').addClass('hidden');
            
            $newItem = $item.after(this.templateNewOffer({
                num: number+1,
                operatorOptions: $item.find('select.operator').html()
            })).next();

            this.initOfferComponents($newItem);
            
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.currency'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('select.currencyUnit'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.startDate'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.endDate'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.paymentEndDate'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.bookingEndDate'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('select.operator'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('textarea.description'));
        },

        deleteOffer: function(e) {
            e.preventDefault();
            
            var $item = this.$(e.target).closest('.item');
            var $form = $item.closest('form.offerForm');

            $form.bootstrapValidator('removeField', $item.find('input.currency'));
            $form.bootstrapValidator('removeField', $item.find('select.currencyUnit'));
            $form.bootstrapValidator('removeField', $item.find('input.startDate'));
            $form.bootstrapValidator('removeField', $item.find('input.endDate'));
            $form.bootstrapValidator('removeField', $item.find('input.bookingEndDate'));
            $form.bootstrapValidator('removeField', $item.find('textarea.description'));

            $item.prev().find('button.save').removeClass('hidden');
            $item.prev().find('a.addOffer').removeClass('hidden');
            $item.remove();

            $form.data('bootstrapValidator').validate();
        },

        onClickPaidOffer: function (e) {
            if(confirm("Вы уверены что хотите выбрать это предложение?"))
            {
                var offerId = this.$(e.target).closest('.item').data('id');
                window.location = '/user/confirmoffer/' + offerId;
            }
        },

        onClickConfirmOffer: function (e) {
            var $row = $(e.target).closest('.item.view');
            var $confirmation = $row.find('.viewBlock.confirmation');

            $row.find('.confirmation').toggleClass('hidden');

            if (!$confirmation.is('.hidden'))
            {
                $('.content').scrollTop($confirmation.find('button').position().top);
            }
        },

        initOrderTour: function() {

            if (!this.$('form.addForm').size()) 
            {
                return false;
            }

            this.$( "#startDate" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: "dd.mm.yy",
                minDate: new Date,
                onClose: function( selectedDate, calendar ) {
                    var date = new Date(calendar.selectedYear, calendar.selectedMonth, calendar.selectedDay);
                    date.setDate(date.getDate() + 1);
                    $("#endDate").datepicker("option", "minDate", $.datepicker.formatDate('d.m.yy', date));
                }
            });
            this.$( "#endDate" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var date = new Date(calendar.selectedYear, calendar.selectedMonth, calendar.selectedDay);
                    date.setDate(date.getDate() - 1);
                    $("#startDate").datepicker("option", "maxDate", $.datepicker.formatDate('d.m.yy', date));
                }
            });

            this.$('form.addForm').bootstrapValidator({
                //live: 'disabled',
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    touragentId: {
                        validators: {
                            notEmpty: {
                                message: "Выберите турагента!"
                            }
                        }
                    },
                    "city[]": {
                        validators: {
                            notEmpty: {
                                message: "Хотя бы одна страна должна быть введена!"
                            }
                        }
                    },
                    startDate: {
                        validators: {
                            notEmpty: {
                                message: "Ориентировочная дата начала тура должна быть выбрана!"
                            }
                        }
                    },
                    endDate: {
                        validators: {
                            notEmpty: {
                                message: "Ориентировочная дата окончания тура должна быть выбрана!"
                            }
                        }
                    },
                    "tourist[middleName]": {
                        validators: {
                            notEmpty: {
                                message: "Введите Ваше отчество!"
                            }
                        }
                    },
                    "tourist[phone]": {
                        //threshold: 13,
                        validators: {
                            notEmpty: {
                                message: "Введите Ваш телефон!"
                            },
                            regexp: {
                                regexp: /^\+375[0-9]{9}$/,
                                message: "Номер телефона должен быть в формате +375 XX XX XX XXX"
                            }
                        }
                    },
                }
            });
        },

        initOfferComponents: function($context){

            $context.find( ".startDate" ).datepicker({
                changeMonth: true,
                minDate: new Date,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $item = calendar.input.closest('.item');
                    var date = new Date(calendar.selectedYear, calendar.selectedMonth, calendar.selectedDay);
                    date.setDate(date.getDate() + 1);
                    $item.find(".endDate").datepicker("option", "minDate", $.datepicker.formatDate('d.m.yy', date));

                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'startDate');
                }
            });

            $context.find( ".endDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $item = calendar.input.closest('.item');
                    var date = new Date(calendar.selectedYear, calendar.selectedMonth, calendar.selectedDay);
                    date.setDate(date.getDate() - 1);
                    $item.find(".startDate").datepicker("option", "maxDate", $.datepicker.formatDate('d.m.yy', date));

                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'endDate');
                }
            });

            $context.find( ".paymentEndDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'paymentEndDate');
                    $form.bootstrapValidator('revalidateField', 'bookingEndDate');
                }
            });

            $context.find( ".bookingEndDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'bookingEndDate');
                }
            });

            $context.find('textarea.description').tinymce({
                menubar: false,
                statusbar: false,
                plugins: [
                  'autolink link image'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image',
                setup: function(editor) {
                    
                    /**/
                    editor.on('init', function(ed) {
                       /*if($(ed.target.targetElm).hasClass('hidden'))
                        {
                            tinymce.get(ed.target.id).hide();
                        }*/
                    });

                    editor.on('change', function(e) {
                        var $form = $(e.target.editorContainer).closest('form');

                        if($form.data('changed'))
                        {
                            return false;
                        }

                        $form.find('.info').text('Предложение от турагента');
                        $form.data('changed', true);
                    });
                    editor.on('keyup', function(e, a, b) {
                        var $form = $(editor.editorContainer).closest('form');
                        $form.bootstrapValidator('revalidateField', 'description');
                    });
                }
            });
        },


        initOffer: function(){
            if (!this.$('form.offerForm').size()) 
            {
                return false;
            }

            this.initOfferComponents(this.$el);

            this.$('form.offerForm').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    currency: {
                        selector: 'input.currency',
                        validators: {
                            notEmpty: {
                                message: "Исходная стоимость тура на момент отправки предложения должна быть заполнена!"
                            }
                        }
                    },
                    currencyUnit: {
                        selector: 'select.currencyUnit',
                        validators: {
                            notEmpty: {
                                message: "Валюта должна быть выбрана!"
                            }
                        }
                    },
                    startDate: {
                        selector: 'input.startDate',
                        validators: {
                            notEmpty: {
                                message: "Дата начала тура должна быть выбрана!"
                            }
                        }
                    },
                    endDate: {
                        selector: 'input.endDate',
                        validators: {
                            notEmpty: {
                                message: "Дата окончания тура должна быть выбрана!"
                            },
                            callback: {
                                message: 'Дата окончания тура должна быть позже даты начала!',
                                callback: function (value, validator, $field) {
                                    var date = $field.closest('.item').find('input.startDate').val();
                                    if (date)
                                    {
                                        var tmp1 = date.split('.');
                                        var tmp2 = value.split('.');
                                        var date1 = new Date(tmp1[2], tmp1[1]-1, tmp1[0]);
                                        var date2 = new Date(tmp2[2], tmp2[1]-1, tmp2[0]);
                                        if(date2>date1)
                                        {
                                            return true;
                                        }
                                    }
                                    return false;
                                }
                            }
                        }
                    },
                    paymentEndDate: {
                        selector: 'input.paymentEndDate',
                        validators: {
                            notEmpty: {
                                message: "Конечная дата оплаты тура должна быть выбрана!"
                            },
                            callback: {
                                message: 'Конечная дата оплаты тура должна быть раньше даты начала!',
                                callback: function (value, validator, $field) {
                                    var date = $field.closest('.item').find('input.startDate').val();
                                    if (date)
                                    {
                                        var tmp1 = date.split('.');
                                        var tmp2 = value.split('.');
                                        var date1 = new Date(tmp1[2], tmp1[1]-1, tmp1[0]);
                                        var date2 = new Date(tmp2[2], tmp2[1]-1, tmp2[0]);
                                        if(date2<date1)
                                        {
                                            return true;
                                        }
                                    }
                                    return false;
                                }
                            }
                        }
                    },
                    bookingEndDate: {
                        selector: 'input.bookingEndDate',
                        validators: {
                            callback: {
                                message: 'Конечная дата оплаты тура должна быть позже даты внесения предоплаты при бронировании тура!',
                                callback: function (value, validator, $field) {
                                    var date = $field.closest('.item').find('input.paymentEndDate').val();
                                    if (date && value)
                                    {
                                        var tmp1 = date.split('.');
                                        var tmp2 = value.split('.');
                                        var date1 = new Date(tmp1[2], tmp1[1]-1, tmp1[0]);
                                        var date2 = new Date(tmp2[2], tmp2[1]-1, tmp2[0]);
                                        if(date2<date1)
                                        {
                                            return true;
                                        }
                                        return false;
                                    }
                                    return true;
                                }
                            }
                        }
                    },
                    operator: {
                        selector: 'select.operator',
                        validators: {
                            notEmpty: {
                                message: "Туроператор должен быть выбран!"
                            }
                        }
                    },
                    description: {
                        selector: 'textarea.description',
                        validators: {
                            callback: {
                                message: 'Введите текст преложения. Он должен быть не менее 5 символов',
                                callback: function(value, validator, $field) {
                                    
                                    // Get the plain text without HTML
                                    var text = tinyMCE.get($field.attr('id')).getContent({
                                        format: 'text'
                                    });

                                    return text.length >= 5; 
                                }
                            }
                        }
                    }
                }
            });
        },

        editOffer: function(e)
        {
            var $item = this.$(e.target).closest('.item');

            switch (true) {
                case $item.hasClass('view'):
                    $item.removeClass('view').addClass('edit');
                    break;

                case $item.hasClass('edit'):
                    $item.removeClass('edit').addClass('view');
                    break;
            }
        },

        addCity: function(e)
        {
            e.preventDefault();

            var $el = this.$(e.target);
            var $container = $el.closest('.inner-block');
            var $lastInput = $container.find('input:last');

            $lastInput.clone().val('').insertAfter($lastInput);
        },

        showSite: function(e)
        {
            var $el = this.$(e.target);

            var win = window.open($el.val(), '_blank');
            win.focus();
        },

        submitTour: function(e){
            e.preventDefault();

            var validator = this.$('form.addForm').data('bootstrapValidator');
            validator.validate();

            if (validator.isValid() && this.$el.data('first-tour')){
                this.$('.step1').addClass('hidden');
                this.$('.step2').removeClass('hidden');
            }
        },

        render:  function (){

        }
    });

    return view;
});