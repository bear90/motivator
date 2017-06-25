define([
    'validator',
    'tinymce',
    'tinymce.jquery'
], function(){
    return Backbone.View.extend({
        
        events: {
            'click button.add-offer': "clickAddOffer",
            'click button.add-offer2': "clickAddOffer2",
            'click a.offers-link': "clickOffersLink",
            'click button.cancel-offer': "clickCancelOffer",
        },

        initialize: function(){
            
        },

        render:  function (){

        },

        clickOffersLink:  function (e){
            e.preventDefault();
            var $el = this.$(e.target);
            var $offersRow = $el.closest('tr').next('tr.offers-row');

            $offersRow.toggleClass('hidden');
        },

        clickAddOffer2:  function (e){
            var $el = this.$(e.target);
            var $addOfferRow = $el.closest('tr').next('tr.add-offer-row');
            var $form = $addOfferRow.find('form');
            var id = "offer_form_" + $el.data('id');

            $addOfferRow.toggleClass('hidden');

            if (!!$form.data('initialized') === false) {
                $form.data('initialized', 1);
                this.initOffer($addOfferRow);
            }

            this.scrollTo(id);
        },

        clickAddOffer:  function (e){
            var $el = this.$(e.target);
            var $addOfferRow = $el.closest('tr').next().next('tr.add-offer-row');
            var $form = $addOfferRow.find('form');
            var id = "offer_form_" + $el.data('id');

            $addOfferRow.toggleClass('hidden');

            if (!!$form.data('initialized') === false) {
                $form.data('initialized', 1);
                this.initOffer($addOfferRow);
            }

            this.scrollTo(id);
        },

        scrollTo: function(id) {
            $('html, body').animate({
                scrollTop: $("#" + id).offset().top
            }, 1000);
        },

        clickCancelOffer:  function (e){
            var $el = this.$(e.target);
            var $addOfferRow = $el.closest('tr');
            var $offersRow = $addOfferRow.prev('tr.offers-row');
            var $taskRow = $offersRow.prev('tr.task-row');

            $addOfferRow.addClass('hidden');
            $offersRow.removeClass('hidden').addClass('hidden');
            $taskRow.find('a.offers-link').removeClass('hidden');
            $taskRow.find('button.add-offer').removeClass('hidden');
        },

        initOffer: function($offerRow) {
            var task_id = $offerRow.attr('id');
            
            $offerRow.find('form').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'offer[contact]': {
                        selector: '#' + task_id + ' .contact textarea',
                        validators: {
                            callback: {
                                message: "Вам необходимо ввести интернет ссылку на сайт вашего турагентства, а также ваше имя и контактные данные!",
                                callback: function(value, validator, $field) {
                                    // Get the plain text without HTML
                                    var text = tinyMCE.get($field.attr('id')).getContent({
                                        format: 'text'
                                    });

                                    console.log(text);
                                    return text.length >= 5;
                                }
                            },
                        }
                    },
                    'offer[description]': {
                        selector: '#' + task_id + ' .description textarea',
                        validators: {
                            callback: {
                                message: "Вам необходимо ввести интернет ссылку на тур и дополнительную информацию о нём!",
                                callback: function(value, validator, $field) {
                                    // Get the plain text without HTML
                                    var text = tinyMCE.get($field.attr('id')).getContent({
                                        format: 'text'
                                    });

                                    console.log(text);
                                    return text.length >= 5;
                                }
                            },
                        }
                    },
                    'offer[priceType]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать режим продажи тура!"
                            },
                        }
                    },
                    'offer[price]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести стоимость тура!"
                            },
                        }
                    },
                }
            });

            $offerRow.find('textarea').tinymce({
                menubar: false,
                statusbar: false,
                plugins: [
                  'autolink link image'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link',
                setup: function(editor) {
                    editor.on('keyup', function(e) {
                        var $form = $(editor.targetElm).closest('form');
                        $form.bootstrapValidator(
                            'revalidateField', 
                            $(editor.targetElm).attr('name')
                        );
                    });
                }
            });
        }
    });
});
