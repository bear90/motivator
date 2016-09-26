define([
    'text!structures/user/tmpl/change_and_paid_preview.html',
    'structures/user/models/changeTour',
], function(yourTourTmpl, changeTourModel){

    return Backbone.View.extend({

        modelChangeTour: null,

        templateYourTour: _.template(yourTourTmpl),

        events: {
            "click a.more": "onClickMore",
            "click button.preview": "previewChange",
            "click button.save": "submitForm",
        },

        initialize: function() {
            this.modelChangeTour = new changeTourModel();
            this.modelChangeTour.on('sync', this.renderPreviewYourTour, this);
        },
        
        render: function(){

            this.$( ".startDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'startDate');
                    $form.bootstrapValidator('revalidateField', 'endDate');
                    $form.bootstrapValidator('revalidateField', 'paymentEndDate');
                    console.log('asdf');
                }
            });

            this.$( ".endDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'endDate');
                }
            });

            this.$( ".bookingEndDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'bookingEndDate');
                }
            });

            this.$( ".paymentEndDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'paymentEndDate');
                    $form.bootstrapValidator('revalidateField', 'bookingEndDate');
                }
            });

            this.$('textarea.description').tinymce({
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
                    editor.on('keyup', function(e, a, b) {
                        var $form = $(editor.editorContainer).closest('form');
                        $form.bootstrapValidator('revalidateField', 'description');
                    });
                }
            });

            this.initializeValidation();
        },

        initializeValidation: function()
        {
            this.$('form.changeAndPaidForm').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    price: {
                        selector: 'form.changeAndPaidForm input.price',
                        validators: {
                            notEmpty: {
                                message: "Исходная стоимость тура должна быть заполнена!"
                            }
                        }
                    },
                    startDate: {
                        selector: 'form.changeAndPaidForm input.startDate',
                        validators: {
                            notEmpty: {
                                message: "Дата начала тура должна быть выбрана!"
                            }
                        }
                    },
                    endDate: {
                        selector: 'form.changeAndPaidForm input.endDate',
                        validators: {
                            notEmpty: {
                                message: "Дата окончания тура должна быть выбрана!"
                            },
                            callback: {
                                message: 'Дата окончания тура должна быть позже даты начала!',
                                callback: function (value, validator, $field) {
                                    var date = $field.closest('.changeAndPaidBlock').find('input.startDate').val();
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
                        selector: 'form.changeAndPaidForm input.paymentEndDate',
                        validators: {
                            notEmpty: {
                                message: "Конечная дата оплаты тура должна быть выбрана!"
                            },
                            callback: {
                                message: 'Конечная дата оплаты тура должна быть раньше даты начала!',
                                callback: function (value, validator, $field) {
                                    var date = $field.closest('.changeAndPaidBlock').find('input.startDate').val();
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
                        selector: 'form.changeAndPaidForm input.bookingEndDate',
                        validators: {
                            callback: {
                                message: 'Конечная дата оплаты тура должна быть позже даты внесения предоплаты при бронировании тура!',
                                callback: function (value, validator, $field) {
                                    var date = $field.closest('.changeAndPaidBlock').find('input.paymentEndDate').val();
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
                        selector: 'form.changeAndPaidForm select.operator',
                        validators: {
                            notEmpty: {
                                message: "Туроператор должен быть выбран!"
                            }
                        }
                    },
                    description: {
                        selector: 'form.changeAndPaidForm textarea.description',
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

        onClickMore: function(e){
            e.preventDefault();
console.log(this.$el);
            this.$el.find('.hidden-row').toggle();
        },

        previewChange: function(e)
        {
            var $form = this.$(e.target).closest('form');
            var validator = $form.data('bootstrapValidator');

            validator.validate();

            if (validator.isValid()) {
                validator.disableSubmitButtons(false);
                this.modelChangeTour.fetch({data: {
                    touristId:  Session.data.touristId,
                    startDate:  $form.find('input.startDate').val(),
                    endDate:    $form.find('input.endDate').val(),
                    currency:   $form.find('input.currency').val(),
                    currencyUnit:   $form.find('select.currencyUnit').val(),
                    bookingPrepayment:  $form.find('input.bookingPrepayment').val()
                }})
                .success($.proxy(function(){
                    $form.find('.body').addClass('hidden');
                }, this));
            }
        },

        renderPreviewYourTour: function () {
            var data = this.modelChangeTour.attributes;
            var $form = this.$el.find('form.changeAndPaidForm');

            data = _.extend(data, {
                'description': $form.find('.description').val(),
                'bookingPrepaymentPaid': $form.find('.bookingPrepaymentPaid').val(),
                'bookingEndDate': $form.find('.bookingEndDate').val(),
                'paymentEndDate': $form.find('.paymentEndDate').val(),
            });

            $form.find('.preview .ajax').html(this.templateYourTour(data));
            $form.find('.preview').removeClass('hidden');
        },

        submitForm: function (e) {
            var confirmed = $('#confirmationChangeAndPaid').is(':checked');
            if(!confirmed || !confirm("Вы уверены что хотите подтвердить оплату?"))
            {
                e.preventDefault();
            }
        }
    });
});