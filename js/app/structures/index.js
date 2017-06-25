/**
 * Created by m.soza on 25.02.2016.
 */
define([
    'structures/site/views/view-add-task',
    'structures/site/views/view-add-task-filter',
    'structures/site/views/view-main-table',
    'bootstrap'
], function(AddTaskView, AddTaskFilterView, MainTableView){

    var Index = Backbone.View.extend({

        events: {
            "click a.internal": "linkClick",
            "click a#btn-add-task": "clickAddTask",
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
        }
    });

    return Index;
});