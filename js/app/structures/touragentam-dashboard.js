/**
 * Created by m.soza on 28.03.2016.
 */
define([
], function(RegisterView){

    var Index = Backbone.View.extend({

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

        }
    });

    return Index;
});