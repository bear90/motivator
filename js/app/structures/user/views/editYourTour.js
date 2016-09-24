define([

], function(){

    return Backbone.View.extend({
        
        render: function(){
            console.log('render edit');

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
            this.$('form.editForm').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    paymentEndDate: {
                        selector: 'form.editForm input.paymentEndDate',
                        validators: {
                            notEmpty: {
                                message: "Конечная дата оплаты тура должна быть выбрана!"
                            }
                        }
                    },
                    bookingEndDate: {
                        selector: 'form.editForm input.bookingEndDate',
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
                    description: {
                        selector: 'form.editForm textarea.description',
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
        }
    });
});