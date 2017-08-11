/**
 * Created by m.soza on 17.06.2016.
 */
define([
    "tinymce",
    "tinymce.jquery",
    'validator'
], function () {
    return Backbone.View.extend({

        events: {
            'click .more': "clickMore"
        },

        clickMore: function(e){
            e.preventDefault();
            var $el = this.$(e.target);

            $el.siblings('.desc').toggleClass('hidden');
        },

        render: function(){
            
        }
    });
});