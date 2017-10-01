/**
 * Created by m.soza on 31.06.2016.
 */
 define([
    'backbone',
], function(Backbone) {
    return Backbone.View.extend({

        events: {
            'click ol li': 'clickItem',
        },

        clickItem: function(e)
        {
            var $el = this.$(e.target);
            $el.find('.action').toggleClass('hidden');
        }
        
    });
});
