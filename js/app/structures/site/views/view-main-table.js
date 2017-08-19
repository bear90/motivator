define([
    'text!structures/site/tmpl/offer_price.html',
    'validator',
    'tinymce',
    'tinymce.jquery'
], function(OfferPriceTmpl){
    return Backbone.View.extend({
        
        events: {
            'click button.add-offer': "clickAddOffer",
            'click button.add-offer2': "clickAddOffer2",
            'click a.offers-link': "clickOffersLink",
            'click button.cancel-offer': "clickCancelOffer",
            'click a.offer-add-price': "clickOfferAddPrice",
            'keydown input.price': "keydownInputPrice",
            'click a.remove-offer': "clickRemoveOffer",
            'click a.favorite': "clickMakeFavorite",
            'click a.not_priority': "clickMakeNotPriority",
            'change input[name="offer[checkbox]"]': "changeCheckbox",
            "click .checkbox label > a": "clickGaideLink",
        },

        templateOfferPrice: _.template(OfferPriceTmpl),

        initialize: function() {
            this.$(".filtered-select").combobox();
        },

        clickMakeFavorite:  function (e){
            e.preventDefault();
            var $el = this.$(e.target);
            var $row = $el.closest('.item.row');
            var $wrap = $row.parent();
            var data = {
                id: $row.data('id'),
                type: 1
            }

            $.post({
                url: '/site/change-offer-type',
                data: data,
                dataType: 'json'
            })
                .done(function (data) {
                    $wrap.html(data.widget);
                })
                /*.fail(function (data) {
                    console.log('fail', data)
                });*/
        },

        clickMakeNotPriority:  function (e){
            e.preventDefault();
            var $el = this.$(e.target);
            var $row = $el.closest('.item.row');
            var $wrap = $row.parent();
            var data = {
                id: $row.data('id'),
                type: 2
            }

            $.post({
                url: '/site/change-offer-type',
                data: data,
                dataType: 'json'
            })
                .done(function (data) {
                    $wrap.html(data.widget);
                })
                /*.fail(function (data) {
                    console.log('fail', data)
                });*/
        },

        keydownInputPrice:  function (e){
            // Allow: backspace, delete, tab, escape, enter
            if ($.inArray(e.keyCode, [8, 9, 27, 13, 110]) !== -1 ||
                // Allow: Ctrl/cmd+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        },

        render:  function (){

        },

        clickRemoveOffer:  function (e){
            //e.preventDefault();

            return confirm('Вы уверены?');
        },

        clickOfferAddPrice: function(e) {
            e.preventDefault();
            var $el = this.$(e.target);
            var n = $el.closest('form').find('.row.price').size();
            if (n<3) {
                $el.before(this.templateOfferPrice());
                if (n==2) {
                    $el.addClass('hidden');
                }
            }
        },

        clickOffersLink:  function (e){
            e.preventDefault();
            var $el = this.$(e.target);
            var $offersRow = $el.closest('tr').next('tr.offers-row');

            $offersRow.find('button.add-offer2').removeClass('hidden');
            $offersRow.toggleClass('hidden');
        },

        clickAddOffer2:  function (e){
            var $el = this.$(e.target);
            var $addOfferRow = $el.closest('tr').next('tr.add-offer-row');
            var $form = $addOfferRow.find('form');
            var id = "offer_form_" + $el.data('id');

            $el.addClass('hidden');
            $addOfferRow.toggleClass('hidden');

            if (!!$form.data('initialized') === false) {
                $form.data('initialized', 1);
                this.initOffer($addOfferRow);
            }

            this.scrollTo(id);
        },

        clickAddOffer:  function (e){
            var $el = this.$(e.target);
            var $offersRow = $el.closest('tr').next('tr.offers-row');
            var $addOfferRow = $offersRow.next('tr.add-offer-row');
            var $form = $addOfferRow.find('form');
            var id = "offer_form_" + $el.data('id');

            $offersRow.find('button.add-offer2').addClass('hidden');
            $offersRow.removeClass('hidden');
            $addOfferRow.toggleClass('hidden');

            if (!!$form.data('initialized') === false) {
                $form.data('initialized', 1);
                this.initOffer($addOfferRow);
            }

            this.scrollTo(id);
        },

        scrollTo: function(id) {
            var position = parseInt($("#" + id).offset().top) - 150;
            $('html, body').animate({
                scrollTop: position
            }, 2000);
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

        changeCheckbox:  function (e){
            var $el = this.$(e.target);
            $el.closest('form').bootstrapValidator('revalidateField', 'offer[checkbox]');
        },

        clickGaideLink: function(e) {
            e.preventDefault();
            var $el = this.$(e.target);
            $el.closest('.checkbox').next('.gaide').toggleClass('hidden');
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

                                    return text.length >= 5;
                                }
                            },
                        }
                    },
                    'offer[priceType][]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать режим продажи тура!"
                            },
                        }
                    },
                    'offer[price][]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести стоимость тура!",
                            },
                        }
                    },
                    'offer[checkbox]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ознакомиться с Договором оферты!"
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
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link | removeformat ',
                default_link_target:"_blank",
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
