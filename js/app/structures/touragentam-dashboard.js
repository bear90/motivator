/**
 * Created by m.soza on 28.03.2016.
 */
define([
    'structures/touragentam-dashboard/raschet',
    'structures/touragentam-dashboard/search',
    'structures/touragentam-dashboard/help'
], function(raschetView, searchView, helpView){

    return Backbone.View.extend({



        events: {
            'click .tourists-tabs a': 'showTourists',
        },

        showTourists: function(e){
            e.preventDefault();

            var $el = this.$(e.target);
            var className = $el.attr('href').substr(1);

            this.$('.users-block:not(.hidden)').addClass('hidden');
            this.$('.users-block.' + className).removeClass('hidden');
        },

        render: function(){
            (new searchView({el: '.tab2.search'})).render();
            (new raschetView({el: '.tab4.raschet'})).render();
            (new helpView({el: '.tab3.help'})).render();
        }
    });
});