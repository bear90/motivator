define([
    'validator',
], function() {

    var view = Backbone.View.extend({

        events: {
            "click button.edit": "editOffer",
            "click button.paid": "paidOffer",
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
                    country: {
                        selector: 'input.country',
                        validators: {
                            notEmpty: {
                                message: "Страна должена быть заполнена!"
                            }
                        }
                    },
                    city: {
                        selector: 'input.city',
                        validators: {
                            notEmpty: {
                                message: "Город/Регион должен быть заполнен!"
                            }
                        }
                    },
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

        leavePage: function(e){
            if($('.end-sell .top').hasClass('pulse'))
            {
                return 'Таймер не установлен. Проверьте работу счётчика!';
            }
        },

        paidOffer: function (e) {
            if(confirm("Вы уверены что хотите подтвердить оплату?"))
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