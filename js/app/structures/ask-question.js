/**
 * Created by m.soza on 25.02.2016.
 */
define([
], function(){

    var Index = Backbone.View.extend({

        events: {
            'submit form.ask-question' : 'onSubmitAskQuestion'
        },

        onSubmitAskQuestion: function(e){
            e.preventDefault();

            var $form = $(e.target);

            if ($form.find('textarea[name=text]').val() == '') {
                alert("Текст письма не может быть пустым!");
                return false;
            }

            var formData = new FormData;

            $form.find('input, textarea').each(function(i, elem) {
                var value = $(elem).attr('type') == 'file' ? elem.files[0] : $(elem).val();
                formData.append($(elem).attr('name'), value);
            });

            $.ajax('/api/ask-question', {
                type: "POST",
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false
            }).done($.proxy(function(data) {
                if (data.error)
                {
                    this.showError('Ошибка отправки письма. Попробуйте позже.')
                } else {
                    this.showSuccess(data.message);
                    $form.find('input[name=file]').val('');
                    $form.find('textarea[name=text]').val('');
                }
            },this)).fail($.proxy(function (e, data) {
                this.showError('Ошибка отправки письма. Попробуйте позже.')
            }, this));
        },

        showSuccess: function(msg){
            this.$('form.ask-question').find('.alert')
                .text(msg)
                .removeClass('alert-success alert-danger hidden')
                .addClass('alert-success');
        },

        showError: function(msg){
            this.$('form.ask-question').find('.alert')
                .text(msg)
                .removeClass('alert-success alert-danger hidden')
                .addClass('alert-danger');
        },

        render: function(){

        }
    });

    return Index;
});