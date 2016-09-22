define([
    'text!structures/user/tmpl/your_tour.html',
    'structures/user/models/changeTour',
    'validator',
], function(yourTourTmpl, changeTourModel) {

    var view = Backbone.View.extend({

        templateYourTour: _.template(yourTourTmpl),
        modelChangeTour: new changeTourModel,

        events: {
            "click button.edit": "editOffer",
            "click button.change": "changeOffer",
            "click button.confirm": "onClickConfirm",
            "click button.paid": "paidOffer",
            "click button.preview": "previewChange",
            "click a.more": "onClickMore",
        },

        initialize: function() {

            this.modelChangeTour.on('sync', this.renderPreviewYourTour, this);

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
            if (!$row.size())
            {
                $row = $(e.target).closest('.changeBlock');
            }
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
            $('.viewBlock.paid').toggleClass('hidden');
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
                case $item.hasClass('edit'):
                    $item.removeClass('edit').addClass('view');
                    break;

                default:
                    $item.removeClass('view change').addClass('edit');
                    break;
            }
        },

        changeOffer: function(e)
        {
            var $item = this.$(e.target).closest('.our-tour');

            switch (true) {
                case $item.hasClass('change'):
                    $item.removeClass('change').addClass('view');
                    break;

                default:
                    $item.removeClass('view edit').addClass('change');
                    break;
            }
        },

        previewChange: function(e)
        {
            var $form = this.$(e.target).closest('form');

            console.log($form.data('bootstrapValidator').validate());

            this.modelChangeTour.fetch({data: {
                touristId:  Session.data.touristId,
                startDate:  $form.find('input.startDate').val(),
                endDate:    $form.find('input.endDate').val(),
                currency:   $form.find('input.currency').val(),
                currencyUnit:   $form.find('select.currencyUnit').val()
            }})
            .success($.proxy(function(){
                $form.find('.body').addClass('hidden');
            }, this));

            
        },

        renderPreviewYourTour: function () {
            var data = this.modelChangeTour.attributes;
            var $form = this.$el.find('form.changing');

            data = _.extend(data, {
                'description': $form.find('.description').val(),
                'bookingPrepayment': $form.find('.bookingPrepayment').val(),
                'bookingPrepaymentPaid': $form.find('.bookingPrepaymentPaid').val(),
                'bookingEndDate': $form.find('.bookingEndDate').val(),
                'paymentEndDate': $form.find('.paymentEndDate').val(),
            });

            $form.find('.preview .ajax').html(this.templateYourTour(data));
            $form.find('.preview').removeClass('hidden');
        },

        render:  function (){

        }
    });

    return view;
});