define([
    
], function(){
    return Backbone.View.extend({
        
        events: {
            
        },

        initialize: function(){
            this.delay = 800;
        },

        render:  function (){
            var defer = $.Deferred();
            this.$el
                .css({display: "block"})
                .animate({opacity: 1}, this.delay, defer.resolve);

            return defer.promise();
        },

        hide:  function (){
            var defer = $.Deferred();
            this.$el.animate({opacity: 0}, this.delay, defer.resolve);
            
            defer.done($.proxy(function(){
                this.$el.hide()
            }, this));

            return defer.promise();
        },

        getDelay: function() {
            return this.$el.data('delay') * 1000;
        }
    });
});