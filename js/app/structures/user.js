/**
 * Created by m.soza on 03.03.2016.
 */
define([
    "structures/user/orderTour",
    "vendor/jquery.countdown/jquery.plugin",
    "vendor/jquery.countdown/jquery.countdown",
    "tinymce",
    'validator',
], function(OrderTourView){

    var Index = Backbone.View.extend({

        events: {
            "click button.edit": "clickEditButton"
        },

        initCountDown: function(){
            $.countdown.regionalOptions['ru'] = {
                labels: ['Лет', 'Месяцев', 'Недель', 'Дней', 'Часов', 'Минут', 'Секунд'],
                labels1: ['Год', 'Месяц', 'Неделя', 'День', 'Час', 'Минута', 'Секунда'],
                labels2: ['Года', 'Месяца', 'Недели', 'Дня', 'Часа', 'Минуты', 'Секунды'],
                compactLabels: ['л', 'м', 'н', 'д'], compactLabels1: ['г', 'м', 'н', 'д'],
                whichLabels: function(amount) {
                    var units = amount % 10;
                    var tens = Math.floor((amount % 100) / 10);
                    return (amount == 1 ? 1 : (units >= 2 && units <= 4 && tens != 1 ? 2 :
                        (units == 1 && tens != 1 ? 1 : 0)));
                },
                digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                timeSeparator: ':', isRTL: false};
            $.countdown.setDefaults($.countdown.regionalOptions['ru']);
        },

        clickEditButton: function(e){
            var $container = this.$(e.target).siblings('.form-group');

            $container.siblings('button.ok').removeClass('hidden');
            $container.siblings('button.edit').addClass('hidden');
            tinymce.get('offer').show();
            $container.find('.view').addClass('hidden');
        },

        initTinyMCE: function(){
            if (!this.$('form.tourForm').size()) 
            {
                return false;
            }

            var self = this;

            this.$('form.tourForm').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    offer: {
                        validators: {
                            callback: {
                                message: 'Введите текст преложения. Он должен быть не менее 5 символов',
                                callback: function(value, validator, $field) {
                                    
                                    // Get the plain text without HTML
                                    var text = tinyMCE.activeEditor.getContent({
                                        format: 'text'
                                    });

                                    return text.length >= 5;
                                }
                            }
                        }
                    }
                }
            });

            tinymce.init({ 
                selector:'textarea.offer',
                menubar: false,
                statusbar: false,
                plugins: [
                  'autolink link image'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image',
                setup: function(editor) {
                    
                    /**/
                    editor.on('init', function(ed) {
                       if($(ed.target.targetElm).hasClass('hidden'))
                        {
                            tinymce.get(ed.target.id).hide();
                        }
                    });

                    editor.on('change', function(e) {
                        var $form = $(e.target.editorContainer).closest('form');

                        if($form.data('changed'))
                        {
                            return false;
                        }

                        $form.find('.info').text('Предложение от турагента');
                        $form.find('button.save').removeClass('hidden');
                        $form.data('changed', true);
                    });
                    editor.on('keyup', function(e) {
                        $('form.tourForm').bootstrapValidator('revalidateField', 'offer');
                    });
                }
            });
        },

        render: function(){

            //countdown time
            this.initCountDown();

            this.initTinyMCE();

            var self = this;
            var date = this.$('.countdown-time').data('date');
            var austDay = new Date(date);
            
            this.$('.countdown-time').countdown({
                until: austDay,
                format: 'DHMS'
            });

            (new OrderTourView({
                el: '#order-tour'
            })).render();
        }
    });

    return Index;
});