define([
    'validator',
], function() {

    var view = Backbone.View.extend({

        events: {
            "click button.edit": "editOffer",
            "click button.confirm": "onClickConfirm",
            "click button.paid": "paidOffer",
            "click a.more": "onClickMore",
        },

        initialize: function() {

            this.$( ".startDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    /*var $item = calendar.input.closest('.item');
                    $item.find(".endDate").datepicker("option", "minDate", selectedDate);
*/
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'startDate');
                }
            });

            this.$( ".endDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    /*var $item = calendar.input.closest('.item');
                    $item.find(".startDate").datepicker("option", "maxDate", selectedDate);
*/
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

            this.$('form.offerForm').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    price: {
                        selector: 'input.price',
                        validators: {
                            notEmpty: {
                                message: "Исходная стоимость тура должна быть заполнена!"
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
                                    var date = $field.closest('.editBlock').find('input.startDate').val();
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
                                    var date = $field.closest('.editBlock').find('input.startDate').val();
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
                                    var date = $field.closest('.editBlock').find('input.paymentEndDate').val();
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
                
            $(window).on('beforeunload', $.proxy(this.leavePage, this));
        },

        onClickMore: function(e){
            e.preventDefault();
            $row = $(e.target).closest('.viewBlock');
            $row.find('.hidden-row').toggle();
        },

        leavePage: function(e){
            if($('.end-sell .top').hasClass('pulse'))
            {
                return 'Таймер не установлен. Проверьте работу счётчика!';
            }
        },

        onClickConfirm: function (e) {
            $('.viewBlock.form').toggleClass('hidden');
            $('.viewBlock.confirmation').toggleClass('hidden');
        },

        paidOffer: function (e) {
            var confirmed = $('#confirmation').is(':checked');
            if(confirmed && confirm("Вы уверены что хотите подтвердить оплату?"))
            {
                var touristId = this.$(e.target).closest('.our-tour').data('id');
                window.location = '/user/confirmpaid/' + touristId;
            }
        },

        editOffer: function(e)
        {
            var $item = this.$(e.target).closest('.our-tour');

            switch (true) {
                case $item.hasClass('view'):
                    $item.removeClass('view').addClass('edit');
                    break;

                case $item.hasClass('edit'):
                    $item.removeClass('edit').addClass('view');
                    break;
            }
        },

        render:  function (){

        }
    });

    return view;
});