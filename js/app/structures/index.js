/**
 * Created by m.soza on 25.02.2016.
 */
define([
    'structures/site/views/view-add-task',
    'structures/site/views/view-add-task-filter',
    'structures/site/views/view-main-table',
    'structures/site/views/view-slider',
    //'bootstrap'
], function(AddTaskView, AddTaskFilterView, MainTableView, SliderView){

    var Index = Backbone.View.extend({

        events: {
            "click a.internal": "linkClick",
            "click a#btn-add-task": "clickAddTask",
            "click a#btn-user-login": "clickUserLogin",
            "click a.show-feedback-button": "clickShowFeedback",
            "click a.submit-button": "clickSubmitFeedback",
            "click a.glyphicon-remove-sign": "clickHideFeedback",
        },

        initialize:function () {
            var location = window.location;

            switch (location.hash) {
                case '#accordion':
                    $('#accordion').find('.panel-collapse').addClass('in');
                    break;

                case '#tabRules':
                    $('#tabRules').trigger('click');
                    break;

                case '#tabAbout':
                    $('#tabAbout').trigger('click');
                    break;

                case '#tabPartners':
                    $('#tabPartners').trigger('click');
                    break;
            }
        },

        clickShowFeedback: function(e) {
            e.preventDefault();
            
            var $el = this.$(e.target);

            $el.addClass('hidden');
            $el.siblings('a.glyphicon-remove-sign').removeClass('hidden');
            $el.siblings('form').removeClass('hidden');
        },

        clickHideFeedback: function(e) {
            if (!!e) {
                e.preventDefault();
            }
            
            var $el = this.$('a.glyphicon-remove-sign');

            $el.addClass('hidden');
            $el.siblings('a.show-feedback-button').removeClass('hidden');
            $el.siblings('form').addClass('hidden');

            $el.siblings('form').find('.alert').text("").addClass('hidden')
        },

        clickSubmitFeedback: function(e) {
            e.preventDefault();

            var $form = this.$(e.target).closest('form');

            $.ajax('api/send-feedback', {
                type: "POST",
                data: $form.serialize(),
                dataType: 'json',
            }).done((function(data) {
                if (data.error)
                {
                    this.feedbackError('Ошибка отправки. Попробуйте позже.')
                } else {
                    this.feedbackSuccess(data.message);
                    $form.find('textarea').val('');

                    setTimeout(this.clickHideFeedback.bind(this), 4000);
                }
            }).bind(this))
            .fail((function (e, data) {
                this.feedbackError('Ошибка отправки. Попробуйте позже.')
            }).bind(this));
        },

        feedbackSuccess: function(msg){
            this.$('#feedback form .alert')
                .text(msg)
                .removeClass('alert-success alert-danger hidden')
                .addClass('alert-success');
        },

        feedbackError: function(msg){
            this.$('#feedback form .alert')
                .text(msg)
                .removeClass('alert-success alert-danger hidden')
                .addClass('alert-danger');
        },

        linkClick: function(e){
            var $el = $(e.target);

            switch($el.attr('href')){
                case '#tabRules':
                case '#tabPartners':
                    this.$($el.attr('href')).click();
                    break;
            }

        },

        render: function(){
            
            (new AddTaskView({
                el: '#add-task'
            })).render();

            (new AddTaskFilterView({
                el: '#add-task-filter'
            })).render();

            (new MainTableView({
                el: '#block-main-table'
            })).render();

            (new SliderView({
                el: '#main-slider'
            })).render();

            //Accordion
            this.$('#accordion')
                .on('show.bs.collapse', function(e) {
                    $(e.target).prev('.panel-heading').addClass('open-accordion');
                })
                .on('hide.bs.collapse', function(e) {
                    $(e.target).prev('.panel-heading').removeClass('open-accordion');
                });

            this.$('.detail-block').on('click', function(e){
                $(e.target).siblings('span.hidden').removeClass('hidden');
                $(e.target).addClass('hidden');
            });

        },

        clickAddTask: function(e) {
            //e.preventDefault()
            var $el = this.$(e.target);
            var $addTaskSection = this.$('#add-task');

            if ($addTaskSection.hasClass('hidden')) {
                $addTaskSection.removeClass('hidden');
                $el.addClass('hidden');
            }
        },

        clickUserLogin: function(e) {
            e.preventDefault()
            var $el = this.$(e.target);
            var $section = this.$('#login-user');
//debugger;
            $section.toggleClass('hidden');
        }
    });

    return Index;
});