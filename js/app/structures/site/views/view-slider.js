define([
    'underscore',
    'structures/site/views/view-slide',
], function(_, SlideView){
    return Backbone.View.extend({
        
        events: {
            
        },

        initialize: function(){
            this.index = 0;
            this.images = [];
            _.each(this.$el.find('img'), $.proxy(function(img, key){
                var delay = $(img).data('delay');
                var view = new SlideView()
                view.setElement(img)
                this.images.push(view);
            }, this));
        },

        next:function() {
            this.index++;
            if (this.index > this.images.length-1) {
                this.index = 0;
            }
            return this;
        },

        prev:function() {
            this.index--;
            if (this.index < 0) {
                this.index = this.images.length-1;
            }
            return this;
        },

        slide: function() {
            return this.images[this.index];
        },

        start: function() {
            // Show current slide
            var defer = this.slide().render()

            // Set timeout after the showing
            defer.done((function(){
                setTimeout(this.showNext.bind(this), this.slide().getDelay());
            }).bind(this));
        },

        showNext: function() {
            // Hide current slide
            var defer = this.slide().hide();
            
            // Show next slide after the hiding
            defer.pipe((function(){
                return this.next().slide().render();
            }).bind(this));
            
            // Set timeout after the showing
            defer.done((function(){
                setTimeout(this.showNext.bind(this), this.slide().getDelay());
            }).bind(this))
        },

        render:  function (){
            this.start();
        },
    });
});