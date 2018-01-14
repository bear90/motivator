define([
    'underscore',
    'structures/site/views/view-slide',
    'jquery.cookie'
], function(_, SlideView){
    return Backbone.View.extend({
        
        events: {
            'click a.play': 'clickPlay',
            'click a.pause': 'clickPause',
            'click a.next': 'clickNext',
            'click a.prev': 'clickPrev',
            'click a.backward': 'clickBackward',
        },

        timeout: null,
        autoplay: false,
        ready: true,

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

        first:function() {
            this.index = 0;
            return this;
        },

        slide: function() {
            return this.images[this.index];
        },

        start: function() {
            // Show current slide
            this.$('a.play').addClass('hidden');
            this.$('a.pause').removeClass('hidden');
            this.$('a.backward').removeClass('hidden');
            this.autoplay = true;

            // Set timeout after the showing
            this.timeout = setTimeout(this.showNext.bind(this), this.slide().getDelay());
        },

        stop: function () {
            clearTimeout(this.timeout);
            this.autoplay = false;
            this.$('a.pause').addClass('hidden');
            this.$('a.play').removeClass('hidden');
        },

        showNext: function() {
            this.ready = false;
            clearTimeout(this.timeout);

            // Hide current slide
            var defer = this.slide().hide();
            
            // Show next slide after the hiding
            defer.pipe((function(){
                return this.next().slide().render();
            }).bind(this));
            
            // Set timeout after the showing
            defer.done((function(){
                if (this.autoplay) {
                    this.timeout = setTimeout(this.showNext.bind(this), this.slide().getDelay());
                    if (this.slide().getDelay() > 9*1000 || this.index==0) {
                        this.stop();
                    }
                }
                this.ready = true;
            }).bind(this));
        },

        showPrev: function() {
            this.ready = false;
            clearTimeout(this.timeout);

            // Hide current slide
            var defer = this.slide().hide();
            
            // Show next slide after the hiding
            defer.pipe((function(){
                return this.prev().slide().render();
            }).bind(this));
            
            
            // Set timeout after the showing
            defer.done((function(){
                if (this.autoplay) {
                    this.timeout = setTimeout(this.showNext.bind(this), this.slide().getDelay());
                    if (this.slide().getDelay() > 9*1000) {
                        this.stop();
                    }
                }
                this.ready = true;
            }).bind(this));
        },

        showFirst: function() {
            clearTimeout(this.timeout);
            this.ready = false;

            // Hide current slide
            var defer = this.slide().hide();
            
            // Show next slide after the hiding
            defer.pipe((function(){
                return this.first().slide().render();
            }).bind(this));
            
            // Set timeout after the showing
            defer.done((function(){
                if (this.autoplay) {
                    this.timeout = setTimeout(this.showNext.bind(this), this.slide().getDelay());
                    if (this.slide().getDelay() > 9*1000) {
                        this.stop();
                    }
                }
                this.ready = true;
            }).bind(this));
        },

        clickPlay: function(e) {
            e.preventDefault();
            if (this.ready) {
                this.start();
            }
        },

        clickPause: function(e) {
            e.preventDefault();
            if (this.ready) {
                this.stop();
            }
        },

        clickNext: function(e) {
            e.preventDefault();
            if (this.ready) {
                this.showNext();
            }
        },

        clickPrev: function(e) {
            e.preventDefault();
            if (this.ready) {
                this.showPrev();
            }
        },

        clickBackward: function(e) {
            e.preventDefault();
            if (this.ready) {
                this.showFirst();
            }
        },

        render:  function (){
            if (!!$.cookie('main-slider') === false) {
                this.start();
            }
        },
    });
});